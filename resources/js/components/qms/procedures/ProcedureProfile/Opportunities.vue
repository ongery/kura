<template>
    <div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div>
                    <div class="card mb-5 mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Opportunities</h3>

                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <a href="#" class="btn btn-success btn-sm" @click.prevent="NewProcedureOpportunity">
                                    New
                                </a>
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
                                                <span class="card-label fw-bold fs-3 text-muted mb-1" style="margin-left: -30px;">Details</span>
                                            </h3>
                                        </div>
                                    </div>
                                    <table class="table table-row-dashed table-row-gray-300 align-middle p-0">
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th>Reference</th>
                                                <th>Name</th>
                                                <th>Person Responsible</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="mode in alldata" :key="mode.id">
                                                <td style="color: #258c37;">
                                                    <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)">
                                                        {{ mode.DocNum }}

                                                        <i class="fa fa-edit blue" style="margin-left: 3px;"></i>
                                                    </a>
                                                </td>
                                                <td>{{ mode.Name }}</td>
                                                <td style="color: #258c37;">
                                                    {{ mode.supervisor?.full_name }}
                                                </td>
                                                <td
                                                    :class="{
                                                        'bg-success': mode.color === 'bg-success',
                                                        'bg-danger': mode.color === 'bg-danger',
                                                        'bg-warning': mode.color === 'bg-warning',
                                                        'bg-blue': mode.color === 'bg-blue',
                                                        'bg-yellow': mode.color === 'bg-yellow',
                                                        'bg-white': mode.color === 'bg-white',
                                                        'bg-bg-warning': mode.color === 'bg-warning'
                                                    }"
                                                    style="text-align:center; color: #258c37;"
                                                >
                                                    {{ mode.freq }}
                                                </td>
                                                <td>
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
            </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">KRI Item Editor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateData() : createData()">
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
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
            alldata: {},
            procedure_id: '',
            counter: 1,
            form: new Form({
                id: '',
                ObjType: 40,
                description: '',
                CategoryID: '',
                CategoryObjType: 5,
                RiskLevelID: '',
                Name: ''
            })
        }
    },
    watch: {
        '$route.params.id': {
            handler: 'loadData',
            immediate: true
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

        loadData(id) {
            this.procedure_id = id
            axios.get('/api/risklibrarysetup/' + id).then(res => {
                this.alldata = res.data.ResponseData.opportunities
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

        MyKRIs() {
            this.$router.push({ name: 'MyRCIs' })
        },

        NewProcedureOpportunity() {
            this.$router.push({ name: 'NewOpportunity', params: { id: this.procedure_id } })
        },

        editModal(mode) {
            this.$router.push({ name: 'EditRCI', params: { ObjType: mode.ObjType, id: mode.id } })
        }
    },
    created() {
        this.loadCategory()

        Fire.$on('AfterCreate', () => {
            this.loadData()
        })
    }
}
</script>
