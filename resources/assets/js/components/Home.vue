<template>
	<div>
		<div class="w_header">
			<div class="container inner">
				<div class="w_header_top">
					<a href="#" class="w_logo"></a>
					<span class="w_header_nav">

					 <!-- <!‐‐ 这里是一个class的区块占位（单行占位） ‐‐> -->

					<ul>
						<li><router-link to="/">首页</router-link></li>
						<li><router-link to="/articles">文章</router-link></li>
						<li><router-link to="/about">关于</router-link></li>
						<li><router-link to="/comment">留言</router-link></li>
					</ul>

					<!-- <!‐‐ 这里是一个区块占位 ‐‐> -->
				</span>
					<div class="w_search">
                        <el-input size="small" placeholder="请输入内容"  class="input-with-select">
                            <el-button slot="append" icon="el-icon-search">搜索</el-button>
                        </el-input>
					</div>
				</div>
			</div>
		</div>
	
					
	  	<!-- ==================区块占位（内容区占位）================= -->

		<div class="w_container inner">
			<keep-alive>
           		<router-view></router-view>
       		</keep-alive>
		  
		</div>

		<!-- ===================区块占位结束=================================== -->

		<div class="w_foot">
			<div class="w_foot_copyright">Copyright &copy; 2017-2020, www.genban.org. All Rights Reserved. <span>|</span>
				<a target="_blank" href="http://www.zhukaiyuan.cn/" rel="nofollow">皖ICP备17002922号</a>
			</div>
		</div>
	</div>
</template>