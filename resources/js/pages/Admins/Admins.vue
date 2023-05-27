<template>
  <section class="content-header admins">
    <!--Breadcrum-->
    <h1>
      {{ $route.meta.title }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-street-view"></i> {{ $route.meta.title }}
      </li>
      <li class="active">{{ $route.meta.breadcrumb }}</li>
    </ol>

    <!--Form Admin-->
    <FormAdmin :isDrawer.sync="isDrawer"
               :status="status"
               :idAdmin="idAdmin"/>

    <!--Content Search, Add-->
    <div class="content">
      <div class="d-flex">
        <!--Search-->
        <div class="box box-warning">
          <Search @change="handleFilter($event)"
                  :isAdmin="isAdmin"/>
        </div>

        <!--Create-->
        <div class="box box-success">
          <div class="content">
            <div class="box-header with-border">
              <h3 class="box-title">Add New</h3>
            </div>
            <div class="box-body">
              <el-button icon="el-icon-plus"
                         @click.prevent="openModel('create')"
                         type="success"
                         plain/>
            </div>
          </div>
        </div>
      </div>

      <!--Table Stories-->
      <el-table
          :data="admins"
          highlight-current-row
          class="tableEL">
        <el-table-column
            fixed
            label="ID"
            align="center"
            type="index">
        </el-table-column>
        <el-table-column
            prop="login_id"
            label="Login ID">
        </el-table-column>
        <el-table-column
            prop="name"
            label="Name">
        </el-table-column>
        <el-table-column
            prop="created_at"
            label="Date Create">
        </el-table-column>
        <el-table-column
            prop="updated_at"
            label="Update Create">
        </el-table-column>
        <el-table-column
            align="center"
            fixed="right"
            width="150"
            label="Operations">
          <template slot-scope="scopeOperations">
            <el-tooltip content="Edit" placement="top" effect="light">
              <el-button icon="el-icon-edit"
                         type="primary"
                         @click.prevent="openModel('edit', scopeOperations.row.id)"
                         plain
                         size="small"/>
            </el-tooltip>
            <el-tooltip content="Edit" placement="top" effect="light">
              <el-popconfirm
                  @confirm="confirm(scopeOperations.row.id)"
                  confirm-button-text='OK'
                  cancel-button-text='No, Thanks'
                  icon="el-icon-delete"
                  icon-color="red"
                  title="Are you sure to delete this?"
              >
                <el-button slot="reference"
                           type="danger"
                           plain
                           size="small"
                           icon="el-icon-delete"/>
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
import {mapActions, mapGetters} from "vuex"
import Search from "../../components/Search"
import Pagination from "../../components/Pagination"
import FormAdmin from "./FormAdmin"
import MixinCMS from "../../mixins/EventCMS"

export default {
  name: "Admins",

  components: {
    FormAdmin,
    Search,
    Pagination
  },

  data() {
    return {
      isAdmin: true,
      isChangSize: true,
      isDrawer: false,
      idAdmin: null,
      status: ''
    }
  },

  mixins: [
    MixinCMS
  ],

  created() {
    let params = {
      'include': 'admin',
      'perPage': 10,
      'page': 1
    }

    this.getList(params)
  },

  computed: {
    ...mapGetters('admin', {
      params: 'params',
      admins: 'admins',
      paginations: 'paginations'
    })
  },

  methods: {
    ...mapActions('admin', ['getList']),

    // Create, Edit
    openModel(status, id = null) {
      this.status = status
      this.idAdmin = id
      this.isDrawer = true
    }
  }
}
</script>

<style scoped lang="sass">
@import "resources/sass/components/admins"
</style>
