<template>
  <div class="app-container" style="padding:20px 30px">
    <el-header style="height:40px;line-height:40px;font-weight:bold;padding-left:10px;background:#ccc">
      菜单管理
      <el-button type="primary" size="mini" style="float:right;margin-top:6px;" icon="el-icon-plus" @click="addRole">新增菜单</el-button>
    </el-header>
    <div style="padding:20px;border:1px solid #ebeef5">
      <el-table v-loading="loading" :data="tableData" border style="width: 100%;text-align:center;" element-loading-text="Loading">
        <el-table-column label="序号" width="80" header-align="center">
          <template slot-scope="scope">{{ 1 + scope.$index + (pagination.currentPage-1)*pagination.pageSize }}</template>
        </el-table-column>
        <el-table-column label="功能ID" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.id }}</template>
        </el-table-column>
        <el-table-column label="类型" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.type }}</template>
        </el-table-column>
        <el-table-column label="名称" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.name }}</template>
        </el-table-column>
        <el-table-column label="url" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.url }}</template>
        </el-table-column>
        <el-table-column label="图标" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.mobIcon }}</template>
        </el-table-column>
        <el-table-column label="父功能ID" header-align="center" show-overflow-tooltip>
          <template slot-scope="scope">{{ scope.row.parentFuncId }}</template>
        </el-table-column>
        <el-table-column label="操作" width="180">
          <template slot-scope="scope">
            <el-button type="primary" size="mini" @click="edit(scope.row)">编辑</el-button>
            <el-button type="danger" size="mini" @click="del(scope.row)">删除</el-button>
          </template>
        </el-table-column>
      </el-table>
    </div>
    <el-row style="padding-top:40px;" type="flex" justify="end">
      <el-pagination :current-page="pagination.currentPage" :total="pagination.total" :page-size="pagination.pageSize" background layout="total, sizes, prev, pager, next, jumper" @current-change="handleCurrentChange" @size-change="handleSizeChange"/>
    </el-row>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        name: '',
        status: ''
      },
      columnForm: {
        state: '',
        statust: ''
      },
      options: [],
      tableData: [],
      loading: false,
      pagination: {
        total: 1,
        currentPage: 1,
        pageSize: 10
      }
    }
  },
  created() {
    // this.loadData()
  },
  methods: {

    edit(row) {
      this.$router.push({
        path: `/role/editFunc/${row.id}`
      })
    },
    addRole() {
      this.$router.push({
        path: `role/addFunc`
      })
    },
    del(row) {
      this.$confirm('此操作将永久删除, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        this.loading = true
        this.$store.dispatch('role/delAuthFuncById', {
          id: row.id
        }).then(response => {
          this.loading = false
          this.$message({
            type: 'success',
            message: '删除成功!'
          })
          this.loadData()
        })
      }).catch(() => {
        this.$message({
          type: 'info',
          message: '已取消删除'
        })
      })
    },
    loadData() {
      this.loading = true
      var formCon = {}
      formCon = {
        pageNum: this.pagination.currentPage,
        pageSize: this.pagination.pageSize,
        subSystemIds: 6
      }
      this.$store.dispatch('role/selFuncList', formCon).then(response => {
        if (response) {
          this.loading = false
          this.pagination.total = response.total
          this.tableData = response.list
        }
      })
    },
    handleSizeChange(val) {
      this.pagination.pageSize = val
      this.loadData()
    },
    handleCurrentChange(val) {
      this.pagination.currentPage = val
      this.loadData()
    }
  }
}
</script>
<style scoped>
.el-form-item--medium .el-form-item__content, .el-form-item--medium .el-form-item__label{padding-left:15px;}
.el-table td, .el-table th.is-leaf{text-align:center;}
.el-table--border th{background:#fafafa;}
</style>
