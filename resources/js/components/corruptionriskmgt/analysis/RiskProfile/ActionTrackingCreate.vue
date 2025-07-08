<template>
  <div class=" row mt-2">

    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
    
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                New Strategy 
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
                        CRM
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
        
                          <div class="flex items-center">
                          -
                            <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                              {{ RName }}
                            </a>

                          </div>

                        </li>
                        <!--end::Item-->


                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">

                            <div class="flex items-center">
                              -
                                <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                  New Strategy
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
          
            <BackButton></BackButton>
          
          </div>
          <!--end::Actions-->

      </div>
      <!--end::Toolbar container-->

    </div>
    <!--end::Toolbar-->       



    <!-- <div class="card card-header">
      <h3 class="card-title">New Strategy</h3>
      <div class="card-tools">
        <router-link to="/CREAnalyseMainRisk">
          <button class="btn btn-success btn-sm">
            Go Back
          </button>
        </router-link>
      </div>
    </div> -->
    <!-- /.card-header -->



    <form @submit.prevent="createAction()">
    
          
      <!--start: Header (Risk Event)-->
      <div class="row card card-body  p-12 m-1">

        <!-- <h1 class="fw-bold text-muted text mb-1">Risk Event</h1> -->

        <!--start:Title -->
        <div class="form-group ml-6 mt-1">

          <div class="form-group mt-1">

            <!--begin::Input group-->
            <div class="card mb-5  mt-1"  >
      
              <!-- begin:card-header -->
                <!-- <h1 class="fw-bold text-dark text mb-9">Risk Event</h1> -->
                <h1 class="pb-3 fw-bold text-dark text" >Risk Event</h1>
              <!-- end:card-header -->


                  <input
                  v-model="RName"
                  type="text"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('BName') }"
                />

            </div>
            <!--end::Input group-->

          </div>

        </div>
        <!--end:Title -->

      </div>
      <!--end: Header -->



      

    <div class="row card card-body p-12 m-1">

        <div>

          <h1 class="fw-bold text-dark text mb-9">Details</h1>

          <!-- Name of Strategy-->
           <!--begin::Input group-->
           <div class="row mb-5">

             <!--begin::Col-->
             <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2">Name of Strategy</label>
                <!--end::Label-->
                
                <!--begin::Input-->
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Strategy"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
                <!--end::Input-->
             </div>
             <!--end::Col-->


           </div>
           <!--end::Input group-->

            <!-- Description of Strategy-->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
              <label class="fs-6 fw-semibold mb-2" for>Description of Strategy</label>
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


          
          <!-- Rating & Budget of Strategy -->
           <!--begin::Input group-->
           <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-6 fv-row">
               <!--begin::Label-->
               <label class="fs-5 fw-semibold mb-2">Budget</label>
               <!--end::Label-->
               
               <!--begin::Input-->
                <input
                  v-model="form.Budget"
                  type="number"
                  placeholder="Budget"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Budget') }"
                />
                <has-error
                  :form="form"
                  field="Budget"
                ></has-error>
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




          <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-6 " style="font-size:medium" >Select Supervisor</a>

          
            <!-- Description of Strategy-->
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

        </div>

        <div class="modal-footer">
          <button
            type="submit"
            class="btn btn-primary"
          >Save</button>
        </div>

    </div>


    </form>



<!-- 
    <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createAction()">
          <div class="modal-body">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for>Name of Strategy</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Strategy"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div>
              <div class="form-group col-md-6">
                <label for>Description of Strategy</label>
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
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for>Budget</label>
                <input
                  v-model="form.Budget"
                  type="number"
                  placeholder="Budget"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Budget') }"
                />
                <has-error
                  :form="form"
                  field="Budget"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
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
              </div>

              <div class="form-group col-md-6">
                <label for>Risk Event</label>
                <input
                  v-model="RName"
                  type="text"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('BName') }"
                />
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
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
              </div>

            </div>
          </div>

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>
        </form>
      </div>

    </div> -->

  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
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
      form: new Form({
        id: '',
        RiskID: '',
        ObjType: 19,
        Source: '',
        Category: 1,
        DueDate: '',
        Status: '',
        Name: '',
        Description: '',
        Rating: '',
        CategoryObjType: 18,
        selectedCauses: [],
        user_id: '',
        Budget: '',
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
    Datepicker, BackButton
  },
  methods: {
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
      this.form.RiskID = localStorage.risk_id
      this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/actiontracking')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire('Created!', 'Successfully Created.', 'success')
            this.$router.push({ name: 'CREAnalyseMainRisk' })
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
    },
    loadRisk() {
      axios.get('/api/risks/' + localStorage.risk_id).then((res) => {
        this.RName = res.data.ResponseData.item.Name
      })
    },
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id,
            isForAction: 1,
            isCRM: 1
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.methods
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
    }
  },
  created() {
    this.loadUsers()
    this.loadCausesEffects()
    this.loadCategory()
    this.loadRisk()
  }
}
</script>
