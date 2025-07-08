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
                Create Employee 
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
                        Settings
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
    
                      <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                          Users
                        </a>

                      </div>

                    </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
    
                    <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        Create Employee
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






    <!-- <div class="card-header">
      <h3 class="card-title">
        <b>Create Employee</b>
      </h3>
      <div class="card-tools">
        <router-link to="/SystemUsers">
          <button class="btn btn-info btn-sm">
            <i class="fas fa-angle-double-left"></i>
            Go Back
          </button>
        </router-link>
      </div>
    </div> -->
    <!-- /.card-header -->



  

    <div class="row card-body m-1">

      <form @submit.prevent="createUser()">


                  
        <!--start: Header -->
        <div class="row card card-body  p-12 m-1">

          <!-- <h1 class="fw-bold text-muted text mb-1">Risk Event</h1> -->

          <!--start:Title -->
          <div class="form-group ml-6 mt-1">

            <div class="form-group mt-1">

              <!--begin::Input group-->
              <div class="card mb-5  mt-1"  >
        
                <!-- begin:card-header -->
                  <h1 class="pb-3 fw-bold text-dark text" >Reference</h1>
                <!-- end:card-header -->

                  <label for>Reference</label>
                  <input
                    v-model="form.Ref"
                    type="text"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('Ref') }"
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

            <!-- FName & LName -->
            <!--begin::Input group-->
            <div class="row mb-5">

                <!--begin::Col-->
                <div class="col-md-6 fv-row">

                      <!--begin::Label-->
                      <label class="fs-5 fw-semibold mb-2" for>First Name</label>
                      <!--end::Label-->
                    
                      <!--begin::Input-->
                      <input
                        v-model="form.Fname"
                        type="text"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('Fname') }"
                      />
                    <!--end::Input-->

                </div>
                <!--end::Col-->


                  <!--begin::Col-->
                  <div class="col-md-6 fv-row">

                    <!--begin::Label-->
                    <label class="fs-5 fw-semibold mb-2" for>Last Name</label>
                    <!--end::Label-->
                  
                    <!--begin::Input-->
                    <input
                      v-model="form.Lname"
                      type="text"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Lname') }"
                    />
                  <!--end::Input-->

              </div>
              <!--end::Col-->

            </div>


            <!-- Email & Mobile -->
            <!--begin::Input group-->
            <div class="row mb-5">

              <!--begin::Col-->
              <div class="col-md-6 fv-row">

                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2" for>Email</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                <input
                  v-model="form.email"
                  type="email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />                
              <!--end::Input-->

              </div>
              <!--end::Col-->
              <!--begin::Col-->
              <div class="col-md-6 fv-row">

                    <!--begin::Label-->
                    <label class="fs-5 fw-semibold mb-2" for>Mobile</label>
                    <!--end::Label-->
                  
                    <!--begin::Input-->
                    <input
                      v-model="form.Mobile"
                      type="text"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('Mobile') }"
                    />                  
                  <!--end::Input-->

              </div>
              <!--end::Col-->

            </div>


            
            <!-- Business Unit & Position -->
            <!--begin::Input group-->
            <div class="row mb-5">

              <!--begin::Col-->
              <div class="col-md-6 fv-row">

                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2" for>Business Unit</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                <select
                  class="form-control"
                  v-model="form.BunitID"
                  name="BunitID"
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
              <!--end::Input-->

              </div>
              <!--end::Col-->


              <!--begin::Col-->
              <div class="col-md-6 fv-row">

                <!--begin::Label-->
                <label class="fs-5 fw-semibold mb-2" for>Position</label>
                <!--end::Label-->
              
                <!--begin::Input-->
                  <select
                    class="form-control"
                    v-model="form.Position"
                    :class="{ 'is-invalid': form.errors.has('Position') }"
                  >
                    <option value="1">Kura User</option>
                  </select>               
                <!--end::Input-->

              </div>
              <!--end::Col-->

            </div>


          </div>

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Create</button>
          </div>


        </div>


      </form>

    </div>



    <!-- <div class="card-body table-responsive p-0">
      <div>
        <form @submit.prevent="createUser()">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Reference</label>
                <input
                  v-model="form.Ref"
                  type="text"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Ref') }"
                />
              </div>
              <div class="form-group col-md-4">
                <label for>Business Unit</label>
                <select
                  class="form-control"
                  v-model="form.BunitID"
                  name="BunitID"
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
              </div>

              <div class="form-group col-md-4">
                <label for>Position</label>
                <select
                  class="form-control"
                  v-model="form.Position"
                  :class="{ 'is-invalid': form.errors.has('Position') }"
                >
                  <option value="1">Kura User</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>First Name</label>
                <input
                  v-model="form.Fname"
                  type="text"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Fname') }"
                />
              </div>
              <div class="form-group col-md-4">
                <label for>Last Name</label>
                <input
                  v-model="form.Lname"
                  type="text"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Lname') }"
                />
              </div>
              <div class="form-group col-md-4">
                <label for>Mobile</label>
                <input
                  v-model="form.Mobile"
                  type="text"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Mobile') }"
                />
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Email</label>
                <input
                  v-model="form.email"
                  type="email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Create</button>
          </div>
        </form>
      </div>
    </div> -->



  </div>
</template>
<script>
export default {
  data() {
    return {
      businessunits: {},
      form: new Form({
        id: '',
        BunitID: '',
        Fname: '',
        Lname: '',
        Mobile: '',
        email: '',
        Position: ''
      })
    }
  },

  methods: { 
    getAuthToken() { return localStorage.getItem('authToken'); },
    GoBack() {
          this.$router.back()
        },
    createUser() {
      this.$Progress.start()
      this.form
        .post('/api/user')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.form.reset()
            toast.fire({
              type: 'success',
              title: 'User Created in successfully'
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
      const token = this.getAuthToken();
      axios
        .get('/api/businessunits', {
          params: {
            ObjType: 5
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
    this.loadCategory()
  }
}
</script>
