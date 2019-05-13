<template>
  <div>
      <el-header style="width: 75%;height:40px;line-height:40px;font-weight:bold;padding-left:10px;background:#ccc">
        文章类型列表
        <el-button type="primary" size="mini" style="float:right;margin-top:6px;" icon="el-icon-edit" @click="dialogVisible = !dialogVisible">类型编辑</el-button>
      </el-header>
      <el-table
        :data="dynamicTags"
        border
        style="width: 75%">
        <el-table-column
          prop="id"
          label="ID" />
        <el-table-column
          label="标签类型">
          <template slot-scope="scope">
           <!-- <el-image
              src="http://pr6as55qk.bkt.clouddn.com/images/image_b275c074774be3b1f7530c102730f6df.jpg"
              style="width: 100px; height: 100px"
              fit="contain"></el-image> -->
            <el-button size="small" :type="scope.row.type">{{ scope.row.code }}</el-button>
          </template>
        </el-table-column>
        <el-table-column
          prop="type"
          label="标签主题">
        </el-table-column>
        <el-table-column label="是否为热门标签">
          <template slot-scope="scope">
            <el-switch
              v-model="scope.row.isChecked"
              active-color="#13ce66"
              inactive-color="#ff4949"
              active-value='1'
              inactive-value='0'
              @change="checkedHotTags(scope.row.id,$event)">
            </el-switch>
          </template>
        </el-table-column>
      </el-table>
      <el-dialog
        title="新增类型"
        :visible.sync="dialogVisible"
        width="40%">
        <div class="pad20 border">
            <h3 class="gray_3 pad10_l">新增文章类型</h3>
            <el-radio-group v-model="theme" class="mar10_l">
              <el-radio style="color: #409EFF;"  label="primary" size="small" border>blue</el-radio>
              <el-radio style="color: #67C23A;"  label="success" size="small" border>green</el-radio>
              <el-radio style="color: #E6A23C;"  label="warning" size="small" border>orange</el-radio>
              <el-radio style="color: #F56C6C;"  label="danger" size="small" border>red</el-radio>
              <el-radio style="color: #909399;"  label="info" size="small" border>gray</el-radio>
            </el-radio-group>
           
            <div class="box20"></div>
            <el-tag
              class="mar10_b mar10_r mar10_l"
              :type="tag.type"
              :key="tag.id"
              v-for="tag in dynamicTags"
              closable
              :disable-transitions="false"
              @close="handleClose(tag)">
              {{tag.code}}
            </el-tag>
            <el-input
              class="input-new-tag mar10_b"
              v-if="inputVisible"
              v-model="inputValue"
              ref="saveTagInput"
              size="small"
              @keyup.enter.native="handleInputConfirm"
              @blur="handleInputConfirm"
            >
            </el-input>
            <el-button v-else class="button-new-tag" size="small" @click="showInput">+ New Tag</el-button>
            <div class="box20"></div>
        </div>
      </el-dialog>
  </div>
</template>
<style>
  .el-tag + .el-tag {
    margin-left: 10px;
  }
  .button-new-tag {
    margin-left: 10px;
    height: 32px;
    line-height: 30px;
    padding-top: 0;
    padding-bottom: 0;
  }
  .input-new-tag {
    width: 90px;
    margin-left: 10px;
    vertical-align: bottom;
  }
  .el-table td,
  .el-table th.is-leaf {
    text-align: center;
  }
</style>
<script>
  export default {
    data() {
      return {
        dialogVisible:false,
        theme:'primary',
        dynamicTags: [],
        inputVisible: false,
        inputValue: ''
      };
    },
    created() {
      this.loadData()
    },
    methods: {
      checkedHotTags(id,isChecked) {
        console.log(id,isChecked)
        this.$store.dispatch('admin/postManage/updPostType', { id,isChecked }).then(res => {
          console.log(res)
          if (res.code === '0') {
            this.$message({
              type: 'success',
              message: '修改成功'
            })
          }
        })
        
      },
      loadData() {
        this.$store.dispatch('admin/postManage/selPostTypeList').then(res => {
          this.dynamicTags = res.list || []
        })
      },
      handleClose(tag) {
        this.$store.dispatch('admin/postManage/delPostType' ,{id:tag.id}).then(res => {
          if (res.code === '0') {
            this.dynamicTags.splice(this.dynamicTags.indexOf(tag), 1);
            this.$message({
              type:'success',
              message:'文章类型删除成功'
            })
          }
        })
      },

      showInput() {
        this.inputVisible = true;
        this.$nextTick(_ => {
          this.$refs.saveTagInput.$refs.input.focus();
        });
      },

      handleInputConfirm() {
        let inputValue = this.inputValue;
        if (inputValue) {
          this.$store.dispatch('admin/postManage/addPostType' ,{code:inputValue,type:this.theme}).then(res => {
            if (res.code === '0') {
              this.$message({
                type:'success',
                message:'文章类型添加成功'
              })
              this.loadData()
              this.inputVisible = false;
              this.inputValue = '';
            }
          })
        }
      }
    }
  }
</script>