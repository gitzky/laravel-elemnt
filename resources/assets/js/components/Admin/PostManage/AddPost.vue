<template>
  <div>
    <div class="motail" v-if="viewPosts">
      <div class="close">
        <span class="f48 block" @click="viewPost"><i class="el-icon-circle-close"></i></span>
      </div>
      <div class="w1010 mar_auto b_white text-center pad20" style="margin: 0 auto;height: 100%;overflow-y: auto ;">
        <h2 class="c_titile">{{ form.postTitle }}</h2>
        <div class="pad5 gray_9 mar20_b" style="border: 1px dashed #ccc;">
          <span class="pad10_lr">发布时间：2018-8-8</span>
          <span class="pad10_lr">编辑：<span style="color: #009999;">小元元</span></span>
          <span class="pad10_lr">阅读：(0)</span>
        </div>
        <div class="content text-left" v-html="form.postContent"></div>
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
            label="文章类型"
            label-width="80px"
            prop="postType"
            :rules="{required: true,message: '请输入文章类型'}">
            <el-select v-model="form.postType" class="w240">
              <el-option :key="index" v-for="(item,index) in postTypes" :value="item.code" class="mar10_b">
                <el-button class="w200 ellipsis" plain  size="mini" :type="item.type">{{ item.code }}</el-button>
                
              </el-option>
            </el-select>
          </el-form-item>
          <el-form-item
            label="文章内容"
            label-width="80px"
            prop="postContent"
            :rules="{required: true,message: '请输入文章内容'}">
            <Editor @getPostContent="getPostContent" />
          </el-form-item>
        </el-form>
      </el-col>
      <el-col :span="5" class="pad20_lr">
        <div class="imgWrap mar20_t border pad20_lr">
          <p class="">文章配图</p>
          
          <el-upload
            class="avatar-uploader"
            action="admin/api/upload"
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
          <el-button size="small">重置</el-button>
          <el-button size="small" @click="viewPost">预览</el-button>
          <el-button size="small" class="w80" type="primary" @click="commitPost">提交</el-button>
        </div>
      </el-col>
    </el-row>
   
  </div>
    
</template> 
<script>
  import Editor from '../Editor'
    export default{
        components:{
            Editor:Editor
        },
        data() {
            return{
              viewPosts:false,
              form: {
                postTitle: '',
                postType: '',
                postContent: ''
              },
              postTypes:[{code:1,label:"PHP"},{code:2,label:"JAVA"}],
              imageUrl: '',
              file:{
                filename: '',
                extension: ''
              }
            }
        },
        created() {
          this.getPostType()
        },
        methods:{
          getPostType() {
            this.$store.dispatch('postManage/selPostTypeList').then(res => {
              this.postTypes = res.list || []
            })
          },
          viewPost() {
            this.viewPosts = !this.viewPosts
          },
          commitPost() {
            if (!this.imageUrl) {
              this.$message({
                type:'warning',
                message:'请上传文章配图！'
              })
              return false
            }
            let reqForm = Object.assign({},this.file,this.form)
            this.$store.dispatch('postManage/addNewPost', reqForm).then(res => {
              console.log(res)
            })
          },
          getPostContent(data) {
            console.log('DATA',data)
            this.form.postContent = data
          },
          handleAvatarSuccess(res, file) {
            this.imageUrl = URL.createObjectURL(file.raw);
            console.log(res,file)
            if (res.code === '0') {
              this.file.filename = res.data.filename
              this.file.extension = res.data.extension
            }
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