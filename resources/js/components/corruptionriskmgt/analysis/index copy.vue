<template>
  <div>

    <div class="card mt-2">
      <div class="card-header">
        <h3 class="card-title">Corruption Risk Events</h3>

      </div>

      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <th colspan="11">
              <form>
                <div class="form-row m-2">
                  <div class="form-group col-md-12">
                    <label>Select Functional Area</label>
                    <select
                      class="form-control"
                      @change="loadData()"
                      v-model="form.fraudRiskID"
                    >
                      <option
                        v-for="val in functionalAreas"
                        :value="val.id"
                        :key="val.id"
                      >
                        {{ val.Name }}
                      </option>
                    </select>
                  </div>
                </div>
              </form>
            </th>

          </thead>
          <tbody>
            <ul>
              <li
                v-for="(navItem,i) in menuList"
                :key="i"
                class="nav-item  has-treeview"
              >
                <a
                  class="nav-link"
                  href="javascript:;"
                  data-toggle="collapse"
                  role="button"
                  :aria-expanded="navItem.expand"
                  aria-controls="sidebar-products"
                  @click.prevent="navItemCollapse(i)"
                >
                  <i class="ni ni-single-copy-04 text-primary"></i>
                  <span
                    class="nav-link-text"
                    style="color:black;"
                  >

                    {{navItem.DocNum}} || ------- || {{navItem.Name}} || ------- || {{navItem.assets}}
                  </span>
                </a>
                <div
                  v-if="navItem.dataRisks.length>0"
                  class="collapse"
                  :class="{show: navItem.expand}"
                >
                  <ul class="nav nav-sm flex-column">
                    <li
                      v-for="(subItem,j) in navItem.dataRisks"
                      :key="j"
                      class="nav-item"
                    >
                      <a
                        href="#"
                        @click.prevent="moreDetails(subItem.id)"
                        class="nav-link"
                      >{{subItem.item.Name}}</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: false,
      categories: {},
      alldata: {},
      counter: 1,
      FUNCTIONAL_AREA_OBJECT: 29,
      menuList: [],
      functionalAreas: {},
      fraudRiskAreas: {},
      form: new Form({
        id: '',
        ObjType: 11,
        Name: '',
        fraudRiskID: ''
      })
    }
  },
  methods: {
    getResults(page = 1) {
      axios
        .get('/api/category?page=' + page, {
          params: {
            ObjType: this.form.ObjType
          }
        })
        .then((response) => {
          this.categories = response.data
        })
    },

    loadData() {
      axios
        .get('/api/loadFunctionalAreaData', {
          params: {
            ObjType: this.form.ObjType,
            fraudRiskID: this.form.fraudRiskID
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.menuList = res.data.ResponseData
          } else {
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },

    deleteRoute(id) {
      swal
        .fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        })
        .then((result) => {
          // Send request to the server
          if (result.value) {
            this.form
              .delete('/api/category/' + id)
              .then(() => {
                swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                Fire.$emit('AfterCreate')
              })
              .catch(() => {
                swal.fire('Failed!', 'Something when wrong', 'warning')
              })
          }
        })
    },
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'AnalyseRiskProfile' })
    },
    newAnalysis() {
      this.$router.push({ name: 'AnalyseRiskNew' })
    },

    loadBusinessUnits() {
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.businessunits = res.data.ResponseData.data
          } else {
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    loadFunctiaolAreas() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.FUNCTIONAL_AREA_OBJECT
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.functionalAreas = res.data.ResponseData.data
          } else {
            console.log(res.data.ResultDesc)
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    navItemCollapse(index) {
      this.menuList = this.menuList.map((item, i) => {
        item.expand = !item.expand
        if (i !== index) {
          item.expand = false
        }
        return item
      })
    },
    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'CREAnalyseMainRisk' })
    }
  },
  created() {
    this.loadFunctiaolAreas()
  }
}
</script>

<style scoped>
.danger {
  background-color: #d6a448;
}
.warning {
  background-color: #ffbf00;
}
.success {
  background-color: #09f17d;
}
</style>
