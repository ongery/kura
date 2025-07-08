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
                        (Add) New Risks
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
                                    Risk
                                </a>
                            </div>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <div class="flex items-center">
                                -
                                <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                    New Entry
                                </a>
                            </div>
                        </li>
                        <!--end::Item-->
                    </ol>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Tables Widget 3-->
            <div class="card card-xl-stretch mb-5 mb-xl-12">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <!--begin::Col-->
                    <div class="col-md-11 pb-5 fv-row">
                        <!-- <form> -->
                        <form @submit.prevent="saveRisk()">
                            <div class="form-group" >
                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Subject <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="risk_subject" id="risk_subject" class="form-control" />
                                    </div>
                                    <has-error :form="form" field="risk_subject"></has-error>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Threat Mapping <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="threat_mapping" id="threat_mapping" class="form-control" placeholder="Select a threat mapping or start typing to search" />
                                    </div>
                                    <has-error :form="form" field="threat_mapping"></has-error>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Risk Mapping <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="risk_mapping" id="risk_mapping" class="form-control" placeholder="Select a risk mapping or start typing to search" />
                                        <has-error :form="form" field="risk_mapping"></has-error>
                                    </div>
                                    

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Risk Source <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="risk_source" id="risk_source">
                                            <option value=""> -- </option>
                                            <option v-for="val in riskSource" :value="val.id" :key="val.id" >{{ val.DocNum + " - " + val.Name }}</option>
                                        </select>
                                        <has-error :form="form" field="risk_source"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Category <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="type" v-model="form.Category" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                                            <option value="" > -- </option>
                                            <option v-for="val in categories" :value="val.id" :key="val.id" > {{ val.Name }} </option>
                                        </select>
                                        <has-error :form="form" field="category"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Risk Scoring Method:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="risk_scoring" id="risk_scoring">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="risk_scoring"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Site/Location:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="site_location" id="site_location">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="site_location"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Current Likelihood:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" v-model="form.current_likehood" id="current_likehood" name="current_likehood" :class="{'is-invalid': form.errors.has('current_likehood')}" >
                                            <option value="" > -- </option>
                                            <option v-for="val in likelihoodscales" :value="val.id" :key="val.id" >{{ val.Base + "-" + val.Name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">External Reference ID:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="external_reference" id="external_reference" class="form-control" />
                                        <has-error :form="form" field="external_reference"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Current Impact:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="current_impact" id="current_impact">
                                            <option value=""> -- </option>
                                            <option v-for="val in riskImpact" :value="val.id" :key="val.id" >{{ val.DocNum + " - " + val.Name }}</option>
                                        </select>
                                        <has-error :form="form" field="current_impact"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Control Regulation:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="control_regulation" id="control_regulation">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="control_regulation"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Control Number:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="control_number" id="control_number" class="form-control" />
                                        <has-error :form="form" field="control_number"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Affected Assets:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="affected_assets" id="affected_assets" class="form-control" />
                                        <has-error :form="form" field="affected_assets"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Technology:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="technology" id="technology">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="technology"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Team:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="team" id="team">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="team"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Add. Stockholders:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="additional_stockholder" id="additional_stockholder">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="additional_stockholder"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Owner:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="owner" id="owner">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="owner"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Owner's Manager:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="owner_manager" id="owner_manager">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="owner_manager"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Risk Assessment:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="risk_assessment" id="risk_assessment" class="form-control" />
                                        <has-error :form="form" field="risk_assessment"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Additional Notes:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="additional_note" id="additional_note" class="form-control" />
                                        <has-error :form="form" field="additional_note"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Supporting Document:</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="support_docs" id="support_docs" class="form-control" />
                                        <has-error :form="form" field="support_docs"></has-error>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer mt-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Header-->
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker'
    import CreateAction from './Actionindex.vue'
    export default {
        data() {
            return {
                reports: {},
                categories: {},
                likelihoodscales: {},
                riskSource: {},
                editmode: true,
                ObjType: 8,
                BName: '',
                riskevents: {},
                form: new Form({
                    // id: '',
                    // o_i_t_m_id: '',
                    ObjType: 11,
                    CategoryObjType: 18,
                    risk_subject:   '',
                    threat_mapping: '',
                    risk_mapping:   '',
                    risk_source:    '',
                    category:       '',
                    risk_scoring:   '',
                    site_location:  '',
                    current_likehood:   '',
                    external_reference: '',
                    current_impact: '',
                    control_regulation: '',
                    control_number: '',
                    affected_assets:    '',
                    technology:     '',
                    team:           '',
                    additional_stockholder: '',
                    owner:          '',
                    owner_manager:  '',
                    risk_assessment:    '',
                    additional_note:    '',
                    support_docs:   '',
                })
            }
        },
        components: {
            Datepicker,
            CreateAction
        },
        methods: {
            getAuthToken() { return localStorage.getItem('authToken'); },
            GoBack() {
                this.$router.back()
            },
            loadCategory() {
                const token = this.getAuthToken();
                axios.get('/api/category', {
                    params: {
                        ObjType: this.form.CategoryObjType
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
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
            loadLikelihoodScale() {
                const token = this.getAuthToken();
                axios.get('/api/likeLihoodScale',{
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then((res) => {
                    if (res.data.ResultCode == 1200) {
                        this.likelihoodscales = res.data.ResponseData
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
            loadRiskSource() {
                const token = this.getAuthToken();
                axios
                    .get('/api/risklibrarysetup', {
                        params: {
                            ObjType: 7
                        },
                        withCredentials: true,
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    })
                    .then(res => {
                        if (res.data.ResultCode == 1200) {
                            this.riskSource = res.data.ResponseData.data
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
            loadRiskImpact() {
                const token = this.getAuthToken();
                axios
                    .get('/api/risklibrarysetup', {
                        params: {
                            ObjType: 9
                        },
                        withCredentials: true,
                        headers: {
                            Authorization: `Bearer ${token}`
                        }
                    })
                    .then(res => {
                        if (res.data.ResultCode == 1200) {
                            this.riskImpact = res.data.ResponseData.data
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
            saveRisk() {
                const token = this.getAuthToken();
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                this.$Progress.start();
                this.form
                    .post('/api/risks')
                    .then(res => {
                        if (res.data.ResultCode == 1200) {
                            this.$Progress.finish()
                            swal.fire('Created!', 'Saved Successfully Created.', 'success')
                            localStorage.clear()
                            localStorage.setItem('risk_id', res.data.ResponseData)
                            this.$router.push({ name: 'AnalyseRiskProfile' })
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
                const token = this.getAuthToken();
                axios.post('/api/manage-logs', {
                    'page_name': 'Add New Risk',
                    'log': 'User visited to the Add New Risk'
                }, {
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
            }
        },
        created() {
            this.loadCategory();
            this.loadLikelihoodScale();
            this.loadRiskSource();
            this.loadRiskImpact();
            this.manageHistory();
        }
    }
</script>
