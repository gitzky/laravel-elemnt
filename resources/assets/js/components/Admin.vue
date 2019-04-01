<template>
  <div class="app clear">
    <Slidbar :isOpen = "isCollapse"></Slidbar>
    <div class="pull-left" 
      style="width: 87%;height:100vh;background:#fff;overflow-y: auto;overflow-x: hidden;"
      :class="{wMax:isCollapse,wMin:!isCollapse}">
      <Header @isOpen = "isOpen"></Header>
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
</template>
<script>
  import Slidbar from './Admin/Layout/Slidbar'
  import Header from './Admin/Layout/Header'
  export default {
    components: {
      Slidbar,
      Header
    },
    data() {
      return {
        isCollapse: false,
      };
    },
    
    methods: {
      isOpen(data) {
        this.isCollapse = data
        console.log(data)
      }
      
    }
  }
</script>
<style>

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



