<template>
  <el-row class="app">
    <el-col :span="3" style="height:100vh;background-color: rgb(84, 92, 100);">
      <el-menu
        :default-active="defaultActive"
        class="el-menu-vertical-demo"
        @open="handleOpen"
        @close="handleClose"
        background-color="#545c64"
        text-color="#fff"
        active-text-color="#ffd04b"
        router
        style="border:none">
        <el-menu-item index="/admin/index">
        <i class="el-icon-location"></i>
          <span slot="title">首页</span>
        </el-menu-item>
        <el-submenu index="/admin/user">
          <template slot="title">
            <i class="el-icon-menu"></i>
            <span>用户管理</span>
          </template> 
          <el-menu-item-group>
            <el-menu-item index="/admin/list">用户列表</el-menu-item>
            <el-menu-item index="/admin/addUser">新增用户</el-menu-item>
          </el-menu-item-group>
        </el-submenu>
        <el-submenu index="0">
          <template slot="title">
           <i class="el-icon-document"></i>
          <span slot="title">列表</span>
          </template> 
          <el-menu-item-group>
            <el-menu-item index="/admin/list">选项1</el-menu-item>
            <el-menu-item index="/admin/addUser">选项2</el-menu-item>
          </el-menu-item-group>
        </el-submenu>
        <el-menu-item index="/admin/set">
          <i class="el-icon-setting"></i>
          <span slot="title">设置</span>
        </el-menu-item>
      </el-menu>
    </el-col>
    <el-col :span='21'  style="height:100vh;background:#eee;overflow-y: auto;overflow-x: hidden;">
      <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect" router>
        <el-menu-item index="/admin/dull">处理中心</el-menu-item>
        <el-menu-item index="/admin/news">消息中心</el-menu-item>
        <el-menu-item index="/admin/order">订单管理</el-menu-item>
        <el-menu-item index="##" style="float:right">
          <el-dropdown>
            <span class="el-dropdown-link">
              <span style="display:inline-block;width:45px;height:45px;border:1px solid #ccc;margin-right:30px"><img style="width:45px;height:45px;float:left" src="#"></span>
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-menu-item index="/admin/person">个人中心</el-menu-item>
              <el-menu-item index="/admin/logout">退出</el-menu-item>
            </el-dropdown-menu>
          </el-dropdown>
        </el-menu-item>
      </el-menu>
      <div class="line"></div>
      <el-row class="main" style="padding:15px;">
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
      </el-row>
    </el-col>  
  </el-row>
</template> 
<script>
  export default {
    computed: {
      defaultActive:function(){
        return this.$route.path.replace('/admin', '')
      }
    },
    data() {
      return {
        activeIndex: '1',
        activeIndex2: '1',
        img: '1.jpg'
      };
    },
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      },
      handleSelect(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>
<style>
.el-submenu .el-menu-item {
    height: 50px;
    line-height: 50px;
    padding: 0 45px;
    min-width: 100px;
}
.app{
    position: relative;
  
}
</style>