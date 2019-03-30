<template>
	<div>
    <Header/>
		<div class="w_container">
			<keep-alive>
        <router-view></router-view>
      </keep-alive>
		</div>
    <Footer/>
	</div>
</template>
<script>
  import Header from './Home/Layout/Header'
  import Footer from './Home/Layout/Footer'
  export default{
    components: {
      Header,
      Footer
    }
  } 
</script>