import  VueRouter from "vue-router";
import  Admin from "./components/Admin";

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
        path:"/admin/login",
        component:require("./components/Admin/login")
    },
    {
       path:"/admin",
       redirect:"/admin/index"
    },
    {
        path:"/admin/index",
        component:require("./components/Admin/index")
    },
    {
        path:"/admin/userManage",
        redirect:"/admin/userManage/index",
    },
    {
        path:"/admin/userManage/index",
        component:require("./components/Admin/userManage/index")
    },
    {
        path:"/admin/userManage/detail/:id",
        component:require("./components/Admin/userManage/detail")
    }
]

export default new VueRouter({
    routes
})