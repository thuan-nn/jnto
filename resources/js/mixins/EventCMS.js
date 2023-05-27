import {ApiService} from "../api";
import {Helper} from "../util/helper";

export default {
  methods: {
    handleClass (column) {
      const queries = Helper.getUrlSetQuery(this.$router.currentRoute.query)

      if (column === queries.orderBy) {
        return 'sorting_' + (queries.direction === 'asc' ? 'asc' : 'desc')
      } else {
        return 'sorting'
      }
    },

    handleDirection (sortingColumn) {
      const queries = Helper.getUrlSetQuery(this.$router.currentRoute.query)

      if (queries.orderBy !== sortingColumn) {
        queries.direction = 'asc'
      } else {
        queries.direction = queries.direction === 'asc' ? 'desc' : 'asc'
      }

      queries.orderBy = sortingColumn
      queries.page = 1
      return queries
    },

    ////////////////////
    // Search (All Pages)
    handleFilter(event) {
      for (const key in event) {
        if (event[key] === null) {
          delete this.params[key]
        } else {
          this.params[key] = event[key]
        }
      }

      this.getList(this.params)
    },

    ///////////////////////
    // Size Paginate (All Pages)
    handleSizePaginate(event) {
      const params = {...this.params, ...event}
      this.isChangSize = !(event.page !== this.paginations.currentPage)

      this.getList(params)
    },

    ////////////////////////
    // CurrentPage (All Pages)
    handleCurrentPage(event) {
      const params = {...this.params, ...event}

      if (this.isChangSize) {
        this.getList(params)
      }
    },

    ///////////////////////
    // Delete (All Pages)
    confirm(index) {
      Promise.all([
        ApiService.delete(`${this.$route.name.toLowerCase()}/${index}`)
      ]).then(_ => {
        this.getList(this.params)
      })
    },

    //////////////////////////
    // URL load ( Stories + Photos )
    redirect(url) {
      window.open(url, '_blank');
    },

    ///////////////////////////
    // Switch Approved ( Stories + Photos )
    handleSwitch(id, isApproved) {
      const params = {id, isApproved}

      const body = {
        is_approved: params.isApproved
      }

      Promise.all([
        ApiService.put(`${this.$route.name.toLowerCase()}/${params.id}`, body)
      ]).then(() => {
        this.getList(this.params)
      })
    },
  }
};
