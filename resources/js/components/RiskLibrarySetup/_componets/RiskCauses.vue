<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <!-- Header Details-->
                <!-- begin:card -->
                <div class="card">
                    <!-- begin:card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>

                        <div class="card-tools align-items-center py-5">
                            <!--begin::Upload button-->
                            <span @click="newModal" class="btn btn-sm fw-bold text-white-400 btn-success btn-active-color-dark">
                                New
                            </span>
                            <!--end::Upload button-->
                        </div>
                    </div>
                    <!-- end:card-header -->
                </div>
                <!-- end:card -->

                <div>
                    <!--begin::Table container-->
                    <div class="card p-5 mt-5 table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th>Reference</th>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                <tr v-for="mode in alldata" :key="mode.id">
                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" style="color: #258c37;" @click.prevent="editModal(mode)" class="fw-bold  text-hover-success fs-6">{{ mode.DocNum }}</a>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" style="color: #258c37;" @click.prevent="editModal(mode)" class="text-hover-success fs-6">{{ mode.Name }}</a>
                                        </div>
                                    </td>

                                    <td>
                                        <a class="text-dark text-hover-danger d-block fs-6" href="#" @click.prevent="deleteRoute(mode.id)">
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
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Risk Sources</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateData(form.id) : createData()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Category</label>
                                    <select class="form-control" v-model="form.CategoryID" name="CategoryID" :class="{ 'is-invalid': form.errors.has('CategoryID') }">
                                        <option v-for="val in categories" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="CategoryID"></has-error>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for>Name</label>
                                    <input v-model="form.Name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for>Description</label>
                                    <textarea rows="5" v-model="form.description" placeholder="Description" class="form-control" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                                    <has-error :form="form" field="description"></has-error>
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
import 'vue-toastification/dist/index.css'
export default {
    data() {
        return {
            editmode: false,
            categories: {},
            alldata: {},
            counter: 1,
            form: new Form({
                id: '',
                ObjType: 7,
                description: '',
                CategoryID: '',
                CategoryObjType: 1,
                RiskLevelID: '',
                Name: ''
            })
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        getResults(page = 1) {
            const token = this.getAuthToken()
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
            const token = this.getAuthToken()
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
            const token = this.getAuthToken()
            axios
                .get('/api/risklibrarysetup', {
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
                        this.alldata = res.data.ResponseData.data
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
        createData() {
            const token = this.getAuthToken()
            this.$Progress.start()
            // Now you can make the authenticated POST request
            this.form
                .post('/api/risklibrarysetup', {
                    withCredentials: true, // Ensure cookies like XSRF-TOKEN are sent
                    headers: {
                        Authorization: `Bearer ${token}` // Include the authentication token
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
                        title: 'Operation not successful' + '\n' + e.response.data.message
                    })
                })
        },
        updateData(id) {
            const token = this.getAuthToken()
            this.$Progress.start()
            // Now you can make the authenticated POST request
            this.form
                .put('/api/risklibrarysetup/'+id, {
                    withCredentials: true, // Ensure cookies like XSRF-TOKEN are sent
                    headers: {
                        Authorization: `Bearer ${token}` // Include the authentication token
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
                const token = this.getAuthToken()
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete('/api/risklibrarysetup/' + id, {
                            withCredentials: true,
                            headers: {
                                Authorization: `Bearer ${token}`
                            }
                        })
                        .then(() => {
                            swal.fire('Deleted!', 'Risk Sources Deleted Successfully.', 'success')
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
            const token = this.getAuthToken()
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

        newModal() {
            this.editmode = false
            this.form.reset()
            $('#addNew').modal('show')
        },
        editModal(mode) {
            this.editmode = true
            this.form.reset()
            $('#addNew').modal('show')
            this.form.fill(mode)
        },
        testingPop() {
            this.$toast('Risk Causes is the set of methods by which firms evaluate potential losses and take action to reduce or eliminate such threats.', {
                position: 'bottom-right',
                timeout: 5000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: 'button',
                icon: true,
                rtl: false
            })
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
