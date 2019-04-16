<template>
  <div class="app clear">
    <Sidebar :isOpen = "isCollapse"></Sidebar>
    <div class="mainContent" 
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
<style lang="scss">

.app{
  position: relative;
  .mainContent{
    width: 89%;
    position: absolute;
    top: 0;
    left: 208px;
    height:100vh;
    background:#fff;
    overflow-y: auto;
  }

  .wMax{
    animation: wMax .3s ease-in-out forwards;
  }
  .wMin{
    animation: wMin .3s ease-in-out forwards;
  }

  @keyframes wMax {
    0% {
      width: 89%;
      left: 208px;
    }
    100% {
      width: 95.5%;
      left: 65px;
    }
  }
  @keyframes wMin {
    0% {
      width: 95.5%;
      left: 65px;
    }
    100% {
      width: 89%;
      left: 208px;
    }
  }

}

</style>



