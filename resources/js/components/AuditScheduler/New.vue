<template>
  <div class=" row mt-2">

    <AuditToolbar :title="'New Audit'"></AuditToolbar>

    <!-- <div class="card-header">
      <h3 class="card-title">New Audit</h3>
      <div class="card-tools">
        <button
          class="btn btn-info btn-sm"
          @click="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Back
        </button>
      </div>

    </div> -->
    <!-- /.card-header -->








    
  <form @submit.prevent="createData()">


                
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
              <h1 class="pb-3 fw-bold text-dark text" for>Audit Title</h1>
            <!-- end:card-header -->

              <input
                v-model="form.Title"
                type="text"
                placeholder="Title"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Title') }"
              />
              <has-error
                :form="form"
                field="Title"
              ></has-error>

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

        <!-- Business Unit-->
        <!--begin::Input group-->
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-6 fv-row">
                  <!--begin::Label-->
                  <label class="fs-5 fw-semibold mb-2">Business Unit</label>
                  <!--end::Label-->
                
                  <!--begin::Input-->
                  <select
                    class="form-control"
                    @change="loadData()"
                    v-model="form.BunitID"
                    :class="{ 'is-invalid': form.errors.has('BunitID') }"
                  >
                    <option
                      v-for="val in businessunits"
                      :value="val.id"
                      :key="val.id"
                    >
                      {{ val.Name }}
                    </option>
                  </select>

                  <has-error
                    :form="form"
                    field="BunitID"
                  ></has-error>
              
                <!--end::Input-->

            </div>
            <!--end::Col-->

        </div>




        <!-- Business Unit & Category-->
        <!--begin::Input group-->
        <div class="row mb-5">

          <!--begin::Col-->
          <div class="col-md-6 fv-row">
                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2">Audit From Date</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                  <datepicker
                  :bootstrap-styling="true"
                  v-model="form.StartDate"
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


            <!--begin::Col-->
            <div class="col-md-6 fv-row">
              <!--begin::Label-->
              <label class="fs-5 fw-semibold mb-2">Audit To Date</label>
              <!--end::Label-->
            
              <!--begin::Input-->
              <datepicker
                  :bootstrap-styling="true"
                  v-model="form.EndDate"
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


        
          <!-- Objective -->
          <!--begin::Input group-->
          <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
            <label class="fs-6 fw-semibold mb-2" for>Objective</label>
            <textarea
              rows="3"
              v-model="form.Objective"
              placeholder="Audit Objective"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('Objective') }"
            ></textarea>
            <has-error
              :form="form"
              field="Objective"
            ></has-error>
        </div>
        <!--end::Input group-->


        <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-6 " style="font-size:medium" >Auditors</a>

        
        
          <!-- Objective -->
          <!--begin::Input group-->
          <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
            <label class="fs-6 fw-semibold mb-2" for>Lead Auditor</label>
            <select
            class="form-control"
            v-model="form.LeadAuditor"
            :class="{ 'is-invalid': form.errors.has('LeadAuditor') }"
          >
            <option
              v-for="val in allusers"
              :value="val.id"
              :key="val.id"
            >
              <td>{{ val.full_name }}</td>

            </option>
          </select>
          <has-error
            :form="form"
            field="LeadAuditor"
          ></has-error>
          </div>
          <!--end::Input group-->




        <div class="row mb-5">

            <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-8 " style="font-size:medium" >Selected Auditors</a>
                  
            <div class="col-md-4 mt-8">
              <!--begin::Primary button-->
              <a href="#" @click.prevent="showModalUsers"
                class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                Select Auditors     
              </a>
              <!--end::Secondary button-->
            </div>
        </div>


        <div class="form-group col-md-10">
          <!-- <label for>Assignments</label> -->
          <table class="table table-bordered table-hover mt-2">
            
            <!-- <thead class="thead-light">
              <tr>
                <th></th>
                <th>Name</th>
              </tr>
            </thead> -->
            <tbody>
              <tr
                v-for="mode in  selectedAssignments"
                :key="mode.id"
              >

                <td>{{ mode.Fname + " " + mode.Lname }}</td>
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
        </div>


    </div>

    <div class="modal-footer">

      <button
        type="submit"
        class="btn btn-primary"
      >
        Create
      </button>
    </div>

  </div>

</form>














