<template>
  <div>
    <div class="row mt-2">
      <div class="col-md-12">


        
    
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                NCRs
              </h1>
              <!--end::Title-->
  
              <!--begin::Breadcrumb-->
              <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                  <li>
                  <div>
                      <a href="#" class="text-gray-400 hover:text-gray-500">
                      <!-- Heroicon name: solid/home -->
                      <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                      </svg>
                      <span class="sr-only">Dashboard</span>
                      </a>
                  </div>
                  </li>
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        NRC
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        NCRs
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


              


                  <!--begin::Item-->
                  <!-- <li class="breadcrumb-item text-muted">

                    <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                          New Opportunity
                        </a>

                    </div>

                  </li> -->
                  <!--end::Item-->

                            
              </ol>
              <!--end::Breadcrumb-->
  
          </div>
          <!--end::Page title-->
  
              
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
           
            <!-- v-if="title != 'All Incindents'" -->

             <!--begin::Primary button-->
              <a href="#" @click.prevent="newModal"
              class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
              Add New        
            </a>
            <!--end::Secondary button-->

          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  

        <div>


          <!-- <div class="card-header">
            <h3 class="card-title">NCRs</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="newModal"
              >
                Add New
                <i class="fas fa-plus"></i>
              </button>
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
                          <!--begin::Table-->
                          <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

                              <!--begin::Table head-->
                              <thead>
                                  <tr class="fw-bolder text-muted">
                                    <th>No.</th>
                                    <th>Audit No.</th>
                                    <th>Area Under Review</th>
                                    <th>Audit Date</th>
                                  </tr>
                                      
                              </thead>
                              <!--end::Table head-->

                              <!--begin::Table body-->
                              <tbody>
                  
                                  <tr   v-for="mode in alldata" :key="mode.id">
                                  
                                      <td >
                                          <div class="d-flex justify-content-start flex-column">
                                            <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                                              <span class="text-success fw-bold  text-hover-success fs-6">{{ mode.DocNum }}</span>
                                            </router-link>
                                          </div>
                                      </td>


                                      <td >
                                        <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                                          <span class="text-success text-hover-success d-block fs-6"> {{ mode.AuditNo }}</span>
                                        </router-link>
                                      </td>


                                      <td>
                                        <span class="text-success text-hover-success d-block fs-6"> {{ mode.AreaUnderReview }}</span>
                                      </td>

                                      
                                     
                                      <td >
                                        <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                                          <span class="text-success text-hover-success d-block fs-6"> {{ mode.ClauseOfCriteriaDocument }}</span>
                                        </router-link>
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










          <!-- <div class="card card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm"> -->
              <!-- <thead class="thead-light">

                <tr>
                  <th>No.</th>
                  <th>Audit No.</th>
                  <th>Area Under Review</th>
                  <th>Audit Date</th>
                </tr>
              </thead> -->
              <!-- <tbody>
                <tr
                  v-for="mode in alldata"
                  :key="mode.id"
                >

                  <td>

                    <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                      {{ mode.DocNum }}
                    </router-link>

                  </td>
                  <td>

                    <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                      {{ mode.AuditNo }}
                    </router-link>

                  </td>
                  <td>{{ mode.AreaUnderReview }}</td>

                  <td>
                    <router-link :to="{ path:'/qms/ncr/' + mode.id}">
                      {{ mode.ClauseOfCriteriaDocument }}
                    </router-link>
                  </td>
                </tr>
              </tbody> -->


            <!-- </table> -->


          <!-- </div> -->

        </div>
        <!-- /.card -->


      </div>
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
        class="modal-dialog model-lg"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >New Procedure</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateData() : createData()">
            <div class="modal-body">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <label>Select Business Unit</label>
                  <select
                    class="form-control"
                    v-model="form.BunitID"
                  >
                    <option
                      v-for="val in businessunits"
                      :value="val.id"
                      :key="val.id"
                    >
                      {{ val.Name }}
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for>Documber Number</label>
                  <input
                    v-model="form.DocNum"
                    type="text"
                    placeholder="Document Number"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('DocNum') }"
                  />
                  <has-error
                    :form="form"
                    field="DocNum"
                  ></has-error>
                </div>
                <div class="form-group col-md-12">
                  <label for>Audit Date</label>
                  <input
                    v-model="form.AuditDate"
                    type="text"
                    placeholder="Audit Date"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('AuditDate') }"
                  />
                  <has-error
                    :form="form"
                    field="AuditDate"
                  ></has-error>
                </div>

                <div class="form-group col-md-12">
                  <label for>Audit No.</label>
                  <input
                    v-model="form.AuditNo"
                    type="text"
                    placeholder="Audit No"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('AuditNo') }"
                  />
                  <has-error
                    :form="form"
                    field="AuditNo"
                  ></has-error>
                </div>

                <div class="form-group col-md-12">
                  <label for>Area Under Review</label>
                  <input
                    v-model="form.AreaUnderReview"
                    type="text"
                    placeholder="Area Under Review"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('AreaUnderReview') }"
                  />
                  <has-error
                    :form="form"
                    field="AreaUnderReview"
                  ></has-error>
                </div>

                <div class="form-group col-md-12">
                  <label for>Clause Of Criteria Document</label>
                  <input
                    v-model="form.ClauseOfCriteriaDocument"
                    type="text"
                    placeholder="Clause Of Criteria Document"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('ClauseOfCriteriaDocument') }"
                  />
                  <has-error
                    :form="form"
                    field="ClauseOfCriteriaDocument"
                  ></has-error>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
              >
                Close
              </button>
              <button
                v-show="editmode"
                type="submit"
                class="btn btn-success"
              >
                Update
              </button>
              <button
                v-show="!editmode"
                type="submit"
                class="btn btn-primary"
              >
                Create
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
      categories: {},
      alldata: {},
      counter: 1,
      businessunits: {},
      form: new Form({
        id: '',
        DocNum: '',
        AuditDate: '',
        AuditNo: '',
        AreaUnderReview: '',
        ClauseOfCriteriaDocument: '',
        BunitID: '',
        Name: ''
      })
    }
  },
  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
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
        .get('/api/ncr')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData
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
    createData() {
      this.$Progress.start()

      this.form
        .post('/api/ncr')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
            this.$Progress.finish()
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

    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    editModal(mode) {
      this.editmode = true
      this.form.reset()
      $('#addNew').modal('show')
      this.form.fill(mode)
    },
    moreDetails(id) {
      this.$router.push({ name: 'ProcedureProfile', params: { id: id } })
    },
    loadBusinessUnits() {
      const token = this.getAuthToken();
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: this.form.BUObjType
          },
          withCredentials: true,
          headers: {
              Authorization: `Bearer ${token}`
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
    }
  },
  created() {
    this.loadData()
    this.loadBusinessUnits()

    Fire.$on('AfterCreate', () => {
      this.loadData()
    })
  }
}
</script>
