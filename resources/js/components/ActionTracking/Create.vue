<template>
    <div class=" row mt-2">
        <ActionTrackingToolbar :title="RName"></ActionTrackingToolbar>

        <form @submit.prevent="createAction()">
            <div class="row card card-body  p-12 m-1">
                <div class="form-group ml-6 mt-1">
                    <div class="form-group mt-1">
                        <div class="card mb-5  mt-1">
                            <h1 class="pb-3 fw-bold text-dark text">Risk Event</h1>

                            <div class="col col-md-12">
                                <!-- <select name="risk_events" id="risk_events" class="form-control" v-model="form.RiskID">
                                    <option value="" disabled > Select Risk Event </option>
                                    <option v-for="re in riskevents" :key="re.id" :value="re.id"> {{ re.Name }} </option>
                                </select> -->
                                <input v-model="RName" type="text" readonly name="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('BName') }" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card card-body p-8 m-1">
                <div>
                    <h1 class="fw-bold text-dark text mb-9">New Action</h1>
                    <div class="row mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Name of Action</label>
                            <input v-model="form.Name" type="text" placeholder="Name of Action" class="form-control  form-control-solid" :class="{ 'is-invalid': form.errors.has('Name') }" />
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
                        >
                        </textarea>
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
                    <!-- <div>
                        <h5>Milestone Completion: {{ completionPercentage }}%</h5>
                        <progress :value="completionPercentage" max="100"></progress>
                    </div>
                    <div v-for="(milestone, index) in form.milestones" :key="index">
                        <p>{{ milestone.name }}</p>
                        <select v-model="milestone.status" @change="updateMilestoneStatus(milestone)">
                            <option value="0">Not Started</option>
                            <option value="in-progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div> -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="fv-row">
                                <span class="badge badge-light p-6 mb-6 mt-3 col-md-12 " style="font-size:medium">Select Risk Sources To Treat</span>
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
                        </div>

                        <div class="col-md-6 mb-5">
                            <div class="fv-row">
                                <span class="badge badge-light p-6 mb-6 mt-3 col-md-12" style="font-size:medium">Select Supervisor</span>
                                <div class="col-md-12 fv-row mb-5">
                                    <select name="type" v-model="form.user_id" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('user_id') }">
                                        <option v-for="val in users" :value="val.id" :key="val.id">
                                            {{ val.Fname + ' ' + val.Lname }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="user_id"></has-error>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header align-items-center bg-light">
                            <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;">User Assignments</h3>

                            <div class="card-tools align-items-center ">
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="#" @click.prevent="showModalUsers" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                        Select Users
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card card-xl-stretch mb-3">
                        <table class="table table-bordered table-hover mt-2">
                            <tbody>
                                <tr v-for="mode in selectedAssignments" :key="mode.id">
                                    <td style="color: #258c37;" class="fw-bold p-5">{{ mode.Fname + ' ' + mode.Lname }}</td>
                                    <td>
                                        <a href="#" @click.prevent="deleteUser(mode.id)">
                                            <i class="fa fa-trash red"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-5" v-for="(milestone, index) in form.milestones" :key="index">
                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Sub Activity</label>
                            <input v-model="milestone.milestone_name" type="text" placeholder="Sub Activity" class="form-control" />
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Due Date</label>
                            <input v-model="milestone.due_date" type="date" class="form-control" />
                        </div>

                        <div class="col-md-3 fv-row">
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

                        <div class="col-md-3 fv-row">
                            <label class="fs-5 fw-semibold mb-2">Attachment</label>
                            <input class="form-control" type="file" @change="handleFileUpload($event, index)" />
                        </div>
                    </div>
                    <button type="button" @click="addMilestone" class="btn btn-primary mt-3">Add Milestone</button>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal -->
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
                                    <tr>
                                        <td colspan="2"><input class="form-control" type="text" placeholder="Type to search Users from given list below" v-model="searchQuery" /></td>
                                    </tr>
                                    <tr v-for="mode in filteredUsers" :key="mode.id">
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
    name: 'ActionTrackingCreate',
    data() {
        return {
            RiskNameData: '',
            reports: {},
            categories: {},
            showcauses: false,
            showactions: false,
            showeffects: false,
            riskcauses: {},
            riskevents: {},
            users: {},
            BName: '',
            RName: '',
            selectedAssignments: [],
            searchQuery: '',
            form: new Form({
                id: '',
                RiskID: localStorage.risk_id,
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
                        milestone_name: '',
                        due_date: '',
                        attachment: '',
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
    props: ['riskName'],
    components: {
        Datepicker,
        ActionTrackingToolbar
    },
    computed: {
        completionPercentage() {
            if (this.form.milestones.length === 0) return 0;
            const completedMilestones = this.form.milestones.filter(milestone => milestone.status === 'completed').length;
            return (completedMilestones / this.form.milestones.length) * 100;
        },
        filteredUsers() {
            return this.users.filter(user =>
                user.full_name.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
        
    },
    methods: {
        closeModel() {
            $('#addNew').modal('hide')
        },
        loadUsers() {
            axios.get('/api/user')
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
            this.form.milestones.push({ milestone_name: '', due_date: '', status: '0', attachment: '' })
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

        handleFileUpload(event, index) {
            this.form.milestones[index].attachment = event.target.files[0];
        },
        createAction() {
            this.$Progress.start();
            this.form.DueDate = moment(this.form.DueDate).format('YYYY-MM-DD');
            this.form.selectedAssignments = this.selectedAssignments;

            let formData = new FormData();

            formData.append('id', this.form.id);
            formData.append('RiskID', this.form.RiskID);
            formData.append('ObjType', this.form.ObjType);
            formData.append('Source', this.form.Source);
            formData.append('Category', this.form.Category);
            formData.append('DueDate', this.form.DueDate);
            formData.append('Status', this.form.Status);
            formData.append('Name', this.form.Name);
            formData.append('Description', this.form.Description);
            formData.append('Rating', this.form.Rating);
            formData.append('CategoryObjType', this.form.CategoryObjType);
            formData.append('user_id', this.form.user_id);
            formData.append('selectedAssignments', JSON.stringify(this.form.selectedAssignments));

            this.form.milestones.forEach((milestone, index) => {
                formData.append(`milestones[${index}][milestone_name]`, milestone.milestone_name);
                formData.append(`milestones[${index}][due_date]`, milestone.due_date);
                formData.append(`milestones[${index}][status]`, milestone.status);

                if (milestone.attachment) {
                    formData.append(`milestones[${index}][attachment]`, milestone.attachment);
                }
            });

            // Send FormData via API request
            axios.post('/api/actiontracking', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    const actionId = res.data.actionId;
                    swal.fire('Created!', 'Successfully Created Action.', 'success');
                    this.$router.push({ name: 'TreatmentAction' });
                    this.$Progress.finish();
                } else {
                    this.$Progress.fail();
                    toast.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.data.ResultDesc
                    });
                }
            })
            .catch(error => {
                this.$Progress.fail();
                toast.fire({
                    icon: 'error',
                    title: 'Operation not successful: ' + error.response.data.message
                });
            });
        },
        loadCategory() {
            axios.get('/api/category', {
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
        loadCausesEffects() {
            axios.get('/api/getCausesEffects', {
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
        },

        loadRiskEventsData() {
            axios.get('/api/risklibrarysetup', {
                params: {
                    ObjType: 22
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.riskevents = res.data.ResponseData.data;
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
    },
    async updateMilestoneStatus(milestoneId, status) {
        try {
            const response = await axios.put(`/api/actiontracking/milestones/${milestoneId}/status`, { status })
            if (response.data.success) {
                this.$toast.success('Milestone status updated!')
            }
        } catch (error) {
            this.$toast.error('Failed to update milestone status.')
        }
    },
    created() {
        this.loadUsers()
        this.loadCausesEffects()
        this.loadCategory()
        this.loadRisk()
        this.loadRiskEventsData()
    }
}
</script>