<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                        Employee Profile
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
                                    Users
                                </a>
                            </div>
                        </li>

                        <li class="breadcrumb-item text-muted">
                            <div class="flex items-center">
                                -
                                <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                    Employee Profile
                                </a>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="javascript:void(0)" @click.prevent="GoBack" class="btn btn-sm fw-bold btn-info btn-active-color-dark">
                        Back
                    </a>
                </div>
            </div>
        </div>

        <div class="card card-body p-12 col-xl-12 m-3">
            <div>
                <h1 class="fw-bold text-gray-700 text mb-9">Details</h1>
                <div class="row mb-5">
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>First Name</label>
                        <input v-model="this.members.Fname" type="text" readonly="readonly" class="form-control" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Last Name</label>
                        <input v-model="this.members.Lname" type="text" readonly="readonly" class="form-control" />
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Email</label>
                        <input v-model="this.members.email" type="text" name="form_name" readonly="readonly" class="form-control" />
                    </div>
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Phone Number</label>
                        <input v-model="this.members.Mobile" type="text" readonly="readonly" class="form-control" />
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-6 fv-row">
                        <label class="fs-5 fw-semibold mb-2" for>Created On</label>
                        <input v-model="this.members.created_at" type="text" name="form_name" readonly="readonly" class="form-control" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 mt-6">
            <div class="card card-xl-stretch mb-5 mb-xl-12">
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <div class="card-header border-0 pt-5">
                            <div class="col-md-6 fv-row">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-2 text-gray-700 mb-1" style="margin-left: -30px;">Roles</span>
                                </h3>
                            </div>
                        </div>
                        <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                            <thead class="fw-bolder text-muted">
                                <tr>
                                    <th>Role</th>
                                    <th>Assigned</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="doc in members.allRoles" :key="doc.id">
                                    <td>{{ doc.name }}</td>
                                    <td>
                                        <input type="checkbox" :value="doc.id" v-model="doc.read" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" @click.prevent="updateRole(doc)">
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
                                <tr v-for="doc in members.documents" :key="doc.id">
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
</template>

<script>
export default {
    data() {
        return {
            members: {},
            cardName: '',
            form: new Form({
                id: '',
                user_id: '',
                read: '',
                write: '',
                update: '',
                ObjType: ''
            })
        }
    },
    methods: {
        GoBack() {
            this.$router.back()
        },
        updatePermission(doc) {
            console.log(doc)
            this.form.fill(doc)
            this.form.user_id = localStorage.user_id
            this.$Progress.start()
            this.form
                .post('/api/updatepermission')
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

        getUserDetails() {
            axios
                .get('/api/user/' + localStorage.user_id)
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.members = res.data.ResponseData
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
        updateRole(doc) {
            this.form.fill(doc)
            this.form.user_id = localStorage.user_id
            this.$Progress.start()
            this.form
                .post('/api/assignRoleToUser')
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
        this.getUserDetails()
        Fire.$on('AfterCreate', () => {
            this.getUserDetails()
        })
    }
}
</script>
