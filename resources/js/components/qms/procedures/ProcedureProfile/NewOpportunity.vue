<template>
  <div class="row mt-2">


    
    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                New Opportunity
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
                        ISO Procedure
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        {{RName}}
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">

                    <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                          Opportunities
                        </a>

                    </div>

                  </li>
                  <!--end::Item-->
                      


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">

                    <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                          New Opportunity
                        </a>

                    </div>

                  </li>
                  <!--end::Item-->

                            
              </ol>
              <!--end::Breadcrumb-->
  
          </div>
          <!--end::Page title-->
  
              
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">
           
            <!-- v-if="title != 'All Incindents'" -->

            <BackButton></BackButton>
           
          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  




<!-- 
    <ProceduresToolbar :title="'New Opportunity'"></ProceduresToolbar>

 -->




    <!-- <div class="card-header">
      <h3 class="card-title">New Opportunity</h3>
      <div class="card-tools">
        <button
          class="btn btn-info btn-sm"
          @click="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Close
        </button>
      </div>
    </div> -->
    <!-- /.card-header -->


    <!-- <div class="card card-body table-responsive p-0"> -->
    <div class="row card card-body p-12 m-1">

     

        <form @submit.prevent="createAction()">

        <div>

          
          <!-- Name & Category-->
           <!--begin::Input group-->
           <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2">Name</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Action"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
                <!--end::Input-->
            </div>
            <!--end::Col-->


            <!--begin::Col-->
            <div class="col-md-6 fv-row">
              <!--begin::Label-->
              <label class="fs-5 fw-semibold mb-2">Status</label>
              <!--end::Label-->
            
              <!--begin::Input-->
              <select
                name="type"
                v-model="form.Status"
                id="type"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Status') }"
              >
                <option value="0">Not Started (Not Due)</option>
                <option value="1">WIP (On Course)</option>
                <option value="2">WIP (Overdue)</option>
                <option value="3">Not Started (Overdue)</option>
                <option value="4">Deffered</option>
                <option value="5">Completed</option>
              </select>

              <has-error
                :form="form"
                field="Status"
              ></has-error>
            <!--end::Input-->

            </div>
            <!--end::Col-->


          </div>
          <!--end::Input group-->






           <!-- Due Date & Procedure-->
           <!--begin::Input group-->
           <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2">Due Date</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.DueDate"
                  :disabledDates="state.disabledDates"
                  :class="{ 'is-invalid': form.errors.has('DueDate') }"
                  name="fromWhen"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>

                <has-error
                  :form="form"
                  field="DueDate"
                ></has-error>
                <!--end::Input-->
            </div>
            <!--end::Col-->


            <!--begin::Col-->
            <div class="col-md-6 fv-row">
              <!--begin::Label-->
              <label class="fs-5 fw-semibold mb-2">Procedure</label>
              <!--end::Label-->
            
              <!--begin::Input-->
                <input
                  v-model="RName"
                  type="text"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('BName') }"
                />
              <!--end::Input-->

            </div>
            <!--end::Col-->


          </div>
          <!--end::Input group-->




           <!-- Description -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
              <label class="fs-6 fw-semibold mb-2" for>Supervisor</label>
              <select
                name="type"
                v-model="form.user_id"
                id="type"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('user_id') }"
              >
                <option
                  v-for="val in users"
                  :value="val.id"
                  :key="val.id"
                >
                  {{ val.Fname +' '+val.Lname}}
                </option>
              </select>
              <has-error
                :form="form"
                field="user_id"
              ></has-error>

            </div>
            <!--end::Input group-->





           <!-- Description -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
                <label class="fs-6 fw-semibold mb-2" for>Description of Opportunity</label>

                  <textarea
                    rows="3"
                    v-model="form.Description"
                    placeholder="Description"
                    class="form-control"
                    :class="{
                      'is-invalid': form.errors.has('Description'),
                    }"
                  ></textarea>
                  
                  <has-error
                    :form="form"
                    field="Description"
                  ></has-error>
            </div>
            <!--end::Input group-->







        </div>


            
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>







        </form>


          <!-- <div class="modal-body">

            <div class="form-row"> -->

              <!-- <div class="form-group col-md-6">
                <label for>Name</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Action"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div> -->


              <!-- <div class="form-group col-md-6">
                <label for>Description of Opportunity</label>
                <textarea
                  rows="3"
                  v-model="form.Description"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('Description'),
                  }"
                ></textarea>
                <has-error
                  :form="form"
                  field="Description"
                ></has-error>
              </div>
            </div> -->


            <!-- <div class="form-row"> -->


                <!-- 
              <div class="form-group col-md-6">
                <label for>Status</label>
                <select
                  name="type"
                  v-model="form.Status"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Status') }"
                >
                  <option value="0">Not Started (Not Due)</option>
                  <option value="1">WIP (On Course)</option>
                  <option value="2">WIP (Overdue)</option>
                  <option value="3">Not Started (Overdue)</option>
                  <option value="4">Deffered</option>
                  <option value="5">Completed</option>
                </select>

                <has-error
                  :form="form"
                  field="Status"
                ></has-error>
              </div> -->


              <!-- 
              <div class="form-group col-md-6">
                <label for>Due Date</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.DueDate"
                  :disabledDates="state.disabledDates"
                  :class="{ 'is-invalid': form.errors.has('DueDate') }"
                  name="fromWhen"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>

                <has-error
                  :form="form"
                  field="DueDate"
                ></has-error>
              </div> -->

              <!-- <div class="form-group col-md-6">
                <label for>Procedure</label>
                <input
                  v-model="RName"
                  type="text"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('BName') }"
                />
              </div> -->


              <!-- <div class="form-group col-md-6">
                <label for>Supervisor</label>
                <select
                  name="type"
                  v-model="form.user_id"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('user_id') }"
                >
                  <option
                    v-for="val in users"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Fname +' '+val.Lname}}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="user_id"
                ></has-error>
              </div> -->


            <!-- </div> -->

          <!-- </div> -->

          <!-- <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>
        </form> -->



      <!-- </div> -->
    </div>


    
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
              Select Users
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
                  <tr
                    v-for="mode in users"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        @change="CountChecked(mode)"
                      />
                    </td>
                    <td>{{ mode.full_name }}</td>
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
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
// import ProceduresToolbar from './components/ProceduresToolbar.vue'
import BackButton from '../components/BackButton.vue'

