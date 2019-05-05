<template>
  <div>
    <div class="pad20 border">
        <h3 class="gray_3 pad10_l">文章类型</h3>
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
    <div class="box20"></div>
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
</style>

<script>
  export default {
    data() {
      return {
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
      loadData() {
        this.$store.dispatch('postManage/selPostTypeList').then(res => {
          this.dynamicTags = res.list || []
        })
      },
      handleClose(tag) {
        this.$store.dispatch('postManage/delPostType' ,{id:tag.id}).then(res => {
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
          this.$store.dispatch('postManage/addPostType' ,{code:inputValue,type:this.theme}).then(res => {
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