<template>
  <el-row class="app clear">
    <!-- <el-col :span="3" style="height:100vh;background-color: #555;overflow-y: auto;overflow-x: hidden;"> -->
      <div class="pull-left" style="height:100vh;background-color: #555;overflow-y: auto;overflow-x: hidden;">
      <el-menu
        :default-active="defaultPath"
        class="el-menu-vertical-demo"
        @open="handleOpen"
        @close="handleClose"
        background-color="#555"
        text-color="#fff"
        active-text-color="#ffd04b"
        router
        :collapse="isCollapse"
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
        <el-submenu index="/admin/menuManage">
          <template slot="title">
           <i class="el-icon-menu"></i>
          <span slot="title">菜单管理</span>
          </template> 
          <el-menu-item-group>
            <el-menu-item index="/admin/menuManage/menuList"><i class="el-icon-menu"></i>菜单列表</el-menu-item>
            <el-menu-item index="/admin/menuManage/addMenu"><i class="el-icon-menu"></i>新增菜单</el-menu-item>
          </el-menu-item-group>
        </el-submenu>

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
    <!-- </el-col> -->
    <!-- <el-col :span='21'  style="height:100vh;background:#fff;overflow-y: auto;overflow-x: hidden;"> -->
      <div class="pull-left" style="width: 87%;height:100vh;background:#fff;overflow-y: auto;overflow-x: hidden;" :class="{wMax:isCollapse,wMin:!isCollapse}">
      <div style="width: 100%;">
        
     
      <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" router>
        <el-menu-item>
           <div :class="{red:!isCollapse}" @click="isCollapse=!isCollapse"><i class="el-icon-menu"></i></div>
        </el-menu-item>
        <el-menu-item index="/admin/dull">处理中心</el-menu-item>
        <el-menu-item index="/admin/news">消息中心</el-menu-item>
        <el-menu-item index="/admin/order">订单管理</el-menu-item>
        <el-menu-item index="##" style="float:right">
          <el-dropdown>
            <span class="el-dropdown-link">
              <span style="display:inline-block;width:45px;height:45px;border:1px solid #ccc;margin-right:30px"><img src="/img/default.png" style="width:45px;height:45px;float:left"></span>
            </span>
            <el-dropdown-menu slot="dropdown">
              <el-menu-item index="/admin/person">个人中心</el-menu-item>
              <el-menu-item @click="logout">退出</el-menu-item>
            </el-dropdown-menu>
          </el-dropdown>
        </el-menu-item>
      </el-menu>
      <div class="line"></div>
      <div class="box10"></div>
      <el-breadcrumb separator="/" class="pad20_lr">
        <el-breadcrumb-item :to="{ path: '/admin' }">首页</el-breadcrumb-item>
        <el-breadcrumb-item>活动列表</el-breadcrumb-item>
        <el-breadcrumb-item>活动详情</el-breadcrumb-item>
      </el-breadcrumb>
      <el-row class="main" style="padding:15px 20px;">
          <router-view></router-view>
      </el-row>
       </div>
      </div>
    <!-- </el-col> -->
  </el-row>
</template>
<script>
  export default {
    data() {
      return {
        isCollapse: false,
        defaultPath:'/admin/index',
        activeIndex: '1',
        activeIndex2: '1',
        img: '1.jpg',
        routes:[
          {
            id: 1,
            name: 'index',
            label: '首页',
            path: '/admin/index',
          },
          {
            id: 2,
            name: 'userManage',
            label: '用户管理',
            path: '/admin/userManage',
            children: [
              {
                id: 3,
                name: 'userList',
                label: '用户列表',
                path: '/admin/userManage/userList',
              },
              {
                id: 4,
                name: 'userAdd',
                label: '新增用户',
                path: '/admin/userManage/userAdd',
              }
            ]
          }
          
        ]
      };
    },
    created() {
      this.defaultPath = this.$route.path
    },
    methods: {
      logout() {
        this.$store.dispatch('admin/logout').then(res => {
          if (res.code === '0') {
            location.reload()
          }
        })
      },
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      },
      handleSelect(key, keyPath) {
        console.log(key, keyPath)
        var str = "/admin/index"
        var arr = str.split('/')
        console.log(arr)
      }
    }
  }
</script>
<style>
  .el-menu-item .red i{
    color: #409EFF
  }
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
.app{
    position: relative;
}
.wMax{
  animation: wMax .3s ease-in-out forwards;
}
.wMin{
  animation: wMin .3s ease-in-out forwards;
}

@keyframes wMax {
  0% {
    width: 87%;
  }
  100% {
    width: 95%;
  }
}
@keyframes wMin {
  0% {
    width: 95%;
  }
  100% {
    width: 87%;
  }
}
</style>
