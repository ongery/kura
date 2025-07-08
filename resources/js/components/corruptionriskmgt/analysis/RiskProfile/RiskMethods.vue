<template>
  <div class="row mt-2">
    <div class="col-md-12">


      <!-- begin:card -->
      <div class="card mb-5 mt-2">

        <!-- begin:card-header -->
        <div class="card-header">
          <h3 class="card-title">Risk Methods</h3>
            
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
              <!--begin::Primary button-->
                <a href="#" @click.prevent="addNewRiskCause"
                  class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                  Add Risk Method        
                </a>
              <!--end::Secondary button-->
            </div>
            <!--end::Actions-->

        </div>
        <!-- end:card-header -->

      </div>
      <!-- end:card -->


      <div class="card">
       <!--  <div class="card-header">
          <h3 class="card-title">Risk Methods</h3>
          <div class="card-tools">
            <a
              class="btn btn-success btn-sm"
              @click="addNewRiskCause"
            >
              Add Risk Method
            </a>
          </div>
        </div> -->
        <!-- /.card-header -->



        
        <div class="card-body table-responsive p-5">
          <table class="table table-bordered table-hover mt-2">
           
            <tbody>
              <tr
                v-for="mode in  filteredCauses"
                :key="mode.id"
              >
                <td>
                  <input
                    type="checkbox"
                    :value="mode.id"
                    @change="CountChecked(mode)"
                    v-model="mode.isSelected"
                  />
                </td>
                <td>{{ mode.Name }}</td>
              </tr>
            </tbody>
          </table>
        </div>


<!-- 
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover mt-2">
            <thead class="thead-light">
            </thead>
            <tbody>
              <tr
                v-for="mode in  filteredCauses"
                :key="mode.id"
              >
                <td>
                  <input
                    type="checkbox"
                    :value="mode.id"
                    @change="CountChecked(mode)"
                    v-model="mode.isSelected"
                  />
                </td>
                <td>{{ mode.Name }}</td>
              </tr>
            </tbody>
          </table>
        </div> -->


      </div>
      <!-- /.card -->


    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="addNew"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >
              Risk Method Selection
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateCategory() : createCategory()">
            <div class="modal-body">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <input
                        v-model="form.search"
                        type="text"
                        name="name"
                        @keyup="searchItem()"
                        placeholder="Search For Cause"
                        class="form-control"
                      />
                    </td>
                  </tr>
                  <tr
                    v-for="mode in allcauses.data"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                        v-model="mode.isSelected"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <pagination
                        :data="allcauses"
                        @pagination-change-page="getResults"
                      ></pagination>
                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-success"
                data-dismiss="modal"
              >
                Ok
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
</template>
<script>
import 'vue-toastification/dist/index.css'
export default {
  data() {
    return {
      editmode: false,
      showmode: '',
      alldata: {},
      reports: {},
      filteredriskcauses: {},
      riskcauses: [],
      riskeffects: {},
      allcauses: {},
      form: new Form({
        search: ''
      })
    }
  },
  methods: {
    getResults(page = 1) {
      axios
        .get('/api/getRiskCauses?page=' + page, {
          params: {
            RiskID: localStorage.risk_id,
            ObjType: 34
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allcauses = res.data.ResponseData
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
    CountChecked(mode) {
      var isSelected = mode.isSelected
      axios
        .get('/api/syncRelationship', {
          params: {
            RiskID: localStorage.risk_id,
            ItemID: mode.id,
            isSelected: isSelected,
            ObjType: mode.ObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Operation Successfull'
            })
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
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.methods
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
    loadRiskCauses() {
      axios
        .get('/api/getRiskCauses', {
          params: {
            RiskID: localStorage.risk_id,
            ObjType: 34
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allcauses = res.data.ResponseData
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
    addNewRiskCause() {
      $('#addNew').modal('show')
    },
    searchItem() {
      Fire.$emit('searching')
    }
  },
  computed: {
    filteredCauses: function () {
      return this.riskcauses.filter(function (e) {
        if (e.isSelected == true) {
          return e
        }
      })
    }
  },
  created() {
    this.loadCausesEffects()
    Fire.$on('AfterCreate', () => {
      this.loadCausesEffects()
    })
    this.loadRiskCauses(),
      Fire.$on('searching', () => {
        let query = this.form.search
        if (this.form.search == null) {
          this.allmembers = {}
        } else {
          axios
            .get('/api/findCauseOrImpact?q=' + query, {
              params: {
                ObjType: 34,
                RiskID: localStorage.risk_id
              }
            })
            .then((res) => {
              if (res.data.ResultCode == 1200) {
                this.allcauses = res.data.ResponseData
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
        }
      })
  }
}
</script>
