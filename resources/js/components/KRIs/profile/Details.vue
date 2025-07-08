<template>
  <div class="row mt-2">
    <!-- <div class="card-header">
      <h3 class="card-title">{{this.pageTitle}}</h3>
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
              <h1 class="pb-3 fw-bold text-dark text" >Risk Event</h1>
            <!-- end:card-header -->
                <input
                v-model="riskEvent"
                type="text"
                name="name"
                readonly
                class="form-control"
              />
              <has-error
                :form="form"
                field="description"
              ></has-error>
          </div>
          <!--end::Input group-->

        </div>

      </div>
      <!--end:Title -->

    </div>
    <!--end: Header -->




    
    <div class="row card card-body p-12 m-1">

      <h1 class="fw-bold text-dark text mb-9">Details</h1>

             <!-- Name -->
           <!--begin::Input group-->
           <div class="row mb-5">
             <!--begin::Col-->
             <div class="col-md-6 fv-row">
                  <!--begin::Label-->
                  <label class="fs-5 fw-semibold mb-2">Name</label>
                  <!--end::Label-->
                 
                  <!--begin::Input-->
                  <input
                  v-model="this.kris.Name"
                  type="text"
                  readonly
                  placeholder="Name"
                  class="form-control"
                />
                <has-error
                :form="form"
                field="description"
              ></has-error>
                 <!--end::Input-->

             </div>
             <!--end::Col-->


           </div>
           <!--end::Input group-->


            <!-- Description -->
            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
              <label class="fs-6 fw-semibold mb-2" for>Description</label>

              <textarea
                rows="3"
                v-model="formDesc"
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


          <!-- <hr> -->



            <!-- Number Value -->
            <span class="badge badge-light p-6 mb-6 mt-3  col-md-6 " style="font-size:medium" v-if="this.form.isCompliance == 0">Number Value</span>

            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row"  v-if="this.form.isCompliance == 0">
              <!-- <label class="fs-6 fw-semibold mb-2" for>Number Value</label> -->
              
              <input
              v-model="form.Value"
              type="number"
              name="name"
              @keyup="valueChanged()"
              :style="{ 'background-color':bgColor }"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('Value') }"
            />
            <has-error
              :form="form"
              field="Name"
            ></has-error>
            </br>
            <p> 
              <span class="badge badge-btn badge-light"> Lower Limit : {{this.kris.LowerLimit}} </span> -  
              <span class="badge badge-btn badge-light"> Green/Amber Crossover : {{this.kris.GreenAmber}}</span>-
              <span class="badge badge-btn badge-light"> Amber/Red Crossover : {{this.kris.AmberRed}}</span> - 
              <span class="badge badge-btn badge-light"> Upper Limit : {{this.kris.UpperLimit}}</span>
            </p>
          </div>
          <!--end::Input group-->


              <!-- Value -->
          <span class="badge badge-light p-6 mb-6 mt-3  col-md-6 " style="font-size:medium" v-if="this.form.isCompliance == 1">Value</span>

            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row" v-if="this.form.isCompliance == 1">
              <!-- <label class="fs-6 fw-semibold mb-2" for>Value</label> -->
              
              <select
                type="number"
                v-model="form.Value"
                @change="valueKCIChanged()"
                class="form-control"
                :style="{ 'background-color':bgColor }"
                :class="{ 'is-invalid': form.errors.has('Value') }"
              >
                <option value="0">N/A</option>
                <option value="1">No</option>
                <option value="2">Yes</option>
              </select>
          </div>
          <!--end::Input group-->


          
            <!-- Reason -->
            <span class="badge badge-light p-6 mb-6 mt-3  col-md-6 " style="font-size:medium">Reason</span>

            <!--begin::Input group-->
            <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
              <!-- <label class="fs-6 fw-semibold mb-2" for>Reason</label> -->
              <textarea
              rows="3"
              v-model="form.desc"
              placeholder="Reason"
              class="form-control"
              :class="{ 'is-invalid': form.errors.has('message') }"
            ></textarea>
            <has-error
              :form="form"
              field="description"
            ></has-error>
          </div>
          <!--end::Input group-->



             <!-- begin:card (header)-->
             <div class="card mb-5 mt-2">

              <!-- begin:card-header -->
              <div class="card-header align-items-center bg-light">
                <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;">Attachments</h3>
  
                <div class="card-tools align-items-center ">
     
                  <!--begin::Actions-->
                  <div class="d-flex align-items-center gap-2 gap-lg-3">
           
                    <!--begin::Primary button-->
                      <a href="#" @click.prevent="newModal"
                        class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                        Add New Attachment        
                      </a>
                    <!--end::Secondary button-->
  
                  </div>
                  <!--end::Actions-->
  
                </div>
  
              </div>
              <!-- end:card-header -->
  
            </div>
            <!-- end:card (header)-->
  

            

           <!--begin::Tables Widget 3-->
           <div class="card card-xl-stretch mb-5">
            <!--begin::Body-->
          
                <!--begin::Table-->
                <table class="table table-bordered table-hover mt-2">
                  <thead class="thead-light">
                    <tr>
                      <th>Desciption</th>
                      <th>Downloads</th>
  
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="mode in attachments"
                      :key="mode.id"
                    >
  
                      <td>{{mode.description}}</td>
  
                      <td>
                        <a
                          :href="`/attachments/` + mode.id"
                          target="_blank"
                        >
                          <i
                            class="fa fa-download"
                            aria-hidden="true"
                          >Click to download</i>
  
                        </a>
                      </td>
  
                    </tr>
                  </tbody>
                </table>
              </div>
            <!-- </div> -->
                  
                    
  

      <!-- <div class="card-body "> -->
        <!-- <div class="modal-body"> -->
          <!-- <div class="form-row"> -->

            <!-- <div class="form-group col-md-6">
              <label for>Name</label>
              <textarea
                rows="2"
                v-model="this.kris.Name"
                placeholder="Name"
                readonly
                class="form-control"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div> -->

            <!-- <div class="form-group col-md-6">
              <label for>Description</label>
              <textarea
                rows="2"
                v-model="form.description"
                placeholder="Description"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('message') }"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div> -->

            <!-- <div class="form-group col-md-12">
              <label for>Risk Event</label>
              <input
                v-model="this.form.riskEventTitle"
                type="text"
                name="name"
                readonly
                class="form-control"
              />
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div> -->
          <!-- </div> -->


           <!-- <div class="form-row"> -->
           <!-- <div
              class="form-group col-md-12"
              v-if="this.form.isCompliance == 0"
            >
              <label for>Number Value</label>
              <input
                v-model="form.Value"
                type="number"
                name="name"
                @keyup="valueChanged()"
                :style="{ 'background-color':bgColor }"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('Value') }"
              />
              <has-error
                :form="form"
                field="Name"
              ></has-error>
              </br>
              <p>Lower Limit : {{this.kris.LowerLimit}} - Green/Amber Crossover : {{this.kris.GreenAmber}}-

                Amber/Red Crossover : {{this.kris.AmberRed}} - Upper Limit : {{this.kris.UpperLimit}}
              </p>
            </div> -->


            <!-- <div
              class="form-group col-md-12"
              v-if="this.form.isCompliance == 1"
            >
              <label for>Value</label>s
              <select
                type="number"
                v-model="form.Value"
                @change="valueKCIChanged()"
                class="form-control"
                :style="{ 'background-color':bgColor }"
                :class="{ 'is-invalid': form.errors.has('Value') }"
              >
                <option value="0">N/A</option>
                <option value="1">No</option>
                <option value="2">Yes</option>
              </select>
            </div> -->


            <!-- <div class="form-group col-md-12">
              <label for>Reason</label>
              <textarea
                rows="3"
                v-model="form.desc"
                placeholder="Reason"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('message') }"
              ></textarea>
              <has-error
                :form="form"
                field="description"
              ></has-error>
            </div> -->


          <!-- </div> -->

          <!-- <div class="card row mt-2"> -->
            <!-- <div class="card-header">
              <h3 class="card-title">Attachments</h3>
              <div class="card-tools">
                <a
                  class="btn btn-success btn-sm"
                  @click="newModal"
                >
                  Add New Attachment
                </a>
              </div>
            </div> -->
            <!-- /.card-header -->


            <!-- <div class="card-body table-responsive p-0">
              <table class="table table-bordered table-hover table-sm">
                <thead class="thead-light">
                  <tr>
                    <th>Desciption</th>
                    <th>Downloads</th>

                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="mode in attachments"
                    :key="mode.id"
                  >

                    <td>{{mode.description}}</td>

                    <td>
                      <a
                        :href="`/attachments/` + mode.id"
                        target="_blank"
                      >
                        <i
                          class="fa fa-download"
                          aria-hidden="true"
                        >Click to download</i>

                      </a>
                    </td>

                  </tr>
                </tbody>
              </table>
            </div> -->


          <!-- </div> -->
        <!-- </div> -->



        <div class="modal-footer">
          <button
            type="submit"
            class="btn btn-primary"
          >
            Save
          </button>
        </div>


    </div>
  </form>

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
              Work In Progress
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
          <form @submit.prevent="editmode ? updateCategory() :  createAttachment()">
            <div class="modal-body">

              <div class="form-group">
                <label for>Description</label>
                <textarea
                  rows="3"
                  v-model="description"
                  placeholder="Description"
                  class="form-control"
                  :class="{
                    'is-invalid': form.errors.has('description'),
                  }"
                ></textarea>
                <has-error
                  :form="form"
                  field="Description"
                ></has-error>
              </div>
              <div
                class="form-group col-md-12"
                v-show="!editmode"
              >
                <label>Select File only PDF</label>
                <input
                  class="form-control"
                  type="file"
                  name="records"
                  id="records"
                  required="required"
                />
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
      riskEvent:'',
      formDesc:'',
      id: null,
      showincome: false,
      editmode: false,
      projects: {},
      kris: {},
      bgColor: '',
      attachments: [],
      description: '',
      form: new Form({
        id: '',
        Name: '',
        description: '',
        Weight: '',
        Frequency: '',
        StartDate: '',
        ExpiredDate: '',
        DataType: '',
        Value: '',
        riskEventTitle: '',
        desc: '',
        isCompliance:''
      })
    }
  },
  methods: {
    loadDetails() {
      axios.get('/api/kris-compliance/' + localStorage.kricompliance_id).then((res) => {
        this.kris = res.data.ResponseData
        this.form.Value = res.data.ResponseData.kri1.Value
        this.form.desc = res.data.ResponseData.kri1.desc
        this.form.riskEventTitle = res.data.ResponseData.item.Name
        this.form.description = res.data.ResponseData.description
        this.riskEvent = res.data.ResponseData.item.Name
        this.formDesc = res.data.ResponseData.description
        localStorage.setItem('riskEventTitleProfileDetails',this.form.riskEventTitle)
      })
    },
    createData() {
      this.$Progress.start()
      this.form
        .post('/api/record-kris-compliance')
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
    valueChanged() {
      let LowerLimit = this.kris.LowerLimit
      let GreenAmber = this.kris.GreenAmber
      let AmberRed = this.kris.AmberRed
      let UpperLimit = this.kris.UpperLimit
      let totalValue = this.form.Value

      if (LowerLimit > UpperLimit) {
        if (totalValue >= GreenAmber) {
          this.bgColor = 'green'
        }

        if (totalValue > AmberRed && totalValue < GreenAmber) {
          this.bgColor = '#ffbf00'
        }

        if (totalValue < AmberRed) {
          this.bgColor = 'red'
        }
      }

      if (LowerLimit < UpperLimit) {
        if (totalValue >= LowerLimit) {
          this.bgColor = 'green'
        }

        if (totalValue >= GreenAmber) {
          this.bgColor = '#ffbf00'
        }
        if (totalValue > AmberRed) {
          this.bgColor = 'red'
        }
      }
    },
    valueKCIChanged() {
      let totalValue = this.form.Value

      if (totalValue == 0) {
        this.bgColor = 'grey'
      }
      if (totalValue == 1) {
        this.bgColor = 'red'
      }
      if (totalValue == 2) {
        this.bgColor = 'green'
      }
    },
    GoBack() {
      this.$router.back()
    },
    newModal() {
      this.editmode = false
      this.form.reset()
      $('#addNew').modal('show')
    },
    createAttachment() {
      let formData = new FormData()
      const fileInput = document.getElementById('records')
      formData.append('records', fileInput.files[0])
      formData.append('DocEntry', localStorage.kricompliance_id)
      formData.append('ObjType', this.kris.ObjType)
      formData.append('description', this.description)

      this.$Progress.start()
      axios
        .post('/api/attachment', formData)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created Successfully'
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
    loadAttachments() {
      axios
        .get('/api/attachment', {
          params: {
            DocEntry: localStorage.kricompliance_id
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.attachments = res.data.ResponseData
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
  computed: {

    pageTitle: function () {
      if (this.form.isCompliance == 1) {
        return 'KCI Details'
      }

      return 'KRI Details'
    }
  },
  created() {
    this.form.id = localStorage.kricompliance_id
    this.form.isCompliance = localStorage.isCompliance
    this.loadDetails()
    this.valueChanged()
    this.loadAttachments()

    Fire.$on('AfterCreate', () => {
      this.loadAttachments()
    })
  }
}
</script>
