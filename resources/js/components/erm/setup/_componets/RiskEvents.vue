<template>
    <div>
        <div class="row mt-2">
            <!--begin::Toolbar-->
            <div class="app-toolbar py-3">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <!--begin::Page title-->
                    <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                            Main Risk Events Library
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
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        Main Risk Events Library
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
                            New
                        </a>
                        <!--end::Secondary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->

            <div class="col-md-12">
                <div class="card">
                    <!--begin::Col-->
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 3-->
                        <div class="card card-xl-stretch mb-5 mb-xl-12">
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Header-->

                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead class="fw-bolder text-muted">
                                            <tr>
                                                <th>Reference</th>
                                                <th>Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr v-for="mode in alldata" :key="mode.id">
                                                <td>
                                                    <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)">
                                                        {{ mode.DocNum }}
                                                    </a>
                                                </td>
                                                <td>{{ mode.Name }}</td>
                                                <td>
                                                    <a href="#" @click.prevent="deleteMainRisk(mode.id)">
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
                    <!--end::Col-->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Main Risk Events</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeModel">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateMainRisk(form.id) : createMainRisk()">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12 mb-3">
                                    <label>Category</label>
                                    <select class="form-control" v-model="form.CategoryID" name="CategoryID" :class="{ 'is-invalid': form.errors.has('CategoryID') }">
                                        <option v-for="val in categories" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="CategoryID"></has-error>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label>Corporate Risk</label>
                                    <select class="form-control" v-model="form.CorporateRiskID" name="CategoryID" :class="{ 'is-invalid': form.errors.has('CategoryID') }">
                                        <option v-for="val in corporateRisk" :value="val.id" :key="val.id">
                                            {{ val.Name }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="CategoryID"></has-error>
                                </div>
                                <div class="form-group col-md-12 mb-3">
                                    <label for>Name</label>
                                    <input v-model="form.Name" type="text" name="name" placeholder="Name" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" autocomplete="off" />
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="closeModel"> Close </button>
                            <button v-show="editmode" type="submit" class="btn btn-success"> Update </button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary"> Create </button>
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
            corporateRisk: {},
            alldata: {},
            counter: 1,
            form: new Form({
                id: '',
                ObjType: 22,
                description: '',
                CorporateRiskID: '',
                CategoryID: '',
                CategoryObjType: 2,
                RiskLevelID: 2,
                Name: ''
            })
        }
    },
    methods: {
        getAuthToken() { return localStorage.getItem('authToken'); },
        closeModel() {
            this.editMode = false
            this.form.reset()
            $('#addNew').modal('hide')
        },

        loadCategory() {
            const token = this.getAuthToken();
            axios.get('/api/category', {
                    params: {
                        ObjType: this.form.CategoryObjType
                    },
                    withCredentials: true,
                    headers: {
                        'Authorization': `Bearer ${token}`
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

        loadCorporateRisk() {
            const token = this.getAuthToken();
            axios.get('/api/corporate-risks', {
                params: { ObjType: 24 },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.corporateRisk = res.data.ResponseData
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

        loadMainRiskData() {
            const token = this.getAuthToken();
            axios.get('/api/risklibrarysetup', {
                params: {
                    ObjType: this.form.ObjType
                },
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
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
        
        createMainRisk() {
            const token = this.getAuthToken();
            this.$Progress.start()
            this.form.post('/api/risklibrarysetup',{
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
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

        deleteMainRisk(id) {
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
                    this.form.delete('/api/risklibrarysetup/' + id, {
                        withCredentials: true,
                        headers: {
                            'Authorization': `Bearer ${token}`
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

        updateMainRisk(id) {
            const token = this.getAuthToken();
            this.$Progress.start()
            this.form.put('/api/risklibrarysetup/'+id,{
                withCredentials: true,
                headers: {
                    'Authorization': `Bearer ${token}`
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
        this.loadCategory();
        this.loadMainRiskData();
        this.loadCorporateRisk();
        Fire.$on('AfterCreate', () => {
            this.loadMainRiskData();
        })
    }
}
</script>
