<template>
    <div>
        <div class=" mt-2">
            <RiskAnalysisToolbar :title="'Corporate Risks'"></RiskAnalysisToolbar>

            <!--begin::Col-->
            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                <thead class="fw-bolder text-muted">
                                    <tr>
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
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="mode in alldata" :key="mode.id">
                                        <td>
                                            <router-link :to="{ path: '/ERM/AnalyseCorporateRiskProfile/' + mode.id }">
                                                <span style="color: #258c37 ;">
                                                    {{ mode.DocNum }}
                                                </span>
                                            </router-link>
                                        </td>
                                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                            <router-link :to="{ path: '/ERM/AnalyseCorporateRiskProfile/' + mode.id }">
                                                <span style="color: #258c37 ;">
                                                    {{ mode.item.Name }}
                                                </span>
                                            </router-link>
                                        </td>

                                        <td>{{ mode.ic }}</td>
                                        <td>{{ mode.il }}</td>
                                        <td style="background-color:#ec0d0d" v-if="mode.ir > 15">{{ mode.ir }}</td>

                                        <td style="background-color:#ffbf00" v-else-if="mode.ir > 4">{{ mode.ir }}</td>

                                        <td style="background-color:#09f17d" v-else="mode.ir < 4">{{ mode.ir }}</td>
                                        <td>{{ mode.cc }}</td>
                                        <td>{{ mode.cl }}</td>
                                        <td>{{ mode.rc }}</td>
                                        <td>{{ mode.rl }}</td>
                                        <td style="background-color:#ec0d0d" v-if="mode.rc * mode.rl > 15">{{ mode.rc * mode.rl }}</td>

                                        <td style="background-color:#ffbf00" v-else-if="mode.rc * mode.rl > 4">{{ mode.rc * mode.rl }}</td>

                                        <td style="background-color:#09f17d" v-else="mode.rc * mode.rlr < 4">{{ mode.rc * mode.rl }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import RiskAnalysisToolbar from './components/RiskAnalysisToolbar.vue'

    export default {
        data() {
            return {
                editmode: false,
                categories: {},
                alldata: {},
                counter: 1,
                crAlldata: {},
                form: new Form({
                    id: '',
                    ObjType: 24,
                    Name: '',
                    BunitID: '',
                })
            }
        },
        components: { RiskAnalysisToolbar },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken'); },
            loadRiskEventData() {
                axios.get('/api/risks', {
                    params: {
                        ObjType: this.form.ObjType
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
                        this.form.delete('/api/category/' + id)
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
                this.$router.push({ name: 'AnalyseMailRiskProfile' })
            },
            newAnalysis() {
                this.$router.push({ name: 'AddNewMainRisk' })
            },
        },
        created() {
            this.loadRiskEventData()
        }
    }
</script>
