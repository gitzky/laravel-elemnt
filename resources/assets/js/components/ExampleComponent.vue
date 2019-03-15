<template>
    <div>
        <el-form style="width:500px">
            <el-form-item label="姓名" label-width="100px">
                <el-input />
            </el-form-item>
            <el-form-item label-width="100px">
                <el-button>提交</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
