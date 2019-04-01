<template>
  <div class="editGoods-container" style="padding:30px 0;">
    <el-form ref="columnForm" :model="columnForm" label-width="120px">
      <el-form-item label="名称：" prop="name" :rules="{ required: true, message: '名称不能为空', trigger: 'blur' }">
        <el-input v-model="columnForm.name" placeholder="请输入名称" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="url：" prop="url" :rules="{ required: true, message: '地址不能为空', trigger: 'blur' }">
        <el-input v-model="columnForm.url" placeholder="请输入url" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="图标：" prop="icon">
        <el-input v-model="columnForm.icon" placeholder="请输入图标" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="排序：" prop="sort">
        <el-input v-model="columnForm.sort" placeholder="请输入级别" style="width:400px;"/>
      </el-form-item>
      <el-form-item label="父级菜单：" prop="parentId">
        <el-select v-model="columnForm.parentId" placeholder="请选择">
          <el-option
            v-for="item in optiopnFunc"
            :key="item.value"
            :label="item.label"
            :value="item.value"/>
        </el-select>
      </el-form-item>
      <el-form-item style="padding-top:30px;">
        <el-button type="primary" @click="submitForm('columnForm', columnForm)">新增菜单</el-button>
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
        name: '',
        url: '',
        icon: '',
        sort: '',
        parentId: ''
      },
      optiopnFunc:[]
    }
  },
  methods: {
    onCancel() {
      this.$router.back()
    },
    submitForm(formName, columnForm) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          const formCon = columnForm

          this.$store.dispatch('menu/addMenu', formCon).then(response => {
            this.$message({
              type: 'success',
              message: '新增成功!'
            })
            this.$router.push({
              path: '/admin/menuManage/menuList'
            })
          })
        } else {
          return false
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
