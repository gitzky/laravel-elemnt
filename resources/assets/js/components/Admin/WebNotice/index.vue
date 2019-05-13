<template>
  <div>
    <el-dialog
      title="站点公告"
      :visible.sync="view"
      width="40%"
      center>
      <div class="webNotice sitetip min-h420">
        <div class="border">
          <strong>站点公告</strong>
          <h3 class="title pad10_lr">{{ form.title }}</h3>
          <p class="overView pad10_lr min-h120" v-html="form.content"></p>
        </div>
      </div>
    </el-dialog>
    <el-form ref="form" :model="form" label-width="100px" class="w60_per">
      <el-form-item label="公告标题" prop="title" :rules="{
        required:true,
        message:'请输入公告标题'
      }">
        <el-input v-model="form.title"></el-input>
      </el-form-item>
      <el-form-item label="公告内容" prop="content" :rules="{
        required:true,
        message:'请输入公告内容'
      }">
        <Editor :father-content = "form.content" @getContent="getContent" />
      </el-form-item>
      <el-form-item>
        <el-button type="info" @click="back()">返回</el-button>
        <el-button type="danger" @click="resetForm('form')">重置</el-button>
        <el-button type="success" class="w120" @click="viewNotice('form')">预览</el-button>
        <el-button class="w120" type="primary" @click="commitNotice('form')">提交</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
  import Editor from '../Editor'
  export default {
    components:{
      Editor:Editor
    },
    data() {
      return {
        view:false,
        form: {
          title: '',
          content: ''
        }
      }
    },
    created() {
      this.loadData()
    },
    methods:{
      back() {
        this.$router.back()
      },
      resetForm(formName) {
        this.form.content = ''
        this.$refs[formName].resetFields();
      },
      getContent(data) {
        this.form.content = data
      },
      viewNotice(formName) {
        this.$refs[formName].validate(v=>{
          if(v) {
            this.view = ! this.view
          }
        })
      },
      commitNotice(formName) {
        this.$refs[formName].validate(v=> {
          if (v) {
            const formCon = Object.assign({}, this.form)
            this.$store.dispatch('admin/webNotice/editNotice', formCon).then(res => {
              if (res.code === '0') {
                this.$message({
                  type:'success',
                  message:'提交成功'
                })
              }
            })
          }
        })
      },
      loadData() {
        this.$store.dispatch('admin/webNotice/selNotice').then(res=> {
          this.form.title=res.title
          this.form.content=res.content
        })
      }
    }
  }
</script>
<style>
 /*公告*/
 .sitetip>a{
 	display: block;
 	padding: 0px 15px 15px 20px;
 }
 .sitetip strong{
     background-color: #8EC55F;
     margin: -1px 0 0 0;
     display: inline-block;
     padding: 4px 15px;
     color: #fff;
     font-size: 14px;
     font-weight: normal;
 }
 .sitetip .title{
     color: #8EC55F;
     font-size: 20px;
     font-weight: normal;
     margin-top: 14px;
 }
 .sitetip .overView{
 	color: #999;
     margin-bottom: 0;
 }
 .sitetip img{
 	max-width:225px;
 }
 .motail{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    background: rgba(0,0,0,.5);
  }
  .c_titile {
    font-size: 22px;
    margin: 20px 0;
    text-align: center;
    color: #333;
    font-weight: bold;
}
.close{
  cursor: pointer;
  text-align: center;
  position: fixed;
  right: 10px;
  top: 10px;
  z-index: 1001;
}
.f48{
  font-size:48px ;
  color: white;
}
  
</style>