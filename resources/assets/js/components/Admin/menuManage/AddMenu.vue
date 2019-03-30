<template>
  <div class="editGoods-container" style="padding:30px 0;">
    <el-form ref="columnForm" :model="columnForm" :rules="rules" label-width="120px">
      <el-form-item label="功能ID:" prop="id" hidden>
        <el-input v-model.number="columnForm.id" type="id" placeholder="请输入功能ID" style="width: 400px;" @blur="inputFunc"/>
      </el-form-item>
      <el-form-item label="名称：" prop="name">
        <el-input v-model="columnForm.name" placeholder="请输入名称" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="url：" prop="url">
        <el-input v-model="columnForm.url" placeholder="请输入url" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="图标：" prop="mobIcon">
        <el-input v-model="columnForm.mobIcon" placeholder="请输入图标" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="排序：" prop="sort">
        <el-input v-model="columnForm.sort" placeholder="请输入级别" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="父级菜单：" prop="parentFuncId">
        <el-select v-model="columnForm.parentFuncId" placeholder="请选择">
          <el-option
            v-for="item in optiopnFunc"
            :key="item.value"
            :label="item.label"
            :value="item.value"/>
        </el-select>
      </el-form-item>
      <el-form-item style="padding-top:30px;">
        <el-button :loading="columnFormLoading" type="primary" @click="onSubmit('columnForm', columnForm)">发布</el-button>
        <el-button type="primary" @click.stop="onCancel">返回</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      columnForm: {
        id: '',
        type: '',
        name: '',
        url: '',
        mobIcon: '',
        rank: '',
        subSystemId: '',
        parentFuncId: '',
        sort: ''
      },
      columnFormLoading: false,
      options: [{
        value: '6',
        label: '后台管理系统'
      }],
      options1: [{
        value: 'MENU',
        label: '菜单'
      }],
      optionst: [{
        value: '0',
        label: '1'
      }, {
        value: '1',
        label: '2'
      }, {
        value: '2',
        label: '3'
      }, {
        value: '3',
        label: '4'
      }],
      optiopnFunc: [],
      rankB: '',
      pagination: {
        total: 1,
        currentPage: 1,
        pageSize: 10
      },
      rules: {
        type: [{
          required: true,
          message: '请选择功能类型',
          trigger: 'change'
        }],
        name: [{
          required: true,
          message: '名称不能为空',
          trigger: 'blur'
        }],
        subSystemId: [{
          required: true,
          message: '请选择所属子系统',
          trigger: 'change'
        }]
      }
    }
  },
  methods: {
    onCancel() {
      this.$router.back()
    },
    inputFunc() {
      var formCon = {}
      formCon = {
        pageNum: this.pagination.currentPage,
        pageSize: this.pagination.pageSize,
        subSystemIds: 6
      }
      this.$store.dispatch('role/selFuncList', formCon).then(response => {
        if (response) {
          for (var i = 0; i < response.list.length; i++) {
            if (response.list[i].id === this.columnForm.id) {
              this.$message({
                type: 'error',
                message: '功能Id已经存在'
              })
              return false
            }
          }
        }
      })
    },
    onSubmit(formName, columnForm) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.columnFormLoading = true
          // let axis = ''
          let isEnd = ''
          let parentFuncId = ''
          if (!columnForm.parentFuncId) {
            parentFuncId = 0
          } else {
            parentFuncId = columnForm.parentFuncId
          }
          if (columnForm.parentFuncId === '0') {
            isEnd = 0
            // axis = '$' + columnForm.id
          } else {
            isEnd = 1
            // axis = '$' + columnForm.parentFuncId + '$' + columnForm.id
          }
          const columnFormArg = {}
          columnFormArg.type = columnForm.type
          columnFormArg.name = columnForm.name
          columnFormArg.url = columnForm.url
          columnFormArg.mobIcon = columnForm.mobIcon
          columnFormArg.rank = this.rankB
          columnFormArg.subSystemId = columnForm.subSystemId
          columnFormArg.parentFuncId = parentFuncId
          columnFormArg.sort = columnForm.sort
          columnFormArg.isEnd = isEnd
          console.log(columnFormArg)
          this.$store.dispatch('role/addAuthFunc', columnFormArg).then(response => {
            this.columnFormLoading = false
            this.$message({
              type: 'success',
              message: '发布成功!'
            })
            this.$router.push({
              path: '/role/funcPage'
            })
          })
        } else {
          this.columnFormLoading = false
          return false
        }
      })
    },
    changeRank(val) {
      this.columnForm.parentFuncId = ''
      const rankId = val
      for (let i = 0; i < this.optionst.length; i++) {
        // console.log(this.optionst[i].label)
        if (this.optionst[i].value === val) {
          this.rankB = this.optionst[i].label
        }
      }
      var formCon = {}
      formCon = {
        pageSize: 1000,
        subSystemIds: 6,
        rank: rankId
      }
      this.$store.dispatch('role/selFuncList', formCon).then(response => {
        if (response) {
          const arr3 = []
          for (var i = 0; i < response.list.length; i++) {
            var obj = {}
            obj.label = response.list[i].name
            obj.value = response.list[i].id
            arr3[i] = obj
          }
          this.optiopnFunc = arr3
        }
      })
    }
  }
}
</script>
<style>
.el-table td, .el-table th.is-leaf{text-align:center;}
.el-table--border th{background:#fafafa;}
</style>
