<template>
  <div class=" row mt-2">


    <ActionTrackingToolbar :title="RName"></ActionTrackingToolbar>


    <form @submit.prevent="createAction()">


    <!--start: Header -->
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

            <div class="col col-md-10">
              <!--end::Select-->
                <input v-model="RName" type="text" readonly name="Name" class="form-control"
                :class="{ 'is-invalid': form.errors.has('BName') }" />
              <!--end::Select-->
            </div>

          </div>
          <!--end::Input group-->

        </div>

      </div>
      <!--end:Title -->

    </div>
    <!--end: Header -->


  
    <div class="row card card-body p-12 m-1">
      <div>

          <h1 class="fw-bold text-dark text mb-9">New Action</h1>


          <!-- Name & Category -->
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
                     class="form-control  form-control-solid"
                     :class="{ 'is-invalid': form.errors.has('Name') }"
                   />
                  <!--end::Input-->

              </div>
              <!--end::Col-->

              <!--begin::Col-->
              <div class="col-md-6 fv-row">
                
                <label class="fs-5 fw-semibold mb-2" for>Action Category</label>

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
                <!--end::Select-->
                  
              </div>
              <!--end::Col-->

            </div>
            <!--end::Input group-->



            

            <!-- Description -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
                <label class="fs-6 fw-semibold mb-2" for>Description of Action</label>

                <!-- <textarea v-model="form.description" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('message') }" rows="3" name="description"
                    placeholder="Description">
                </textarea> -->

                <textarea rows="3" v-model="form.Description" placeholder="Description" class="form-control form-control-solid"
                  :class="{
                    'is-invalid': form.errors.has('Description'),
                  }">
                </textarea>


                <has-error :form="form" field="Description"></has-error>

            </div>
            <!--end::Input group-->





             <!-- Status & Rating -->
            <!--begin::Input group-->
            <div class="row mb-5">
              <!--begin::Col-->
              <div class="col-md-6 fv-row">
                   <!--begin::Label-->
                   <label class="fs-5 fw-semibold mb-2">Status</label>
                   <!--end::Label-->
                  
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

              </div>
              <!--end::Col-->

              <!--begin::Col-->
              <div class="col-md-6 fv-row">
                
                <label class="fs-5 fw-semibold mb-2" for>Rating</label>

                <!--start::Select-->
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

                <has-error
                  :form="form"
                  field="Rating"
                ></has-error>
                <!--end::Select-->
                  
              </div>
              <!--end::Col-->

            </div>
            <!--end::Input group-->



            <!-- Date -->
            <div class="row mb-5">

              <div class="col-md-6 fv-row">
                <label class="fs-5 fw-semibold mb-2" for>Due Date</label>
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
              </div>

            </div>





            <!-- <div class="form-group mt-1"> -->
             <!-- start:Select Risk Source-->
              <div class="row mb-5 col-xl-12">

                <!--begin::Input group-->
                <div class="fv-row"  >
                  <!-- style="background-color: #eff8ff;" -->
                  <!-- f8fcff -->
                  <!-- eff8ff  -->
                  <!-- edf7ff -->
                  <!-- bcd5ea -->
                  <!-- F3F3F3 #FAFAFA-->

                  <!-- begin:card-header -->
                  <!-- <div class="card-header"> -->
                    <span class="badge badge-light p-6 mb-6 mt-3  col-md-6 " style="font-size:medium">Select Risk Sources To Treat</span>
                  <!-- </div> -->
                  <!-- end:card-header -->

                  <!--begin::Tables Widget 3-->
                  <div class="card card-xl-stretch mb-5">

                  
                      <!--begin::Body-->
                      <div class="card-body py-3">
                          <!--begin::Table container-->
                          <div class="table-responsive">
                              <!--begin::Table-->
                              <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

                                  <!--begin::Table head-->
                                  <!-- <thead> -->
                                      <!-- <tr class="fw-bolder text-muted"> -->
                                          <!-- <th style="width:10%">Ref</th> -->
                                          <!-- <th style="width:70%">Risk Event</th> -->
                                        
                                      <!-- </tr> -->
                                          
                                  <!-- </thead> -->
                                  <!--end::Table head-->

                                  <tbody>
                                    <tr
                                      v-for="mode in riskcauses"
                                      :key="mode.id"
                                    >
                                      <td>
                                        <input
                                          type="checkbox"
                                          :value="mode.id"
                                          v-model="form.selectedCauses"
                                        />
                                      </td>
                                      <td>{{ mode.Name }}</td>
                                    </tr>
                                  </tbody>

                              </table>
                              <!--end::Table-->
                          </div>
                          <!--end::Table container-->
                      </div>
                      <!--begin::Body-->
                  </div>
                  <!--end::Tables Widget 3-->


                  <!--start:Table  -->
                 <!-- <table class="table table-bordered table-hover table-sm col-md-11 mt-2"> -->
                    <!-- <thead class="thead-light">
                      <tr class="bg-info">
                        <td colspan="2"><b>Select Risk Sources To Treat</b></td>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Name</th>
                      </tr>
                    </thead> -->
                    <!-- <tbody>
                      <tr
                        v-for="mode in riskcauses"
                        :key="mode.id"
                      >
                        <td>
                          <input
                            type="checkbox"
                            :value="mode.id"
                            v-model="form.selectedCauses"
                          />
                        </td>
                        <td>{{ mode.Name }}</td>
                      </tr>
                    </tbody>
                  </table> -->
                  <!-- end:Table -->

                </div>
                <!--end::Input group-->

              </div>
             <!-- end:Select Risk Source-->
            <!-- </div> -->




          <!-- <div class="modal-body"> -->
          
            <!-- <div class="form-row"> -->

              <!-- <div class="form-group col-md-6">
                <label for>Name of action</label>
                <input
                  v-model="form.Name"
                  type="text"
                  placeholder="Name of Action"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
              </div> -->

              <!-- <div class="form-group col-md-6">
                <label for>Description of Action</label>
                <textarea
                  rows="3"
                  v-model="form.Description"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('Description'),
                  }"
                ></textarea> -->

                <!-- <has-error
                  :form="form"
                  field="Description"
                ></has-error> -->
              <!-- </div> -->

            <!-- </div> -->


            <!-- start: form-group -->









          <!-- <div class="form-row"> 
               <div class="form-group col-md-3">
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

                <has-error
                  :form="form"
                  field="Rating"
                ></has-error>
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

                  <has-error
                    :form="form"
                    field="DueDate"
                  ></has-error>
              </div> -->

              <!-- <div class="form-group col-md-6">
                <label for>Risk Event</label>
                <input
                  v-model="RName"
                  type="text"
                  readonly
                  name="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('BName') }"
                />
              </div> -->




              <!-- start: (Select Risk Sources To Treat) Table -->
              <!-- <table class="table table-bordered table-hover table-sm col-md-6 mt-2">
                <thead class="thead-light">
                  <tr class="bg-info">
                    <td colspan="2"><b>Select Risk Sources To Treat</b></td>
                  </tr>
                  <tr>
                    <th></th>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="mode in riskcauses"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        v-model="form.selectedCauses"
                      />
                    </td>
                    <td>{{ mode.Name }}</td>
                  </tr>
                </tbody>
              </table> -->
              <!-- end: (Select Risk Sources To Treat) Table -->


              
              <!-- </div> -->
              <!-- end: form-group -->
              <div class="row mb-5 col-xl-12">

                <!--begin::Input group-->
                <div class="fv-row"  >

                  <span class="badge badge-light p-6 mb-6 col-md-6 " style="font-size:medium">Select Supervisor</span>

                  <!--begin::Header-->
                    <!-- <div class="card-header border-0 pt-5"> -->
                      
                          <!--begin::Col-->
                          <div class="col-md-10 fv-row mb-5">

                            <!-- <form> -->

                                <!--end::Label-->
                                <!-- <h6 class="fs-5 fw-bolder mb-2">Select Business Unit</h6> -->
                                <!--end::Label-->

                                <!-- <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Select Business Unit</span> -->
                                    <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span> -->
                                <!-- </h3> -->
                        
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
                            <!-- </form> -->
                            <!--end::Select-->
                            
                          </div>
                          <!--end::Col-->

                    <!-- </div> -->
                  <!--end::Header-->

                </div>
              </div>

              <!-- start: form row -->
              <!-- <div class="form-row">
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
                </div> -->


              <!-- begin:card (header)-->
              <div class="card mb-5 mt-2">

                <!-- begin:card-header -->
                <div class="card-header align-items-center bg-light">
                  <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;">User Assignments</h3>

                  <div class="card-tools align-items-center ">
       
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
             
                      <!--begin::Primary button-->
                        <a href="#" @click.prevent="showModalUsers"
                          class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                          Select Users        
                        </a>
                      <!--end::Secondary button-->

                    </div>
                    <!--end::Actions-->

                  </div>

                </div>
                <!-- end:card-header -->

              </div>
              <!-- end:card (header)-->

              <!-- start:col -->
              <!-- <div class=" col"> -->

                 <!--begin::Tables Widget 3-->
                <div class="card card-xl-stretch mb-5">
                    <!--begin::Body-->
                    <!-- <div class="card-body py-3"> -->
                      <!--begin::Table container-->
                      <!-- <div class="table-responsive"> -->


                        <!--begin::Table-->
                        <table class="table table-bordered table-hover mt-2">
                          <tbody>
                            <tr
                              v-for="mode in  selectedAssignments"
                              :key="mode.id"
                            >

                              <td style="color: #258c37;" class="fw-bold p-5">{{ mode.Fname + " " + mode.Lname }}</td>
                              <td>
                                <a
                                  href="#"
                                  @click.prevent="deleteUser(mode.id)"
                                >
                                  <i class="fa fa-trash red"></i>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      <!-- </div> -->
                      <!--end:Table container-->

                    <!-- </div> -->
                    <!--end::Body-->

              </div>
              <!--end:Tables Widget 3-->

            <!-- 
              </div> -->
              <!-- end:col -->

              <!-- </div>  -->
              <!-- end: form row -->
            <!-- </div> -->

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Save</button>
          </div>
      </div>
    </div>
  </form>

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
import ActionTrackingToolbar from './components/ActionTrackingToolbar.vue'

export default {
  name: 'ActionTrackingCreate',

  data() {
    return {
      RiskNameData:'',
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
  props:['riskName'],
  components: {
    Datepicker, ActionTrackingToolbar
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
      this.form.selectedAssignments = this.selectedAssignments
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
    loadRisk() {
      axios.get('/api/risks/' + localStorage.risk_id).then((res) => {
        this.BName = res.data.ResponseData.bunit.Name
        this.RName = res.data.ResponseData.item.Name
      })
    },
    loadCausesEffects() {
      axios
        .get('/api/getCausesEffects', {
          params: {
            RiskID: localStorage.risk_id,
            isForAction: 1
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskcauses = res.data.ResponseData.causes
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
    }
  },
  created() {
    this.loadUsers()
    this.loadCausesEffects()
    this.loadCategory()
    this.loadRisk()
    // this.RiskNameData=this.riskName
  }
}
</script>
