<template>
  <div class="row mt-2">
    <div class="col-md-12">
      <div>

        
        <!-- begin:card -->
        <div class="card mb-5">

          <!-- begin:card-header -->
          <div class="card-header">

              <h3 class="card-title">Risk Impacts</h3>

              <div class="card-tools align-items-center py-5">

                <!--begin::Upload button-->
                <span
                  @click="addNewRiskCause"
                  class="btn btn-sm fw-bold text-white-400 btn-success btn-active-color-dark" >
                  Add Risk Impact        
                </span>
                <!--end::Upload button-->

              </div>

          </div>
          <!-- end:card-header -->

        </div>
        <!-- end:card -->

        

        <!--begin::Col-->
        <div class="col-xl-12">

          <!--begin::Tables Widget 3-->
          <div class="card card-xl-stretch mb-5 mb-xl-12">
            
              <!--begin::Body-->
              <div class="card-body py-3">
                  <!--begin::Table container-->
                  <div class="table-responsive">

                      <!--begin::Header-->
                      <div class="card-header border-0 pt-5">
                      
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">

                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 text-muted mb-1" style="margin-left: -30px;">Details</span>
                            </h3>
                            
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Header-->

                      <!--begin::Table-->
                      <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                          <!--begin::Table body-->
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
                          <!--end::Table body-->

                      </table>
                      <!--end::Table-->
                  </div>
                  <!--end::Table container-->
              </div>
              <!--begin::Body-->
          </div>
          <!--end::Tables Widget 3-->
        </div>
        <!--end::Col-->


        
      
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
              Risk Impacts Selection
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
              <table class="table table-bordered table-hover  table-sm">
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
                        :limit="5"
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
      riskeffects: [],
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
            ObjType: 9
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
            this.riskcauses = res.data.ResponseData.effects
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
            ObjType: 9
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
    },
    testingPop() {
      this.$toast('Risk Impacts is the set of methods by which firms evaluate potential losses and take action to reduce or eliminate such threats.', {
        position: 'bottom-right',
        timeout: 5000,
        closeOnClick: true,
        pauseOnFocusLoss: true,
        pauseOnHover: true,
        draggable: true,
        draggablePercent: 0.6,
        showCloseButtonOnHover: false,
        hideProgressBar: true,
        closeButton: 'button',
        icon: true,
        rtl: false
      })
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
    // this.testingPop()
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
                ObjType: 9,
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
