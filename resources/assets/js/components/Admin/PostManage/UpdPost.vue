<template>
  <div>
    <div class="motail" v-if="viewPosts">
      <div class="close">
        <span class="f48 block" @click="viewPosts = !viewPosts"><i class="el-icon-circle-close"></i></span>
      </div>
      <div class="w1010 mar_auto b_white pad20" style="margin: 0 auto;height: 100%;overflow-y: auto ;">
        <h2 class="c_titile">{{ form.postTitle }}</h2>
        <div class="pad5 gray_9 mar20_b text-center" style="border: 1px dashed #ccc;">
          <span class="pad10_lr">发布时间：{{ form.date }}</span>
          <span class="pad10_lr">编辑：<span style="color: #009999;">{{ form.postAuthor }}</span></span>
          <span class="pad10_lr">阅读：(0)</span>
        </div>
        <div class="ql-editor" v-html="form.postContent"></div>
      </div>
    </div>
    <el-row>
      <el-col :span="19">
        <el-form :model="form" ref="form" class="pad20 w100_per">
          <el-form-item
            label="文章标题"
            label-width="80px"
            prop="postTitle"
            :rules="{required: true,message: '请输入文章标题'}">
            <el-input v-model="form.postTitle" />
          </el-form-item>
           <el-form-item
            label="作者"
            label-width="80px"
            prop="postAuthor"
            :rules="{required: true,message: '请输入作者'}">
            <el-input v-model="form.postAuthor" />
          </el-form-item>
          <el-form-item
            label="文章类型"
            label-width="80px"
            prop="postType"
            :rules="{required: true,message: '请输入文章类型'}">
            <el-select v-model="form.postType" multiple placeholder="请选择">
              <el-option :key="index" v-for="(item,index) in postTypes" :value="item.code" :label="item.code"/>
            </el-select>
          </el-form-item>
          <el-form-item
            label="文章简介"
            label-width="80px"
            prop="postIntro"
            :rules="{required: true,message: '请输入文章简介'}">
            <el-input type="textarea" v-model="form.postIntro" />
          </el-form-item>
          <el-form-item
            label="文章内容"
            label-width="80px"
            prop="postContent" :rules="{
              required:true,
              message:'请输文章内容'
            }">
            <Editor :father-content = "form.postContent" @getContent="getContent" />
          </el-form-item>
        </el-form>
      </el-col>
      <el-col :span="5" class="pad20_lr">
        <div class="imgWrap mar20_t border pad20_lr">
          <p class="">文章配图</p>
          <el-upload
            class="avatar-uploader"
            action="/api/upload"
            :show-file-list="false"
            name="fileName"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload">
            <img v-if="imageUrl" :src="imageUrl" class="avatar">
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
          </el-upload>
          <div class="box20"></div>
        </div>
        <div class="box20"></div>
        <div class="commitButton border pad20">
          <p class="red">点击预览可以预览您要提交的内容</p>
          <p class="red">若确定无误，请点击提交</p>
          <div class="box10"></div>
          <div>
            <el-button size="small" class="w80 mar10_r" type="danger" @click="resetForm('form')">重置</el-button>
            <el-button size="small" class="w120 mar10_r" type="success" @click="viewPost('form')">预览</el-button>
          </div>
          <div class="box10"></div>
          <div>
            <el-button size="small" class="w80 mar10_r" type="info" @click="back('form')">返回</el-button>
            <el-button size="small" class="w120 mar10_r" type="primary" @click="commitPost('form')">提交</el-button>
          </div>
        </div>
      </el-col>
    </el-row>
  </div>
</template> 
<script>
  import Editor from '../Editor'
  import { Format } from '../../../untils/tools.js' 
    export default{
        components:{
            Editor:Editor
        },
        data() {
            return{
              viewPosts:false,
              id: '',
              form: {
                postTitle: '',
                postAuthor: '',
                postType: [],
                postIntro: '',
                postContent: '',
                date: Format('yyyy-MM-dd hh:mm:ss',new Date())
              },
              postTypes:[{code:1,label:"PHP"},{code:2,label:"JAVA"}],
              imageUrl: ''
            }
        },
        created() {
          this.getPostType()
          this.loadData(this.$route.params.id)
        },
        methods:{
          back() {
            this.$router.back()
          },
          resetForm(formName) {
            this.form.postContent = ''
            this.$refs[formName].resetFields();
          },
          loadData(id) {
            this.$store.dispatch('admin/postManage/selPostById', { id }).then(res => {
              this.form.postTitle = res.newsName
              this.form.postAuthor = res.newsAuthor
              this.form.postType = res.newsType.split(',')
              this.form.postIntro = res.newsIntro
              this.form.postContent = res.newsContent
              this.imageUrl = res.newsIntroImg
            })
          },
          getPostType() {
            this.$store.dispatch('admin/postManage/selPostTypeList').then(res => {
              this.postTypes = res.list || []
            })
          },
          viewPost(formName) {
            this.$refs[formName].validate(valid => {
              if (valid) {
                this.viewPosts = !this.viewPosts
              }
            })
          },
          commitPost(formName) {
            this.$refs[formName].validate(valid => {
               if (!this.imageUrl) {
                this.$message({
                  type:'warning',
                  message:'请上传文章配图！'
                })
                return false
              }
              let reqForm = Object.assign({},{ id: this.$route.params.id }, { imageUrl:this.imageUrl },this.form)
              this.$store.dispatch('admin/postManage/updPostById', reqForm).then(res => {
                console.log(res)
                if (res.code === '0') {
                  this.$message({
                    type:'success',
                    message:'文章修改成功'
                  })
                  this.$router.push('/admin/postManage/postList')
                }
              })
            })
          },
          getContent(data) {
            this.form.postContent = data
          },
          handleAvatarSuccess(res, file) {
            // this.imageUrl = URL.createObjectURL(file.raw);
            this.imageUrl = res.data.url;
          },
          beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
              this.$message.error('上传头像图片只能是 JPG 格式!');
            }
            if (!isLt2M) {
              this.$message.error('上传头像图片大小不能超过 2MB!');
            }
            return isJPG && isLt2M;
          }
        }
    }
    
</script>
<style>
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
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