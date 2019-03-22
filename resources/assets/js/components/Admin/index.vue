<template>

  <div class="container">
    <h2>{{ msg }}</h2>
    <div>
        <el-button @click="change">按钮</el-button>
    </div>
  </div>

</template> 
<script>
    export default{
        data() {
            return{
                msg:'我是后台首页'
            }
        },
        created() {
          this.loadData()  
        },
        methods:{
            change() {
                this.msg="我不是首页了"
            },
            loadData() {
                axios.post('/api/admin/selListByParams/{id:1}').then(res => {
                    console.log('res+++++====',res.data)
                })
                this.$store.dispatch('admin/selListByParams',{id:1}).then(res=>{
                    console.log(res)
                })
            }
        }
        
        
    }
    
</script>