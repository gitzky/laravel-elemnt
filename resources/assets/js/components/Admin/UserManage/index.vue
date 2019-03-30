<template>
  <div class="app-container" style="padding:20px 0">
    <el-form ref="form" :model="form" :inline="true" size="medium" style="border:1px solid #ebeef5;margin-bottom:20px" label-width="100px">
      <div style="height:40px;line-height:40px;font-weight:bold;padding-left:10px;background-color:#ccc;margin-bottom:20px">查询</div>
      <el-form-item label="姓名" prop="realNameLike">
        <el-input v-model="form.realNameLike" clearable placeholder="请输入姓名"/>
      </el-form-item>
      <el-form-item label="手机号" prop="mobilePhone">
        <el-input v-model="form.mobilePhone" clearable placeholder="请输入手机号"/>
      </el-form-item>
      <el-form-item>
        <el-button style=" width:90px" type="primary" @click="resetForm('form')">重置</el-button>
        <el-button type="primary" @click="getData">查询</el-button>
      </el-form-item>
    </el-form>
    <el-header style="height: 40px;line-height: 40px;font-weight:bold;padding-left:10px;background-color:#ccc">会员列表</el-header>
    <div style="padding:20px;border:1px solid #ebeef5">
      <el-table v-loading="loading" :data="tableData" border style="width: 100%;text-align:center" element-loading-text="Loading" @row-dblclick="goDetail">
        <el-table-column label="序号" header-align="center" width="60">
          <template slot-scope="scope">{{ 1 + scope.$index + (pagination.currentPage-1)*pagination.pageSize }}</template>
        </el-table-column>
        <el-table-column label="会员编号" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.id || '——' }}</template>
        </el-table-column>
        <el-table-column label="登录名" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.userName || '——' }}</template>
        </el-table-column>
         <el-table-column label="性别" header-align="center" width="60px">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.userSex || '——' }}</template>
        </el-table-column>
        <el-table-column label="备注" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.linksDesc || '——' }}</template>
        </el-table-column>
        <el-table-column label="邮箱" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.userEmail || '——' }}</template>
        </el-table-column>
        <el-table-column label="会员权限" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.userStatus || '——' }}</template>
        </el-table-column>
        <el-table-column label="状态" header-align="center">
          <template slot-scope="scope" show-overflow-tooltip>{{ scope.row.userGrade || '——' }}</template>
        </el-table-column>
        <el-table-column label="最后登录" header-align="center" width="175px">
          <template slot-scope="scope" show-overflow-tooltip> {{ scope.row.userEndTime || '——'}} </template>
        </el-table-column>
        <el-table-column label="操作" header-align="center" >
          <template slot-scope="scope">
            <el-button type="primary" size="mini" @click="memberDetail(scope.row.id)">查看详情</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <el-row style="padding-top:40px" type="flex" justify="end">
      <el-pagination :current-page.sync ="pagination.currentPage" :page-size="pagination.pageSize" :total="pagination.total" background layout="total, sizes, prev, pager, next, jumper" @size-change="handleSizeChange" @current-change="handleCurrentChange"/>
    </el-row>
  </div>
</template>
<script>
export default {
  data() {
    return {
      tableData: [],
      form: {
        realNameLike: '',
        mobilePhone: ''
      },
      pagination: {
        total: 1,
        currentPage: 1,
        pageSize: 10
      },
      loading: false
    }
  },
  /*
    初始化页面,
    判断有无存储session；
    根据session存储的值进行分页和查询条件的维持
    待查询完数据后清空session
  */
  created() {
    
    if (sessionStorage.getItem('currentPage')) {
      this.pagination.currentPage = parseInt(sessionStorage.getItem('currentPage'))
    }
    if (sessionStorage.getItem('form')) {
      this.form = JSON.parse(sessionStorage.getItem('form'))
    }
    this.loadData()
    sessionStorage.clear() // 加载完数据后清楚session
  },
  methods: {

    // 跳转详情页面-存储分页和查询条件信息到sessionStorage中；以便从详情页返回时维持分页和查询条件
    memberDetail(id) {
      this.$router.push({
        path: `/admin/userManage/detail/${id}`
      })
      this.setSession()
    },
    // 重置企业登录密码
    memberReset(id) {
      this.$confirm('请确定对本账号进行企业登录密码重置？', '温馨提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        this.$store.dispatch('member/resetQyLoginPwd', {
          boId: id
        }).then(response => {
          if (response.code === '0') {
            this.$message({
              type: 'success',
              message: '操作成功!'
            })
            this.loadData()
          }
        })
      }).catch(() => {
        this.$message({
          type: 'info',
          message: '已取消'
        })
      })
    },
    // 双击一行进入详情页
    goDetail(row) {
      console.log(row)
      // this.memberDetail(row.boId)
    },

    // 分页
    handleSizeChange(val) {
      this.pagination.pageSize = val
      this.loadData()
    },
    handleCurrentChange(val) {
      this.pagination.currentPage = val
      this.loadData()
    },

    // 设置session值，存储查询条件和分页条件
    setSession() {
      sessionStorage.setItem('currentPage', this.pagination.currentPage)
      sessionStorage.setItem('form', JSON.stringify(this.form))
    },

    // 重置
    resetForm(formName) {
      for(let key in this.form) {
        this.form[key] = ''
      }
    },

    // 点击'查询'初始化分页为第一页；
    getData() {
      this.pagination.currentPage = 1
      this.loadData()
    },

    // 获取数据
    loadData() {
      this.loading = true
      const formCon = {}
      const { pageNum, pageSize } = { pageNum: this.pagination.currentPage, pageSize: this.pagination.pageSize }
      Object.assign(formCon, this.form, { pageNum, pageSize })
      this.$store.dispatch('userManage/selUserList', formCon).then(response => {
        this.loading = false
        if(response.code === '0') {
          
          this.tableData = response.data.list || []
          this.pagination.currentPage = response.data.pageNum
          this.pagination.total = response.data.total
        }
      })
    }
  }
}
</script>
<style>
.el-table td,
.el-table th.is-leaf {
  text-align: center;
}

.el-table--border th {
  background: #fafafa;
}

.el-button+.el-button {
  margin-left: 5px;
}
</style>
