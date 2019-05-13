<template>
  <div class="" style="width:208px;height:100vh;background-color: #304156;overflow-y: auto;">
    <el-menu
      v-loading="loading"
      background-color="#304156"
      text-color="#bfcbd9"
      active-text-color="#409EFF"
      element-loading-text="拼命加载中"
      element-loading-spinner="el-icon-loading"
      element-loading-background="rgba(0, 0, 0, 0.8)"
      :default-active="defaultPath"
      class="el-menu-vertical-demo"
      router
      :collapse="isOpen"
      style="border:none;min-height: 100%;">
      <div :key="items.id" v-for="items in routes">
        <div v-if="items.children.length">
          <el-submenu :index="items.path">
            <template slot="title">
                  <i :class="items.icon"></i>
                  <span v-if="!isOpen">{{ items.label }}</span>
            </template> 
            <el-menu-item-group>
              <el-menu-item :key="index" v-for="(item,index) in items.children" :index="item.path" @click="handleSelect(item)">
                <i :class="items.icon"></i>{{ item.label }}</el-menu-item>
            </el-menu-item-group>
          </el-submenu>
        </div>
        <div v-else>
          <el-menu-item :index="items.path" @click="handleSelect(items)">
              <i :class="items.icon"></i>
              <span slot="title">{{ items.label }}</span>
          </el-menu-item>
        </div>
      </div>
    </el-menu>
  </div>
</template>
<script>
  export default{
    props: ['isOpen'],
    data() {
    	return {
        loading:false,
    	  isCollapse: false,
    	  defaultPath:'/admin/index',
        routes: []
      }
    },
    created() {
      this.defaultPath = this.$route.path
      this.loadData()
    },
    watch: {
      $route() {
        this.defaultPath = this.$route.path
      }
    },
    methods: {
      loadData() {
        this.loading = true
        this.$store.dispatch('admin/menu/selMenuList').then(response => {
          if (response) {
            let routes = []
            response.list.forEach(item => {
              if (item.axis == "$1") {
                routes.push(item)
              }
            })
            routes.forEach(val => {
              val.children = []
              response.list.forEach(item => {
                if (item.axis == "$1$"+val.id) {
                  val.children.push(item)
                }
              })
            })
            var indexObj = {
              name: '首页',
              label: '首页',
              path: '/admin/index',
              icon: 'el-icon-location',
              children: [],
              sort: 1,
            }
            routes.unshift(indexObj)
            this.routes = routes
            this.loading = false
            return routes
          }
        }).then(res=>{
//           res.find(val => {
//             if(val.path == this.$route.path) {
//               this.$store.state.tags = [ val ]
//             } else {
//               val.children.find(va => {
//                 if(va.path == this.$route.path) {
//                   this.$store.state.tags = [ va ]
//                 } 
//               })
//             }
//           })
        })
      },
      handleSelect(value) {
//         var tags = [...this.$store.state.tags,value]
//         this.$store.state.tags = Array.from( new Set(tags) )
      },
    }
  }
</script>
<style>
 .el-menu-vertical-demo:not(.el-menu--collapse) {
    width: 200px;
    min-height: 400px;
  }
.el-submenu .el-menu-item {
    height: 50px;
    line-height: 50px;
    padding: 0 45px;
    min-width: 100px;
}
</style>