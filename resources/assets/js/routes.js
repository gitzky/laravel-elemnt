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
        name:'首页',
        component: require("./components/Admin/index")
    },
    // 后台用户管理
    {
        path: "/admin/userManage",
        name:'用户管理',
        redirect: "/admin/userManage/index",
    },
    {
        path: "/admin/userManage/index",
        name:'用户列表',
        component:require("./components/Admin/userManage/index")
    },
    {
        path: "/admin/userManage/detail/:id",
        name:'用户详情',
        component:require("./components/Admin/userManage/detail")
    },
    // 后台菜单管理
    {
        path: "/admin/menuManage/menuList",
        name:'菜单管理',
        component: require("./components/Admin/menuManage/MenuList")
    },
    {
        name:'编辑菜单',
        path: "/admin/menuManage/addMenu/:id",
        component:require("./components/Admin/menuManage/EditMenu")
    },
    {
        name:'新增菜单',
        path: "/admin/menuManage/addMenu",
        component:require("./components/Admin/menuManage/AddMenu")
    },
    // 文章管理
    {
        path: "/admin/postManage",
        name:'文章管理',
        component: require("./components/Admin/menuManage/MenuList")
    },
    {
        path: "/admin/postManage/postList",
        name:'文章列表',
        component: require("./components/Admin/menuManage/MenuList")
    },
    {
        name:'文章类型',
        path: "/admin/postManage/postType",
        component:require("./components/Admin/menuManage/AddMenu")
    },
    // 设置
    {
        name:'设置',
        path: "/admin/set",
        component:require("./components/Admin/menuManage/AddMenu")
    },
    
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