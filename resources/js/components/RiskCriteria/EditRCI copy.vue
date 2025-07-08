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
                  Edit {{this.objectName}} 
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
                          
                            <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                              Risk Criteria
                            </a>

                          </div>

                          </li>
                          <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">

                                <div class="flex items-center">
                                  -
                                    <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                      Edit {{this.objectName}}
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







    <!-- <div class="card-header">
      <h3 class="card-title">Edit {{this.objectName}}</h3>
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


    <div class="card card-body table-responsive p-0">
      <div>
        <form @submit.prevent="updateData()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for>Name</label>
                <input
                  v-model="form.Name"
                  type="text"
                  name="name"
                  placeholder="Name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Name') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>
              <div class="form-group col-md-6">
                <label for>Description</label>
                <textarea
                  rows="3"
                  v-model="form.description"
                  placeholder="Description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('message') }"
                ></textarea>
                <has-error
                  :form="form"
                  field="description"
                ></has-error>
              </div>
              <div class="form-group col-md-6">
                <label>Scale Group</label>
                <select
                  class="form-control"
                  v-model="form.o_i_t_m_id"
                  name="o_i_t_m_id"
                  :class="{ 'is-invalid': form.errors.has('o_i_t_m_id') }"
                >
                  <option
                    v-for="val in riskevents"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="o_i_t_m_id"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label>Category</label>
                <select
                  class="form-control"
                  v-model="form.CategoryID"
                  name="CategoryID"
                  :class="{ 'is-invalid': form.errors.has('CategoryID') }"
                >
                  <option
                    v-for="val in categories"
                    :value="val.id"
                    :key="val.id"
                  >
                    {{ val.Name }}
                  </option>
                </select>
                <has-error
                  :form="form"
                  field="CategoryID"
                ></has-error>
              </div>

              <div class="form-group col-md-3">
                <label for>Weight</label>
                <input
                  v-model="form.Weight"
                  type="number"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Weight') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Frequency</label>
                <select
                  name="status"
                  v-model="form.Frequency"
                  id="type"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Frequency') }"
                >
                  <option value="D">Daily</option>
                  <option value="W">Weekly</option>
                  <option value="M">Monthly</option>
                  <option value="Q">Quarterly</option>
                  <option value="S">Semi-Annually</option>
                  <option value="A">Annually</option>
                  <option value="O">On Demand</option>
                </select>
                <has-error
                  :form="form"
                  field="Frequency"
                ></has-error>
              </div>

              <div class="form-group col-md-3">
                <label for>Start of Period</label>
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
              <div class="form-group col-md-3">
                <label for>Data Type</label>
                <select
                  v-model="form.DataType"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('DataType') }"
                >
                  <option value="1">Numbers</option>
                  <option value="2">Percentage</option>
                </select>
                <has-error
                  :form="form"
                  field="DataType"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Lower Limit</label>
                <input
                  v-model="form.LowerLimit"
                  type="number"
                  placeholder="Lower Limit"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('LowerLimit') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Green/Amber</label>
                <input
                  v-model="form.GreenAmber"
                  type="number"
                  placeholder="Green/Amber"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('GreenAmber') }"
                />
                <has-error
                  :form="form"
                  field="GreenAmber"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Amber/Red</label>
                <input
                  v-model="form.AmberRed"
                  type="number"
                  placeholder="Amber/Red"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('AmberRed') }"
                />
                <has-error
                  :form="form"
                  field="AmberRed"
                ></has-error>
              </div>
              <div class="form-group col-md-3">
                <label for>Upper Limit</label>
                <input
                  v-model="form.UpperLimit"
                  type="number"
                  placeholder="Upper Limit"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('UpperLimit') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div>

              <div class="form-group col-md-6">
                <label for>Assignments</label>
                <table class="table table-bordered table-hover table-sm  mt-2">
                  <thead class="thead-light">
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
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">

            <button
              type="submit"
              class="btn btn-success"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import BackButton from './components/BackButton.vue'

export default {
  data() {
    return {
      categories: {},
      riskevents: {},
      users: {},
      ObjType: '',
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        CategoryID: '',
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: new Date(),
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: '',
        ObjType: '',
        CategoryObjType: 5,
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
  computed: {
    objectName() {
      let data = 'RCI'

      return data
    }
  },
  watch: {
    '$route.params.id': {
      handler: 'loadData',
      immediate: true
    },
    '$route.params.ObjType': {
      handler: 'setObjectType',
      immediate: true
    }
  },
  methods: {
    setObjectType(ObjType) {
      this.ObjType = ObjType
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

    /**
     * Creating Risk
     */
    updateData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.ExpiredDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .put('/api/kris-compliance/' + this.form.id)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Updated Successfully'
            })

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

    loadRiskEvents() {
      axios
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: 10
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.riskevents = res.data.ResponseData.data
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
    },
    loadData(val) {
      console.log(val, 'sadfasd')
      if (val) {
        axios
          .get('/api/kris-compliance/' + val, {
            params: {
              forEdit: true
            }
          })
          .then((res) => {
            this.form.fill(res.data.ResponseData)
          })
      }
    }
  },
  created() {
    this.loadUsers()
    this.loadRiskEvents()
    this.loadCategory()
  }
}
</script>
