<template>
  <div class=" row mt-2">
    <!-- <div class="card-header">
      <h3 class="card-title">Action Item Editor</h3>
    </div> -->
   <!-- /.card-header -->




     <!--begin::Toolbar-->
     <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                Action Item Editor
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
                        Key Risk Indicators
                      </a>

                    </div>

                  </li>


                  
                <!-- begin::Item -->
                <li class="breadcrumb-item text-muted">

                  <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                        Key Risk Item 
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
           
             <!--begin::Primary button-->
              <a href="#" @click.prevent="GoBack"
              class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
              Back        
            </a>
            <!--end::Secondary button-->

          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  


    <div class="row card card-body p-12 m-1">
      <form @submit.prevent="createAction()">

      <h1 class="fw-bold text-dark text mb-9">Details</h1>

           <!-- Name & Category-->
           <!--begin::Input group-->
           <div class="row mb-5">
            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                 <!--begin::Label-->
                 <label class="fs-5 fw-semibold mb-2">Name of Action</label>
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
              <label class="fs-5 fw-semibold mb-2">Action Category</label>
              <!--end::Label-->
             
              <!--begin::Input-->
              <select
              name="type"
              v-model="form.Category"
              id="type"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('type') }"
            >
              <option
                v-for="val in categories"
                :value="val.id"
                :key="val.id"
              >
                {{ val.Name }}
              </option>
            </select>
             <!--end::Input-->

         </div>
         <!--end::Col-->

          </div>
          <!--end::Input group-->


          
           <!-- Status & Rating-->
           <!--begin::Input group-->
           <div class="row mb-5">
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
                  :class="{ 'is-invalid': form.errors.has('Statuss') }"
                >
                  <option value="0">Not Started (Not Due)</option>
                  <option value="1">WIP (On Course)</option>
                  <option value="2">WIP (Overdue)</option>
                  <option value="3">Not Started (Overdue)</option>
                  <option value="4">Deffered</option>
                  <option value="5">Completed</option>
                </select>
                <!--end::Input-->

            </div>
            <!--end::Col-->


               <!--begin::Col-->
               <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2">Rating</label>
                <!--end::Label-->
               
                <!--begin::Input-->
                <select
                name="type"
                v-model="form.Rating"
                id="type"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Rating') }"
              >
                <option value="0">LOW</option>
                <option value="1">MEDIUM</option>
                <option value="2">HIGH</option>
              </select>
               <!--end::Input-->

           </div>
           <!--end::Col-->

          </div>
          <!--end::Input group-->


           <!-- Due Date-->
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
             <!--end::Input-->

         </div>
         <!--end::Col-->
          </div>
          <!--end::Input group-->

          
          
            <!-- Description of Action -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
              <label class="fs-6 fw-semibold mb-2" for>Description of Action</label>

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


           <!-- Assignments -->
           <a href="#" @click.prevent="showRiskCauses"  class="badge badge-light p-6 mb-6 mt-5  col-md-10 " style="font-size:medium" >Assignments</a>

            <!-- Supervisor -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-6 mb-5 fv-row">
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


          <a href="#" @click.prevent="showRiskCauses"  class="badge badge-light p-6 mb-6 mt-5  col-md-6 " style="font-size:medium" >Select Assignments</a>

          <table class="table table-bordered table-hover mt-2">
            <!-- <thead class="thead-light"> -->
              <!-- <tr> -->
                <!-- <th class="w-80px"></th> -->
                <!-- <th>Name</th> -->
              <!-- </tr> -->
            <!-- </thead> -->
            <tbody>
              <tr v-for="mode in users" :key="mode.id">

                <td class="w-50px">
                  <input
                    type="checkbox"
                    :value="mode.id"
                    v-model="form.selectedAssignments"
                  />
                </td>

                <td>{{ mode.Fname + " " + mode.Lname }}</td>

              </tr>
            </tbody>
          </table>


          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>
        </form>


    </div>


    <!-- <div class="card card-body table-responsive p-0"> -->
      <!-- <div> -->
          <!-- <div class="modal-body"> -->
            <!-- <div class="form-row"> -->
              <!-- <div class="form-group col-md-3">
                <label for>Action Category</label>
                <select
                  name="type"
                  v-model="form.Category"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option
                    v-for="val in categories"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
              </div> -->
              <!-- <div class="form-group col-md-3">
                <label for>Status</label>
                <select
                  name="type"
                  v-model="form.Status"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Statuss') }"
                >
                  <option value="0">Not Started (Not Due)</option>
                  <option value="1">WIP (On Course)</option>
                  <option value="2">WIP (Overdue)</option>
                  <option value="3">Not Started (Overdue)</option>
                  <option value="4">Deffered</option>
                  <option value="5">Completed</option>
                </select>
              </div> -->
              <!-- <div class="form-group col-md-3">
                <label for>Rating</label>
                <select
                  name="type"
                  v-model="form.Rating"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Rating') }"
                >
                  <option value="0">LOW</option>
                  <option value="1">MEDIUM</option>
                  <option value="2">HIGH</option>
                </select>
              </div> -->
              <!-- <div class="form-group col-md-3">
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
              </div> -->
            <!-- </div> -->


            <!-- <div class="form-row"> -->
              <!-- <div class="form-group col-md-12">
                <label for>Name of action</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Action"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div> -->
              <!-- <div class="form-group col-md-12">
                <label for>Description of Action</label>
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
              </div> -->
            <!-- </div> -->

            <!-- <div class="form-row">
              <nav class="nav nav-tabs">
                <a
                  href="#"
                  class="nav-item nav-link"
                  @click="showRiskCauses"
                >Assignments</a>
              </nav>
            </div> -->


            <!-- <div class="form-row"> -->
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

              <!-- <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr>
                    <td colspan="2">Assignments</td>
                  </tr>
                  <tr>
                    <th></th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="mode in users"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        v-model="form.selectedAssignments"
                      />
                    </td>
                    <td>{{ mode.Fname + " " + mode.Lname }}</td>
                  </tr>
                </tbody>
              </table> -->
            <!-- </div> -->


          <!-- </div> -->

        
      <!-- </div> -->
    <!-- </div> -->




  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
  name:'KRITreatment',
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
      form: new Form({
        id: '',
        RiskID: '',
        ObjType: 19,
        Source: '',
        Category: 1,
        DueDate: new Date(),
        Status: '',
        Name: '',
        Description: '',
        Rating: '',
        CategoryObjType: 18,
        selectedCauses: [],
        o_k_r_i_id: '',
        user_id: '',
        selectedAssignments: []
      }),
      state: {
        disabledDates: {
          from: new Date()
        }
      }
    }
  },
  components: {
    Datepicker
  },
  methods: {
    GoBack() {
      this.$router.back()
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
      this.form.o_k_r_i_id = localStorage.kricompliance_id
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/actiontracking')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            swal.fire('Created!', 'Successfully Created.', 'success')
            this.$router.push({ name: 'AnalyseRiskProfile' })
            this.$Progress.finish()
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
    }
  },
  created() {
    this.loadUsers()
    // this.loadCausesEffects()
    this.loadCategory()
    // this.loadRisk()
  }
}
</script>