export default {
  data() {
    return {
      reports: {},
      categories: {},
      showcauses: false,
      showactions: false,
      showeffects: false,
      riskcauses: {},
      users: {},
      BName: '',
      RName: '',
      selectedAssignments: [],
      procedure_id: '',
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        ObjType: 41,
        Source: '',
        Category: 1,
        DueDate: new Date(),
        Status: '',
        Name: '',
        Description: '',
        Rating: '',
        CategoryObjType: 18,
        selectedCauses: [],
        user_id: '',
        selectedAssignments: []
      }),
      state: {
        disabledDates: {
          from: new Date(new Date().setFullYear(new Date().getFullYear() + 3))
        }
      }
    }
  },
  components: {
    Datepicker, BackButton
  },
  watch: {
    '$route.params.id': {
      handler: 'setProcedureId',
      immediate: true
    }
  },
  methods: {
    setProcedureId(id) {
      this.procedure_id = id
      this.form.o_i_t_m_id = id
      this.loadData(id)
    },
    loadUsers() {
      axios
        .get('/api/user')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.users = res.data.ResponseData
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
    showRiskCauses() {
      this.showcauses = true
      this.showactions = false
      this.showeffects = false
    },
    showRiskEffects() {
      this.showcauses = false
      this.showactions = false
      this.showeffects = true
    },
    /**
     * Creating Risk
     */
    createAction() {
      this.form.selectedAssignments = this.selectedAssignments
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/actiontracking')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            swal.fire('Created!', 'Successfully Created.', 'success')
            this.$router.push({ name: 'ProcedureProfile', params: { id: this.procedure_id } })
            this.$Progress.finish()
          } else {
            this.$Progress.fail()
            toast.fire({
              icon: 'error',
              type: 'error',
              title: 'Oops...',
              text: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            icon: 'error',
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    loadCategory() {
      axios
        .get('/api/category', {
          params: {
            ObjType: this.form.CategoryObjType
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.categories = res.data.ResponseData.data
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

    showModalUsers() {
      $('#addNew').modal('show')
    },
    CountChecked(mode) {
      const item = this.selectedAssignments.find((record) => {
        return record.id === mode.id
      })
      if (item) {
        return
      }
      this.selectedAssignments.push(mode)
    },
    deleteUser(id) {
      const self = this
      const item = this.selectedAssignments.find((record) => {
        return record.id === id
      })

      const pos = this.selectedAssignments.indexOf(item)
      if (pos === -1) {
        return
      }
      this.selectedAssignments.splice(pos, 1)
    },
    GoBack() {
      this.$router.back()
    },
    loadData(id) {
      this.procedure_id = id
      axios.get('/api/risklibrarysetup/' + id).then((res) => {
        this.RName = res.data.ResponseData.Name
      })
    }
  },
  created() {
    this.loadUsers()
    this.loadCategory()
  }
}
</script>
