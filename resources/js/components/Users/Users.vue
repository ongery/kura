<template>
    <div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="app-toolbar py-3">
                    <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                        <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                            <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column"> Users Table </h1>
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
                            </ol>
                        </div>

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <a href="javascript:void(0)" @click.prevent="newModal" class="btn btn-sm fw-bold btn-success btn-active-color-dark"> Add New </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-5 mb-xl-12">
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead class="fw-bolder text-muted">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Business Unit</th>
                                                <th>Registered On</th>
                                                <th>Modify</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users" :key="user.id">
                                                <td>
                                                    <a style="color: #258c37;" href="javascript:void(0)" @click.prevent="moreDetails(user.id)">
                                                        {{ user.full_name }}
                                                    </a>
                                                </td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ (user.bunit !== null) ? user.bunit.Acronym : '--' }}</td>
                                                <td>{{ user.created_at | myDate }}</td>
                                                <td>
                                                    <a href="javascript:void(0)" @click.prevent="editModal(user)">
                                                        <i class="fa fa-edit blue p-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" @click.prevent="deleteUser(user.id)">
                                                        <i class="fa fa-trash red p-2"></i>
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
            </div>

            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" v-show="!editmode" id="addNewLabel"> Add New </h5>
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel"> Update User's Info </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editmode ? updateUser() : createUser()">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Select Department</label>

                                        <label>Parent Business Unit</label>
                                        <select class="form-control" v-model="form.BunitID">
                                            <option v-for="val in businessunits" :value="val.id" :key="val.id">
                                                {{ val.Name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="BunitID"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Full Name</label>
                                        <input v-model="form.Fname" type="text" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Fname') }" />
                                        <has-error :form="form" field="name"></has-error>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Email</label>
                                        <input v-model="form.email" type="email" placeholder="Email Address" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" />
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Phone Number</label>
                                        <input v-model="form.Mobile" type="text" placeholder="Phone Number" class="form-control" :class="{ 'is-invalid': form.errors.has('Mobile') }" />
                                        <has-error :form="form" field="Mobile"></has-error>
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            editmode: false,
            users: {},
            churches: {},
            businessunits: {},
            form: new Form({
                id: '',
                BunitID: '',
                Fname: '',
                Flame: '',
                email: '',
                Mobile: '',
                password: '',
                type: ''
            })
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        getResults(page = 1) {
            axios.get('/api/user?page=' + page).then(response => {
                this.users = response.data
            })
        },
        updateUser() {
            this.$Progress.start()
            this.form
                .put('/api/user/' + this.form.id)
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
        editModal(user) {
            this.editmode = true
            this.form.reset()
            $('#addNew').modal('show')
            this.form.fill(user)
        },
        newModal() {
            this.$router.push({ name: 'CreateUsers' })
        },
        deleteUser(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if (result.value) {
                    this.form.delete('/api/user/' + id).then(() => {
                        swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                        this.getResults();
                    })
                    .catch(() => {
                        swal.fire('Failed!', 'There was something wronge.', 'warning')
                    })
                }
            })
        },
        loadUsers() {
            axios.get('/api/user').then(res => {
                if (res.data.ResultCode == 1200) {
                    this.users = res.data.ResponseData
                    console.log('check-this-users', this.users);
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
        moreDetails(id) {
            localStorage.clear()
            localStorage.setItem('user_id', id)
            this.$router.push({ name: 'UserProfile' })
        },
        loadChurch() {
            axios.get('/api/church').then(({ data }) => (this.churches = data))
        },
        createUser() {
            this.$Progress.start()
            this.form.post('/api/user').then(() => {
                Fire.$emit('AfterCreate')
                $('#addNew').modal('hide')
                toast.fire({
                    type: 'success',
                    title: 'User Created in successfully'
                })
                this.$Progress.finish()
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
            const token = this.getAuthToken();
            axios.get('/api/businessunits', {
                params: {
                    ObjType: this.form.BUObjType
                },
                withCredentials: true,
                headers: {
                    Authorization: `Bearer ${token}`
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
        }
    },
    created() {
        this.loadBusinessUnits();
        this.loadUsers();

        Fire.$on('AfterCreate', () => {
            this.getResults(); // Refresh the list when event is emitted
        });
    }
}
</script>