<!-- 
    <div class="card card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createData()">
          <div class="modal-body">
            <div class="form-row">

              <div class="form-group col-md-6">
                <label>Business Unit</label>
                <select
                  class="form-control"
                  @change="loadData()"
                  v-model="form.BunitID"
                  :class="{ 'is-invalid': form.errors.has('BunitID') }"
                >
                  <option
                    v-for="val in businessunits"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>

                <has-error
                  :form="form"
                  field="BunitID"
                ></has-error>
              </div>

              <div class="form-group col-md-6">
                <label for>Audit Title</label>
                <input
                  v-model="form.Title"
                  type="text"
                  placeholder="Title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Title') }"
                />
                <has-error
                  :form="form"
                  field="Title"
                ></has-error>
              </div>

              <div class="form-group col-md-6">
                <label for>Audit From Date</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.StartDate"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>

              <div class="form-group col-md-6">
                <label for>Audit To Date</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.EndDate"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div>

              <div class="form-group col-md-6">
                <label for>Objective</label>
                <textarea
                  rows="3"
                  v-model="form.Objective"
                  placeholder="Audit Objective"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Objective') }"
                ></textarea>
                <has-error
                  :form="form"
                  field="Objective"
                ></has-error>
              </div>

              <div class="form-group col-md-6">
                <label>Lead Auditor</label>
                <select
                  class="form-control"
                  v-model="form.LeadAuditor"
                  :class="{ 'is-invalid': form.errors.has('LeadAuditor') }"
                >
                  <option
                    v-for="val in allusers"
                    :value="val.id"
                    :key="val.id"
                  >
                    <td>{{ val.full_name }}</td>

                  </option>
                </select>
                <has-error
                  :form="form"
                  field="LeadAuditor"
                ></has-error>
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col-md-6">
                <a
                  class="btn btn-success btn-sm"
                  @click="showModalUsers"
                >
                  Select Auditors
                  <i class="fas fa-plus"></i>
                </a>
                <table class="table table-bordered table-hover table-sm col-md-12 mt-2">
                  <thead class="thead-light">
                    <tr>
                      <td colspan="2">Selected Auditors</td>

                    </tr>
                    <tr>
                      <th>Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="mode in  selectedAssignments"
                      :key="mode.id"
                    >

                      <td>{{ mode.Fname + " " + mode.Lname }}</td>
                      <td>
                        <a
                          href="#"
                          @click="deleteUser(mode.id)"
                        >
                          <i class="fa fa-trash red"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          <div class="modal-footer">

            <button
              type="submit"
              class="btn btn-success"
            >
              Create
            </button>
          </div>
        </form>
      </div>
    </div> -->


    
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
                  <tr>
                    <td colspan="2">
                      <input
                        v-model="form.search"
                        type="text"
                        name="name"
                        @keyup="searchItem()"
                        placeholder="Search Users"
                        class="form-control"
                      />
                    </td>
                  </tr>
                  <tr
                    v-for="mode in filtereduserForAssigment"
                    :key="mode.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        :value="mode.id"
                        v-model="mode.isSelected"
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
import AuditToolbar from './components/AuditToolbar'

export default {
  data() {
    return {
      businessunits: [],
      allusers: [],
      businessunits: {},
      selectedAssignments: [],
      form: new Form({
        id: '',
        BunitID: '',
        Title: '',
        Description: 'N/A',
        StartDate: '',
        EndDate: '',
        Objective: '',
        LeadAuditor: '',
        StartDate: new Date(),
        EndDate: '',
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
    Datepicker, AuditToolbar
  },

  methods: {
    getAuthToken() { return localStorage.getItem('authToken'); },
    loadUsers() {
      axios
        .get('/api/user')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.allusers = res.data.ResponseData
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

    /**
     * Creating Risk
     */
    createData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.EndDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/audit-scheduler')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Created in successfully'
            })
            this.$router.push({ name: 'AuditScheduler' })
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
    },
    GoBack() {
      this.$router.back()
    }
  },
  computed: {
    filteredUserForHOD: function () {
      return this.churches.filter(function (e) {
        if (e.accountType == 0) {
          return e
        }
      })
    },

    filtereduserForAssigment: function () {
      return this.allusers.filter(function (e) {
        return e
      })
    }
  },
  created() {
    this.loadUsers()
    this.loadBusinessUnits()
  }
}
</script>
