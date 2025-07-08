<template>
  <div class="row mt-2">
    <div class="col-md-12">


      <div>

            <!-- begin:card (Risk level one)-->
            <div class="card mb-5 mt-2">

              <!-- begin:card-header -->
              <div class="card-header">
                <h3 class="card-title">Risks</h3>

                

                  <div class="d-flex align-items-center gap-2 gap-lg-3">

                    <a href="#"
                      class="btn btn-success btn-sm"
                      @click.prevent="addNewRiskCause"
                    >
                      Add Risks
                    </a>
                    
                  </div>
              </div>
              <!-- end:card-header -->

            </div>
          <!-- end:card -->


        <!-- <div class="card-header">
          <h3 class="card-title">Risks </h3>
          <div class="card-tools">
            <a
              class="btn btn-success btn-sm"
              @click="addNewRiskCause"
            >
              Add Risks
            </a>
          </div>
        </div> -->
        <!-- /.card-header -->




        
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

                      <!--end::Label-->
                      <!-- <h6 class="fs-5 fw-bolder mb-2">Select Business Unit</h6> -->
                      <!--end::Label-->

                      <h3 class="card-title align-items-start flex-column">
                          <span class="card-label fw-bold fs-3 text-muted mb-1" style="margin-left: -30px;">Details</span>
                      </h3>
                          
                      <!--end::Select-->
                      
                  </div>
                  <!--end::Col-->

              </div>
              <!--end::Header-->

                      <!--begin::Table-->
                      <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                          <!--begin::Table body-->
                          <tbody>
                            <tr v-for="mode in  filteredCauses" :key="mode.id">
                            <td style="color: #258c37;">
                              <input
                                  type="checkbox"
                                  :value="mode.id"
                                  @change="CountChecked(mode)"
                                  v-model="mode.isSelected"
                                />
                            </td>

                            <td> 
                              <a
                                style="color: #258c37;"
                                href="#"
                                @click.prevent="moreDetails(mode.id)"
                              >
                                {{ mode.item.Name }}
                              </a>
                            </td>

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







        <!-- <div class="card card-body table-responsive p-0"> -->
          <!-- <table class="table table-bordered table-hover mt-2">
            <thead class="thead-light">
            </thead>
            <tbody> -->
              <!-- <tr
                v-for="mode in  filteredCauses"
                :key="mode.id"
              > -->
                <!-- <td>
                  <input
                    type="checkbox"
                    :value="mode.id"
                    @change="CountChecked(mode)"
                    v-model="mode.isSelected"
                  />
                </td>
                <td>
                  <a
                    href="#"
                    @click="moreDetails(mode.id)"
                  >
                    {{ mode.item.Name }}
                  </a>
                </td> -->
              <!-- </tr> -->
            <!-- </tbody>
          </table> -->
        <!-- </div> -->


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
              Risks Selection
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
                        placeholder="Search For Risk Lelel One"
                        class="form-control"
                      />
                    </td>
                  </tr>
                  <tr
                    v-for="mode in allLevelOneRisks"
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
                    <td>{{ mode.item.Name }}</td>
                  </tr>
                  <tr>

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
      allLevelOneRisks: [],
      procedure_id: '',
      form: new Form({
        search: ''
      })
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'loadLevelOneRisks',
      immediate: true
    }
  },
  methods: {
    CountChecked(mode) {
      var isSelected = mode.isSelected
      axios
        .get('/api/syncQMSRelationship', {
          params: {
            RiskID: this.procedure_id,
            ItemID: mode.id,
            isSelected: isSelected,
            ObjType: 26 //Procedures
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
            title: 'Operation not successfull' + '\n' + e.response.message
          })
        })
    },
    loadLevelOneRisks(id) {
      this.procedure_id = id ?? this.procedure_id
      axios
        .get('/api/getLevelOneRiskForQMS', {
          params: {
            ProcedureID: id,
            ObjType: 11
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allLevelOneRisks = res.data.ResponseData
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

    moreDetails(id) {
      localStorage.clear()
      localStorage.setItem('risk_id', id)
      this.$router.push({ name: 'AnalyseRiskProfile' })
    }
  },
  computed: {
    filteredCauses: function () {
      return this.allLevelOneRisks.filter(function (e) {
        if (e.isSelected == true) {
          return e
        }
      })
    }
  },
  created() {
    Fire.$on('AfterCreate', () => {
      this.loadLevelOneRisks(this.procedure_id)
    })
  }
}
</script>
