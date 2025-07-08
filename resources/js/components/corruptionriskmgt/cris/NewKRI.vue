<template>
  <div class="row mt-2">

    <CrisToolbar :title="'New CRI'"></CrisToolbar>

    <!-- <div class="card-header">
      <h3 class="card-title">New CRI</h3>
    </div> -->






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
                <h1 class="fw-bold text-dark text mb-9">Risk Event</h1>
                <!-- <h1 class="pb-3 fw-bold text-dark text" for>Risk Event</h1> -->
              <!-- end:card-header -->

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
            <!--end::Input group-->

          </div>

        </div>
        <!--end:Title -->

      </div>
    <!--end: Header -->


    <div class="row card card-body p-12 m-1">

      <div>

        <h1 class="fw-bold text-dark text mb-9">Details</h1>

        <!-- Name-->
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
                name="name"
                placeholder="Name"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Name') }"
              />
              <has-error
                :form="form"
                field="Name"
              ></has-error>
              <!--end::Input-->
           </div>
           <!--end::Col-->


         </div>
         <!--end::Input group-->




          <!-- Description-->
          <!--begin::Input group-->
          <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
            <label class="fs-6 fw-semibold mb-2" for>Description</label>
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
        <!--end::Input group-->


        
        <!-- Start of Period & Frequency-->
         <!--begin::Input group-->
         <div class="row mb-5">

          <!--begin::Col-->
          <div class="col-md-6 fv-row">
             <!--begin::Label-->
             <label class="fs-5 fw-semibold mb-2">Start of Period</label>
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
            <label class="fs-5 fw-semibold mb-2">Frequency</label>
            <!--end::Label-->
            
            <!--begin::Input-->
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
            <!--end::Input-->
         </div>
         <!--end::Col-->


        </div>
        <!--end::Input group-->



          
        <!-- Data Type & Lower Limit-->
         <!--begin::Input group-->
         <div class="row mb-5">

          <!--begin::Col-->
          <div class="col-md-6 fv-row">
             <!--begin::Label-->
             <label class="fs-5 fw-semibold mb-2">Data Type</label>
             <!--end::Label-->
             
             <!--begin::Input-->
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
             <!--end::Input-->
          </div>
          <!--end::Col-->

          
          <!--begin::Col-->
          <div class="col-md-6 fv-row">
            <!--begin::Label-->
            <label class="fs-5 fw-semibold mb-2">Lower Limit</label>
            <!--end::Label-->
            
            <!--begin::Input-->
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
            <!--end::Input-->
         </div>
         <!--end::Col-->


        </div>
        <!--end::Input group-->



          
        <!-- Green/Amber & Amber/Red-->
         <!--begin::Input group-->
         <div class="row mb-5">

          <!--begin::Col-->
          <div class="col-md-6 fv-row">
             <!--begin::Label-->
             <label class="fs-5 fw-semibold mb-2">Green/Amber</label>
             <!--end::Label-->
             
             <!--begin::Input-->
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
             <!--end::Input-->
          </div>
          <!--end::Col-->

          
          <!--begin::Col-->
          <div class="col-md-6 fv-row">
            <!--begin::Label-->
            <label class="fs-5 fw-semibold mb-2">Amber/Red</label>
            <!--end::Label-->
            
            <!--begin::Input-->
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
            <!--end::Input-->
         </div>
         <!--end::Col-->


        </div>
        <!--end::Input group-->



          
        <!-- Upper Limit-->
         <!--begin::Input group-->
         <div class="row mb-5">

          <!--begin::Col-->
          <div class="col-md-6 fv-row">
             <!--begin::Label-->
             <label class="fs-5 fw-semibold mb-2">Upper Limit</label>
             <!--end::Label-->
             
             <!--begin::Input-->
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
             <!--end::Input-->
          </div>
          <!--end::Col-->

          
        </div>
        <!--end::Input group-->



        <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-6 " style="font-size:medium" >Assignments</a>

        

        
        <div class="form-group col-md-10">
          <!-- <label for>Assignments</label> -->
          <table class="table table-bordered table-hover mt-2">
            
            <thead class="fw-bolder text-muted">
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












    <!-- <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createData()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Risk Event</label>
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
              <div class="form-group col-md-8">
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
            <div class="form-row">

              <div class="form-group col-md-4">
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
              <div class="form-group col-md-4">
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
            </div>

            <div class="form-row">
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


  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import CrisToolbar from './components/CrisToolbar.vue'

export default {
  data() {
    return {
      categories: {},
      riskevents: {},
      users: {},
      form: new Form({
        id: '',
        o_i_t_m_id: '',
        CategoryID: '',
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        LowerLimit: '',
        GreenAmber: '',
        AmberRed: '',
        UpperLimit: '',
        ObjType: 36,
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
    Datepicker, CrisToolbar
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

    /**
     * Creating Risk
     */
    createData() {
      this.form.StartDate = moment(this.form.StartDate).format('YYYY-MM-DD')
      this.form.ExpiredDate = moment(this.form.ExpiredDate).format('YYYY-MM-DD')
      this.$Progress.start()
      this.form
        .post('/api/kris-compliance')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            toast.fire({
              type: 'success',
              title: 'Created in successfully'
            })
            // this.$router.push({ name: 'AllKRIs' })
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
            ObjType: 32
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
    }
  },
  created() {
    this.loadUsers()
    this.loadRiskEvents()
    this.loadCategory()
  }
}
</script>
