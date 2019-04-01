import request from '../untils/request'

export function addMenu(arg) {
  return request.post('admin/api/menu/addMenu',arg)
}

export function selMenuList(arg) {
  return request.post('admin/api/menu/selMenuList',arg)
}


export function selMenuById(arg) {
  return request.post('admin/api/menu/selMenuById',arg)
}

export function updMenuById(arg) {
  return request.post('admin/api/menu/updMenuById',arg)
}

export function delMenuById(arg) {
  return request.post('admin/api/menu/delMenuById',arg)
}