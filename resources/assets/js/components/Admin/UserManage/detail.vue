<template>
  <div class="userinfo-container" style="padding:20px 0">
    <div class="imgBox">
      <img v-if="tableData.img" :src="tableData.img" @click="showImg=true">
      <div v-if="showImg" id="mo" class="motai" @click="showImg=false">
        <span id="close" class="close" @click="showImg=false"><span class="x">×</span></span>
        <div class="imgWrap">
          <img v-if="tableData.img" :src="tableData.img" class="motaiimg">
        </div>
      </div>
    </div>
    <div class="detailWrap">
      <p>会员编号：{{ tableData.id }}</p>
      <p>姓名：{{ tableData.userName }}</p>
      <p>性别：{{ tableData.userSex }}</p>
      <p>邮箱：{{ tableData.userEmail }}</p>
      <p>最近登录：{{ tableData.userEndTime }}</p>
      <p>备注：{{ tableData.linksDesc }}</p>
      <el-button type="primary" style="width:80px;margin-top:30px" @click="goBack">返回</el-button>
    </div>
  </div>
</template>
<script>

export default {
  data() {
    return {
      showImg: false,
      tableData: {},
      memberInfo: {}
    }
  },
  created() {
    // 测试
    const boId = this.$route.params.id
    this.loadData(boId)
  },
  methods: {
    goBack() {
      this.$router.back()
    },
    loadData(id) {
      this.$store.dispatch('userManage/selUserById', { id }).then(response => {
        this.tableData = response
        console.log(response)
      })
    }
  }
}
</script>
<style type="text/css" scoped>
  .userinfo-container .imgBox{
    width:100px;
    height:100px;
    border:1px solid #aaa;
    float: left;
    margin:10px 30px;
    cursor: pointer;
  }
  .userinfo-container .imgBox img{width:100%;height: 100%}
  .userinfo-container .detailWrap{width: 500px;float: left;line-height: 30px;font-size: 14px;color:#555;}
  .userinfo-container .detailWrap p{margin: 0}
  .userinfo-container #mo{
    /*隐藏模态框*/
    width: 100%;
    height: 100%;
    position: fixed;/*定位方式为固定定位*/
    overflow: auto;/*不滚动*/
    background-color: rgba(0,0,0,0.7);
    top: 0px;
    left: 0px;
    z-index: 10;/*置于页面图层之上*/
    display: flex;align-items: center
  }
  .userinfo-container #mo .close{
      width: 100px;
      height: 100px;
      border-radius: 50%;
      font-weight: bold;
      position: fixed;
      top: -50px;
      right: -50px;
      background-color: rgba(0,0,0,0.7);
  }
  .userinfo-container #mo .close .x{
    font-size: 28px;
    font-weight: bold;
    display: block;
    width: 50px;
    height: 50px;
    text-align: center;
    vertical-align: middle;
    line-height: 50px;
    color:#bbb;
    position: absolute;
    bottom:4px;
    left: 8px;
  }
  .userinfo-container #mo .close:hover,
  .userinfo-container #mo .close:focus{
    color:#bbb;
    cursor:pointer;
  }
  .userinfo-container #mo .close:hover .x{
    -webkit-transform:rotate(90deg);
    transform:rotate(270deg);
    -webkit-transition:-webkit-transform .5s linear;
    transition:transform .5s linear;
  }
  .userinfo-container #mo .imgWrap{
    margin: 0 auto;
    width: 360px;
    height: 360px;
  }
  .userinfo-container #mo .motaiimg{max-width: 360px;max-height: 360px}
  .userinfo-container #mo .motaiimg{
    -webkit-animation: first .5s;
    -o-animation: first .5s;
    animation: first .5s;
  }
  @keyframes first{
    from{transform: scale(0.1);}
    to{transform: scale(1);}
  }
</style>
