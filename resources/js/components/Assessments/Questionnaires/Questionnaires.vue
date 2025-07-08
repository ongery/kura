<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">Questionnaire</h1>
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
                                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted"> Questionnaire </a>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <input v-model="searchQuery" type="text" placeholder="Search Questionnaires" title="Search Questionnaires" class="form-control mb-3" autocomplete="off" />
                    <a href="javascript:void(0)" @click.prevent="openModel(false)" class="btn mb-3 fw-bold btn-success btn-active-color-dark" title="Add Questionnaires"> Add </a>
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
                                            <th>Questionnaires Name</th>
                                            <th>User Instructions </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="ques in paginatedQuestionnaires" :key="ques.id">
                                            <td>{{ ques.name }}</td>
                                            <td>{{ ques.instruction }}</td>
                                            <td>
                                                <a href="javascript:void(0)" @click.prevent="editQuestionnaires(ques.id)" title="Edit Questionnaires">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0)" @click.prevent="deleteQuestionnaires(ques.id)" class="ms-2" title="Delete Questionnaires">
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                                <a href="javascript:void(0)" @click.prevent="copyQuestionnaires(ques.id)" class="ms-2" title="Copy Questionnaires">
                                                    <i class="fa fa-copy text-dark"></i>
                                                </a>
                                                <a href="javascript:void(0)" @click.prevent="sendQuestionnaires(ques.id)" class="ms-2 btn btn-sm btn-dark" title="Send Questionnaires"> Send </a>
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
                        <h5 class="modal-title" id="addNewLabel">{{ editMode ? 'Update' : 'Add' }} Questionnaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? editQuestionnaires() : addQuestionnaires()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="name" class="mb-2">Name :</label>
                                        <input v-model="form.name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" autocomplete="off" />
                                        <has-error :form="form" :errors="errors" field="name"></has-error>
                                    </div>

                                    <div class="col-md-7">
                                        <label for="name" class="mb-2">User Instructions :</label>
                                        <textarea v-model="form.user_instruction" name="user_instruction" placeholder="User Instructions" class="form-control" :class="{ 'is-invalid': form.errors.has('user_instruction') }" rows="5"></textarea>
                                        <has-error :form="form" :errors="errors" field="name"></has-error>
                                    </div>
                                </div>

                                <!-- RISK DETAILS START -->
                                <div class="card pt-7">
                                    <span class="badge badge-light p-6" style="font-size: medium;">Risk Details</span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="project_name" class="mt-3 mb-1">Project Name :</label>
                                        <input v-model="form.project_name" type="text" name="project_name" placeholder="Project Name" class="form-control" :class="{ 'is-invalid': form.errors.has('project_name') }" autocomplete="off" />
                                        <has-error :form="form" :errors="errors" field="project_name"></has-error>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="site_location" class="mt-3 mb-1">Site/Location :</label>
                                        <v-select
                                            v-model="form.site_location"
                                            :options="siteLocationsArr"
                                            :multiple="false"
                                            :close-on-select="true"
                                            :reduce="option => option.id"
                                            :searchable="false"
                                            placeholder="Select Site/Location"
                                            label="Name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="site_location"></has-error>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="affected_assets" class="mt-3 mb-1">Affected Assets :</label>
                                        <v-select
                                            v-model="form.affected_assets"
                                            :options="affectedAssetsArr"
                                            :multiple="true"
                                            :close-on-select="false"
                                            :reduce="option => option.id"
                                            placeholder="Select Affected Assets"
                                            label="Name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="affected_assets"></has-error>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="team" class="mt-3 mb-1">Team :</label>
                                        <v-select
                                            v-model="form.team"
                                            :options="teamArr"
                                            :multiple="true"
                                            :close-on-select="false"
                                            :reduce="option => option.id"
                                            placeholder="Select Teams"
                                            label="Name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="team"></has-error>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="addi_stakeholders" class="mt-3 mb-1">Additional Stakeholders :</label>
                                        <v-select
                                            v-model="form.addi_stakeholders"
                                            :options="usersArr"
                                            :multiple="true"
                                            :close-on-select="false"
                                            :reduce="option => option.id"
                                            placeholder="Select Additional Stakeholders"
                                            label="full_name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="addi_stakeholders"></has-error>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="owner" class="mt-3 mb-1">Owner :</label>
                                        <v-select
                                            v-model="form.owner"
                                            :options="ownersManagerArr"
                                            :multiple="false"
                                            :close-on-select="true"
                                            :reduce="option => option.id"
                                            :searchable="false"
                                            placeholder="Select Owner"
                                            label="Name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="owner"></has-error>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="owners_manager" class="mt-3 mb-1">Owner's Manager :</label>
                                        <v-select
                                            v-model="form.owners_manager"
                                            :options="ownersManagerArr"
                                            :multiple="false"
                                            :close-on-select="true"
                                            :reduce="option => option.id"
                                            :searchable="false"
                                            placeholder="Select Owner's Manager"
                                            label="Name"
                                            track-by="id"
                                        >
                                            <template v-slot:noResult>
                                                <div>No options available.</div>
                                            </template>
                                        </v-select>
                                        <has-error :form="form" :errors="errors" field="owners_manager"></has-error>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="tags" class="mt-3 mb-1">Tags :</label>
                                        <input v-model="form.tags" type="text" name="tags" placeholder="Project Name" class="form-control" :class="{ 'is-invalid': form.errors.has('tags') }" autocomplete="off" />
                                        <has-error :form="form" :errors="errors" field="tags"></has-error>
                                    </div>
                                </div>
                                <div class="separator mt-5 separator-dashed"></div>
                                <!-- RISK DETAILS END -->

                                <div class="form-group mt-5 fs-4">
                                    <input v-model="form.automatic_send" type="checkbox" name="automatic_send" /><span> Automatically send assessment results to all assessment contacts upon completion. </span>
                                </div>
                                <div class="form-group mt-3">
                                    <span class="d-flex fs-4 align-items-center"> Notify assessment contacts every <input v-model="form.notify_assessment" type="number" name="notify_assessment" class="form-control w-100px ms-3 me-3" autocomplete="off" /> days until completed.</span>
                                </div>
                                <div class="form-group mt-2">
                                    <span class="d-flex fs-4 align-items-center"> Schedule and send this assessment every <input v-model="form.schedule_send" type="number" name="schedule_send" class="form-control w-100px ms-3 me-3" autocomplete="off" /> days.</span>
                                </div>
                                <div class="separator mt-5 separator-dashed"></div>
                            
                                <!-- TEMPLATES SECTION -->
                                <div class="card pt-7">
                                    <span class="badge badge-light p-6" style="font-size: medium;">Templates</span>
                                </div>
                                <div class="mb-5 mt-5">
                                    <div class="row mt-3" v-for="(template, index) in form.templates" :key="index">
                                        <input type="hidden" v-model="template.questionnaire_id">
                                        <div class="col-md-5 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">Template :</label>
                                            <v-select
                                                v-model="template.template"
                                                :options="templatesArr"
                                                :multiple="false"
                                                :close-on-select="true"
                                                :reduce="option => option.id"
                                                :searchable="false"
                                                placeholder="Select Template"
                                                label="name"
                                                track-by="id"
                                            >
                                                <template v-slot:noResult>
                                                    <div>No options available.</div>
                                                </template>
                                            </v-select>
                                        </div>

                                        <div class="col-md-5 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">Assessment Contacts :</label>
                                            <v-select
                                                v-model="template.contacts"
                                                :options="assessmentContactsArr"
                                                :multiple="false"
                                                :close-on-select="true"
                                                :reduce="option => option.id"
                                                :searchable="false"
                                                placeholder="Select Assessment Contacts"
                                                label="Name"
                                                track-by="id"
                                            >
                                                <template v-slot:noResult>
                                                    <div>No options available.</div>
                                                </template>
                                            </v-select>
                                        </div>

                                        <div class="col-md-2 fv-row">
                                            <button v-if="!template.isEnableRemoveButton" @click="addTemplates(index)" type="button" class="btn btn-primary mt-3 mt-9">Add</button>
                                            <button v-if="template.isEnableRemoveButton" type="button" @click="removeTemplates(index)" class="btn btn-danger mt-3 mt-9">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- TEMPLATE SECTION END -->
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
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';
    export default {
        data() {
            return {
                searchQuery: '',
                currentPage: 1,
                itemsPerPage: 5,
                editMode: false,
                usersArr: [],
                templatesArr: [],
                questionnaires: {},
                form: new Form({
                    id: '',
                    name: '',
                    user_instruction: '',
                    project_name: '',
                    site_location: '',
                    affected_assets: '',
                    team: '',
                    addi_stakeholders: '',
                    owner: '',
                    owners_manager: '',
                    tags: '',
                    automatic_send: '',
                    notify_assessment: '',
                    schedule_send: '',
                    templates: [{ questionnaire_id: '', template: '', contacts: '', isEnableRemoveButton: false }]
                }),
                errors: {},
                options: [],

                siteLocationsArr: [{ id: 1, Name: "All Sites" }],
                affectedAssetsArr: [
                    { id: '3_asset', Name: "Application" },
                    { id: '2_asset', Name: "Network" },
                    { id: '1_asset', Name: "System" },
                ],
                teamArr: [
                    { id: 1, Name: "Branch Management" },
                    { id: 2, Name: "Collaboration" },
                    { id: 3, Name: "Data Center & Storage" },
                    { id: 4, Name: "Database" },
                    { id: 5, Name: "Information Security" },
                    { id: 6, Name: "IT Systems Management" },
                    { id: 7, Name: "Network" },
                    { id: 8, Name: "Unix" },
                    { id: 9, Name: "Web Systems" },
                    { id: 10, Name: "Windows" }
                ],
                ownersManagerArr: [{ id: localStorage.getItem('loggedInUserId'), Name: localStorage.getItem('loggedInFullName') }],
                assessmentContactsArr: [{ id: localStorage.getItem('loggedInUserId'), Name: localStorage.getItem('loggedInFullName') }],
            }
        },
        computed: {
            filteredQuestionnaires() {
                if (!Array.isArray(this.questionnaires)) return []
                return this.questionnaires.filter(ques => {
                    const query = this.searchQuery.toLowerCase();
                    return (
                        ques.name.toLowerCase().includes(query) || 
                        ques.instruction.toLowerCase().includes(query)
                    );
                });
            },
            totalPages() {
                if (!Array.isArray(this.questionnaires)) return 1
                return Math.ceil(this.filteredQuestionnaires.length / this.itemsPerPage)
            },
            paginatedQuestionnaires() {
                if (!Array.isArray(this.questionnaires)) return []
                const start = (this.currentPage - 1) * this.itemsPerPage
                const end = start + this.itemsPerPage
                return this.filteredQuestionnaires.slice(start, end)
            }
        },
        methods: {
            addTemplates(index) {
                this.form.templates.push({ questionnaire_id: '', template: '', contacts: '', isEnableRemoveButton: false });
                this.form.templates[index].isEnableRemoveButton = true;
            },
            removeTemplates(index) {
                this.form.templates[index].questionnaire_id = '';
                this.form.templates[index].template = '';
                this.form.templates[index].contacts = '';
                this.form.templates.splice(index, 1);
            },
            getAuthToken() {
                return localStorage.getItem('authToken')
            },
            openModel(mode = false, data = null) {
                this.editMode = mode
                this.form.reset()
                $('#addNew').modal('show')
            },
            closeModel() {
                this.editMode = false
                this.form.reset()
                $('#addNew').modal('hide')
            },
            loadUsers() {
                axios.get('/api/user')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.usersArr = res.data.ResponseData;
                    } else {
                        toast.fire({ type: 'error', title: res.data.ResultDesc })
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({ type: 'error', title: 'Operation not successfull' + '\n' + e.response.data.message })
                })
            },

            loadTemplateData() {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/self/assessments', {
                        withCredentials: true,
                        headers: { Authorization: `Bearer ${token}` }
                    })
                    .then((res) => {
                        if (res.data.ResultCode == 1200) {
                            this.templatesArr = res.data.ResponseData.templates
                            this.$Progress.finish()
                        } 
                        else {
                            toast.fire({ type: 'error', title: res.data.ResultDesc })
                        }
                    })
                    .catch((e) => {
                        this.$Progress.fail()
                        toast.fire({ type: 'error', title: 'Operation not successful' + '\n' + e.response.data.message })
                    })
            },

            loadQuestionnaires() {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.questionnaires = res.data.ResponseData
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

            addQuestionnaires() {
                const token = this.getAuthToken()
                this.$Progress.start()
                this.form.post('/api/questionnaires', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        $('#addNew').modal('hide')
                        Fire.$emit('AfterCreate')
                        toast.fire({ type: 'success', title: res.data.ResponseData })

                        this.$Progress.finish()
                        this.errors = {}
                        this.form.reset()
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

            editQuestionnaires(id) {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires/' + id, {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then((res) => {
                    if (res.data.ResultCode == 1200) {
                        this.editMode = true;
                        $('#addNew').modal('show');
                        setTimeout(() => {
                            this.form.fill(res.data.ResponseData);
                        }, 500);
                    }
                })
                .catch(() => {
                    this.$Progress.fail()
                })
            },

            updateQuestionnaires() {
                const token = this.getAuthToken()
                this.$Progress.start()
                this.form.put('/api/questionnaires/' + this.form.id, {
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

            deleteQuestionnaires(id) {
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
                        this.form.delete('/api/questionnaires/' + id, {
                            withCredentials: true,
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        })
                        .then((res) => {
                            if (res.data.ResultCode == 1200) {
                                swal.fire('Deleted!', res.data.ResponseData, 'success')
                                this.$Progress.finish()
                                Fire.$emit('AfterCreate')
                            }
                        })
                        .catch(() => {
                            this.$Progress.fail()
                            swal.fire('Failed!', 'Something went wrong', 'warning')
                        })
                    }
                })
            },

            copyQuestionnaires(id) {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires/copy/'+id, {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then((res) => {
                    if (res.data.ResultCode == 1200) {
                        swal.fire('Copied!', res.data.ResponseData, 'success')
                        this.$Progress.finish()
                        Fire.$emit('AfterCreate')
                    }
                })
                .catch(() => {
                    this.$Progress.fail()
                    swal.fire('Failed!', 'Something went wrong', 'warning')
                })
            },

            sendQuestionnaires(id) {
                const token = this.getAuthToken()
                this.$Progress.start()
                axios.get('/api/questionnaires/send/'+id, {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then((res) => {
                    if (res.data.ResultCode == 1200) {
                        swal.fire('Sent!', res.data.ResponseData, 'success')
                        this.$Progress.finish()
                    }
                })
                .catch(() => {
                    this.$Progress.fail()
                    swal.fire('Failed!', 'Something went wrong', 'warning')
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
            this.loadQuestionnaires();
            this.loadUsers();
            this.loadTemplateData();
            Fire.$on('AfterCreate', () => {
                this.loadQuestionnaires()
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
