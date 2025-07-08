<template>

    <!--begin::Contact-->
    <div class="card" style="margin-left: 10px;">
        <!--begin::Body-->
        <div class="card-body p-lg-17">
          
            <!--begin::Row-->
            <div class="row mb-3">
                <!--begin::Col-->
                <div class="pe-lg-10">
                    <!--begin::Form-->
                        <!-- id="kt_contact_form" -->
                    <form @submit.prevent="createData()" class="form mb-15" method="post" >
                        <h1 class="fw-bold text-dark mb-9">Register RCI</h1>

                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2" for>Name</label>
                                <!--end::Label-->
                                   
                                <!--begin::Input-->
                                <input v-model="form.Name" name="name" type="text" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('Name')}" placeholder="Name"
                                 />
                                <!--end::Input-->

                                <!--begin: Error -->
                                <has-error
                                :form="form"
                                field="Name"></has-error>
                                <!--end Error -->

                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Scale Group</label>
                                <!--end::Label-->

                                <!--end::Select-->
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
                                <!--end::Select-->
                                
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-10 fv-row">
                            <label class="fs-6 fw-semibold mb-2" for>Description</label>

                            <textarea v-model="form.description" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('message') }" rows="3" name="description"
                                placeholder="Description">
                            </textarea>

                            <has-error :form="form" field="description"></has-error>

                        </div>
                        <!--end::Input group-->


                           <!--begin::Input group-->
                           <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2" for>Category</label>
                                <!--end::Label-->
                                   
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
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Weight</label>
                                <!--end::Label-->


                                 <!--begin::Input-->
                                 <input  v-model="form.Weight"  type="number"  class="form-control form-control-solid"  :class="{ 'is-invalid': form.errors.has('Weight') }" placeholder="weight"
                                 />
                                <!--end::Input-->
                               
                              <has-error
                                :form="form"
                                field="Name"
                              ></has-error>
                                
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->



                           <!--begin::Input group-->
                           <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2" for>Frequency</label>
                                <!--end::Label-->
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
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="fs-5 fw-semibold mb-2">Start Period</label>
                                <!--end::Label-->

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
                            <!--end::Col-->

                        </div>
                        <!--end::Input group-->


                      

                          <!--begin::Input group-->
                          <div class="d-flex flex-column mb-5 row ">
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Data Type</label>
                                <!--end::Label-->

                                <select
                                    v-model="form.DataType"
                                    class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('DataType') }">
                                    <option value="1">Numbers</option>
                                    <option value="2">Percentage</option>
                                </select>

                                <has-error
                                    :form="form"
                                    field="DataType">
                                </has-error>

                            </div>

                        </div>
                        <!--end::Input group-->


                        <div class="row">

                            
           
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Lowwer Limit</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input v-model="form.LowerLimit" type="number" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('LowerLimit') }" placeholder="Lower Limit" name="subject" />
                                <!--end::Input-->

                                <has-error
                                    :form="form"
                                    field="Name">
                                </has-error>
                            </div>
                            <!--end::Input group-->



                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Green / Amber</label>
                                <!--end::Label-->

                        
                                <!--begin::Input-->
                                <input v-model="form.GreenAmber" type="number" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('GreenAmber') }" placeholder="Green/Amber"  />
                                <!--end::Input-->

                                
                                <has-error
                                    :form="form"
                                    field="GreenAmber">
                                </has-error>

                            </div>
                            <!--end::Input group-->
                            
                           
                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Amber / Red</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input v-model="form.AmberRed" type="number" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('AmberRed') }" placeholder="Amber/Red" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            

                             <!--begin::Input group-->
                             <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Upper Limit</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input v-model="form.UpperLimit" type="number" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('UpperLimit') }" placeholder="Upper Limit" />
                                <!--end::Input-->

                            </div>
                            <!--end::Input group-->
                            


                        </div>
                        <!-- end: row -->
                       

                        <div class="d-flex flex-column mb-5 fv-row">

                            <div class="form-group col-md-6">

                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2" for>Assignments</label>
                                <!--end::Label-->

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
                                
                                        <input v-model="form.selectedAssignments" type="checkbox" :value="mode.id"  />

                                      </td>

                                      <td>{{ mode.Fname + " " + mode.Lname }}</td>
                                    </tr>

                                  </tbody>

                                </table>
                            </div>
                
                        </div>



                        <!--begin::Submit-->
                        <button type="submit" class="btn btn-primary" >
                            <!-- id="kt_contact_submit_button" -->
                            <!--begin::Indicator label-->
                            <span class="indicator-label">
                                Create</span>
                            <!--end::Indicator label-->
                         </button>
                        <!--end::Submit-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col-md-6 ps-lg-10">
                    <!--begin::Map-->
                    <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px"></div>
                    <!--end::Map-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


        </div>
        <!--end::Body-->

    </div>
    <!--end::Contact-->

</template>

<script>


import Datepicker from 'vuejs-datepicker'
import moment from 'moment'

export default {
name:'NewRCIContent',
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
    StartDate: new Date(),
    ExpiredDate: '',
    DataType: '',
    LowerLimit: '',
    GreenAmber: '',
    AmberRed: '',
    UpperLimit: '',
    ObjType: 40,
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
Datepicker
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
        this.$router.push({ name: 'AllKRIs' })
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
}
},
created() {
this.loadUsers()
this.loadRiskEvents()
this.loadCategory()
}
}

</script>