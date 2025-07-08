<template>
    <div>
        <div class="row mt-2">
            <IncidentManToolbar :title="'Incidents Pending Review'"></IncidentManToolbar>
            <div class="col-md-12">
                <div class="card">
                    <!--begin::Tables Widget 3-->
                    <div class="card card-xl-stretch mb-5 mb-xl-12">
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th>Title</th>
                                            <th>Incident Date</th>
                                            <th>Incident Report On</th>
                                            <th>Reported By</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr v-for="mode in alldata" :key="mode.id">
                                            <td>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)" class="text-success fw-bold  text-hover-success fs-6"
                                                        >{{ mode.Title }}
                                                        <i class="fa fa-edit blue"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="text-success text-hover-success d-block fs-6"> {{ mode.IncidentDate }}</span>
                                            </td>

                                            <td>
                                                <span href="#" class="text-dark text-hover-success d-block fs-6">{{ mode.IncidentReportOn }}</span>
                                            </td>

                                            <td>
                                                <span href="#" class="text-dark text-hover-success d-block fs-6">{{ mode.creator.full_name }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 3-->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Incident Editor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for>Incident Occured On</label>
                                    <datepicker :bootstrap-styling="true" v-model="form.IncidentDate">
                                        <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                                    </datepicker>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for>Incident Reported On</label>
                                    <datepicker :bootstrap-styling="true" v-model="form.IncidentReportOn">
                                        <div slot="beforeCalendarHeader" class="calender-header" style="text-align: center; color: red"></div>
                                    </datepicker>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for>Title</label>
                                    <input v-model="form.Title" type="text" readonly placeholder="Title" class="form-control" :class="{ 'is-invalid': form.errors.has('Title') }" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for>Description</label>
                                    <textarea rows="3" readonly v-model="form.Description" placeholder="Description" class="form-control" :class="{ 'is-invalid': form.errors.has('Description') }"></textarea>
                                    <has-error :form="form" field="Description"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button v-show="editmode" type="submit" class="btn btn-success">
                                Update
                            </button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">
                                Create
                            </button>
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
import IncidentManToolbar from './components/IncidentManToolbar.vue'
export default {
    data() {
        return {
            editmode: false,
            categories: {},
            alldata: {},
            counter: 1,
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
            })
        }
    },
    components: {
        Datepicker,
        IncidentManToolbar
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        getResults(page = 1) {
            const token = this.getAuthToken();
            axios
                .get('/api/category?page=' + page, {
                    params: {
                        ObjType: this.form.ObjType
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(response => {
                    this.categories = response.data
                })
        },
        loadCategory() {
            const token = this.getAuthToken();
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

        loadData() {
            const token = this.getAuthToken();
            axios
                .get('/api/incident-management', {
                    params: {
                        ObjType: this.form.ObjType
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData
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
        deleteRoute(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                const token = this.getAuthToken();
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete('/api/category/' + id, {
                            withCredentials: true,
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        })
                        .then(() => {
                            swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                            Fire.$emit('AfterCreate')
                        })
                        .catch(() => {
                            swal.fire('Failed!', 'Something when wrong', 'warning')
                        })
                }
            })
        },
        updateCategory() {
            this.$Progress.start()
            const token = this.getAuthToken();
            // console.log('Editing data');
            this.form
                .put('/api/category/' + this.form.id, {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(() => {
                    // success
                    $('#addNew').modal('hide')
                    swal.fire('Updated!', 'Information has been updated.', 'success')
                    this.$Progress.finish()
                    Fire.$emit('AfterCreate')
                })
                .catch(() => {
                    this.$Progress.fail()
                })
        },

        MyKRIs() {
            this.$router.push({ name: 'AllIncidents' })
        },

        NewItem() {
            this.$router.push({ name: 'NewIncident' })
        },
        forReview() {
            this.$router.push({ name: 'ForReview' })
        },
        editModal(mode) {
            this.editmode = true
            this.form.reset()
            $('#addNew').modal('show')
            this.form.fill(mode)
        }
    },
    created() {
        this.loadCategory()
        this.loadData()
        Fire.$on('AfterCreate', () => {
            this.loadData()
        })
    }
}
</script>
