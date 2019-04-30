<template>
     <quill-editor 
     style="height: 420px;"
      v-model="content" 
      placeholder="在这输入"
      ref="myQuillEditor" 
      :options="editorOption" 
      @blur="onEditorBlur($event)" @focus="onEditorFocus($event)"
      @change="onEditorChange($event)">
    </quill-editor>
</template> 
<script>
    import { quillEditor } from 'vue-quill-editor'
    export default{
        data(){
            return {
                content:'',
                editorOption:{}
            }
        },
        methods:{
            onEditorBlur(){//失去焦点事件
              console.log(this.content)
            },
            onEditorFocus(){//获得焦点事件
            },
            onEditorChange(){//内容改变事件
            console.log(this.content)
            }
        }
    }
</script>