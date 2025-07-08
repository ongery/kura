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
                Notifications
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
                        Notifications
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->

                  <!--begin::Item-->
                  <!-- <li class="breadcrumb-item text-muted">
    
                    <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        Create Employee
                      </a>

                    </div>

                  </li> -->
                <!--end::Item-->


              </ol>
              <!--end::Breadcrumb-->

          </div>
          <!--end::Page title-->


              
          <!--begin::Actions-->
          <!-- <div class="d-flex align-items-center gap-2 gap-lg-3"> -->
            
            <!--begin::Primary button-->
            <!-- <a @click="GoBack"
              class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
              Back        
            </a> -->
            <!--end::Secondary button-->

          <!-- </div> -->
          <!--end::Actions-->

      </div>
      <!--end::Toolbar container-->

    </div>
    <!--end::Toolbar-->   





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
                    <span class="card-label fw-bold fs-2 text-muted mb-1" style="margin-left: -30px;">Details</span>
                </h3>
                      
              </div>
              <!--end::Col-->
                                 
            </div>
            <!--end::Header-->

              <!--begin::Table-->
              <table class="table table-row-dashed table-row-gray-300 align-middle p-0">

                <thead class="fw-bolder text-muted">
                  <tr>
                    <th>Module</th>
                    <th>Can Access</th>
                    <th></th>
                  </tr>
                </thead>

                <!--begin::Table body-->
                <tbody>
                  <tr
                  v-for="data in notifications.data"
                  :key="data.id"
                >
                  <td> {{data.objecttype.DocumentName}}</td>

                  <td><b><a
                        style="color: #258c37;"
                        href="#"
                        @click.prevent="attestModal(data)"
                      >{{data.source.Name}}</a></b></td>

                  <td><a href="#">{{data.Description}}</a></td>
                  <td>{{data.created_at | fullDate}}</td>
                  <td>
                    <a
                      href="#"
                      @click.prevent="deleteNotification(data.id)"
                    >
                      <i class="fa fa-trash red"></i>
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





    <!-- <div class="col-md-12"> -->


      <!-- <div class="card card-primary card-outline"> -->
        <!-- <div class="card-header">
          <h3 class="card-title">NOTIFICATIONS</h3>
        </div> -->
        <!-- /.card-header -->



        <!-- <div class="card-body p-0">

          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <tbody>

                <tr
                  v-for="data in notifications.data"
                  :key="data.id"
                >
                  <td> {{data.objecttype.DocumentName}}</td>

                  <td><b><a
                        href="#"
                        @click="attestModal(data)"
                      >{{data.source.Name}}</a></b></td>

                  <td><a href="#">{{data.Description}}</a></td>
                  <td>{{data.created_at | fullDate}}</td>
                  <td>
                    <a
                      href="#"
                      @click="deleteNotification(data.id)"
                    >
                      <i class="fa fa-trash red"></i>
                    </a>
                  </td>
                </tr>

              </tbody>
            </table>

            <td colspan="2">
              <pagination
                :limit="5"
                :data="notifications"
                @pagination-change-page="getResults"
              ></pagination>
            </td>
          </div>
        </div> -->

      <!-- </div> -->
      <!-- /.card -->


    <!-- </div> -->
    <!-- end:col -->




    

  </div>
</template>


<script>
export default {
  data() {
    return {
      notifications: {},
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
    getResults(page = 1) {
      axios
        .get('/api/notifications?page=' + page)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.notifications = res.data.ResponseData
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
    loadData() {
      axios
        .get('/api/notifications')
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            this.notifications = res.data.ResponseData
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
    deleteNotification(id) {},
    attestModal(mode) {
      localStorage.clear()
      if (mode.ObjType == 17) {
        localStorage.setItem('isCompliance', 0)
      }
      if (mode.ObjType == 20) {
        localStorage.setItem('isCompliance', 1)
      }
      localStorage.setItem('kricompliance_id', mode.id)
      this.$router.push({ name: 'ItemProfile' })
    }
  },
  created() {
    this.loadData()
  }
}
</script>
