<template>
  <div style="padding:20px 30px">
    <el-form ref="form" :model="form" :inline="true" size="medium" style="border:1px solid #ebeef5;margin-bottom:20px" label-width="100px">
      <div style="height:40px;line-height:40px;font-weight:bold;padding-left:10px;background-color:#ccc;margin-bottom:20px">查询</div>
      <el-form-item label="作者">
        <el-input v-model="form.name" clearable placeholder="请输入作者姓名"/>
      </el-form-item>
      <el-form-item
        label="文章类型"
        label-width="80px">
        <el-select v-model="form.postType">
          <el-option :key="index" v-for="(item,index) in postTypes" :label="item.label" :value="item.code" />
        </el-select>
      </el-form-item>
      <el-form-item>
        <!-- <el-button type="primary" @click="resetForm('form')">重置</el-button> -->
        <el-button type="primary" @click="loadData">查询</el-button>
      </el-form-item>
    </el-form>
    <el-header style="height:40px;line-height:40px;font-weight:bold;padding-left:10px;background:#ccc">
      文章管理
      <el-button type="primary" size="mini" style="float:right;margin-top:6px;" icon="el-icon-plus" @click="addMenu">新增文章</el-button>
    </el-header>
    <div style="padding:20px;border:1px solid #ebeef5">
      <el-table v-loading="loading" :data="tableData" border element-loading-text="Loading" style="text-align: center;">
        <el-table-column label="序号" width="80" header-align="center">
          <template slot-scope="scope">{{ 1 + scope.$index + (pagination.currentPage-1)*pagination.pageSize }}</template>
        </el-table-column>
        <el-table-column label="标题" header-align="center" width="420px" show-overflow-tooltip>
          <template slot-scope="scope"><span class="inlineblock w400 text-left">{{ scope.row.newsName }}</span></template>
        </el-table-column>
        <el-table-column label="作者" header-align="center">
          <template slot-scope="scope">{{ scope.row.newsAuthor }}</template>
        </el-table-column>
        <el-table-column label="类型" header-align="center">
          <template slot-scope="scope">{{ scope.row.newsType }}</template>
        </el-table-column>
        <el-table-column label="发布时间" header-align="center">
          <template slot-scope="scope">{{ scope.row.newsTime }}</template>
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
        postType: ''
      },
      postTypes:[{code:1,label:"PHP"},{code:2,label:"JAVA"}],
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
    this.loadData()
  },
  methods: {

    edit(row) {
      this.$router.push({
        path: `/admin/menuManage/addMenu/${row.id}`
      })
    },
    addMenu() {
      this.$router.push({
        path: `/admin/menuManage/addMenu`
      })
    },
    del(row) {
      this.$confirm('此操作将永久删除, 是否继续?', '提示', {
        confirmButtonText: '确定',
        cancelButtonText: '取消',
        type: 'warning'
      }).then(() => {
        this.loading = true
        this.$store.dispatch('menu/delMenuById', {
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
        pageSize: this.pagination.pageSize
      }
      this.$store.dispatch('postManage/selPostList', formCon).then(response => {
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
<style>
.el-table td,
.el-table th.is-leaf {
  text-align: center;
}
</style>
