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
      <el-submenu index="/admin/userManage">
        <template slot="title">
              <i class="el-icon-star-on"></i>
              <span>用户管理</span>
        </template> 
        <el-menu-item-group>
          <el-menu-item index="/admin/userManage/index"><i class="el-icon-star-on"></i>用户列表</el-menu-item>
          <el-menu-item index="/admin/userManage/addUser"><i class="el-icon-star-on"></i>新增用户</el-menu-item>
        </el-menu-item-group>
      </el-submenu>
      <el-menu-item name="index" index="/admin/menuManage/menuList" >
          <i class="el-icon-menu"></i>
          <span slot="title">菜单列表</span>
      </el-menu-item>
      <el-submenu index="2">
        <template slot="title">
         <i class="el-icon-setting"></i>
        <span slot="title">设置</span>
        </template> 
        <el-menu-item-group>
          <el-menu-item index="/admin/set/menuSet"><i class="el-icon-setting"></i>菜单设置</el-menu-item>
          <el-menu-item index="/admin/set/roleSet"><i class="el-icon-setting"></i>权限设置</el-menu-item>
        </el-menu-item-group>
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
      }
    },
    created() {
      this.defaultPath = this.$route.path
    },
    methods: {
      
      loadData() {
        
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