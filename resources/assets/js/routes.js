import  VueRouter from "vue-router";

let routes=[
    {
        path:"/",
        redirect:'/index'
    },
    {
        path:"/index",
        component:require("./components/Home/index")
    },
    {
        path:"/articles",
        component:require("./components/Home/articles")
    },
    {
        path:"/about",
        component:require("./components/Home/about")
    },
    {
        path:"/comment",
        component:require("./components/Home/comment")
    },
    {
       path:"/admin",
       redirect:"/admin/index"
    },
    {
        path:"/admin/index",
        component:require("./components/Admin/index")
    },

]

export default new VueRouter({
    routes
})