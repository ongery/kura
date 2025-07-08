<template>
  <div class="row mt-2">

    <div class="col-xl-12">

          <div class="card card-xl-stretch mb-5 col-xl-12" >
                      
            <!-- begin:card-header -->
              <div class="card-header align-items-center">
                <h3 class="card-title fw-bold text-gray-700" style="font-size:medium;">Details</h3>

                <div class="card-tools align-items-center ">

                  <!--begin::Actions-->
                  <div class="d-flex align-items-center gap-2 gap-lg-3">
          
                    <!--begin::Primary button-->
                      <a href="#" @click.prevent="addNew"
                        class="btn btn-sm fw-bold btn-success btn-active-color-dark" >
                      New Action       
                      </a>
                    <!--end::Secondary button-->

                  </div>
                  <!--end::Actions-->

                </div>

              </div>
            <!-- end:card-header -->

          </div>


          </div>
          <!-- end Header -->

          <!--begin::Col-->
          <div class="col-xl-12">
            <!--begin::Tables Widget 3-->
            <div class="mb-5 mb-xl-12">

                <!--begin::Header-->
                <!-- <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1 text-muted">Details</span>
                    </h3>
                </div> -->
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card card-body p-5">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                          
                            <thead>
                              <tr class="fw-bolder text-muted">
                                <th>Name</th>
                                <th>Due Date</th>
                                <th>To</th>
                                <th>Status</th>
                                <th></th>
                              </tr>
                            </thead>
                            <!--end::Table head-->


                            <!--begin::Table body-->
                            <tbody>
                
                                <tr  v-for="mode in alldata" :key="mode.id">
                                    
                                    <td>
                                        <div class="d-flex justify-content-start fw-bold  flex-column">
                                          <span style="color: #258c37;">{{ mode.Name }} </span>
                                        </div>
                                    </td>
    
    
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.DueDate }}</span>
                                    </td>
    
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.supervisor.Fname }}</span>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>

                                    <td>
                                      <span class="text-dark fw-bolder text-hover-success d-block fs-6">SuperVisor</span>
                                      <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                  </td>
                              
                                  <td>
                                      <a style="color: #258c37;" href="#" class="text-dark fw-bolder text-hover-success d-block fs-6"  @click.prevent="moreDetails(mode.id)">Edit
                                        <i class="fa fa-edit blue"></i>
                                      </a>
                                  </td>

                                  <td>
                                      <a style="color: #258c37;" href="#" class="text-dark fw-bolder text-hover-success d-block fs-6"  @click.prevent="deleteRoute(mode.id)">Delete
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
        </div>
        <!--end::Col-->
    






















    <!-- <div class="col-md-12"> -->


      <!-- <div class="card"> -->



        <!-- <div class="card-header">
          <h3 class="card-title">Improvement Action</h3>
          <div class="card-tools">
            <button
              class="btn btn-success btn-sm"
              @click="addNew"
            >
              New Action
            </button>
          </div>
        </div> -->
        <!-- /.card-header -->

        <!-- <div class="card-body table-responsive p-0"> -->
          <!-- <table class="table table-bordered table-hover table-sm">
            <thead class="thead-light">
              <tr>
                <th>Name</th>
                <th>Due Date</th>
                <th>To</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="mode in alldata"
                :key="mode.id"
              >
                <td>{{ mode.Name }}</td>
                <td>{{ mode.DueDate }}</td>
                <td>{{mode.supervisor.Fname}}</td>
                <td>SuperVisor</td>
                <td>
                  <a
                    href="#"
                    @click="moreDetails(mode.id)"
                  ><i class="fa fa-edit blue"></i></a>
                  <a
                    href="#"
                    @click="deleteRoute(mode.id)"
                  >
                    <i class="fa fa-trash red"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table> -->
        <!-- </div> -->


      <!-- </div> -->
      <!-- /.card -->


    <!-- </div> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      showmode: '',
      alldata: {},
      reports: {}
    }
  },
  methods: {
    loadData() {
      axios
        .get('/api/actiontracking', {
          params: {
            o_k_r_i_id: localStorage.kricompliance_id
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
    addNew() {
      this.$router.push({ name: 'KRITreatment' })
    }
  },
  created() {
    this.loadData()
  }
}
</script>
