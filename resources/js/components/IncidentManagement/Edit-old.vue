<template>
    <div class="row mt-2">
        <IncidentManToolbar :title="'Edit Incident'"></IncidentManToolbar>

        <!-- <div class="card card-body table-responsive p-0"> -->
        <div class="row card card-body p-12 m-1">
            <div>
                <form @submit.prevent="createData()">
                    <!-- <h1 class="fw-bold text-dark text mb-9">Edit Action</h1> -->

                    <!-- Title -->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Title</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input v-model="form.Title" type="text" placeholder="Title" class="form-control" :class="{ 'is-invalid': form.errors.has('Title') }" />
                            <has-error :form="form" field="Name"></has-error>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!-- Description -->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
                        <label class="fs-6 fw-semibold mb-2" for>Description</label>

                        <!-- <textarea v-model="form.description" class="form-control form-control-solid" :class="{ 'is-invalid': form.errors.has('message') }" rows="3" name="description"
                          placeholder="Description">
                      </textarea> -->

                        <textarea rows="3" v-model="form.Description" placeholder="Description" class="form-control" :class="{ 'is-invalid': form.errors.has('Description') }"></textarea>
                        <has-error :form="form" field="Description"></has-error>
                    </div>
                    <!--end::Input group-->

                    <!-- Name & Category -->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Incident Occured On</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <label for>Incident Occured On</label>
                            <datepicker :bootstrap-styling="true" v-model="form.IncidentDate">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-semibold mb-2" for>Incident Reported On</label>
                            <datepicker :bootstrap-styling="true" v-model="form.IncidentReportOn">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                            <!--end::Select-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                </form>
            </div>
        </div>

        <div class=" card-body table-responsive p-0">
            <div>
                <!-- <form @submit.prevent="createData()"> -->
                <div class="modal-body">
                    <div class="form-row">
                    </div>

                    <IncidentManSubToolbar></IncidentManSubToolbar>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import Attachments from './Attachments.vue'
import Actions from './Actionindex.vue'
import IncidentManToolbar from './components/IncidentManToolbar.vue'
import IncidentManSubToolbar from './components/IncidentManSubToolbar.vue'
export default {
    data() {
        return {
            categories: {},
            riskevents: {},
            users: {},
            showmode: '',
            form: new Form({
                id: '',
                o_i_t_m_id: '',
                Title: '',
                Name: '',
                Description: '',
                Weight: '',
                Frequency: '',
                StartDate: new Date(),
                ExpiredDate: '',
                DataType: '',
                LowerLimit: '',
                GreenAmber: '',
                IncidentDate: '',
                IncidentReportOn: '',
                UpperLimit: '',
                ObjType: 17,
                CategoryObjType: 5,
                selectedAssignments: []
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
        Attachments,
        Actions,
        IncidentManToolbar,
        IncidentManSubToolbar
    },
    watch: {
        '$route.params.id': {
            handler: 'loadData',
            immediate: true
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        /**
         * Creating Risk
         */
        createData() {
            const token = this.getAuthToken();
            this.form.IncidentDate = moment(this.form.IncidentDate).format('YYYY-MM-DD')
            this.form.IncidentReportOn = moment(this.form.IncidentReportOn).format('YYYY-MM-DD')
            this.$Progress.start()
            this.form
                .post('/api/incident-management', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        toast.fire({
                            type: 'success',
                            title: 'Created in successfully'
                        })
                        this.$router.push({ name: 'AllIncidents' })
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
                        title: 'Operation not successfull' + '\n' + e.response.data.message
                    })
                })
        },
        showActions() {
            this.showmode = 'actions'
            this.subTitle = 'Improvement Action'
        },
        showAttachments() {
            this.showmode = 'attachments'
            this.subTitle = 'Incident Attachments'
        },
        GoBack() {
            this.$router.back()
        },
        loadData(val) {
            if (val) {
                const token = this.getAuthToken();
                axios.get('/api/incident-management/' + val, {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                }).then(res => {
                    this.form.fill(res.data.ResponseData)
                    //   this.form.Value = res.data.ResponseData.kri1.Value
                    //   this.form.desc = res.data.ResponseData.kri1.desc
                    //   this.form.riskEventTitle = res.data.ResponseData.item.Name
                    //   this.form.description = res.data.ResponseData.description
                })
            }
        }
    },
    created() {
        this.showActions()
    }
}
</script>
