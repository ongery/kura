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
                            <a href="#" @click.prevent="newModal" class="btn btn-sm fw-bold btn-success btn-active-color-dark">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="col-xl-12">
                        <div class="card card-xl-stretch mb-5 mb-xl-12">
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead class="fw-bolder text-muted">
                                            <tr>
                                                <th>Acronym</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Created On</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="mode in categories" :key="mode.id">
                                                <td>{{ mode.Acronym }}</td>
                                                <td>{{ mode.Name }}</td>
                                                <th>{{ mode.user ? mode.user.Fname : 'N/A' }}</th>
                                                <th>{{ mode.created_at | myDate }}</th>
                                                <td>
                                                    <router-link :to="{ path: '/BusinessUnit/' + mode.id }">
                                                        <i class="fa fa-edit blue"></i>
                                                    </router-link>
                                                    <a href="#" @click.prevent="deleteBusinessUnit(mode.id)">
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
                ObjType: 5,
                Name: '',
                Acronym: '',
                Manager: ''
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
        loadBusinessUnit() {
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
        deleteBusinessUnit(id) {
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
                    this.form.delete('/api/businessunits/' + id).then(() => {
                        swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                        Fire.$emit('AfterCreate')
                    })
                    .catch(() => {
                        swal.fire('Failed!', 'Something when wrong', 'warning')
                    })
                }
            })
        },
        newModal() {
            this.$router.push({ name: 'NewBusinessUnit' })
        },
        editModal(mode) {
            this.editmode = true
            this.form.reset()
            $('#addNew').modal('show')
            this.form.fill(mode)
        }
    },
    created() {
        this.loadBusinessUnit()
        Fire.$on('AfterCreate', () => {
            this.loadBusinessUnit()
        })
    }
}
</script>
