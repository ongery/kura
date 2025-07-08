<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="app-toolbar py-3">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                        <!--begin::Page title-->
                        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                                Categories
                            </h1>
                            <!--end::Title-->

                            <!--begin::Breadcrumb-->
                            <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                                <li>
                                    <div>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <!-- Heroicon name: solid/home -->
                                            <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                            </svg>
                                            <span class="sr-only">Dashboard</span>
                                        </a>
                                    </div>
                                </li>

                                <!--begin::Item-->
                                <li class="breadcrumb-item text-muted">
                                    <div class="flex items-center">
                                        <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                            Settings
                                        </a>
                                    </div>
                                </li>
                                <!--end::Item-->
                            </ol>
                            <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page title-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <!--begin::Primary button-->
                            <a href="#" @click.prevent="newModal" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                Add New
                            </a>
                            <!--end::Secondary button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->

                <div>
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 3-->
                        <div class="card card-xl-stretch mb-5 mb-xl-12">
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead class="fw-bolder text-muted">
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Created On</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="mode in categories" :key="mode.id">
                                                <td>{{ mode.Name }}</td>
                                                <td>{{ mode.type }}</td>
                                                <td>{{ mode.created_At | myDate }}</td>
                                                <td>
                                                    <a href="#" @click.prevent="editModal(mode)">
                                                        <i class="fa fa-edit blue"></i>
                                                    </a>
                                                    <a href="#" @click.prevent="deleteRoute(mode.id)">
                                                        <i class="fa fa-trash red"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">
                            Compliance Category Setup
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for>Type</label>
                                <select v-model="form.ObjType" class="form-control" :class="{ 'is-invalid': form.errors.has('ObjType') }">
                                    <option value="1">Risk Source Category</option>
                                    <option value="2">Risk Event Category</option>
                                    <option value="3">Risk Impact Category</option>
                                    <option value="4">Consequence Scale Group Category</option>
                                    <option value="5">KRI Item Category</option>
                                    <option value="15">Control Items Category</option>
                                    <option value="21">Compliance Category</option>
                                </select>
                                <has-error :form="form" field="ObjType"></has-error>
                            </div>
                            <div class="form-group">
                                <label for>Name</label>
                                <input v-model="form.Name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" autocomplete="off" />
                                <has-error :form="form" field="Name"></has-error>
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
export default {
    data() {
        return {
            editmode: false,
            categories: {},
            counter: 1,
            form: new Form({
                id: '',
                ObjType: '',
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
            axios
                .get('/api/category')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.categories = res.data.ResponseData.data
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
        createCategory() {
            this.$Progress.start()
            this.form
                .post('/api/category')
                .then(() => {
                    Fire.$emit('AfterCreate')
                    $('#addNew').modal('hide')
                    toast.fire({
                        type: 'success',
                        title: 'Created successfully'
                    })
                    this.$Progress.finish()
                })
                .catch(() => {
                    this.$Progress.fail()
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
                // Send request to the server
                if (result.value) {
                    this.form
                        .delete('/api/category/' + id)
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
            // console.log('Editing data');
            this.form
                .put('/api/category/' + this.form.id)
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
        }
    },
    created() {
        this.loadCategory()
        Fire.$on('AfterCreate', () => {
            this.loadCategory()
        })
    }
}
</script>
