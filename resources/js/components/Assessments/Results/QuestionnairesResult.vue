<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">Questionnaires Result</h1>
                    <ol style="margin-left: -6px" role="list" class="flex items-center space-x-4 breadcrumb breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                        <li>
                            <div>
                                <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                    <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">Dashboard</span>
                                </a>
                            </div>
                        </li>

                        <li class="breadcrumb-item text-muted">
                            <div class="flex items-center">
                                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted"> Questionnaires Result </a>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <input v-model="searchQuery" type="text" placeholder="Search Questionnaires" title="Search Questionnaires Result" class="form-control mb-3" autocomplete="off" />
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-12">
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                    <thead class="fw-bolder text-muted">
                                        <tr>
                                            <th> Questionnaires Name</th>
                                            <th> Date Sent </th>
                                            <th> Questionnaires Status </th>
                                            <th> Review Status </th>
                                            <th> Last Comment </th>
                                            <th> Company </th>
                                            <th> Contact </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="ques in paginatedQuestionnairesResult" :key="ques.id">
                                            <td>
                                                <a href="javascript:void(0)" @click.prevent="loadQuestionnairesTemplates(ques.questionnaires.id, ques.id, ques.questionnaires.name, ques.contact)">{{ ques.questionnaires.name }}</a>
                                            </td>
                                            <td>{{ ques.date_send }}</td>
                                            <td>{{ ques.questionnaire_status }}</td>
                                            <td>{{ ques.review_status }}</td>
                                            <td>{{ ques.last_comment }}</td>
                                            <td>{{ ques.company }}</td>
                                            <td>{{ ques.contact }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between mt-3">
                                    <button @click="currentPage--" :disabled="currentPage === 1" class="btn btn-secondary">Previous</button>
                                    <span>Page {{ currentPage }} of {{ totalPages }}</span>
                                    <button @click="currentPage++" :disabled="currentPage === totalPages" class="btn btn-secondary">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="showQuestions" tabindex="-1" role="dialog" aria-labelledby="showQuestionsLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showQuestionsLabel">Questionnaires Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card mb-5">
                            <span class="badge badge-light p-6" style="font-size: medium;">Questionnaires: {{questionnairesName}}</span>
                        </div>

                        <div class="col-md-12 mb-5">
                            <div class="d-flex gap-5">
                                <div class="col-md-3">
                                    <v-select
                                        :options="CompanyArr"
                                        :multiple="false"
                                        v-model="selectedCompany"
                                        :close-on-select="true"
                                        :reduce="option => option.Name"
                                        :searchable="false"
                                        placeholder="Company"
                                        label="Name"
                                        track-by="id"
                                        disabled
                                    >
                                        <template v-slot:noResult>
                                            <div>No options available.</div>
                                        </template>
                                    </v-select>
                                </div>

                                <div class="col-md-3">
                                    <v-select
                                        :options="ContactArr"
                                        :multiple="false"
                                        v-model="selectedContact"
                                        :close-on-select="true"
                                        :reduce="option => option.Name"
                                        :searchable="false"
                                        placeholder="Company"
                                        label="Name"
                                        track-by="id"
                                        disabled
                                    >
                                        <template v-slot:noResult>
                                            <div>No options available.</div>
                                        </template>
                                    </v-select>
                                </div>
                                
                                <div class="offset-2 col-md-4 text-end">
                                    <button class="btn btn-success approve_result" :disabled="statusAction === 'Approved'" @click.prevent="changeStatusQuesResult(quesResultId, 'Approved')"> Approve </button>
                                    <button class="btn btn-warning reject_result" :disabled="statusAction === 'Rejected'" @click.prevent="changeStatusQuesResult(quesResultId, 'Rejected')"> Reject </button>
                                    <button class="btn btn-danger notapproved_result me-10" :disabled="statusAction === 'Not Approved'" @click.prevent="changeStatusQuesResult(quesResultId, 'Not Approved')"> Not Approved </button>
                                </div>
                            </div>

                            <div class="mt-3 ms-1" v-html="statusChangeMsg"></div>
                        </div>

                        <div v-for="(tmp) in questionTemplates" :key="tmp.id" class="mb-4">
                            <div class="card">
                                <span class="badge badge-light p-6" style="font-size: medium;">{{tmp.template}}</span>
                            </div>

                            <div v-for="(ques, quesIndex) in tmp.question" :key="ques.id" class="mb-4">
                                <div class="form-group mt-3 fs-5 ms-3">
                                    <label :for="'question-' + ques.id"><b>{{ quesIndex + 1 }}.</b> {{ ques.question }}</label>
                                    <div v-if="ques.option === 'single'" class="row">
                                        <div v-for="option in ques.answers" :key="option.id" class="col-5 mb-2 mt-2 ms-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" :id="'option-' + option.id" :name="'question-' + ques.id" :value="option.id" disabled />
                                                <label class="form-check-label" :for="'option-' + option.id"> {{ option.answer }} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else-if="ques.option === 'multiple'" class="row">
                                        <div v-for="option in ques.answers" :key="option.id" class="col-5 mb-2 mt-2 ms-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" :id="'option-' + option.id" :value="option.id" disabled />
                                                <label class="form-check-label" :for="'option-' + option.id"> {{ option.answer }} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else-if="ques.option === 'fill'">
                                        <input type="text" class="form-control" :id="'answer-' + ques.id" placeholder="Type your answer here" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';
    export default {
        data() {
            return {
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 5,
                editMode: false,
                questionnairesResult: {},
                questionTemplates: {},
                questionnairesName: '',
                selectedContact: '',
                quesResultId: '',
                statusChangeMsg: '',
                statusAction: '',
                form: new Form({}),
                CompanyArr: [{ id: 1, Name: "Internal" }],
                ContactArr: [{ id: 1, Name: '' }],
                selectedCompany: 'Internal',
            }
        },
        computed: {
            filteredQuestionnairesResult() {
                if (!Array.isArray(this.questionnairesResult)) return []
                return this.questionnairesResult.filter(ques => {
                    const query = this.searchQuery.toLowerCase();
                    return (
                        ques.questionnaires.name.toLowerCase().includes(query)
                    );
                });
            },
            totalPages() {
                if (!Array.isArray(this.questionnairesResult)) return 1
                return Math.ceil(this.filteredQuestionnairesResult.length / this.itemsPerPage)
            },
            paginatedQuestionnairesResult() {
                if (!Array.isArray(this.questionnairesResult)) return []
                const start = (this.currentPage - 1) * this.itemsPerPage
                const end = start + this.itemsPerPage
                return this.filteredQuestionnairesResult.slice(start, end)
            }
        },
        methods: {
            getAuthToken() {
                return localStorage.getItem('authToken')
            },
            openModel(mode = false, data = null) {
                this.editMode = mode
                this.form.reset()
                $('#showQuestions').modal('show')
            },
            closeModel() {
                this.editMode = false
                this.form.reset()
                $('#showQuestions').modal('hide')
            },
            loadQuestionnairesResult() {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires/result', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.questionnairesResult = res.data.ResponseData
                        this.$Progress.finish()
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

            loadQuestionnairesTemplates(id, quesResultId, questionnairesName, contactName) {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires/assessments/'+id, {
                    params: {
                        quesResultId: quesResultId
                    },
                    withCredentials: true,
                    headers: { Authorization: `Bearer ${token}` }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        console.log('check-res-data', res.data.ResponseData);
                        this.quesResultId = quesResultId;
                        this.questionnairesName = questionnairesName;
                        this.selectedContact = contactName;

                        this.ContactArr = [{ id: 1, Name: this.selectedContact }],
                        this.questionTemplates = res.data.ResponseData;
                        this.statusChangeMsg = res.data.ResponseData.message;
                        this.statusAction = res.data.ResponseData.quesResult.review_status;
                        
                        $('#showQuestions').modal('show')
                        this.$Progress.finish()
                    } else {
                        toast.fire({ type: 'error', title: res.data.ResultDesc });
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({ type: 'error', title: 'Operation not successful' + '\n' + e.response.data.message })
                })
            },

            changeStatusQuesResult(quesResultId, status) {
                swal.fire({
                    title: 'Are you sure?',
                    text: "You want to set this result to "+status+"?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then(result => {
                    if (result.isConfirmed) {
                        const token = this.getAuthToken()
                        this.$Progress.start()
                        axios.get('/api/questionnaires/change/'+quesResultId, {
                            params: {
                                quesResultId: quesResultId,
                                status: status
                            },
                            withCredentials: true,
                            headers: { Authorization: `Bearer ${token}` }
                        })
                        .then(res => {
                            if (res.data.ResultCode == 1200) {
                                this.statusChangeMsg = res.data.ResponseData;
                                this.statusAction = status;
                                $('#showQuestions').modal('show')
                                this.$Progress.finish()
                            } else {
                                toast.fire({ type: 'error', title: res.data.ResultDesc });
                            }
                        })
                        .catch(e => {
                            this.$Progress.fail()
                            toast.fire({ type: 'error', title: 'Operation not successful' + '\n' + e.response.data.message })
                        })
                    }
                })
            },

            handleErrorResponse(res) {
                let errorMessage = ''
                this.errors = {}
                if (typeof res.data.ResultDesc === 'object') {
                    this.errors = res.data.ResultDesc
                    for (const [field, messages] of Object.entries(res.data.ResultDesc)) {
                        if (Array.isArray(messages)) {
                            errorMessage += messages  + '\n'
                        } else {
                            errorMessage += messages  + '\n'
                        }
                    }
                } else {
                    errorMessage = res.data.ResultDesc + '\n'
                }
                toast.fire({
                    type: 'error',
                    title: errorMessage
                })
            }
        },
        created() {
            this.loadQuestionnairesResult();
            Fire.$on('AfterCreate', () => {
                this.loadQuestionnairesResult()
            })
        },
    }
</script>

<style scoped>
    .table th,
    .table td {
        vertical-align: middle;
    }
    .fa-edit {
        color: #258c37;
        cursor: pointer;
    }
    .fa-trash {
        cursor: pointer;
    }
    textarea{
        resize: none !important;
    }
    label {
        font-weight: bold !important;
    }
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 1200px !important;
            margin-right: auto;
            margin-left: auto;
        }
    }
    .separator.separator-dashed {
        border-bottom-style: dashed;
        border-bottom-color: #99A1B7 !important;
    }
</style>
