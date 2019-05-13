<template>
  <div class="container">
    <div class="box20"></div>
    <el-row>
      <el-col :span="18" class="mar20_b">
        <div class="grid-content bg-purple pad10_r">
          <el-carousel :interval="3000" height="350px">
            <el-carousel-item :key="index" v-for="(item,index) in swiper" class="relative">
              <div class="tip">
                <h3>{{ item.tip_title }}</h3>
                <p>{{ item.tip_content }}</p>
              </div>
              <el-image
                style="width: 100%; height:100%;"
                :src="item.url"
                fit="contain">
              </el-image>
            </el-carousel-item>
          </el-carousel>
          
          <div class="box20"></div>
          <el-card class="box-card mar20_b contenttop">
            <a href="article_detail.html">
              <strong>博主置顶</strong>
              <h3 class="title">嫁人就嫁程序员</h3>
              <p class="overView">个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中个人网站正在建设中。。。</p>
            </a>
          </el-card>
          <div class="box20"></div>
          <el-container>
            <el-header class="border" style="height: 40px;line-height: 40px;border-bottom: none;">最新发布</el-header>
            <el-main class="border b_white">
                <div class="contentList">
                  <div class="panel panel-default" :key="item.id" v-for="item in tableData">
                    <div class="panel-body cur" @click="goDetail(item.id)">
                      <div class="contentleft">
                        <h4><a class="title" href="article_detail">{{ item.newsName }}</a></h4>
                        <p>
                          <a class="label label-default" :key="index" v-for="(types,index) in item.newsType">{{ types }}</a>
                        </p>
                        <p class="overView">{{ item.newsIntro }}</p>
                        <p>
                          <span class="count">
                            <i class="glyphicon glyphicon-user"></i>
                            <a href="#">{{ item.newsAuthor }}</a>
                          </span>
                          <span class="count">
                            <i class="glyphicon glyphicon-eye-open"></i>阅读:1003
                          </span>
                          <span class="count">
                            <i class="glyphicon glyphicon-comment"></i>评论:2
                          </span>
                          <span class="count">
                            <i class="glyphicon glyphicon-time"></i>
                            {{ item.newsTime }}
                          </span>
                        </p>
                      </div>
                      <div class="contentImage">
                        <div class="row">
                          <el-image
                            class="border"
                            style="width: 100%; height:100%;"
                            :src="item.newsIntroImg"
                            fit="corver" lazy>
                          </el-image>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <el-row style="padding-top:10px;" type="flex" justify="end">
                  <el-pagination background  :page-sizes="[5, 10, 15]" layout="total, sizes, prev, pager, next, jumper" @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page="pagination.currentPage" :page-size="pagination.pageSize" :total="pagination.total" />
                </el-row>
            </el-main>
          </el-container>
        </div>
      </el-col>
      <el-col :span="6" class="pad10_l">
        <div class="grid-content bg-purple-light">
          <div class="panel panel-default sitetip">
            <a class="notice" href="article_detail.html">
              <strong>站点公告</strong>
              <h3 class="title">{{ notice.title }}</h3>
              <p class="overView" v-html="notice.content"></p>
            </a>
          </div>
        </div>
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">热门标签</h3>
          </div>
          <div class="panel-body">
            <div class="min-h80">
              <a class="label label-default mar10_r" :key="index" v-for="(item,index) in hotTags">{{ item.code }}</a>
            </div>
          </div>
        </div>
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">热门文章</h3>
          </div>
          <div class="panel-body">
            <el-carousel height="250px" direction="vertical" :autoplay="true">
              <el-carousel-item v-for="(items,n) in hotPosts" :key="n">
                <ul class="list-unstyled sidebar">
                  <li v-for="item in items" :key="item.id" class="over_hide" style="width: 240px;">
                    <a style="padding-top:5px;display: block;height: 42px;;line-height: 20px;" href="/post/04928311">{{ item.newsIntro }}</a>
                  </li>
                </ul>
              </el-carousel-item>
            </el-carousel>
          </div>
        </div>
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">关注微信公众号</h3>
          </div>
          <div class="panel-body">
            <img src="img/qrcode.jpg" style="height: 230.5px;width: 230.5px;" />
          </div>
        </div>
        
      </el-col>
    </el-row>
  </div>

</template> 
<script>
  export default {
    data() {
      return {
        swiper:[{
          url:'/img/slider/slide1.jpg',
          tip_title: 'First slide label',
          tip_content: 'Nulla vitae elit libero, a pharetra augue mollis interdum.'
        },
        {
          url:'/img/slider/slide2.jpg',
          tip_title: 'Second slide label',
          tip_content: 'Nulla vitae elit libero, a pharetra augue mollis interdum.'
        },
        {
          url:'/img/slider/slide3.jpg',
          tip_title: 'Three slide label',
          tip_content: 'Nulla vitae elit libero, a pharetra augue mollis interdum.'
        },
        {
          url:'/img/slider/slide4.jpg',
          tip_title: 'Four slide label',
          tip_content: 'Nulla vitae elit libero, a pharetra augue mollis interdum.'
        }],
        tableData: [],
        notice: {},
        hotTags: [],
        hotPosts:[],
        pagination: {
          total: 1,
          currentPage: 1,
          pageSize: 5
        }
      }
    },
    created() {
      this.loadData()
      this.getNotice()
      this.getHotTags()
      this.getHotPosts()
    },
    methods: {
      
      goDetail(id) {
        console.log(id)
        this.$router.push('/')
      },
      // 分页
      handleSizeChange(val) {
        this.pagination.pageSize = val;
        this.loadData()
      },
      handleCurrentChange(val) {
        this.pagination.currentPage = val;
        this.loadData()
      },
      loadData() {
        const formCon = {
          pageNum: this.pagination.currentPage,
          pageSize: this.pagination.pageSize
        }
        this.$store.dispatch('home/index/selPostList', formCon).then(res => {
          if(res) {
            res.list.forEach(v=> {
              v.newsType = v.newsType.split(',')
            })
            this.tableData = res.list
            console.log(this.tableData)
            this.pagination.total = res.total
          }
        })
      },
      
      getHotPosts() {
        const formCon = {
          pageNum: 1,
          pageSize: 15
        }
        this.$store.dispatch('home/index/selPostList', formCon).then(res => {
          if(res) {
            const len = res.list.length
            let n = Math.ceil(len/5)
            
            for(var i = 0;i < n; i++) {
              this.hotPosts.push(res.list.slice(i*5, (i+1)*5));
            }
          }
        })
      },
      
      getNotice() {
        this.$store.dispatch('home/index/selNotice').then(res => {
          if(res) {
            this.notice = res
          }
        })
      },
      
      getHotTags() {
        this.$store.dispatch('home/index/selHotTags').then(res => {
          if(res) {
            this.hotTags = res.list
            console.log(this.hotTags)
          }
        })
      },
      
    }
  }
  
  
</script>
<style>
  .tip{
    width: 100%;
    text-align: center;
    position: absolute;
    bottom: 20px;
    color: white;
  }
</style>