<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">Questionnaire Templates</h1>
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
                                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted"> Questionnaire Templates </a>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <input v-model="searchQuery" type="text" placeholder="Search Templates" title="Search Templates" class="form-control mb-3" />
                    <a href="javascript:void(0)" @click.prevent="openModel(false)" class="btn btn-sm fw-bold btn-success btn-active-color-dark" title="Add Template"> Add </a>
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
                                            <th>Templates</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="template in paginatedTemplates" :key="template.id">
                                            <td>{{ template.name }}</td>
                                            <td>
                                                <a href="javascript:void(0)" @click.prevent="openModel(true, template)" title="Edit Template">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" @click.prevent="deleteTemplate(template.id)" class="ms-2" title="Delete Template">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                            </td>
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
        
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">{{ editMode ? 'Update' : 'Add' }} Questionnaire Templates</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? editTemplate() : addTemplate()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input v-model="form.name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                    <has-error :form="form" :errors="errors" field="name"></has-error>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="questions">Selected Questions</label>
                                    <v-select v-model="selectedOptions" :options="options" multiple label="text" placeholder="Select options"> </v-select>
                                    <has-error :form="form" :errors="errors" field="questions"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="closeModel">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
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
            editMode: false,
            form: new Form({
                id: '',
                name: '',
                questions: []
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
        openModel(mode = false, data = null) {
            this.editMode = mode
            this.form.reset()
            this.selectedOptions = []
            $('#addNew').modal('show')
            if (data) {
                this.form.fill(data)
                this.selectedOptions = data.questions.map(questionId => this.options.find(option => option.value == questionId)).filter(option => option)
            }
        },
        closeModel() {
            this.editMode = false
            this.form.reset()
            this.selectedOptions = []
            $('#addNew').modal('hide')
        },
        loadData() {
            const token = this.getAuthToken()
            this.$Progress.start()
            axios
                .get('/api/templates', {
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
        addTemplate() {
            const token = this.getAuthToken()
            this.$Progress.start()
            this.form
                .post('/api/templates', {
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
        editTemplate() {
            const token = this.getAuthToken()
            this.$Progress.start()
            this.form
                .put('/api/templates/' + this.form.id, {
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
                            title: 'Updated successfully'
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
        deleteTemplate(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                const token = this.getAuthToken()
                this.$Progress.start()
                if (result.value) {
                    this.form
                        .delete('/api/templates/' + id, {
                            withCredentials: true,
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        })
                        .then(() => {
                            swal.fire('Deleted!', 'Your record has been deleted.', 'success')
                            this.$Progress.finish()
                            Fire.$emit('AfterCreate')
                        })
                        .catch(() => {
                            this.$Progress.fail()
                            swal.fire('Failed!', 'Something went wrong', 'warning')
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
    },
    watch: {
        selectedOptions(newVal) {
            if (Array.isArray(newVal)) {
                this.form.questions = newVal.map(option => option.value)
            } else {
                this.form.questions = []
            }
        }
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
</style>
