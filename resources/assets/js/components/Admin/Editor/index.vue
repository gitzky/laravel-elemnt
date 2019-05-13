<template>
    
    <div class="ql-container">
        <div class="imgSize w200">
            <el-slider
              class="inlineBlock"
              v-model="size"
              :min="60">
            </el-slider>
        </div>
         <quill-editor
          :style="width"
          v-model="content" 
          placeholder="在这输入"
          ref="myQuillEditor" 
          :options="editorOption" 
          @blur="onEditorBlur(content)" @focus="onEditorFocus(content)"
          @change="onEditorChange(content)">
        </quill-editor>
        
    </div>
</template> 
<script>
    import { quillEditor } from 'vue-quill-editor'
    export default{
        props:['fatherContent'],
        data(){
            return {
                size: 100,
                content: this.fatherContent,
                editorOption: {}
            }
        },
        computed:{
            width() {
                return "width:"+this.size+"%"
            }
        },
        watch: {
           fatherContent(val) {
               this.content = val
           } 
        },
        methods:{
            onEditorBlur(val){//失去焦点事件
              this.$emit('getContent', val)
            },
            onEditorFocus(val){//获得焦点事件
                this.$emit('getContent', val)
            },
            onEditorChange(val){//内容改变事件
                this.$emit('getContent', val)
            }
        }
    }
</script>
<style>
/*    .ql-container.ql-snow img{
        max-width: 600px;
    } */
    .ql-container .imgSize{
        position: absolute;
        left:10px;
        top: 80px;
        z-index: 0;
    }
    .el-slider__bar{
        background-color: #ccc;
    }
    .ql-toolbar.ql-snow{
        padding-bottom:20px ;
    }
</style>

