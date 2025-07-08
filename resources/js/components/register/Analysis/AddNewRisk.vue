<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <div>
                        <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">(Add) New Risks</h1>
                        <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1 ms-1">
                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        Risk
                                    </a>
                                </div>
                            </li>

                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    -
                                    <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                        New Entry
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="javascript:void(0)" @click.prevent="openRiskModal" class="btn btn-sm fw-bold btn-success btn-active-color-dark"> Upload Risk CSV </a>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card card-xl-stretch mb-5 mb-xl-12">
                <div class="card-header border-0 pt-5">
                    <div class="col-md-11 pb-5 fv-row">
                        <form @submit.prevent="saveRisk()">
                            <div class="form-group">
                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Subject <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="risk_subject" id="risk_subject" v-model="form.risk_subject" class="form-control" />
                                    </div>
                                    <has-error :form="form" field="risk_subject"></has-error>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Threat Mapping <span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="threat_mapping" id="threat_mapping" v-model="form.threat_mapping" class="form-control" placeholder="Select a threat mapping or start typing to search" />
                                    </div>
                                    <has-error :form="form" field="threat_mapping"></has-error>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Risk Mapping <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" name="risk_mapping" id="risk_mapping" v-model="form.risk_mapping" class="form-control" placeholder="Select a risk mapping or start typing to search" />
                                        <has-error :form="form" field="risk_mapping"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Risk Source <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="risk_source" id="risk_source" v-model="form.risk_source">
                                            <option value=""> -- </option>
                                            <option v-for="val in riskSource" :value="val.id" :key="val.id">{{ val.DocNum + ' - ' + val.Name }}</option>
                                        </select>
                                        <has-error :form="form" field="risk_source"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Category <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select name="type" v-model="form.category" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                                            <option value=""> -- </option>
                                            <option v-for="val in categories" :value="val.id" :key="val.id"> {{ val.Name }} </option>
                                        </select>
                                        <has-error :form="form" field="category"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Risk Scoring Method:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="risk_scoring" id="risk_scoring" v-model="form.risk_scoring">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="risk_scoring"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Site/Location:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="site_location" id="site_location" v-model="form.site_location">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="site_location"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Current Likelihood:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" v-model="form.current_likehood" id="current_likehood" name="current_likehood" :class="{ 'is-invalid': form.errors.has('current_likehood') }">
                                            <option value=""> -- </option>
                                            <option v-for="val in likelihoodscales" :value="val.id" :key="val.id">{{ val.Base + '-' + val.Name }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">External Reference ID:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="external_reference" id="external_reference" class="form-control" v-model="form.external_reference" />
                                        <has-error :form="form" field="external_reference"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Current Impact:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="current_impact" id="current_impact" v-model="form.current_impact">
                                            <option value=""> -- </option>
                                            <option v-for="val in riskImpact" :value="val.id" :key="val.id">{{ val.DocNum + ' - ' + val.Name }}</option>
                                        </select>
                                        <has-error :form="form" field="current_impact"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Control Regulation:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="control_regulation" id="control_regulation" v-model="form.control_regulation">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="control_regulation"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Control Number:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="control_number" id="control_number" class="form-control" v-model="form.control_number" />
                                        <has-error :form="form" field="control_number"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Affected Assets:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="affected_assets" id="affected_assets" class="form-control" v-model="form.affected_assets" />
                                        <has-error :form="form" field="affected_assets"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Technology:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="technology" id="technology" v-model="form.technology">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="technology"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Team:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="team" id="team" v-model="form.team">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="team"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Add. Stockholders:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="additional_stockholder" id="additional_stockholder" v-model="form.additional_stockholder">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="additional_stockholder"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Owner:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="owner" id="owner" v-model="form.owner">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="owner"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Owner's Manager:</label>
                                    <div class="col-sm-4">
                                        <select class="form-control mt-3" name="owner_manager" id="owner_manager" v-model="form.owner_manager">
                                            <option value=""> -- </option>
                                        </select>
                                        <has-error :form="form" field="owner_manager"></has-error>
                                    </div>
                                </div>

                                <div class="mb-5 d-flex gap-10">
                                    <label class="col-sm-2 card-label fw-bold fs-5 align-content-center text-end">Risk Assessment:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="risk_assessment" id="risk_assessment" class="form-control" v-model="form.risk_assessment" />
                                        <has-error :form="form" field="risk_assessment"></has-error>
                                    </div>

                                    <label class="card-label fw-bold fs-5 align-content-center text-end col-1 ms-11">Additional Notes:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="additional_note" id="additional_note" class="form-control" v-model="form.additional_note" />
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

        <!-- Modal -->
        <div class="modal fade" id="uploadRisk" tabindex="-1" role="dialog" aria-labelledby="uploadRiskLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadRiskLabel">Import Csv/Excel File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="RiskFileRowImport()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for> Choose File : </label>
                                    <input type="file" ref="riskFileImport" class="form-control" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" :class="{ 'disabled': isDisabled }" data-dismiss="modal" @click="closeModel"> Close </button>
                            <button type="submit" class="btn btn-primary" :class="{ 'disabled': isDisabled }"><span class="spinner-border spinner-border-sm" :class="{ 'd-none': isHidden }"></span> Create </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import CreateAction from './Actionindex.vue';
import Papa from 'papaparse';
import * as XLSX from 'xlsx';

export default {
    data() {
        return {
            isHidden: true,
            isDisabled: false,
            reports: {},
            categories: {},
            likelihoodscales: {},
            riskSource: {},
            editmode: true,
            ObjType: 8,
            BName: '',
            importCsv: null,
            riskevents: {},
            form: new Form({
                id: '',
                o_i_t_m_id: '1',
                ObjType: 11,
                CategoryObjType: 18,
                risk_subject: '',
                threat_mapping: '',
                risk_mapping: '',
                risk_source: '',
                category: '',
                risk_scoring: '',
                site_location: '',
                current_likehood: '',
                external_reference: '',
                current_impact: '',
                control_regulation: '',
                control_number: '',
                affected_assets: '',
                technology: '',
                team: '',
                additional_stockholder: '',
                owner: '',
                owner_manager: '',
                risk_assessment: '',
                additional_note: '',
                support_docs: ''
            })
        }
    },
    components: {
        Datepicker,
        CreateAction
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },

        openRiskModal() {
            this.importCsv = null;
            const riskFileImport = this.$refs.riskFileImport;
            if (riskFileImport) {
                riskFileImport.value = null;
            }
            $('#uploadRisk').modal('show')
        },

        closeModel() {
            $('#uploadRisk').modal('hide')
        },

        GoBack() {
            this.$router.back()
        },

        loadCategory() {
            const token = this.getAuthToken()
            axios
                .get('/api/category', {
                    params: {
                        ObjType: this.form.CategoryObjType
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.categories = res.data.ResponseData.data
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

        loadLikelihoodScale() {
            const token = this.getAuthToken()
            axios
                .get('/api/likeLihoodScale', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.likelihoodscales = res.data.ResponseData
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

        loadRiskSource() {
            const token = this.getAuthToken()
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
            const token = this.getAuthToken()
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
            const token = this.getAuthToken()
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            this.$Progress.start()
            this.form.post('/api/risks/store/new-risk').then(res => {
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
                    title: 'Operation not successful' + '\n' + e.response.data.message
                })
            })
        },

        RiskFileRowImport() {
            this.isHidden = false;
            this.isDisabled = true;
            const riskFileImport = this.$refs.riskFileImport;
            if (riskFileImport.files.length === 0) {
                toast.fire({
                    type: 'error',
                    title: 'Please select Csv/Excel to import data'
                })
                this.isHidden = true;
                this.isDisabled = false;
                return;
            }

            this.file = riskFileImport.files[0];
            if (this.file) {
                if (this.file.type.includes('csv')) {
                    this.processRiskImportCSV(this.file, 'CSV');
                } else if (this.file.type.includes('sheet')) {
                    this.processRiskImportExcel(this.file, 'Excel');
                } else {
                    toast.fire({
                        type: 'error',
                        title: 'Unsupported file type'
                    });
                    this.isHidden = true;
                this.isDisabled = false;
                    return;
                }
            }
        },

        processRiskImportCSV(file, fileType) {
            Papa.parse(file, {
                header: true,
                complete: (results) => {
                    this.chunkFileRowData(results.data, fileType);
                },
            });
        },

        processRiskImportExcel(file, fileType) {
            const reader = new FileReader();
            reader.onload = (e) => {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });
                const sheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[sheetName];
                const jsonData = XLSX.utils.sheet_to_json(worksheet);
                this.chunkFileRowData(jsonData, fileType);
            };
            reader.readAsArrayBuffer(file);
        },

        async chunkFileRowData(data, fileType) {
            const chunkSize = 100;
            const allChunkPromises = [];

            for (let i = 0; i < data.length; i += chunkSize) {
                const chunk = data.slice(i, i + chunkSize);
                // Collect promises for all chunks
                allChunkPromises.push(this.sendChunkDataToAPI(chunk));
            }

            try {
                // Wait for all chunk processing to complete
                await Promise.all(allChunkPromises);

                // If all chunks processed successfully, show success message
                this.$Progress.finish();
                toast.fire({
                    type: 'success',
                    title: fileType + ' file data imported successfully'
                });
                this.isHidden = true;
                this.isDisabled = false;
                this.closeModel();
                this.$router.push({ path: '/dashboard' });
            } catch (error) {
                console.error('Error processing chunks:', error);
                this.showErrorMessage('An error occurred while storing data.');
                this.$Progress.fail();
            }
        },

        async sendChunkDataToAPI(chunk) {
            const promises = chunk.map(item => {
                this.form.risk_subject = item["Subject"] || '';
                this.form.threat_mapping = item["Threat Mapping"] || '';
                this.form.risk_mapping = item["Risk Mapping"] || '';
                this.form.risk_source = item["Risk Source"] || '';
                this.form.category = item["Category"] || '';
                this.form.risk_scoring = item["Risk Scoring"] || '';
                this.form.site_location = item["Site/Location"] || '';
                this.form.current_likehood = item["Current Likelihood"] || '';
                this.form.external_reference = item["External Reference ID"] || '';
                this.form.current_impact = item["Current Impact"] || '';
                this.form.control_regulation = item["Control Regulation"] || '';
                this.form.control_number = item["Control Number"] || '';
                this.form.affected_assets = item["Affected Assets"] || '';
                this.form.technology = item["Technology"] || '';
                this.form.team = item["Team"] || '';
                this.form.additional_stockholder = item["Add. Stockholders"] || '';
                this.form.owner = item["Owner"] || '';
                this.form.owner_manager = item["Owner's Manager"] || '';
                this.form.risk_assessment = item["Risk Assessment"] || '';
                this.form.additional_note = item["Additional Notes"] || '';

                return this.form.post('/api/import/risks'); // Return the promise
            });

            // Wait for all items in the chunk to be posted
            return Promise.all(promises);
        },

        manageHistory() {
            const token = this.getAuthToken()
            axios.post(
                '/api/manage-logs',
                {
                    page_name: 'Add New Risk',
                    log: 'User visited to the Add New Risk'
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
        this.loadCategory()
        this.loadLikelihoodScale()
        this.loadRiskSource()
        this.loadRiskImpact()
        this.manageHistory()
    }
}
</script>
