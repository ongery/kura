<template>
  <div>
    <div class="row mt-2">

      
        <!--begin::Toolbar-->
        <div class="app-toolbar py-3">
      
          <!--begin::Toolbar container-->
          <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                      
              <!--begin::Page title-->
              <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
                
                  <!--begin::Title-->
                  <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                    Questions
                  </h1>
                  <!--end::Title-->
      
                  <!--begin::Breadcrumb-->
                  <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                      <!--begin::Item-->
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
                      <!--end::Item-->


                      <!--begin::Item-->
                      <li class="breadcrumb-item text-muted">
      
                        <div class="flex items-center">
                        
                          <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                            Self Assessment 
                          </a>

                        </div>

                      </li>
                      <!--end::Item-->


                      <!--begin::Item-->
                      <li class="breadcrumb-item text-muted">
      
                        <div class="flex items-center">
                        -
                          <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                            Questions
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
                  <a href="#" @click.prevent="newModalCategory"
                    class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                    Add Category        
                  </a>
                <!--end::Secondary button-->

                <!--begin::Primary button-->
                  <a href="#" @click.prevent="newModal"
                    class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                    Add Question        
                  </a>
                <!--end::Secondary button-->

              </div>
              <!--end::Actions-->
      
          </div>
          <!--end::Toolbar container-->
      
        </div>
        <!--end::Toolbar-->                     


      <div class="col-md-12">

        <div>


          <!-- <div class="card-header">
            <h3 class="card-title">Questions</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
                @click="newModalCategory"
              >
                Add Category
                <i class="fas fa-plus"></i>
              </button>
              <button
                class="btn btn-success btn-sm"
                @click="newModal"
              >
                Add Question
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

                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                        
                          <!--begin::Col-->
                          <div class="col-md-6 fv-row">

                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 text-muted mb-1" style="margin-left: -30px;">Details</span>
                            </h3>
                                  
                          </div>
                          <!--end::Col-->

                        </div>
                        <!--end::Header-->

                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                            <thead class="fw-bolder text-muted">
                              <tr>
                                <th>Category</th>
                                <th>Question</th>
                                <th></th>
                              </tr>
                            </thead>

                            <!--begin::Table body-->
                            <tbody>

                              <tr  v-for="mode in questions" :key="mode.id">

                                <td>

                                  {{ mode.category }}
              
                                </td>

                                <td>{{ mode.question }}</td>
              
                                <td>
                                  <a
                                    href="#"
                                    @click="moreDetails(mode.id)"
                                  >
                                    <i>Click to view Risks/Opportunities</i>
                                  </a>
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
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">

                <tr>
                  <th>Category</th>
                  <th>Questions</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in questions"
                  :key="mode.id"
                >
                  <td>

                    {{ mode.description }}

                  </td>
                  <td>{{ mode.question }}</td>

                  <td>
                    <a
                      href="#"
                      @click="moreDetails(mode.id)"
                    >
                      <i>Click to view Risks/Opportunities</i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div> -->


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
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >New Question</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateDataQuestion() : createDataQuestion()">
            <div class="modal-body">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <label>Select Category</label>
                  <select
                    class="form-control"
                    v-model="form.category_id"
                  >
                    <option
                      v-for="val in categories"
                      :value="val.id"
                      :key="val.id"
                    >
                      {{ val.Name }}
                      
                    </option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for>Question</label>
                  <input
                    v-model="form.question"
                    type="text"
                    placeholder="Question"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('question') }"
                  />
                  <has-error
                    :form="form"
                    field="question"
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
    <!-- Modal -->





    <div
      class="modal fade"
      id="addNewCategory"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addNewLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5
              class="modal-title"
              id="addNewLabel"
            >New Category</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="createDataCategory()">
            <div class="modal-body">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <label for>Name</label>
                  <input
                    v-model="form.Name"
                    type="text"
                    placeholder="Name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('Name') }"
                  />

                  <!-- Get Category -->
                  <!-- <input v-model="form.category_id" type="hidden" value=""> -->

                  <has-error
                    :form="form"
                    field="description"
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
      questions: {},
      alldata: {},
      counter: 1,
      businessunits: {},
      form: new Form({
        id: '',
        ObjType: 26,
        question: '',
        category_id: '',
        category: '',
        CategoryObjType: 1,
        RiskLevelID: '',
        BunitID: '',
        Name: ''
      })
    }
  },
  methods: {
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
        .get('/api/risklibrarysetup', {
          params: {
            ObjType: this.form.ObjType,
            BunitID: this.form.BunitID
          }
        })
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.alldata = res.data.ResponseData.data
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

    createDataQuestion() {
      this.$Progress.start()
      this.form
        .post('/api/sa_questions')
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

    createDataCategory() {
      this.$Progress.start()
      this.form
        .post('/api/sa_category')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNewCategory').modal('hide')
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

    newModalCategory() {
      this.editmode = false
      this.form.reset()
      $('#addNewCategory').modal('show')
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
    loadCategory() {
      axios
        .get('/api/sa_category')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.categories = res.data.ResponseData
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
    loadQuestion() {
      axios
        .get('/api/sa_questions')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.questions = res.data.ResponseData
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
    this.loadCategory()
    this.loadQuestion()
    // this.loadData()
    Fire.$on('AfterCreate', () => {
      this.loadCategory()
    })
  }
}
</script>
