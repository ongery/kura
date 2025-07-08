<template>
    <div class="row mt-2">
        <!--begin::Toolbar-->
        <div class="app-toolbar py-3">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">Self Assessments</h1>
                    <!--end::Title-->

                    <!--begin::Breadcrumb-->
                    <ol style="margin-left: -6px" role="list" class="flex items-center space-x-4 breadcrumb breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
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
                                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted"> Self Assessments </a>
                            </div>
                        </li>
                        <!--end::Item-->
                    </ol>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!-- Search Field -->
                    <input v-model="searchQuery" type="text" placeholder="Search Templates" title="Search Templates" class="form-control mb-3" />
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <div class="col-md-12">
            <div class="card">
                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Tables Widget 3-->
                    <div class="card card-xl-stretch mb-5 mb-xl-12">
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Header-->

                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                    <thead class="fw-bolder text-muted">
                                        <tr>
                                            <th>Templates</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="template in paginatedTemplates" :key="template.id">
                                            <td>{{ template.name }}</td>
                                            <td>
                                                <a href="#" @click.prevent="openModel(template)" title="Edit Template">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Pagination Controls -->
                                <div class="d-flex justify-content-between mt-3">
                                    <button @click="currentPage--" :disabled="currentPage === 1" class="btn btn-secondary">Previous</button>
                                    <span>Page {{ currentPage }} of {{ totalPages }}</span>
                                    <button @click="currentPage++" :disabled="currentPage === totalPages" class="btn btn-secondary">Next</button>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 3-->
                </div>
                <!--end::Col-->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">{{ form.name }} - Self Assessments</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="saveTemplate()">
                        <div class="modal-body">
                            <div v-for="(question, questionIndex) in selectedOptions" :key="question.id" class="mb-4">
                                <div class="form-group">
                                    <label :for="'question-' + question.id">
                                        <b>{{ questionIndex + 1 }}.</b> {{ question.question }}
                                    </label>
                                    <div v-if="question.option === 'single'" class="row">
                                        <div v-for="option in question.answers" :key="option.id" class="col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" :id="'option-' + option.id" :name="'question-' + question.id" :value="option.id" v-model="form.answers[question.id]" />
                                                <label class="form-check-label" :for="'option-' + option.id"> {{ option.answer }} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else-if="question.option === 'multiple'" class="row">
                                        <div v-for="option in question.answers" :key="option.id" class="col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" :id="'option-' + option.id" :value="option.id" v-model="form.answers[question.id]" />
                                                <label class="form-check-label" :for="'option-' + option.id"> {{ option.answer }} </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else-if="question.option === 'fill'">
                                        <input type="text" class="form-control" :id="'answer-' + question.id" v-model="form.answers[question.id]" placeholder="Type your answer here" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            templates: [],
            searchQuery: '',
            currentPage: 1,
            itemsPerPage: 5,
            form: new Form({
                id: '',
                name: '',
                questions: [],
                answers: {}
            }),
            errors: {},
            options: [],
            selectedOptions: []
        }
    },
    computed: {
        filteredTemplates() {
            if (!Array.isArray(this.templates)) return []
            return this.templates.filter(template => template.name.toLowerCase().includes(this.searchQuery.toLowerCase()))
        },
        totalPages() {
            if (!Array.isArray(this.templates)) return 1
            return Math.ceil(this.filteredTemplates.length / this.itemsPerPage)
        },
        paginatedTemplates() {
            if (!Array.isArray(this.templates)) return []
            const start = (this.currentPage - 1) * this.itemsPerPage
            const end = start + this.itemsPerPage
            return this.filteredTemplates.slice(start, end)
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        openModel(data = null) {
            this.form.reset()
            this.selectedOptions = []
            if (data) {
                this.form.fill(data)
                this.selectedOptions = data.questions.map(questionId => this.options.find(option => option.id == questionId)).filter(option => option)
            }
            this.initializeAnswers()
            $('#addNew').modal('show')
        },
        closeModel() {
            this.form.reset()
            this.selectedOptions = []
            $('#addNew').modal('hide')
        },
        initializeAnswers() {
            this.form.answers = {}
            this.selectedOptions.forEach(question => {
                this.$set(this.form.answers, question.id, [])
            })
        },
        loadData() {
            const token = this.getAuthToken()
            this.$Progress.start()
            axios
                .get('/api/self/assessments', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.templates = res.data.ResponseData.templates
                        this.options = res.data.ResponseData.questions
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
        saveTemplate() {
            const token = this.getAuthToken()
            this.$Progress.start()
            this.form
                .post('/api/self/assessments', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        $('#addNew').modal('hide')
                        Fire.$emit('AfterCreate')
                        toast.fire({
                            type: 'success',
                            title: 'Created successfully'
                        })
                        this.$Progress.finish()
                        this.errors = {}
                        this.form.reset()
                        this.selectedOptions = []
                    } else {
                        this.handleErrorResponse(res)
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
        handleErrorResponse(res) {
            let errorMessage = ''
            this.errors = {}
            if (typeof res.data.ResultDesc === 'object') {
                this.errors = res.data.ResultDesc
                for (const [field, messages] of Object.entries(res.data.ResultDesc)) {
                    if (Array.isArray(messages)) {
                        errorMessage += messages.join('<br>')
                    } else {
                        errorMessage += messages + '<br>'
                    }
                }
            } else {
                errorMessage = res.data.ResultDesc
            }
            toast.fire({
                type: 'error',
                title: errorMessage
            })
        }
    },
    created() {
        this.loadData()
        Fire.$on('AfterCreate', () => {
            this.loadData()
        })
    }
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
.modal-dialog {
    max-width: 50%;
    margin: 1.75rem auto;
}

.modal-content {
    /* height: 80vh; */
    display: flex;
    flex-direction: column;
}

.modal-body {
    flex: 1;
    overflow-y: auto;
}

.modal-footer {
    margin-top: auto;
}

.form-check-input:checked ~ .form-check-label {
    color: #28a745;
    font-weight: bold;
}

.form-check-input {
    margin-right: 0.5rem;
}

.form-control {
    border-radius: 0.25rem;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.form-check {
    margin-bottom: 0.5rem;
}
</style>
