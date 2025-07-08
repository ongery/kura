<template>
    <div class="row mt-2">
        <ActionTrackingOverviewToolbar :title="RName"> </ActionTrackingOverviewToolbar>

        <form @submit.prevent="updateAction()">
            <div class="row card card-body p-8 m-1">
                <div class="form-group ml-6 mt-1">
                    <div class="form-group mt-1">
                        <div class="card mb-5  mt-1">
                            <h1 class="pb-3 fw-bold text-dark text">Risk Event</h1>

                            <div class="col col-md-12">
                                <select name="risk_events" id="risk_events" class="form-control" v-model="form.RiskID">
                                    <option value="" > Select Risk Event </option>
                                    <option v-for="re in riskevents" :key="re.id" :value="re.id"> {{ re.Name }} </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card card-body p-8 m-1">
                <h1 class="fw-bold text-dark text mb-9">Action</h1>
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
                        style="resize: none;"
                    >
                    </textarea>
                    <has-error :form="form" field="Description"></has-error>
                </div>
                
                <div class="row mb-5">
                    <div class="col-md-4 fv-row">
                        <label class="fs-5 fw-semibold mb-2">Status</label>
                        <select name="type" v-model="form.Status" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('Statuss') }">
                            <option value="0">Not Started (Not Due)</option>
                            <option value="1">WIP (On Course)</option>
                            <option value="2">WIP (Overdue)</option>
                            <option value="3">Not Started (Overdue)</option>
                            <option value="4">Deffered</option>
                            <option value="5">Completed</option>
                        </select>
                    </div>

                    <div class="col-md-4 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Rating</label>
                        <select name="type" v-model="form.Rating" id="type" class="form-control" :class="{ 'is-invalid': form.errors.has('Rating') }">
                            <option value="0">LOW</option>
                            <option value="1">MEDIUM</option>
                            <option value="2">HIGH</option>
                        </select>
                    </div>

                    <div class="col-md-4 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Due Date</label>
                        <datepicker :bootstrap-styling="true" v-model="form.DueDate" :disabledDates="state.disabledDates" :class="{ 'is-invalid': form.errors.has('DueDate') }" name="fromWhen">
                            <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                        </datepicker>
                    </div>
                </div>

                <div class="card-header ms-2 mt-5 bg-light">
                    <h3 class="card-title fw-bold text-gray-600" style="font-size:medium;"> Milestones </h3>
                </div>
                <div class="row mb-5 mt-3" v-for="(milestone, index) in form.milestones" :key="index">
                    <input type="hidden" name="milestone_id" v-model="milestone.id">
                    <input type="hidden" name="action_id" v-model="milestone.action_id">
                    
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
                        <select v-model="milestone.status" class="form-control" >
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
                <button type="button" @click="addMilestone" class="btn btn-primary mt-3 w-150px">Add Milestone</button>

                <!-- <div class="modal-body">
                    <WorkInProgress> </WorkInProgress>
                </div> -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker'
    import moment from 'moment'
    import WorkInProgress from './WorkInProgress.vue'
    import ActionTrackingOverviewToolbar from './components/ActionTrackingOverviewToolbar'
    import axios from 'axios'

    export default {
        data() {
            return {
                reports: {},
                categories: {},
                showcauses: false,
                showactions: false,
                showeffects: false,
                riskcauses: {},
                riskevents: {},
                users: {},
                assignedusers: {},
                BName: '',
                RName: '',
                selectedAssignments: [],
                riskEventTitle: '',
                form: new Form({
                    id: '',
                    RiskID: '',
                    ObjType: 19,
                    Source: '',
                    Category: 1,
                    DueDate: '',
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
                            attachment: '',
                            status: '0'
                        }
                    ]
                }),
                state: {
                    disabledDates: {
                        from: new Date()
                    }
                }
            }
        },
        components: {
            Datepicker,
            WorkInProgress,
            ActionTrackingOverviewToolbar
        },
        methods: {
            CountChecked(mode) {
                var isSelected = mode.isSelected
                axios.get('/api/syncRelForAction', {
                    params: {
                        action_id: localStorage.action_id,
                        ItemID: mode.id,
                        isSelected: isSelected
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        // Handle successful response
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
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    })
                })
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
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    })
                })
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
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    })
                })
            },
            addMilestone() {
                this.form.milestones.push({ milestone_name: '', due_date: '', status: '0', attachment: '' })
            },
            loadAction() {
                axios.get('/api/actiontracking/' + localStorage.action_id).then(res => {
                    this.form.fill(res.data.ResponseData)
                    this.form.RiskID = res.data.ResponseData.o_r_i_s_k_id;
                    this.selectedAssignments = res.data.ResponseData.users
                    this.form.milestones = res.data.ResponseData.milestone
                    this.RName = res.data.ResponseData.Name
                })
            },
            loadCausesEffects() {
                axios.get('/api/getCausesEffects', {
                    params: {
                        RiskID: localStorage.risk_id,
                        isForAction: 1,
                        action_id: localStorage.action_id
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
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    })
                })
            },
            handleFileUpload(event, index) {
                this.form.milestones[index].attachment = event.target.files[0];
            },
            updateAction() {
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

                // Append milestones to FormData
                this.form.milestones.forEach((milestone, index) => {
                    formData.append(`milestones[${index}][action_id]`, this.form.id);
                    formData.append(`milestones[${index}][milestone_name]`, milestone.milestone_name);
                    formData.append(`milestones[${index}][due_date]`, milestone.due_date);
                    formData.append(`milestones[${index}][status]`, milestone.status);

                    if (milestone.attachment) {
                        console.log(`milestones[${index}][attachment]`, milestone.attachment);
                        formData.append(`milestones[${index}][attachment]`, milestone.attachment);
                    }
                });

                this.form.put('/api/actiontracking/'+this.form.id+'', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        swal.fire('Created!', 'Successfully Created Action.', 'success');
                        this.$router.push({ name: 'TreatmentAction' });
                        this.$Progress.finish();
                    } else {
                        toast.fire({
                            type: 'error',
                            title: res.data.ResultDesc
                        });
                    }
                })
                .catch(e => {
                    this.$Progress.fail();
                    toast.fire({
                        type: 'error',
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    });
                });
            },
            showModalUsers() {
                $('#addNew').modal('show');
            },
            CountChecked(mode) {
                const item = this.selectedAssignments.find(record => {
                    return record.id === mode.id;
                });
                if (item) {
                    return;
                }
                this.selectedAssignments.push(mode);
            },
            deleteUser(id) {
                const item = this.selectedAssignments.find(record => {
                    return record.id === id;
                });
                const pos = this.selectedAssignments.indexOf(item);
                if (pos === -1) {
                    return;
                }
                this.selectedAssignments.splice(pos, 1);
            },
            GoBack() {
                this.$router.go(-1);
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
        created() {
            this.loadUsers();
            this.loadCategory();
            this.loadAction();
            this.loadRiskEventsData();
            Fire.$on('AfterCreate', () => {
                this.loadAction();
            });
        }
    }
</script>

