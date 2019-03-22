<template>

  <div class="container">
    <h2>{{ msg }}</h2>
    <div>
        <ul>
            <li v-for="item in tableData">
                <span>canVisit:{{ item.canVisit }},</span>
                <span>decription:{{ item.decription }},</span>
                <span>name:{{ item.name }}</span>
            </li>
        </ul>
        <el-button @click="change">按钮</el-button>
    </div>
  </div>

</template> 
<script>
    export default{
        data() {
            return{
                msg:'我是后台首页',
                tableData:[]
            }
        },
        created() {
         
        },
        methods:{
            change() {
                this.msg="我不是首页了"
                this.loadData()
            },
            loadData() {
                this.$store.dispatch('admin/selListByParams',{id:1}).then(res=>{
                    console.log(res)
                    this.tableData = res.data.list
                })
            }
        }
        
        
    }
    
</script>