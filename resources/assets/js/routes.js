import  VueRouter from "vue-router";
import  Admin from "./components/Admin";
var domain = window.location.href

let routes=[
    {
        path: "/",
        redirect: '/index'
    },
    {
        path: "/index",
        component: require("./components/Home/index")
    },
    {
        path: "/articles",
        component: require("./components/Home/articles")
    },
    {
        path: "/about",
        component: require("./components/Home/about")
    },
    {
        path: "/comment",
        component: require("./components/Home/comment")
    },
    

    {
       path: "/admin",
       redirect: "/admin/index"
    },
    // 后台首页
    {
        path: "/admin/index",
        component: require("./components/Admin/index")
    },
    // 后台用户管理
    {
        path: "/admin/userManage",
        redirect: "/admin/userManage/index",
    },
    {
        path: "/admin/userManage/index",
        component:require("./components/Admin/userManage/index")
    },
    {
        path: "/admin/userManage/detail/:id",
        component:require("./components/Admin/userManage/detail")
    },
    // 后台菜单管理
    {
        path: "/admin/menuManage/menuList",
        component: require("./components/Admin/menuManage/MenuList")
    },
    {
        path: "/admin/menuManage/addMenu/:id",
        component:require("./components/Admin/menuManage/AddMenu")
    }
]

if (domain.split('#/')[0] != 'http://www.newblog.com/admin') {
    routes[0] = {
        path: "/",
        redirect: '/index'
    }
} else {
    routes[0] = {
       path: "/",
       redirect: '/admin/index'
   }
}

export default new VueRouter({
    routes
})