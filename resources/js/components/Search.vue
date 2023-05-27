<template>
  <div class="content">

    <div class="box-header with-border">
      <h3 class="box-title">Search List</h3>
      <div class="box-tools pull-right">
        <el-tooltip content="Reset Search" placement="left" effect="light">
          <el-button icon="el-icon-refresh" type="warning" size="medium" @click.prevent="handleReset" plain/>
        </el-tooltip>
      </div>
    </div>

    <div class="box-body">

      <div class="inputSearch" :class="{'w-100' : isBanner || isAdmin}">
        <div class="group-search__text" :class="{'disableSelect': isBanner || isAdmin || isStorie}">
          <div class="sub-title">Description</div>
          <el-input placeholder="Please input" v-model="search.content" autofocus @keyup.enter.native="handleSearch"
                    class="input-with-select">
          </el-input>
        </div>
        <div class="group-search__text" :class="{'disableSelect': isBanner || isAdmin || isPhoto}">
          <div class="sub-title">Title</div>
          <el-input placeholder="Please input" v-model="search.title" autofocus @keyup.enter.native="handleSearch"
                    class="input-with-select">
          </el-input>
        </div>
        <div class="group-search__name">
          <div class="sub-title">Name</div>
          <el-input placeholder="Please input" v-model="search.name" autofocus @keyup.enter.native="handleSearch"
                    class="input-with-select">
          </el-input>
        </div>
      </div>

      <div class="selectSearch" :class="{'disableSelect': isBanner || isAdmin}">
        <div class="sub-title">Approve</div>
        <el-select width="100%" v-model="select.value" @change="handleSelect()">
          <el-option
              v-for="item in select.options"
              :key="item.value"
              :label="item.label"
              :value="item.value">
          </el-option>
        </el-select>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Search",

  data() {
    return {
      search: {
        title: '',
        content: '',
        name: ''
      },
      select: {
        options: [{
          value: '',
          label: 'All Approve',
        }, {
          value: 1,
          label: 'Active',
        }, {
          value: 0,
          label: 'InActive',
        }],
        value: ''
      }
    }
  },

  props: {
    isBanner: {
      type: Boolean,
      required: false
    },
    isAdmin: {
      type: Boolean,
      required: false
    },
    isStorie: {
      type: Boolean,
      required: false
    },
    isPhoto: {
      type: Boolean,
      required: false
    }
  },

  methods: {
    handleReset() {
      this.select.value = ''
      this.search.name = ''
      this.search.title = ''
      this.search.content = ''
      const param = {
        'filters[is_approved]': null,
        'filters[title]': null,
        'filters[content]': null,
        'filters[name]': null,
        'page': 1
      }

      this.$emit('change', param)
    },

    handleSearch() {
      const param = {
        'filters[name]': this.search.name,
        'filters[title]': this.search.title,
        'filters[content]': this.search.content,
        'page': 1
      }
      this.$emit('change', param)
    },

    handleSelect() {
      const param = {
        'filters[is_approved]': this.select.value,
        'page': 1
      }
      this.$emit('change', param)
    }
  }
}
</script>

<style scoped lang="scss">
.el-select {
  width: 100%;
}

.input-with-select .el-input-group__prepend {
  background-color: #fff;
}

.content {
  min-height: 100px !important;

  .box-tools {
    top: 0;
  }
}

.box-body {
  display: flex;
  justify-content: space-between;

  &::before, &::after {
    display: none;
  }

  .inputSearch {
    width: 60%;

    .input-with-select {
      margin-bottom: 20px;
    }
  }

  .w-100 {
    width: 100% !important;
  }

  .selectSearch {
    width: 30%;
  }

  .disableSelect {
    display: none;
  }
}
</style>
