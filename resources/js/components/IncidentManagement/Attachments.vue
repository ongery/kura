<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div>
                    <!-- <div class="card-header">
            <h3 class="card-title">Incident Attachments</h3>
            <div class="card-tools">
              <button
                class="btn btn-success btn-sm"
              > -->
                    <!-- @click="editModal1" -->
                    <!-- <i class="fas fa-plus"></i>
                New
              </button>

            </div>
          </div> -->
                    <!-- /.card-header -->

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
                                            <th>Upload On</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->

                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr v-for="mode in attachments" :key="mode.id">
                                            <td>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <span class="text-success fw-bold  text-hover-success fs-6">{{ mode.description }} </span>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="text-success text-hover-success d-block fs-6">{{ mode.created_at | myDate }}</span>
                                            </td>

                                            <td>
                                                <span href="#" class="text-dark text-hover-success d-block fs-6">{{ mode.supervisor.Fname }}</span>
                                            </td>

                                            <td>
                                                <a :href="`/attachments/` + mode.id" target="_blank" class="text-dark text-hover-success d-block fs-6">
                                                    <i class="fa fa-download" aria-hidden="true">Click to download</i>
                                                </a>
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

                    <!-- <div class="card card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Title</th>
                  <th>Upload On</th>
                  <th>Download</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="mode in attachments"
                  :key="mode.id"
                >
                  <td>

                    {{ mode.description }}
                  </td>

                  <td>{{mode.created_at | myDate}}</td>
                  <td>

                    <a
                      :href="`/attachments/` + mode.id"
                      target="_blank"
                    >
                      <i
                        class="fa fa-download"
                        aria-hidden="true"
                      >Click to download</i>

                    </a>
                  </td>

                </tr>
              </tbody>
            </table>
          </div> -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNewAttachment" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Incident Editor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="createDataAttachment()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for>Description</label>
                                    <input v-model="form.description" type="text" placeholder="File Name" class="form-control" :class="{ 'is-invalid': form.errors.has('desciption') }" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <label>Select File only PDF</label>
                                        <input class="form-control" type="file" name="records" id="records" required="required" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>

                            <button type="submit" class="btn btn-primary">
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
export default {
    data() {
        return {
            editmode: false,
            categories: {},
            attachments: {},
            counter: 1,
            form: new Form({
                id: '',
                description: '',
                ObjType: 39,
                incident_id: null
            })
        }
    },
    components: {
        Datepicker
    },
    watch: {
        '$route.params.id': {
            handler: 'loadData',
            immediate: true
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        loadData(val) {
            const token = this.getAuthToken();
            this.incident_id = val
            axios
                .get('/api/attachment', {
                    params: {
                        DocEntry: val,
                        ObjType: 39
                    },
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.attachments = res.data.ResponseData
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

        createDataAttachment() {
            const token = this.getAuthToken();
            let formData = new FormData()
            const fileInput = document.getElementById('records')
            formData.append('records', fileInput.files[0])
            formData.append('ObjType', 39)
            formData.append('description', this.form.description)
            formData.append('Name', this.form.description)
            formData.append('DocEntry', this.incident_id)
            this.$Progress.start()

            axios
                .post('/api/attachment', formData, {
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

        // editModal1(mode) {
        //   this.editmode = true
        //   this.form.reset()
        //   $('#addNewAttachment').modal('show')
        //   this.form.fill(mode)
        // },

        GoBack() {
            this.$router.back()
        }
    },
    created() {
        Fire.$on('AfterCreate', () => {
            this.loadData()
        })
    }
}
</script>
