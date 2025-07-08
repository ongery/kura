<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <IncidentManToolbar :title="'All Incindents'"></IncidentManToolbar>

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
                                            <!-- <th>Actions</th>
                          <th>Attachment</th> -->
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr v-for="mode in alldata" :key="mode.id">
                                            <td>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)" class="fw-bold  text-hover-success fs-6"
                                                        >{{ mode.Title }}
                                                        <i class="fa fa-edit blue"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <td style="color: #258c37;">
                                                <span class="text-hover-success d-block fs-6"> {{ mode.IncidentDate }}</span>
                                            </td>

                                            <td>
                                                <span href="#" class="text-dark text-hover-success d-block fs-6">{{ mode.IncidentReportOn }}</span>
                                            </td>

                                            <td>
                                                <a class="text-dark text-hover-success d-block fs-6" href="#" @click.prevent="deleteRoute(mode.id)">
                                                    <i class="fa fa-trash red"></i>
                                                </a>
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
                                    <input v-model="form.Title" type="text" placeholder="Title" class="form-control" :class="{ 'is-invalid': form.errors.has('Title') }" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for>Description</label>
                                    <textarea rows="3" v-model="form.Description" placeholder="Description" class="form-control" :class="{ 'is-invalid': form.errors.has('Description') }"></textarea>
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

        <!-- Modal -->
        <div class="modal fade" id="addNewAttachment" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">addNewAttachment</h5>
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
                                    <input v-model="form.Title" type="text" placeholder="Title" class="form-control" :class="{ 'is-invalid': form.errors.has('Title') }" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for>Description</label>
                                    <textarea rows="3" v-model="form.Description" placeholder="Description" class="form-control" :class="{ 'is-invalid': form.errors.has('Description') }"></textarea>
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
                Title: '',
                Description: '',
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
            const token = this.getAuthToken();
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
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
            this.$router.push({ name: 'MyKRIs' })
        },

        NewItem() {
            this.$router.push({ name: 'NewIncident' })
        },
        forReview() {
            this.$router.push({ name: 'ForReview' })
        },
        editModal(mode) {
            this.$router.push({ name: 'EditIncident', params: { id: mode.id } })
        },
        viewAttachments(mode) {
            this.$router.push({ name: 'IncidentAttachment', params: { id: mode.id } })
        },
        viewActions(mode) {
            this.$router.push({ name: 'ActionIndex', params: { id: mode.id } })
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
