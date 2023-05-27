<template>
  <section class="content-header">
    <h1>
      {{ $route.meta.title }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-picture-o"></i> {{ $route.meta.title }}
      </li>
      <li class="active">{{ $route.meta.breadcrumb }}</li>
    </ol>

    <div class="content">
      <!--Search-->
      <div class="box box-warning">
        <Search :isPhoto="isPhoto" @change="handleFilter($event)"/>
      </div>

      <!--Table Photos-->
      <el-table
          :data="photos"
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
            label="Images"
            width="350">
          <template slot-scope="scopeImg">
            <el-image
                class="scopeImg"
                :src="scopeImg.row.files[0].url"
                fit="cover">
              <div slot="error" class="image-slot">
                <i class="el-icon-picture-outline"></i>
              </div>
            </el-image>
          </template>
        </el-table-column>
        <el-table-column
            prop="description"
            label="Description"
            width="500">
        </el-table-column>
        <el-table-column
            prop="is_approved"
            align="center"
            label="Approve"
            width="80">
          <template slot-scope="scopeSwitch">
            <el-switch @change="handleSwitch(scopeSwitch.row.id, scopeSwitch.row.is_approved)"
                       v-model="scopeSwitch.row.is_approved"></el-switch>
          </template>
        </el-table-column>
        <el-table-column
            sortable
            :sort-orders="['ascending','descending']"
            align="center"
            label="Share"
            prop="count_share"
            width="200">
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
          <template slot-scope="scopeDelete" style="text-align: center">
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
  name: "Photos",

  components: {
    Search,
    Pagination
  },

  data() {
    return {
      isChangSize: true,
      isAscShare: true,
      isPhoto: true
    }
  },

  mixins: [
    MixinCMS
  ],

  created() {
    let params = {
      'include': ['user', 'files'],
      'perPage': 10,
      'page': 1
    };
    this.getList(params)
  },

  computed: {
    ...mapGetters('photo', {
      paginations: 'paginations',
      photos: 'photos',
      params: 'params'
    })
  },

  methods: {
    ...mapActions('photo', [
      'getList'
    ]),

    sortChange() {
      let paramsSort = {
        'include': ['user', 'files'],
        'perPage': 10,
        'page': 1
      };
      let params = {...paramsSort, 'sortBy[count_share]': this.isAscShare ? 'asc': 'desc'}
      this.getList(params)

      this.isAscShare = !this.isAscShare
    }
  }
}
</script>

<style scoped lang="scss">
.scopeImg {
  width: 100%;
  height: 200px;
}
.sortShare {
  display: flex;
}
</style>
