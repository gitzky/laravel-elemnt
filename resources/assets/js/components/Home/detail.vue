<template>
<div class="container">
	<div class="row w_main_row">
		<ol class="breadcrumb w_breadcrumb">
		  <li><a href="/">首页</a></li>
		  <li><a href="/home#/articles">文章</a></li>
		  <li class="active">{{ data.newsName }}</li>
		  <span class="w_navbar_tip">我们长路漫漫，只因学无止境。</span>
		</ol>
    <el-row>
      <el-col :span="18" class="pad10_r">
        <div class="panel panel-default">
        	<div class="panel-body">
        		<h2 class="c_titile">{{ data.newsName }}</h2>
        		<p class="box_c">
              <span class="d_time">发布时间：{{ data.newsTime }}</span>
              <span>编辑：<a href="mailto:wfyv@qq.com">{{ data.newsAuthor }}</a></span>
              <span>阅读（88646）</span>
            </p>
        		<div class="infos content" v-html="data.newsContent"></div>
        		<div class="keybq">
              <span>关键字：</span>
              <a :key="index" v-for="(item,index) in data.newsType" class="label label-default">{{ item }}</a>
              
            </div>
        		<div class="nextinfo">
        			<p class="last">上一篇：<a href="#">免费收录网站搜索引擎登录口大全</a></p>
        			<p class="next">下一篇：<a href="#">javascript显示年月日时间代码</a></p>
            </div>
        	</div>
        </div>
      </el-col>
      <el-col :span="6" class="pad10_l">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">最新发布</h3>
          </div>
          <div class="panel-body">
            <ul class="list-unstyled sidebar">				
        			<li :key="item.id" v-for="item in hotPosts">
                <a href="javascript:;" @click="go(item.id)">{{ item.newsName }}</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">友情链接</h3>
          </div>
          <div class="panel-body">
            <div class="newContent">
            	<ul class="list-unstyled sidebar shiplink">				
        			<li><a href="https://www.baidu.com/" target="_blank">百度</a></li>
        			<li><a href="https://www.oschina.net/" target="_blank">开源中国</a></li>							
        			<li><a href="http://www.ulewo.com/" target="_blank">有乐网</a></li>							
        			<li><a href="http://www.sina.com.cn/" target="_blank">新浪网</a></li>							
        			<li><a href="http://www.qq.com/" target="_blank">腾讯网</a></li>							
        		</ul>
            </div>
          </div>
        </div>
      </el-col>
		</el-row>
	</div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        id: '',
        data: {},
        hotPosts: []
      }
    },
    created() {
      this.id = this.$route.params.id;
      this.loadData(this.id);
      this.getHotPosts();
    },
    methods: {
      go(id) {
        this.loadData(id)
      },
      getHotPosts() {
        const formCon = {
          pageNum: 1,
          pageSize: 10
        }
        this.$store.dispatch('home/index/selPostList', formCon).then(res => {
          if(res) {
            this.hotPosts = res.list
          }
        })
      },
      loadData(id) {
        this.$store.dispatch('home/index/selPostById', { id }).then(res => {
          if (res) {
            res.newsType = res.newsType.split(',')
            this.data = res;
          }
        })
      }
    }
  }
  
</script>

<style>
   @import url("/css/article_detail.css");
</style>
