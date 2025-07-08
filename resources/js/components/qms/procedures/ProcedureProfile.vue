<template>
    <div class="row mt-2">
        <form @submit.prevent="updateAnalzeRisk()">
            <div class="app-toolbar py-3">
                <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                    <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                        <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                            {{ this.form.Name }}
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
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        ISO Procedure
                                    </a>
                                </div>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    -
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                                        Procedures
                                    </a>
                                </div>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <div class="flex items-center">
                                    -
                                    <a class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                        {{ this.form.Name }}
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" @click.prevent="showLevelOne" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success">
                            Risks affecting Process
                        </a>
                        <a href="#" @click.prevent="showOpportunites" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-success">
                            Opportunites
                        </a>

                        <BackButton></BackButton>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card-xl-stretch mb-5 mb-xl-12">
                    <RiskLevel1 v-if="showlevelone"></RiskLevel1>
                    <Opportunites v-if="showopportunity"></Opportunites>
                </div>
            </div>
        </form>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">
                            Risks Selection
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategory() : createCategory()">
                        <div class="modal-body">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <input v-model="form.search" type="text" name="name" @keyup="searchItem()" placeholder="Search For Risk Lelel One" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr v-for="mode in allLevelOneRisks" :key="mode.id">
                                        <td>
                                            <input type="checkbox" :value="mode.id" @change="CountChecked(mode)" v-model="mode.isSelected" />
                                        </td>
                                        <td>{{ mode.item.Name }}</td>
                                    </tr>
                                    <tr></tr>
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

        <!-- Opportunity Modal -->
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
import RiskLevel1 from './ProcedureProfile/RiskLevel1.vue'
import Opportunites from './ProcedureProfile/Opportunities.vue'
import BackButton from './components/BackButton.vue'
export default {
    data() {
        return {
            procedure_id: '',
            riskcauses: {},
            showlevelone: false,
            showopportunity: false,
            risk: {},
            likelihoodscales: {},
            consequencescale: {},
            scalesgroup: {},
            scalesgroupResidual: {},
            controlitems: {},
            alltreament: {},
            BName: '',
            RName: '',
            form: new Form({
                id: '',
                ObjType: 26,
                description: '',
                CategoryID: '',
                CategoryObjType: 1,
                RiskLevelID: '',
                Name: ''
            }),
            state: {
                disabledDates: {
                    from: new Date()
                }
            }
        }
    },
    components: {
        RiskLevel1,
        Opportunites,
        BackButton
    },
    watch: {
        '$route.params.id': {
            handler: 'loadData',
            immediate: true
        }
    },
    methods: {
        showLevelOne() {
            this.showlevelone = true
            this.showopportunity = false
        },
        showOpportunites() {
            this.showlevelone = false
            this.showopportunity = true
        },

        GoBack() {
            this.$router.back()
        },
        loadData(id) {
            this.procedure_id = id
            axios.get('/api/risklibrarysetup/' + id).then(res => {
                this.form.fill(res.data.ResponseData)
            })
        }
    },
    NewProcedureOpportunity() {
        this.$router.push({ name: 'NewOpportunity', params: { id: this.procedure_id } })
    },

    addNewRiskCause_() {
        $('#addNew').modal('show')
    },
    created() {
        this.showLevelOne()
    }
}
</script>
