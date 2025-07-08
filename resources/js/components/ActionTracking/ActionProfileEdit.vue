<template>
    <div class=" row mt-2">
        <ActionTrackingToolbar :title="RName"> </ActionTrackingToolbar>

        <form @submit.prevent="updateAction()">
            <!--start: Header -->
            <div class="row card card-body p-8 m-1">
                <div class="form-group ml-6 mt-1">
                    <div class="form-group mt-1">
                        <div class="card mb-5  mt-1">
                            <h1 class="pb-3 fw-bold text-dark text">Risk Event</h1>
                            <div class="col col-md-10">
                                <input v-model="RName" type="text" readonly name="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('BName') }" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row card card-body p-8 m-1">
                <div>
                    <h1 class="fw-bold text-dark text mb-9">Edit Action</h1>
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Name of Action</label>
                            <input v-model="form.Name" type="text" placeholder="Name of Action" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('Name') }" />
                        </div>
                        
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for>Action Category</label>
                            <select name="type" v-model="form.Category" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                                <option v-for="val in categories" :value="val.id" :key="val.id">
                                    {{ val.Name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-flex flex-column col col-md-12 mb-5 fv-row">
                        <label class="fs-6 fw-semibold mb-2" for>Description of Action</label>
                        <textarea
                            rows="3"
                            v-model="form.Description"
                            placeholder="Description"
                            class="form-control form-control-solid"
                            :class="{
                                'is-invalid': form.errors.has('Description')
                            }"
                            style="resize:none;"
                        ></textarea>
                        <has-error :form="form" field="Description"></has-error>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Status</label>
                            <select name="type" v-model="form.Status" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('Status') }">
                                <option value="0">Not Started (Not Due)</option>
                                <option value="1">WIP (On Course)</option>
                                <option value="2">WIP (Overdue)</option>
                                <option value="3">Not Started (Overdue)</option>
                                <option value="4">Deffered</option>
                                <option value="5">Completed</option>
                            </select>
                            <has-error :form="form" field="Status"></has-error>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for>Rating</label>
                            <select name="type" v-model="form.Rating" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('Rating') }">
                                <option value="0">LOW</option>
                                <option value="1">MEDIUM</option>
                                <option value="2">HIGH</option>
                            </select>
                            <has-error :form="form" field="Rating"></has-error>
                        </div>
                    
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for>Due Date</label>
                            <datepicker :bootstrap-styling="true" v-model="form.DueDate" :disabledDates="state.disabledDates" :class="{ 'is-invalid': form.errors.has('DueDate') }" name="fromWhen">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                            <has-error :form="form" field="DueDate"></has-error>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <span class="badge badge-light p-6 mb-6 mt-3 col-md-12" style="font-size:medium">Select Risk Sources To Treat</span>
                            <div class="card card-xl-stretch mb-5">
                                <div class="card-body py-3">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                            <tbody>
                                                <tr v-for="mode in riskcauses" :key="mode.id">
                                                    <td>
                                                        <input type="checkbox" :value="mode.id" v-model="form.selectedCauses" />
                                                    </td>
                                                    <td>{{ mode.Name }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 fv-row">
                            <span class="badge badge-light p-6 mb-6 mt-3 col-md-12" style="font-size:medium">Select Supervisor</span>
                            <div class="col-md-12 fv-row mb-5">
                                <select name="type" v-model="form.user_id" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('user_id') }">
                                    <option v-for="val in users" :value="val.id" :key="val.id">
                                        {{ val.Fname + ' ' + val.Lname }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-5 mt-2">
                        <div class="card-header align-items-center bg-light">
                            <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;">User Assignments</h3>

                            <div class="card-tools align-items-center ">
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="#" @click.prevent="showModalUsers" class="btn btn-sm fw-bold btn-success btn-active-color-dark"> Select Users </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-xl-stretch mb-5">
                        <table class="table table-bordered table-hover mt-2">
                            <tbody>
                                <tr v-for="mode in selectedAssignments" :key="mode.id">
                                    <td>{{ mode.Fname + ' ' + mode.Lname }}</td>
                                    <td>
                                        <a href="#" @click.prevent="deleteUser(mode.id)">
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <span class="badge badge-light p-6 mb-6 mt-3 col-md-12" style="font-size:medium">Milestone Action Percentage: &nbsp;&nbsp;<b> {{action_percent}}% </b></span>
                        </div>
                    </div>

                    <div class="row mb-5" v-for="(milestone, index) in form.milestones" :key="index">
                        <input type="hidden" name="milestone_id" id="milestone_id" v-model="milestone.id">
                        <input type="hidden" name="action_id" id="action_id" v-model="milestone.action_id">
                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Milestone Name</label>
                            <input v-model="milestone.milestone_name" type="text" placeholder="Milestone Name" class="form-control" />
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Due Date</label>
                            <input v-model="milestone.due_date" type="date" class="form-control" />
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Status</label>
                            <select v-model="milestone.status" class="form-control">
                                <option value="0">Not Started (Not Due)</option>
                                <option value="1">WIP (On Course)</option>
                                <option value="2">WIP (Overdue)</option>
                                <option value="3">Not Started (Overdue)</option>
                                <option value="4">Deferred</option>
                                <option value="5">Completed</option>
                            </select>
                        </div>
                    </div>
                    <button type="button" @click="addMilestone" class="btn btn-primary mt-3">Add Milestone</button>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel"> Select Users </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                        <div class="modal-body">
                            <table class="table table-bordered table-hover  table-sm">
                                <tbody>
                                    <tr v-for="mode in users" :key="mode.id">
                                        <td>
                                            <input type="checkbox" :value="mode.id" @change="CountChecked(mode)" />
                                        </td>
                                        <td>{{ mode.full_name }}</td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" @click="closeModel"> Ok </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import ActionTrackingToolbar from './components/ActionTrackingToolbar.vue'
export default {
    data() {
        return {
            reports: {},
            categories: {},
            showcauses: false,
            showactions: false,
            showeffects: false,
            riskcauses: {},
            users: {},
            BName: '',
            RName: '',
            selectedAssignments: [],
            action_percent: 0,
            form: new Form({
                id: '',
                RiskID: '',
                ObjType: 19,
                Source: '',
                Category: 1,
                DueDate: new Date(),
                Status: '',
                Name: '',
                Description: '',
                Rating: '',
                CategoryObjType: 18,
                selectedCauses: [],
                user_id: '',
                selectedAssignments: [],
                milestones: [
                    {
                        id: '',
                        action_id: '',
                        milestone_name: '',
                        due_date: '',
                        status: '0'
                    }
                ]
            }),
            state: {
                disabledDates: {
                    from: new Date(new Date().setFullYear(new Date().getFullYear() + 3))
                }
            }
        }
    },
    components: {
        Datepicker,
        ActionTrackingToolbar
    },
    methods: {
        closeModel() {
            $('#addNew').modal('hide')
        },

        loadUsers() {
            axios
                .get('/api/user')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.users = res.data.ResponseData
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

        addMilestone() {
            this.form.milestones.push({ milestone_name: '', due_date: '', status: '0' })
        },

        showRiskCauses() {
            this.showcauses = true
            this.showactions = false
            this.showeffects = false
        },
        
        showRiskEffects() {
            this.showcauses = false
            this.showactions = false
            this.showeffects = true
        },
        /**
         * Creating Risk
         */
        updateAction() {
            this.form.RiskID = localStorage.risk_id
            this.form.selectedAssignments = this.selectedAssignments
            this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD')
            this.$Progress.start()
            this.form
                .put('/api/actiontracking/' + localStorage.action_id)
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        swal.fire('Created!', 'Successfully Created.', 'success')
                        this.$router.push({ name: 'AnalyseRiskProfile' })
                        this.$Progress.finish()
                    } else {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            type: 'error',
                            title: 'Oops...',
                            text: res.data.ResultDesc
                        })
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({
                        icon: 'error',
                        type: 'error',
                        title: 'Operation not successfull' + '\n' + e.response.data.message
                    })
                })
        },

        loadCategory() {
            axios
                .get('/api/category', {
                    params: {
                        ObjType: this.form.CategoryObjType
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

        loadRisk() {
            axios.get('/api/risks/' + localStorage.risk_id).then(res => {
                this.BName = res.data.ResponseData.bunit.Name
                this.RName = res.data.ResponseData.item.Name
            })
        },

        loadAction() {
            axios.get('/api/actiontracking/' + localStorage.action_id).then(res => {
                this.form.fill(res.data.ResponseData)
                this.selectedAssignments = res.data.ResponseData.users
                this.form.selectedCauses = res.data.ResponseData.riskcauses
                this.form.milestones = res.data.ResponseData.milestone
                this.action_percent = res.data.ResponseData.action_percent ?? 0
            })

            console.log('check-selectedCauses', this.form.selectedCauses);
        },

        loadCausesEffects() {
            axios
                .get('/api/getCausesEffects', {
                    params: {
                        RiskID: localStorage.risk_id,
                        isForAction: 1
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.riskcauses = res.data.ResponseData.causes
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
        
        showModalUsers() {
            $('#addNew').modal('show')
        },

        CountChecked(mode) {
            const item = this.selectedAssignments.find(record => {
                return record.id === mode.id
            })
            if (item) {
                return
            }
            this.selectedAssignments.push(mode)
        },
        
        deleteUser(id) {
            const self = this
            const item = this.selectedAssignments.find(record => {
                return record.id === id
            })

            const pos = this.selectedAssignments.indexOf(item)
            if (pos === -1) {
                return
            }
            this.selectedAssignments.splice(pos, 1)
        }
    },
    created() {
        this.loadUsers()
        this.loadCausesEffects()
        this.loadCategory()
        this.loadRisk()
        this.loadAction()
    }
}
</script>
