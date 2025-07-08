<template>
    <div class="col-xl-12">
        <div class="card card-xl-stretch mb-5 mb-xl-12">
            <div class="card-header border-0 pt-5">
                <div class="col-md-6 fv-row">
                    <form>
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Select Business Unit</span>
                        </h3>

                        <select class="form-control" @change="loadData()" v-model="form.BunitID">
                            <option v-for="val in businessunits" :value="val.id" :key="val.id">
                                {{ val.Name }}
                            </option>
                        </select>
                    </form>
                </div>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th style="width:10%">Ref</th>
                                <th style="width:70%">Risk Event</th>
                                <th style="width:2%">I.C</th>
                                <th style="width:2%">I.L</th>
                                <th style="width:2%">I.R</th>
                                <th style="width:2%">C.C</th>
                                <th style="width:2%">L.C</th>
                                <th style="width:2%">R.C</th>
                                <th style="width:2%">R.L</th>
                                <th style="width:2%">R.R</th>
                                <th style="width:2%"></th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            <tr v-for="mode in alldata" :key="mode.id">
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" style="color: #258c37;" @click.prevent="moreDetails(mode.id)" class="fw-bold  text-hover-success fs-6">{{ mode.DocNum }}</a>
                                    </div>
                                </td>

                                <td>
                                    <a href="#" style="color: #258c37;" @click.prevent="moreDetails(mode.id)" class=" text-hover-success d-block fs-6"> {{ mode.item.Name }}</a>
                                </td>

                                <td>
                                    <span class="text-dark text-hover-success d-block fs-6">{{ mode.ic ?? 0 }}</span>
                                </td>

                                <td>
                                    <span class="text-dark text-hover-success d-block fs-6">{{ mode.il ?? 0 }}</span>
                                </td>

                                <td style="background-color:#ec0d0d" v-if="mode.ir > 15">{{ mode.ir ?? 0 }}</td>
                                <td style="background-color:#ffbf00" v-else-if="mode.ir > 4">{{ mode.ir ?? 0 }}</td>
                                <td style="background-color:#09f17d" v-else-if="mode.ir > 0 && mode.ir < 4">{{ mode.ir ?? 0 }}</td>
                                <td v-else-if="mode.ir == 0">{{ mode.ir ?? 0 }}</td>

                                <td>{{ mode.cc ?? 0 }}</td>
                                <td>{{ mode.cl ?? 0 }}</td>
                                <td>{{ mode.rc ?? 0 }}</td>
                                <td>{{ mode.rl ?? 0 }}</td>

                                <td style="background-color:#ec0d0d" v-if="mode.rc * mode.rl >= 15">{{ mode.rc * mode.rl ?? 0 }}</td>
                                <td style="background-color:#ffbf00" v-else-if="mode.rc * mode.rl > 4">{{ mode.rc * mode.rl ?? 0 }}</td>
                                <td style="background-color:#09f17d" v-else-if="mode.rc * mode.rl > 0 && mode.rc * mode.rl <= 4">{{ mode.rc * mode.rl ?? 0 }}</td>
                                <td v-else>{{ mode.rc * mode.rl }}</td>

                                <td>
                                    <a class="text-dark text-hover-danger d-block fs-6" href="#" @click.prevent="deleteRoute(mode.id)">
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
</template>

<script>
export default {
    name: 'IndexRiskAnalysisContent',
    data() {
        return {
            editmode: false,
            categories: {},
            alldata: {},
            counter: 1,
            businessunits: {},
            form: new Form({
                id: '',
                ObjType: 11,
                Name: '',
                BunitID: ''
            })
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        getResults(page = 1) {
            axios
                .get('/api/category?page=' + page, {
                    params: {
                        ObjType: this.form.ObjType
                    }
                })
                .then(response => {
                    this.categories = response.data
                })
        },

        loadData() {
            axios
                .get('/api/risks', {
                    params: {
                        ObjType: this.form.ObjType,
                        BunitID: this.form.BunitID
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData.data
                    } else {
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

        deleteRoute(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete('/api/category/' + id)
                        .then(() => {
                            swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                            Fire.$emit('AfterCreate')
                        })
                        .catch(() => {
                            swal.fire('Failed!', 'Something when wrong', 'warning')
                        })
                }
            })
        },
        moreDetails(id) {
            localStorage.clear()
            localStorage.setItem('risk_id', id)
            this.$router.push({ name: 'AnalyseRiskProfile' })
        },
        newAnalysis() {
            this.$router.push({ name: 'AnalyseRiskNew' })
        },

        loadBusinessUnits() {
            const token = this.getAuthToken()
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
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.businessunits = res.data.ResponseData.data
                    } else {
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
        manageHistory() {
            const token = this.getAuthToken()
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'Risk Analysis',
                    log: 'User visited to the Risk Analysis'
                },
                {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                }
            )
        }
    },
    created() {
        this.loadBusinessUnits()
        this.manageHistory()
    }
}
</script>
