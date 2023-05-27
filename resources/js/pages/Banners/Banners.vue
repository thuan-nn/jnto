<template>
  <section class="content-header banners">
    <h1>
      {{ $route.meta.title }}
    </h1>
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-object-group"></i> {{ $route.meta.title }}
      </li>
      <li class="active">{{ $route.meta.breadcrumb }}</li>
    </ol>

    <!--Table Create Left-->
    <el-drawer
        title="Add Banner"
        :before-close="handleClose"
        :visible.sync="drawer"
        :wrapperClosable="false"
        direction="rtl"
        size="40%"
        custom-class="demo-drawer"
        ref="drawer"
    >
      <div class="demo-drawer__content">
        <FormBanner @upload="getData($event)" :isError="isError" :image.sync="image" :isCreate="isCreate"/>
        <div class="demo-drawer__footer">
          <el-button type="primary" @click.prevent="handleSubmit" :disabled="isDisable" :loading="loading">
            {{ loading ? 'Submitting ...' : 'Submit' }}
          </el-button>
          <el-button @click.prevent="handleClose">Cancel</el-button>
        </div>
      </div>
    </el-drawer>

    <div class="content">
      <div class="d-flex">
        <!--Search-->
        <div class="box box-warning">
          <Search :isBanner="isBanner" @change="handleFilter($event)"/>
        </div>

        <!--Create-->
        <div class="box box-success">
          <div class="content">
            <div class="box-header with-border">
              <h3 class="box-title">Add New</h3>
            </div>
            <div class="box-body">
              <el-button icon="el-icon-plus" @click.prevent="openModel()" type="success" plain/>
            </div>
          </div>
        </div>
      </div>

      <!--Table Banners-->
      <el-table
          :data="banners"
          highlight-current-row >
        <el-table-column
            fixed
            width="100"
            label="Choice"
            align="center"
            type="index">
            <template slot-scope="scopeChoice">
              <el-checkbox
                  :disabled="!scopeChoice.row.is_selected && (totalSelected >= 3)"
                  v-model="scopeChoice.row.is_selected"
                  @change="handleChoice(scopeChoice.row.id, scopeChoice.row.is_selected)"></el-checkbox>
            </template>
        </el-table-column>
        <el-table-column
            fixed
            label="ID"
            align="center"
            type="index">
        </el-table-column>
        <el-table-column
            label="Images"
            width="450">
          <template slot-scope="scopeUrl">
            <el-image
                class="scopeUrl"
                :src="scopeUrl.row.files[0] ? scopeUrl.row.files[0].url : ''"
                fit="fill">
                <div slot="error" class="image-slot">
                  <i class="el-icon-picture-outline"></i>
                </div>
            </el-image>
          </template>
        </el-table-column>
        <el-table-column
            prop="files[0].name"
            align="center"
            label="Image Name">
        </el-table-column>
        <el-table-column
            prop="created_at"
            label="Create">
        </el-table-column>
        <el-table-column
            prop="updated_at"
            label="Update">
        </el-table-column>
        <el-table-column
            align="center"
            fixed="right"
            label="Operations"
            width="150"
        >
          <template slot-scope="scopeDelete">
            <el-tooltip content="Edit" placement="top" effect="light">
              <el-button icon="el-icon-edit" type="primary" @click.prevent="openModel(scopeDelete.row.id)" plain size="small"/>
            </el-tooltip>
            <el-tooltip content="Delete" placement="top" effect="light">
              <el-popconfirm
                  @confirm="confirm(scopeDelete.row.id)"
                  confirm-button-text='OK'
                  cancel-button-text='No, Thanks'
                  icon="el-icon-delete"
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
import {mapActions, mapGetters} from "vuex"
import Pagination from "../../components/Pagination"
import {ApiService} from "../../api"
import FormBanner from "./FormBanner"
import MixinEventCMS from "../../mixins/EventCMS"

export default {
  name: "Banners",

  components: {
    FormBanner,
    Search,
    Pagination
  },

  mixins: [
    MixinEventCMS
  ],

  data() {
    return {
      isBanner: true,
      isChangSize: true,
      loading: false,
      drawer: false,
      isDisable: true,
      data: {},
      image: '',
      selectBannerId: null,
      isCreate: true,
      totalSelected: 0,
      isError: false
    };
  },

  created() {
    let params = {
      'include': 'files',
      'perPage': 10,
      'page': 1,
      'sortBy[selected]': 'desc',
    };

    this.getList(params)

    ApiService.get('total_selected_banners').then(res => {
      this.totalSelected = res.data.data.total_selected
    })
  },

  computed: {
    ...mapGetters('banner', {
      banners: 'banners',
      paginations: 'paginations',
      params: 'params'
    })
  },

  methods: {
    ...mapActions('banner', [
      'getList'
    ]),

    async handleChoice(id, isSelected) {
      const body = {"is_selected": isSelected}
      await ApiService.put(`banners/${id}`, body).catch(_ => {
        this.$message.error('Chỉ đượnc chọn ba banner để hiển thị.')
      })
      await ApiService.get('total_selected_banners').then(res => {
        this.totalSelected = res.data.data.total_selected
      })
    },

    handleSubmit() {
      if (Object.keys(this.data).length === 0) {
        return;
      }

      let formData = new FormData();
      formData.append('files[]', this.data)

      ApiService.post('files', formData).then((respFile) => {
        this.isError = false

        const body = {'file_id': respFile.data.data[0].id}

        if (!this.selectBannerId) {
          ApiService.post('banners', body)
        } else {
          ApiService.put('banners/' + this.selectBannerId, body)
        }

        window.location.reload()
      }).catch(_ => {
        this.isError = true
      })
    },

    getData(file) {
      this.data = file
      this.isDisable = !this.data
    },

    handleClose() {
      this.drawer = false
      this.isCreate = true
      this.image = ''
    },

    openModel(id = null) {
      if (!id) {
        this.isCreate = true
        this.drawer = true
      } else {
        this.selectBannerId = id
        this.isCreate = false

        ApiService.get('banners/' + id, {'include': 'files'}).then((resp) => {
          this.image = resp.data.data.files[0].url
          this.drawer = true
        })
      }
    }
  }
}
</script>

<style scoped lang="scss">
@import "resources/sass/components/banners";
.scopeUrl {
  width: 100%;
  height: 250px;
}
</style>
