<template>
  <div class="w_header">
  	<div class="container">
  		<div class="w_header_top">
  			<a href="#" class="w_logo"></a>
  			<span class="w_header_nav">
          <ul>
            <li><router-link to="/index">首页</router-link></li>
            <li><router-link to="/articles">文章</router-link></li>
            <li><router-link to="/about">关于</router-link></li>
            <li><router-link to="/comment">留言</router-link></li>
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
