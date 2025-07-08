<template>
    <div>
        <div class="row mt-2">
            <div class="app-toolbar py-3">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                        <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                            General Authorization
                        </h1>

                        <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                            <li>
                                <div>
                                    <a href="javascript:void(0)" class="text-gray-400 hover:text-gray-500">
                                        <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                        </svg>
                                        <span class="sr-only">Dashboard</span>
                                    </a>
                                </div>
                            </li>

                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        Settings
                                    </a>
                                </div>
                            </li>

                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    -
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        User Roles
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card mb-5 mt-2">
                    <div class="card-header">
                        <h3 class="card-title">
                            <span class="fw-bold fs-3 text-gray-700 mb-1">User Roles</span>
                        </h3>

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <a href="javascript:void(0)" @click.prevent="newModal" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                <thead class="fw-bolder text-muted">
                                    <tr>
                                        <th>Name</th>
                                        <th class="w-90px"></th>
                                        <th class="w-90px"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="mode in alldata" :key="mode.id">
                                        <td>
                                            <a href="javascript:void(0)" @click.prevent="moreDetails(mode)"> {{ mode.name }} </a>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" @click.prevent="moreDetails(mode)">
                                                <span class="badge badge-btn badge-light p-3"> Details </span>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)" @click.prevent="deleteRoute(mode.id)">
                                                <i class="fa fa-trash red p-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div v-if="this.roleTitle != '0'" class="card mb-8 col-md-10 ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <span class="fw-bold fs-3 text-gray-700 mb-1">{{ this.roleTitle }} Role</span>
                        </h3>
                    </div>
                </div>
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <div class="card-header border-0 pt-5">
                                <div class="col-md-6 fv-row">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-2 text-gray-700 mb-1" style="margin-left: -30px;">Module Access</span>
                                    </h3>
                                </div>
                            </div>
                            <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                <thead class="fw-bolder text-muted">
                                    <tr>
                                        <th>Module</th>
                                        <th>Can Access</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="doc in moduleaccess" :key="doc.id">
                                        <td>{{ doc.PermissionName }}</td>
                                        <td>
                                            <input type="checkbox" :value="doc.id" v-model="doc.read" />
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" @click.prevent="updateRolePermission(doc)">
                                                <i class="fa fa-edit blue">Update</i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-5 mb-xl-12">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <div class="card-header border-0 pt-5">
                                <div class="col-md-6 fv-row">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold fs-2 text-gray-700 mb-1" style="margin-left: -30px;">Permissions</span>
                                    </h3>
                                </div>
                            </div>
                            <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                <thead class="fw-bolder text-muted">
                                    <tr>
                                        <th>Document</th>
                                        <th>Read</th>
                                        <th>Write</th>
                                        <th>Update</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="doc in permissions" :key="doc.id">
                                        <td>{{ doc.DocumentName }}</td>
                                        <td>
                                            <input type="checkbox" :value="doc.id" v-model="doc.read" />
                                        </td>
                                        <td>
                                            <input type="checkbox" :value="doc.id" v-model="doc.write" />
                                        </td>
                                        <td>
                                            <input type="checkbox" :value="doc.id" v-model="doc.update" />
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" @click.prevent="updatePermission(doc)">
                                                <i class="fa fa-edit blue">Update</i>
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
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">User Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateData() : createData()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for>Name</label>
                                    <input v-model="form.name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                    <has-error :form="form" field="name"></has-error>
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
            roleTitle: '0',
            editmode: false,
            categories: {},
            alldata: {},
            permissions: {},
            moduleaccess: {},
            counter: 1,
            form: new Form({
                role_id: '',
                id: '',
                name: '',
                read: '',
                write: '',
                update: '',
                ObjType: '',
                documents: [],
                moduleaccess: [],
                permission_name: ''
            })
        }
    },
    methods: {
        getResults(page = 1) {
            axios
                .get('/api/category?page=' + page, {
                    params: {
                        ObjType: this.form.ObjType
                    }
                })
                .then(response => {
                    this.categories = response.data
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

        loadData() {
            axios
                .get('/api/getUserRoles')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.alldata = res.data.ResponseData
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
            this.$Progress.start()
            this.form
                .post('/api/createUserRoles')
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
                        .delete('/api/risklibrarysetup/' + id)
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

        moreDetails(role) {
            this.roleTitle = role.name
            this.form.id = role.id
            this.permissions = []
            this.moduleaccess = []
            this.permissions = role.documents
            this.moduleaccess = role.moduleaccess
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
        },

        updatePermission(doc) {
            this.form.read = doc.read
            this.form.write = doc.write
            this.form.update = doc.update
            this.form.ObjType = doc.ObjType
            this.$Progress.start()
            this.form
                .post('/api/assignUserRolePermission')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        $('#addNew').modal('hide')
                        Fire.$emit('AfterCreate')
                        toast.fire({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
                        this.$Progress.finish()
                    } else {
                        $('#addNew').modal('hide')
                        this.$Progress.fail()
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
        updateRolePermission(doc) {
            this.form.read = doc.read
            this.form.permission_name = doc.name
            this.$Progress.start()
            this.form
                .post('/api/assignUserRoleModulePermission')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        $('#addNew').modal('hide')
                        Fire.$emit('AfterCreate')
                        toast.fire({
                            type: 'success',
                            title: 'Updated Successfully'
                        })
                        this.$Progress.finish()
                    } else {
                        $('#addNew').modal('hide')
                        this.$Progress.fail()
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
        }
    },
    created() {
        this.loadData()
        Fire.$on('AfterCreate', () => {
            this.loadData()
        })
    }
}
</script>
