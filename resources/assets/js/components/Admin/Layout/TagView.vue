<template>
  <div class="TagView">
    <el-tag
      @click="handelClick(tag)"
      class="mar10_l cursor"
      :class="{cur:isActive(tag)}"
      v-for="(tag,index) in getRoutes"
      :key="index"
      size="medium"
      closable
      @close="handleClose(tag)"
      type="info">
      {{tag.name}}
    </el-tag>
    <div class="box10"></div>
    <div class="line"></div>
  </div>
</template>

<script>
  export default{
    data() {
      return {
        activeRoute: '',
        cur: ''
      }
    },
    mounted() {
      this.addViewTags()
    },
    computed: {
    	getRoutes() {
        return this.$store.state.tags
    	}
    },
    watch: {
      $route() {
        if (this.$store.state.tags.length > 15) {
          return
        }
        this.addViewTags()
      }
    },
    methods: {
      addViewTags() {
        console.log(this.$store.state.tags)
        
        var tag = {
          name: this.$route.name || '无',
          path: this.$route.path
        }
        var index = Array.from( this.$store.state.tags ).findIndex(val => val.name == tag.name)
        if (index==-1) {
          this.$store.state.tags.push(tag)
        }
        return false
      },

      isActive(tag) {
        return tag.path === this.$route.path
      },
      handleClose(tag) {
        console.log('routes:::',this.$store.state.tags)
        if(tag.path == this.$route.path) {
          if(this.$store.state.tags.indexOf(tag) > 0 ) {
            this.$router.push({
              path:this.$store.state.tags[this.$store.state.tags.indexOf(tag)-1].path
            })
          }
        }
        this.$store.state.tags.splice(this.$store.state.tags.indexOf(tag), 1);
        if (this.$store.state.tags.length<1) {
          this.$store.state.tags = [this.$store.state.tag]
          this.$router.push('/admin/index')
        }
      },
    	handelClick(val) {
        this.$router.push(val.path)
    	}
    },
  }
</script>

<style>
  .TagView{
    display: block;
    width: 100%;
    min-height: 40px;
  }
  .cur{
    color: white;
    background:#42b983 ;
  }
</style>
