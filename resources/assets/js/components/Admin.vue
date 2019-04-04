<template>
  <div class="app clear">
    <Sidebar :isOpen = "isCollapse"></Sidebar>
    <div class="pull-left" 
      style="width: 87%;height:100vh;background:#fff;overflow-y: auto;overflow-x: hidden;"
      :class="{wMax:isCollapse,wMin:!isCollapse}">
      <Header @isOpen = "isOpen"></Header>
     
      <div class="box10"></div>
      <TagView :routes = "routes"></TagView>
      <el-row class="main" style="padding:15px 20px;">
       
        <router-view></router-view>
      </el-row>
    </div>
  </div>
</template>
<script>
  import Sidebar from './Admin/Layout/Sidebar'
  import Header from './Admin/Layout/Header'
  import TagView from './Admin/Layout/TagView'
  import store from '../store'
  export default {
    store,
    components: {
      Sidebar,
      Header,
      TagView
    },
    data() {
      return {
        isCollapse: false,
        routes: []
      };
    },
   
    methods: {
      isOpen(data) {
        this.isCollapse = data
      },
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



