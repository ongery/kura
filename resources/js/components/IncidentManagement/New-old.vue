<template>
    <div class=" row mt-2">
        <IncidentManToolbar :title="'New Incident'"></IncidentManToolbar>
        <form @submit.prevent="createData()">
            <div class="row card card-body p-12 m-1">
                <div>
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

                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Incident Occured On</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <datepicker :bootstrap-styling="true" v-model="form.IncidentDate">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->

                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Incident Reported On</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <datepicker :bootstrap-styling="true" v-model="form.IncidentReportOn">
                                <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                            </datepicker>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

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
                </div>
            </div>

            <RiskLevel1 @relatedRisk="setRelatedRisk"></RiskLevel1>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </div>
        </form>

        <!-- <div class="card card-body table-responsive p-0">
      <div> -->
        <!-- <form @submit.prevent="createData()"> -->
        <!-- <div class="modal-body"> -->
        <!-- <div class="form-row"> -->
        <!-- <div class="form-group col-md-6">
                <label for>Incident Occured On</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.IncidentDate"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div> -->

        <!-- <div class="form-group col-md-6">
                <label for>Incident Reported On</label>
                <datepicker
                  :bootstrap-styling="true"
                  v-model="form.IncidentReportOn"
                >
                  <div
                    slot="beforeCalendarHeader"
                    class="calender-header"
                    style="text-align: center; color: red"
                  ></div>
                </datepicker>
              </div> -->

        <!-- <div class="form-group col-md-6">
                <label for>Title</label>
                <input
                  v-model="form.Title"
                  type="text"
                  placeholder="Title"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Title') }"
                />
                <has-error
                  :form="form"
                  field="Name"
                ></has-error>
              </div> -->

        <!-- <div class="form-group col-md-6">

                <label for>Description</label>
                <textarea
                  rows="3"
                  v-model="form.Description"
                  placeholder="Description"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('Description') }"
                ></textarea>
                <has-error
                  :form="form"
                  field="Description"
                ></has-error>
              </div> -->

        <!-- </div> -->

        <!-- <RiskLevel1 @relatedRisk="setRelatedRisk"></RiskLevel1> -->
        <!-- </div> -->

        <!-- <div class="modal-footer">

            <button
              type="submit"
              class="btn btn-success"
            >
              Create
            </button>
          </div> -->
        <!-- </form> -->
        <!-- </div>
    </div> -->
    </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker'
import moment from 'moment'
import RiskLevel1 from './RiskLevel1.vue'
import IncidentManToolbar from './components/IncidentManToolbar.vue'
export default {
    data() {
        return {
            categories: {},
            riskevents: {},
            users: {},
            form: new Form({
                id: '',
                o_i_t_m_id: '',
                CategoryID: '',
                Name: '',
                description: '',
                Weight: '',
                Frequency: '',
                StartDate: new Date(),
                ExpiredDate: '',
                DataType: '',
                LowerLimit: '',
                GreenAmber: '',
                AmberRed: '',
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
        RiskLevel1,
        IncidentManToolbar
    },
    methods: {
        /**
         * Creating Risk
         */
        createData() {
            this.form.IncidentDate = moment(this.form.IncidentDate).format('YYYY-MM-DD')
            this.form.IncidentReportOn = moment(this.form.IncidentReportOn).format('YYYY-MM-DD')
            this.$Progress.start()
            this.form
                .post('/api/incident-management')
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

        showAttachments() {},
        showActions() {},
        showRelatedRisks() {},
        setRelatedRisk(data) {
            console.log(data)
        },
        GoBack() {
            this.$router.back()
        }
    },
    created() {}
}
</script>
