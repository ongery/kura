<template>
    <div class="row mt-2">
        <div class="col-md-12">
            <div>
                <!--begin::Tables Widget 3-->
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <!--begin::Body-->
                    <div class="card-body py-3">
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
                                    <tr v-for="mode in alldata" :key="mode.id">
                                        <td>
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-success fw-bold  text-hover-success fs-6"
                                                    >{{ mode.Name }}
                                                    <i class="fa fa-edit blue"></i>
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="text-success text-hover-success d-block fs-6"> {{ mode.DueDate }}</span>
                                        </td>

                                        <td>
                                            <span href="#" class="text-dark text-hover-success d-block fs-6">{{ mode.supervisor.Fname }}</span>
                                        </td>

                                        <td>
                                            <span href="#" class="text-dark text-hover-success d-block fs-6">SuperVisor</span>
                                        </td>

                                        <td>
                                            <a class="text-dark text-hover-success d-block fs-6" href="#" @click.prevent="moreDetails(mode.id)">
                                                <i class="fa fa-edit blue"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="text-dark text-hover-success d-block fs-6" href="#" @click.prevent="deleteRoute(mode.id)">
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

                <!-- <div class="card card-body table-responsive p-0">
          <table class="table table-bordered table-hover table-sm">
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
          </table>
        </div> -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            showmode: '',
            alldata: {},
            incident_id: null,
            reports: {}
        }
    },
    watch: {
        '$route.params.id': {
            handler: 'setActionId',
            immediate: true
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        loadData() {
            const token = this.getAuthToken();
            axios
                .get('/api/actiontracking', {
                    params: {
                        o_k_r_i_id: this.incident_id
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })

                .then(res => {
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
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({
                        type: 'error',
                        title: 'Operation not successfull' + '\n' + e.response.data.message
                    })
                })
        },
        setActionId(val) {
            this.incident_id = val
        },
        addNew() {
            this.$router.push({ name: 'ActionCreate', params: { id: this.incident_id } })
        }
    },

    created() {
        this.loadData()
    }
}
</script>
