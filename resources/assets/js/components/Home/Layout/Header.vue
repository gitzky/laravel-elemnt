<template>
  <div class="w_header">
  	<div class="container">
  		<div class="w_header_top">
  			<a href="#" class="w_logo"></a>
  			<span class="w_header_nav">
          <ul>
            <li><router-link class="router-link-exact-active" :class="{'router-link-active':$route.path.split('/')[1] == 'index'}" exact to="/index">首页</router-link></li>
            <li><router-link class="router-link-exact-active" :class="{'router-link-active':$route.path.split('/')[1] == 'articles'}" exact to="/articles">文章</router-link></li>
            <li><router-link class="router-link-exact-active" :class="{'router-link-active':$route.path.split('/')[1] == 'about'}"  exact to="/about">关于</router-link></li>
            <li><router-link class="router-link-exact-active" :class="{'router-link-active':$route.path.split('/')[1] == 'comment'}"  exact to="/comment">留言</router-link></li>
          </ul>
        </span>
  			<div class="w_search">
  		    <el-input size="small" placeholder="请输入内容">
  		        <el-button slot="append" icon="el-icon-search">搜索</el-button>
  		    </el-input>
  			</div>
  		</div>
  	</div>
  </div>
</template>

<script>
</script>

<style>
</style>
