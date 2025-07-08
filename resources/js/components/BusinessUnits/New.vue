<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="app-toolbar py-3">
                    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                                Business Units
                            </h1>
                            <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                                <li>
                                    <div>
                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                            <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                            </svg>
                                            <span class="sr-only">Dashboard</span>
                                        </a>
                                    </div>
                                </li>

                                <li class="breadcrumb-item text-muted">
                                    <div class="flex items-center">
                                        <a href="#" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                            Settings
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <router-link to="/BusinessUnit">
                                <span class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                    Back
                                </span>
                            </router-link>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row card card-body p-12 m-1">
                        <form @submit.prevent="createBusinessUnit()">
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2">Name</label>
                                    <input v-model="form.Name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" autocomplete="off" />
                                    <has-error :form="form" field="Name"></has-error>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2">Parent Business Unit</label>
                                    <select class="form-control" v-model="form.parent_id">
                                        <option v-for="val in businessunits" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2">Acronym</label>
                                    <input v-model="form.Acronym" type="text" placeholder="Acronym" class="form-control" :class="{ 'is-invalid': form.errors.has('Acronym') }" autocomplete="off" />
                                    <has-error :form="form" field="Acronym"></has-error>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-semibold mb-2">HOD</label>
                                    <select class="form-control" v-model="form.Manager" :class="{ 'is-invalid': form.errors.has('Manager') }">
                                        <option v-for="val in allusers" :value="val.id" :key="val.id">
                                            <td>{{ val.full_name }}</td>
                                        </option>
                                    </select>
                                    <has-error :form="form" field="Manager"></has-error>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-8 " style="font-size:medium">Select Department Members</a>
                                <div class="col-md-4 mt-8">
                                    <a href="#" @click.prevent="showModalUsers" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                        Select Users
                                    </a>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <table class="table table-bordered table-hover mt-2">
                                    <thead class="fw-bold text-muted">
                                        <tr>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="mode in selectedAssignments" :key="mode.id">
                                            <td>{{ mode.Fname + ' ' + mode.Lname }}</td>
                                            <td>
                                                <a href="#" @click.prevent="deleteUser(mode.id)">
                                                    <i class="fa fa-trash red"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewLabel">
                                Select Users
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                            <div class="modal-body">
                                <table class="table table-bordered table-hover  table-sm">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <input v-model="form.search" type="text" name="name" @keyup="searchItem()" placeholder="Search Users" class="form-control" />
                                            </td>
                                        </tr>
                                        <tr v-for="mode in filtereduserForAssigment" :key="mode.id">
                                            <td>
                                                <input type="checkbox" :value="mode.id" v-model="mode.isSelected" @change="CountChecked(mode)" />
                                            </td>
                                            <td>{{ mode.full_name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal"> Ok </button>
                            </div>
                        </form>
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
            editmode: false,
            categories: {},
            counter: 1,
            users: {},
            businessunits: {},
            allusers: [],
            selectedAssignments: [],
            form: new Form({
                id: '',
                parent_id: '',
                ObjType: 5,
                Name: '',
                Acronym: '',
                Manager: '',
                description: '',
                selectedAssignments: []
            })
        }
    },

    computed: {
        filteredUserForHOD: function() {
            return this.churches.filter(function(e) {
                if (e.accountType == 0) {
                    return e
                }
            })
        },

        filtereduserForAssigment: function() {
            return this.allusers.filter(function(e) {
                if (e.BunitID == null) {
                    return e
                }
            })
        }
    },
    methods: {
        getResults(page = 1) {
            axios
                .get('/api/businessunits?page=' + page, {
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
                .get('/api/businessunits', {
                    params: {
                        ObjType: this.form.ObjType
                    }
                })
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
        createBusinessUnit() {
            this.$Progress.start()
            this.form.selectedAssignments = this.selectedAssignments
            this.form
                .post('/api/businessunits')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.form.reset()
                        swal.fire('Created!', 'Business Unit Created Successfully.', 'success')
                        this.$Progress.finish()
                        this.$router.push({ path: '/BusinessUnit' })
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
        deleteUser(id) {
            const self = this
            const item = this.selectedAssignments.find(record => {
                return record.id === id
            })

            const pos = this.selectedAssignments.indexOf(item)
            if (pos === -1) {
                return
            }
            this.selectedAssignments.splice(pos, 1)
        },
        loadUsers() {
            axios
                .get('/api/user?forAssigningBusinessUnit=1')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.allusers = res.data.ResponseData
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
        loadBusinessUnits() {
            axios
                .get('/api/businessunits', {
                    params: {
                        ObjType: this.form.BUObjType
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.businessunits = res.data.ResponseData.data
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

        CountChecked(mode) {
            const item = this.selectedAssignments.find(record => {
                return record.id === mode.id
            })
            if (item) {
                return
            }
            this.selectedAssignments.push(mode)
        },
        showModalUsers() {
            $('#addNew').modal('show')
        },
        searchItem() {}
    },
    created() {
        this.loadBusinessUnits()
        this.loadCategory()
        this.loadUsers()
        Fire.$on('AfterCreate', () => {
            this.loadCategory()
        })
    }
}
</script>
