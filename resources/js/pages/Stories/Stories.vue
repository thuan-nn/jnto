<template>
  <section class="content-header">
    <!--Breadcrum-->
    <h1>
      {{ $route.meta.title }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-book"></i> {{ $route.meta.title }}
      </li>
      <li class="active">{{ $route.meta.breadcrumb }}</li>
    </ol>

    <div class="content">

      <!--Search-->
      <div class="box box-warning">
        <Search :isStorie="isStorie" @change="handleFilter($event)"/>
      </div>

      <!--Table Stories-->
      <el-table
          :data="stories"
          @sort-change="sortChange"
          highlight-current-row>
        <el-table-column
            fixed
            label="ID"
            width="50"
            align="center"
            type="index">
        </el-table-column>
        <el-table-column
            prop="is_approved"
            align="center"
            label="Approve"
            width="80">
          <template slot-scope="scopeSwitch">
            <el-switch @change="handleSwitch(scopeSwitch.row.id, scopeSwitch.row.is_approved)"
                       v-model="scopeSwitch.row.is_approved"/>
          </template>
        </el-table-column>
        <el-table-column
            sortable
            :sort-orders="['ascending','descending']"
            prop="title"
            label="Title"
            width="300">
        </el-table-column>
        <el-table-column
            prop="content"
            label="Content"
            width="1000">
        </el-table-column>
        <el-table-column
            prop="user.name"
            label="Name"
            width="200">
        </el-table-column>
        <el-table-column
            prop="user.display_name"
            label="User Name"
            width="200">
        </el-table-column>
        <el-table-column
            prop="user.phone_number"
            label="Phone"
            width="200">
        </el-table-column>
        <el-table-column
            prop="user.email"
            label="Email"
            width="200">
        </el-table-column>
        <el-table-column
            label="SNS URL 1"
            width="400">
          <template slot-scope="scopeLink1">
            <a
                v-if="scopeLink1.row.user.sns_url"
                :href="scopeLink1.row.user.sns_url"
                target="_blank"
            >
              {{ scopeLink1.row.user.sns_url.length > 0 ? scopeLink1.row.user.sns_url[0] : '' }}
            </a>
          </template>
        </el-table-column>
        <el-table-column
            label="SNS URL 2"
            width="400">
          <template slot-scope="scopeLink2">
            <a
                v-if="scopeLink2.row.user.sns_url"
                :href="scopeLink2.row.user.sns_url"
                target="_blank"
            >
              {{ scopeLink2.row.user.sns_url.length > 1 ? scopeLink2.row.user.sns_url[1] : '' }}
            </a>
          </template>
        </el-table-column>
        <el-table-column
            align="center"
            fixed="right"
            label="Operations"
            width="95">
          <template slot-scope="scopeDelete">
            <el-tooltip content="Delete" placement="top" effect="light">
              <el-popconfirm
                  @confirm="confirm(scopeDelete.row.id)"
                  confirm-button-text='OK'
                  cancel-button-text='No, Thanks'
                  icon="el-icon-delete"
                  icon-color="red"
                  title="Are you sure to delete this?"
              >
                <el-button slot="reference" type="danger" plain size="small" icon="el-icon-delete"></el-button>
              </el-popconfirm>
            </el-tooltip>
          </template>
        </el-table-column>
      </el-table>

      <!--Pagination-->
      <Pagination :paginate="paginations"
                  @handleSizeChange="handleSizePaginate($event)"
                  @handleCurrentChange="handleCurrentPage($event)"/>
    </div>
  </section>
</template>

<script>
import Search from "../../components/Search"
import Pagination from "../../components/Pagination"
import {mapActions, mapGetters} from "vuex"
import MixinCMS from "../../mixins/EventCMS"

export default {
  name: "Stories",

  components: {
    Search,
    Pagination
  },

  mixins: [
    MixinCMS
  ],

  data() {
    return {
      isChangSize: true,
      isStorie: true
    }
  },

  created() {
    let params = {
      'include': 'user',
      'perPage': 10,
      'page': 1
    };

    this.getList(params)
  },

  computed: {
    ...mapGetters('story', {
      paginations: 'paginations',
      stories: 'stories',
      params: 'params'
    })
  },

  methods: {
    ...mapActions('story', [
      'getList'
    ]),

    sortChange() {
      let paramsSort = {
        'include': ['user', 'files'],
        'perPage': 10,
        'page': 1
      };
      let params = {...paramsSort, 'sortBy[title]': this.isAscShare ? 'asc': 'desc'}
      this.getList(params)

      this.isAscShare = !this.isAscShare
    }
  }
}
</script>

<style scoped lang="scss">
@import "resources/sass/components/stories";
</style>
