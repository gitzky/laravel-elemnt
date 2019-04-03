<template>
  <div class="pull-left" style="height:100vh;background-color: rgb(48, 65, 86);;overflow-y: auto;overflow-x: hidden;">
    <el-menu
      :default-active="defaultPath"
      class="el-menu-vertical-demo"
      background-color="#304156"
      text-color="#fff"
      active-text-color="#ffd04b"
      router
      :collapse="isOpen"
      style="border:none">
      
      <el-menu-item name="index" index="/admin/index" @click="handleSelect('/admin/index','index')">
          <i class="el-icon-location"></i>
          <span slot="title">首页</span>
      </el-menu-item>
      
      <el-submenu :key="items.id" :index="items.path" v-for="items in routes">
        <template slot="title">
              <i class="el-icon-menu"></i>
              <span>{{ items.label }}</span>
        </template> 
        <el-menu-item-group>
          <el-menu-item :key="index" v-for="(item,index) in items.children" :index="item.path">
            <i class="el-icon-menu"></i>{{ item.label }}</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
     
      <el-menu-item name="index" index="/admin/menuManage/menuList" >
          <i class="el-icon-menu"></i>
          <span slot="title">菜单列表</span>
      </el-menu-item>
     
     
     
      <el-submenu index="2" open="false">
        <template slot="title">
         <i class="el-icon-setting"></i>
        <span slot="title">设置</span>
        </template> 
        <!-- <el-menu-item-group>
          <el-menu-item index="/admin/set/menuSet"><i class="el-icon-setting"></i>菜单设置</el-menu-item>
          <el-menu-item index="/admin/set/roleSet"><i class="el-icon-setting"></i>权限设置</el-menu-item>
        </el-menu-item-group> -->
      </el-submenu>
    
    </el-menu>
  </div>
</template>
<script>
  export default{
    props: ['isOpen'],
    data() {
    	return {
    	  isCollapse: false,
    	  defaultPath:'/admin/index',
        routes: []
      }
    },
    created() {
      this.defaultPath = this.$route.path
      this.loadData()
    },
    methods: {
      loadData() {
        this.$store.dispatch('menu/selMenuList').then(response => {
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
            console.log(routes)
            this.routes = routes
            console.log(this.routes)
          }
        })
      },
      
      handleSelect(key, keyPath) {
        console.log(key, keyPath)
        var str = "/admin/index"
        var arr = str.split('/')
      }
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