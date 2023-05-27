<template>
  <div class="block">
    <el-pagination
        @size-change="handleSizeChange"
        @current-change="handleCurrentChange"
        :current-page.sync="paginate.currentPage"
        :page-size="paginate.perPage"
        layout="sizes, prev, pager, next"
        :total="paginate.total">
    </el-pagination>
  </div>
</template>

<script>

export default {
  name: "Pagination",

  props: {
    paginate: {
      type: Object,
      default: () => {}
    }
  },

  methods: {
    handleSizeChange(val) {
      const params = {'perPage': val, 'page': 1}
      this.$emit('handleSizeChange', params)
    },

    handleCurrentChange(val) {
      const params = {'page': val}
      this.$emit('handleCurrentChange', params)
    }
  }
}
</script>

<style scoped>
.block {
  text-align: center;
  margin-top: 20px;
}
</style>
