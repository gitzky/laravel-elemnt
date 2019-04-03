<template>
	<div class="header" :isCollapse="isCollapse">
	  <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" router>
	    <el-menu-item>
	      <div :class="{red:!isCollapse}" @click="open"><i class="el-icon-menu"></i></div>
	    </el-menu-item>
	    <el-menu-item index="/admin/dull">处理中心</el-menu-item>
	    <el-menu-item index="/admin/news">消息中心</el-menu-item>
	    <el-menu-item index="/admin/set">设置中心</el-menu-item>
	    <el-menu-item index="##" style="float:right">
	      <el-dropdown>
	        <span class="el-dropdown-link">
	          <span style="display:inline-block;width:45px;height:45px;border:1px solid #ccc;margin-right:30px"><img :src="memberInfo.img" style="width:45px;height:45px;float:left"></span>
	        </span>
	        <el-dropdown-menu slot="dropdown">
	          <el-menu-item index="/admin/person">个人中心</el-menu-item>
	          <el-menu-item @click="logout">退出</el-menu-item>
	        </el-dropdown-menu>
	      </el-dropdown>
	    </el-menu-item>
	  </el-menu>
	  <div class="line"></div>
	</div>
</template>

<script>
  export default{
    data() {
    	 return {
    	  isCollapse: false,
    	  activeIndex: '1',
        memberInfo: {}
      }
    },
    created() {
      this.getMemberInfo()
    },
    methods: {
    	logout() {
    	  this.$store.dispatch('admin/logout').then(res => {
    	    if (res.code === '0') {
    	      location.reload()
    	    }
    	  })
    	},
      getMemberInfo() {
        this.$store.dispatch('admin/getMemberInfo').then(res => {
          if (res.code === '0') {
            console.log('info',res.data)
            this.memberInfo = res.data
          }
        })
      },
      open() {
        this.isCollapse=!this.isCollapse
        this.$emit("isOpen",this.isCollapse)   //$emit这个方法会触发一个事件
      }
    }
  }
</script>
<style>
  .el-menu-item .red i{
    color: #409EFF
  }
</style>


