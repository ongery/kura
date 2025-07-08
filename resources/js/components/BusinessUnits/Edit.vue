<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <!--begin::Toolbar-->
                <div class="app-toolbar py-3">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                        <!--begin::Page title-->
                        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                            <!--begin::Title-->
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                                Edit Business Unit
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
                            <a href="#" @click.prevent="editModal" class="btn btn-sm fw-bold btn-info btn-active-color-dark">
                                Objectives
                            </a>
                            <!--end::Secondary button-->

                            <!--begin::Primary button-->
                            <router-link to="/BusinessUnit">
                                <span class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                    Back
                                </span>
                            </router-link>

                            <!--end::Secondary button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->

                <div class="card">
                    <div class="row card card-body p-12 m-1">
                        <form @submit.prevent="editmode ? updateBusinessUnits(form.id) : createBusinessUnit()">
                            <!-- Name-->
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Name</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input v-model="form.Name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" autocomplete="off" />
                                    <has-error :form="form" field="Name"></has-error>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <!-- Parent Business Unit & Acronym-->
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Parent Business Unit</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-control" v-model="form.BunitID">
                                        <option v-for="val in businessunits" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Acronym</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input v-model="form.Acronym" type="text" placeholder="Acronym" class="form-control" :class="{ 'is-invalid': form.errors.has('Acronym') }" autocomplete="off" />
                                    <has-error :form="form" field="Acronym"></has-error>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <!-- HOD-->
                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">HOD</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-control" v-model="form.Manager" :class="{ 'is-invalid': form.errors.has('Manager') }">
                                        <option v-for="val in allusers" :value="val.id" :key="val.id">
                                            <td>{{ val.full_name }}</td>
                                        </option>
                                    </select>
                                    <has-error :form="form" field="Manager"></has-error>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <div class="row mb-5">
                                <a href="#" class="badge badge-light p-6 mb-6 mt-5  col-md-8 " style="font-size:medium">Select Department Members</a>

                                <div class="col-md-4 mt-8">
                                    <!--begin::Primary button-->
                                    <a href="#" @click.prevent="showModalUsers" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                        Select Users
                                    </a>
                                    <!--end::Secondary button-->
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <table class="table table-bordered table-hover mt-2">
                                    <thead class="fw-bold text-muted">
                                        <tr>
                                            <!-- <th></th> -->
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
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
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
                                    <tr>
                                        <!-- <td colspan="2">
                      <pagination
                        :limit="5"
                        :data="allusers"
                        @pagination-change-page="getResults"
                      ></pagination>
                    </td> -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                Ok
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newObjective" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Busines Unit Objectives</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="addObjective()">
                        <div class="card-body mb-0">
                            <!-- <div class="p-12"> -->

                            <!-- Description -->
                            <!--begin::Input group-->
                            <div class="row mb-5 p-12">
                                <!--begin::Col-->
                                <div class="col-md-9 fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2" for>Description</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input v-model="form.description" type="text" placeholder="New Objective" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" />
                                    <has-error :form="form" field="description"></has-error>
                                    <!--end::Input-->
                                </div>
                                <!--end::Col-->

                                <div class="col-md-3 fv-row">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Add</button>
                                </div>
                            </div>

                            <!-- </div> -->
                        </div>

                        <!--begin::Col-->
                        <!-- <div class="col-xl-12 p-12"> -->

                        <!--begin::Tables Widget 3-->
                        <div class="col-md-12 mb-5" style="margin-top: -50px;">
                            <!--begin::Body-->
                            <div class="card-body  p-12">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead class="fw-bolder text-muted">
                                            <tr>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr v-for="mode in objectives" :key="mode.id">
                                                <td>
                                                    {{ mode.description }}
                                                </td>

                                                <td>
                                                    <a href="#" @click.prevent="deleteObjective(mode.id)">
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

                        <!-- </div> -->
                        <!--end::Col-->

                        <!-- <div class="modal-body">


                  <div class="form-row">

                    <div class="form-group col-md-10">
                      <input
                        v-model="form.description"
                        type="text"
                        placeholder="New Objective"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('description') }"
                      />
                      <has-error
                        :form="form"
                        field="description"
                      ></has-error>
                    </div>

                    <div class="form-group col-md-2 mt-3">
                      <button
                        type="submit"
                        class="btn btn-primary form-control"
                      >
                        Add
                      </button>
                    </div>

                  </div>



                  <div class="form-row">
                    <table class="table table-bordered table-hover table-sm">
                      <thead class="thead-light">
                        <tr>
                          <th>Description</th>

                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="mode in objectives"
                          :key="mode.id"
                        >
                          <td>

                            {{ mode.description }}
                          </td>

                          <td>

                            <a
                              href="#"
                              @click.prevent="deleteObjective(mode.id)"
                            >
                              <i class="fa fa-trash red"></i>
                            </a>
                          </td>

                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div> -->
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
            users: {},
            businessunits: {},
            objectives: {},
            allusers: [],
            business_id: '',
            selectedAssignments: [],
            form: new Form({
                id: '',
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
    watch: {
        '$route.params.id': {
            handler: 'getBusinessUnit',
            immediate: true
        }
    },
    methods: {
        getAuthToken() {
            return localStorage.getItem('authToken')
        },
        getResults(page = 1) {
            const token = this.getAuthToken()
            axios
                .get('/api/businessunits?page=' + page, {
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
                .get('/api/businessunits', {
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
            const token = this.getAuthToken()
            this.$Progress.start()
            this.form
                .post('/api/businessunits', {
                    withCredentials: true,
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.form.reset()
                        $('#addNew').modal('hide')
                        swal.fire('Created!', 'Successfully Created.', 'success')
                        this.$Progress.finish()
                        Fire.$emit('AfterCreate')
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

        getBusinessUnit(id) {
            this.business_id = id
            axios.get('/api/businessunits/' + id).then(res => {
                if (res.data.ResultCode == 1200) {
                    this.selectedAssignments = res.data.ResponseData.members
                    this.objectives = res.data.ResponseData.objectives
                    this.form.fill(res.data.ResponseData)
                    this.editmode = true
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

        updateBusinessUnits(id) {
            this.$Progress.start()
            this.form.selectedAssignments = this.selectedAssignments
            this.form.put('/api/businessunits/' + id).then(res => {
                if (res.data.ResultCode == 1200) {
                    this.form.reset()
                    swal.fire('Created!', 'Business Unit Updated Successfully.', 'success')
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
        editModal() {
            $('#newObjective').modal('show')
        },

        addObjective() {
            this.$Progress.start()
            this.form
                .post('/api/businessunits/objectives/add')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        this.form.reset()
                        this.getBusinessUnit(this.business_id)

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

        deleteObjective(id) {
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
                        .put('/api/businessunits/objectives/delete/' + id)
                        .then(() => {
                            this.getBusinessUnit(this.business_id)
                            swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                            Fire.$emit('AfterCreate')
                        })
                        .catch(() => {
                            swal.fire('Failed!', 'There was something wronge.', 'warning')
                        })
                }
            })
        }
    },
    created() {
        this.loadCategory()
        this.loadUsers()
        Fire.$on('AfterCreate', () => {
            this.loadCategory()
        })
    }
}
</script>
