import  VueRouter from "vue-router";
import  Admin from "./components/Admin";
var domain = window.location.href

let routes = []
let homeRoutes=[
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
    }
    
    
]
let adminRoutes = [
  {
      path: "/",
      redirect: '/admin/index'
  },
  {
     path: "/admin",
     redirect: "/admin/index"
  },
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
      component: require("./components/Admin/MenuManage/MenuList")
  },
  {
      name:'编辑菜单',
      path: "/admin/menuManage/addMenu/:id",
      component:require("./components/Admin/MenuManage/EditMenu")
  },
  {
      name:'新增菜单',
      path: "/admin/menuManage/addMenu",
      component:require("./components/Admin/MenuManage/AddMenu")
  },
  // 文章管理
  {
      path: "/admin/postManage/addPost",
      name:'新增文章',
      component: require("./components/Admin/PostManage/AddPost")
  },
  {
      path: "/admin/postManage/updPost/:id",
      name:'修改文章',
      component: require("./components/Admin/PostManage/UpdPost")
  },
  {
      path: "/admin/postManage/postList",
      name:'文章列表',
      component: require("./components/Admin/PostManage/PostList")
  },
  {
      name:'文章类型',
      path: "/admin/postManage/postType",
      component:require("./components/Admin/PostManage/PostTypeList")
  },
  // 首页站点公告
  {
      path: "/admin/webNotice/index",
      name:'首页公告',
      component: require("./components/Admin/WebNotice")
  },
  // 设置
  {
      name:'设置',
      path: "/admin/set",
      component:require("./components/Admin/MenuManage/AddMenu")
  }
]

routes = domain.split('#/')[0] == 'http://www.newblog.com/admin' ? adminRoutes : homeRoutes


export default new VueRouter({
    routes
})