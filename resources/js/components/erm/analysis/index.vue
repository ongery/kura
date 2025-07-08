<template>
    <div>
        <div class=" mt-2">
            <RiskAnalysisToolbar :title="'Enterprise Risks'"></RiskAnalysisToolbar>

            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-header border-0 pt-5">
                        <div class="col-md-6 fv-row">
                            <form class="mb-10">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1"> Select Corporate Risk </span>
                                </h3>

                                <!-- <select class="form-control" v-model="form.CorporateRiskId" @change="loadRiskEventData()" multiple >
                                    <option value=""> -- </option>
                                    <option v-for="val in crAlldata" :value="val.id" :key="val.id">
                                        {{ val.Name }}
                                    </option>
                                </select> -->
                                <v-select
                                    v-model="form.CorporateRiskId"
                                    :options="crAlldata"
                                    :multiple="true"
                                    :close-on-select="true"
                                    :reduce="option => option.id"
                                    @input="loadRiskEventData"
                                    placeholder="Select Corporate Risks"
                                    label="Name"
                                    track-by="id"
                                >
                                    <template v-slot:noResult>
                                        <div>No options available.</div>
                                    </template>
                                </v-select>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- CORPORATE RISK CALCULATION -->
                <div class="card card-xl-stretch mb-5 mb-xl-12" v-if="showFilterTbl">
                    <div class="card-header" style="padding:1.7rem 2.25rem 1.2rem !important; min-height:40px;"><h4> Corporate Risk </h4></div>
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
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Loop through corporateRisk inside mode -->
                                    <tr v-for="risk in corporateRisk" :key="risk.id">
                                        <td>
                                            <router-link :to="{ path: '/ERM/AnalyseCorporateRiskProfile/' + risk.id }">
                                                <span style="color: #258c37;">
                                                    {{ risk.DocNum }}
                                                </span>
                                            </router-link>
                                        </td>
                                        <td style="word-wrap: break-word; min-width: 160px; max-width: 160px;">
                                            <router-link :to="{ path: '/ERM/AnalyseCorporateRiskProfile/' + risk.id }">
                                                <span style="color: #258c37;">
                                                    {{ risk.item.Name }}
                                                </span>
                                            </router-link>
                                        </td>

                                        <td>{{ risk.ic }}</td>
                                        <td>{{ risk.il }}</td>
                                        <td style="background-color:#ec0d0d" v-if="risk.ir > 15">{{ risk.ir }}</td>
                                        <td style="background-color:#ffbf00" v-else-if="risk.ir > 4">{{ risk.ir }}</td>
                                        <td style="background-color:#09f17d" v-else>{{ risk.ir }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ENTERPRISE RISK CALCULATION -->
                <div class="card card-xl-stretch mb-5 mb-xl-12" v-if="showFilterTbl">
                    <div class="card-header" style="padding:1.7rem 2.25rem 1.2rem !important; min-height:40px;"><h4> Enterprise Risk </h4></div>
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
                                            <router-link :to="{ path: '/ERM/AnalyseMainRisk/' + mode.id }">
                                                <span style="color: #258c37 ;">
                                                    {{ mode.DocNum }}
                                                </span>
                                            </router-link>
                                        </td>
                                        <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                            <router-link :to="{ path: '/ERM/AnalyseMainRisk/' + mode.id }">
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

                                        <td style="background-color:#09f17d" v-else="mode.rc * mode.rl < 4">{{ mode.rc * mode.rl }}</td>
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
    import RiskAnalysisToolbar from './components/RiskAnalysisToolbar.vue';
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

    export default {
        data() {
            return {
                editmode: false,
                categories: {},
                alldata: {},
                counter: 1,
                crAlldata: [],
                showFilterTbl: false,
                corporateRisk: [],
                form: new Form({
                    id: '',
                    ObjType: 23,
                    Name: '',
                    BunitID: '',
                    CorporateRiskId: []
                })
            }
        },
        components: { RiskAnalysisToolbar, vSelect },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken'); },
            getResults(page = 1) {
                axios.get('/api/category?page=' + page, {
                    params: {
                        ObjType: this.form.ObjType
                    }
                })
                .then(response => {
                    this.categories = response.data
                })
            },

            loadRiskEventData() {
                axios.get('/api/risks', {
                    params: {
                        ObjType: this.form.ObjType,
                        CorporateRiskId: this.form.CorporateRiskId,
                        location: 'erm'
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData[0].data;
                        this.corporateRisk = res.data.ResponseData[1];

                        if(this.alldata) { this.showFilterTbl = true; }
                        else { this.showFilterTbl = false; }
                    } else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        });
                        this.showFilterTbl = false;
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

            loadCorporateRisks() {
                const token = this.getAuthToken();
                axios.get('/api/corporate-risks', {
                    params: {
                        ObjType: this.form.ObjType
                    },
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.crAlldata = res.data.ResponseData
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
            }
        },
        created() {
            this.loadCorporateRisks()
            // this.loadRiskEventData()
        }
    }
</script>

<style>
.v-select .vs__dropdown-toggle {
    min-height: 50px;
    height: auto;
}
</style>
