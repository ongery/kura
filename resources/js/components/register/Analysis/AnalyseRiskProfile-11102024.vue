<template>
    <div class="row mt-2">
        <div class="app-toolbar py-3">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">
                    <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
                        {{ this.RName }}
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
                                    Risk Analysis
                                </a>
                            </div>
                        </li>

                        <li class="breadcrumb-item text-muted">
                            <div class="flex items-center">
                                -
                                <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                    Risk 1
                                </a>
                            </div>
                        </li>

                        <li class="breadcrumb-item text-muted">
                            <div class="flex items-center">
                                -
                                <a href="javascript:void(0)" class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                    {{ this.RName }}
                                </a>
                            </div>
                        </li>
                    </ol>
                </div>
                
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <BackButton></BackButton>
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-7">
            <div>
                <form @submit.prevent="updateAnalzeRisk()">
                    <div class="modal-body">
                        <div class="form-row">
                            <nav class="nav nav-tabs">
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskCauses">Risk Sources</a>
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskEffects">Risk Impacts</a>
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showRiskLevel">Inherent Risk Level</a>
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showCurrentControls">Current Controls</a>
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showResidualRiskLevel">Residual Risk Level</a>
                                <a href="javascript:void(0)" class="nav-item nav-link" @click.prevent="showTreatment">Treatment</a>
                            </nav>
                        </div>

                        <RiskCause v-if="showcauses"></RiskCause>
                        <RiskImpact v-if="showeffects"></RiskImpact>
                        <CurrentControl v-if="showcontrols"></CurrentControl>

                        <!-- Inherent Consequence Scale -->
                        <div class="form-row" v-if="showrisklevels">
                            <div class="card mb-5 mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Inherent Consequence Scale</h3>
                                </div>
                            </div>

                            <div class="form-group ml-6 mt-1">
                                <div class="form-group mt-1">
                                    <div class="card mb-5 p-12 m-1">
                                        <span class="pb-3" style="font-size:medium">Inherent Likelihood Scale</span>
                                        <select class="form-control" v-model="form.InherentLikelihoodScale" name="CategoryID" :class="{ 'is-invalid': form.errors.has('InherentLikelihoodScale') }">
                                            <option v-for="val in likelihoodscales" :value="val.id" :key="val.id">
                                                {{ val.Base + '-' + val.Name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="InherentLikelihoodScale"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row card m-1">
                                <div class="card-body">
                                    <div v-for="mode in scalesgroup" :key="mode.id">
                                        <div class="m-0 pl-5 pt-2">
                                            <div class="d-flex align-items-center justify-content-between py-3 mb-0">
                                                <div class="d-flex toggle collapsed collapsible" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + mode.id">
                                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <span class="svg-icon toggle-off svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <h5 class="custom-list-title fw-bold text-gray-700 mt-3">{{ mode.item.Name }}</h5>
                                                </div>

                                                <select class="form-control w-350px" :class="{ 'is-invalid': form.errors.has('ResidualLikelihoodScale') }">
                                                    <option v-for="(consFandamental, index) in mode.ConsequenceFandamental" :key="index"> {{ consFandamental }} </option>
                                                </select>
                                            </div>

                                            <div :id="'accordion_' + mode.id" class="collapse fs-6 ms-1">
                                                <div v-for="cMatrix in mode.ConsequenceMatrix" :key="cMatrix.id">
                                                    <div class="row mb-3">
                                                        <div class="ps-13 col-md-12">
                                                            <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + cMatrix.id">
                                                                <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                                    <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                            <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <span class="svg-icon toggle-off svg-icon-1">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ cMatrix.Fundamental }}</h5>
                                                            </div>
                                                        </div>

                                                        <!-- data-segment AS FIRST accordion LIKE Financial, Construction/Roads Project, Projects Implementation etc   -->
                                                        <!-- data-section AS SECOND accordian inside the FIRST accordion LIKE Funding gap of >15%, Financial Loss of over KShs 5Mn, Budget variance of over 20%,  -->
                                                        <!-- GROUP TYPE 1 - Inherent Risk Level, 2 - Residual Risk Level  -->
                                                        <div :id="'accordion_' + cMatrix.id" class="collapse fs-6 ms-1">
                                                            <table class="table table-hover  table-sm">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="ps-20">Level</th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" data-level="Fundamental" value="5" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 5"  /> 5
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" data-level="Major" value="4" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 4" /> 4
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" data-level="Moderate" value="3" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 3" /> 3
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" data-level="Minor" value="2" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 2" /> 2
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-grouptype="1" :data-scalesgroupid="mode.id" data-level="Insignificant" value="1" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 1" /> 1
                                                                        </th>
                                                                    </tr>

                                                                    <tr>
                                                                        <th class="ps-20">Impact Measure</th>
                                                                        <th>Fundamental</th>
                                                                        <th>Major</th>
                                                                        <th>Moderate</th>
                                                                        <th>Minor</th>
                                                                        <th>Insignificant</th>
                                                                    </tr>

                                                                    <tr class="text-gray-800 text-hover-success fw-bold">
                                                                        <td class="ps-20">{{ mode.item.Name }}</td>
                                                                        <td>{{ cMatrix.Fundamental }}</td>
                                                                        <td>{{ cMatrix.Major }}</td>
                                                                        <td>{{ cMatrix.Moderate }}</td>
                                                                        <td>{{ cMatrix.Minor }}</td>
                                                                        <td>{{ cMatrix.Insignificant }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- <div class="separator separator-dashed"></div> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="separator separator-dashed"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Residual Consequence Scale -->
                        <div class="form-row col-md-12" v-if="showresidualrisklevel">
                            <div class="card mb-5 mt-2">
                                <div class="card-header">
                                    <h3 class="card-title">Residual Consequence Scale</h3>
                                </div>
                            </div>

                            <div class="form-group mt-1">
                                <div class="card mb-5 p-12 m-1">
                                    <span class="pb-3" style="font-size:medium">Residual Likelihood Scale</span>
                                    <select class="form-control" v-model="form.ResidualLikelihoodScale" name="CategoryID" :class="{ 'is-invalid': form.errors.has('ResidualLikelihoodScale') }">
                                        <option v-for="val in likelihoodscales" :value="val.id" :key="val.id">
                                            {{ val.Base + '-' + val.Name }}
                                        </option>
                                    </select>
                                    <has-error :form="form" field="ResidualLikelihoodScale"></has-error>
                                </div>
                                
                                <div class="row card m-1">
                                    <div class="card-body">
                                        <div v-for="mode in scalesgroupResidual" :key="mode.id">
                                            <div class="m-0 pl-5 pt-2">
                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + mode.id">
                                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                        <span class="svg-icon toggle-off svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ mode.item.Name }}</h5>
                                                </div>

                                                <div :id="'accordion_' + mode.id" class="collapse fs-6 ms-1">
                                                    <div v-for="cMatrix in mode.ConsequenceMatrix" :key="cMatrix.id">
                                                        <div class="row mb-3">
                                                            <div class="ps-13 col-md-12">
                                                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + cMatrix.id">
                                                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                        <span class="svg-icon toggle-off svg-icon-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ cMatrix.Fundamental }}</h5>
                                                                </div>
                                                            </div>
                                                            <div :id="'accordion_' + cMatrix.id" class="collapse fs-6 ms-1">
                                                                <table class="table table-hover table-sm">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="ps-20">Level</th>
                                                                            <th>
                                                                                <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" data-level="Fundamental" value="5" @click="handleConsequenceMatrixSelection" /> 5
                                                                            </th>
                                                                            <th>
                                                                                <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" data-level="Major" value="4" @click="handleConsequenceMatrixSelection" /> 4
                                                                            </th>
                                                                            <th>
                                                                                <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" data-level="Moderate" value="3" @click="handleConsequenceMatrixSelection" /> 3
                                                                            </th>
                                                                            <th>
                                                                                <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" data-level="Minor" value="2" @click="handleConsequenceMatrixSelection" /> 2
                                                                            </th>
                                                                            <th>
                                                                                <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-section="cMatrix.id" :data-grouptype="2" :data-scalesgroupid="mode.id" data-level="Insignificant" value="1" @click="handleConsequenceMatrixSelection" /> 1
                                                                            </th>
                                                                        </tr>

                                                                        <tr>
                                                                            <th class="ps-20">Impact Measure</th>
                                                                            <th>Fundamental</th>
                                                                            <th>Major</th>
                                                                            <th>Moderate</th>
                                                                            <th>Minor</th>
                                                                            <th>Insignificant</th>
                                                                        </tr>

                                                                        <tr class="text-gray-800 text-hover-success fw-bold">
                                                                            <td class="ps-20">{{ mode.item.Name }}</td>
                                                                            <td>{{ cMatrix.Fundamental }}</td>
                                                                            <td>{{ cMatrix.Major }}</td>
                                                                            <td>{{ cMatrix.Moderate }}</td>
                                                                            <td>{{ cMatrix.Minor }}</td>
                                                                            <td>{{ cMatrix.Insignificant }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- <div class="separator separator-dashed"></div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="separator separator-dashed"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row" v-if="showtreatment">
                            <CreateAction></CreateAction>
                        </div>
                    </div>

                    <div class="modal-footer mt-5">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import CreateAction from './Actionindex.vue'
import RiskCause from './RiskProfile/RiskCauses'
import RiskImpact from './RiskProfile/RiskImpacts'
import CurrentControl from './RiskProfile/CurrentControl'
import BackButton from '../components/items/BackButton.vue'

export default {
    data() {
        return {
            riskcauses: {},
            showcauses: false,
            showcontrols: false,
            showeffects: false,
            showtreatment: false,
            showrisklevels: false,
            showresidualrisklevel: false,
            alldata: {},
            riskevents: {},
            riskcauses: {},
            riskeffects: {},
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
                Name: '',
                o_i_t_m_id: '',
                ObjType: 12,
                DateIdentified: '',
                RiskCauseDescription: '',
                RiskEffectsDescription: '',
                RiskStatus: '',
                created_at: '',
                Status: '',
                isSelected: '',

                InherentLikelihoodScale: '',
                ResidualLikelihoodScale: '',
                ResidualConsequenceScale: '',
                scalesgroup: {},
                scalesgroupResidual: {},
            }),
            state: {
                disabledDates: {
                    from: new Date()
                }
            },
            cMatrixRanking: new Form({
                scalesGroupId: '',
                GroupType: '',
                segment: '',
                section: '',
                level: '',
                value: '',
            })
        }
    },
    components: {
        Datepicker,
        RiskCause,
        RiskImpact,
        CurrentControl,
        CreateAction,
        BackButton
    },
    methods: {
        updateConsequenceMatrixLevel(cMatrix) {
            const levels = {
                1: 'Insignificant',
                2: 'Minor',
                3: 'Moderate',
                4: 'Major',
                5: 'Fundamental',
            };            
            cMatrix.level = levels[cMatrix.value] || 'Unknown'; // Set the level based on the value
        },

        handleConsequenceMatrixSelection (e) {
            this.$Progress.start()
            this.cMatrixRanking.scalesGroupId   =   e.target.dataset.scalesgroupid;
            this.cMatrixRanking.groupType       =   e.target.dataset.grouptype;
            this.cMatrixRanking.segment         =   e.target.dataset.segment;
            this.cMatrixRanking.section         =   e.target.dataset.section;
            this.cMatrixRanking.level           =   e.target.dataset.level;
            this.cMatrixRanking.value           =   e.target.value;

            this.cMatrixRanking.post('/api/consequence-matrix/ranking')
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    // toast.fire({ 
                    //     type: 'success', 
                    //     title: res.data.ResponseData 
                    // })
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
        
        CountChecked(mode) {
            var isSelected = mode.isSelected
            axios.get('/api/syncRelationship', {
                params: {
                    RiskID: localStorage.risk_id,
                    ItemID: mode.id,
                    isSelected: isSelected,
                    ObjType: mode.ObjType
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.riskcauses = res.data.ResponseData.causes
                    this.riskeffects = res.data.ResponseData.effects
                    this.controlitems = res.data.ResponseData.controlitems
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

        loadCausesEffects() {
            axios.get('/api/getCausesEffects', {
                params: {
                    RiskID: localStorage.risk_id
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.riskcauses = res.data.ResponseData.causes
                    this.riskeffects = res.data.ResponseData.effects
                    this.controlitems = res.data.ResponseData.controlitems
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

        loadLikelihoodScale() {
            axios.get('/api/likeLihoodScale')
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.likelihoodscales = res.data.ResponseData
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

        updateAnalzeRisk() {
            this.form.scalesgroup = this.scalesgroup
            this.form.scalesgroupResidual = this.scalesgroupResidual
            this.$Progress.start()
            this.form.post('/api/updateAnalzeRisk')
            .then(() => {
                $('#addNew').modal('hide')
                swal.fire('Updated!', 'Information has been updated.', 'success')
                this.$Progress.finish()
                Fire.$emit('AfterCreate')
            })
            .catch(() => {
                this.$Progress.fail()
            })
        },

        loadConsequenceScale() {
            axios.get('/api/loadConsequenceScale')
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.consequencescale = res.data.ResponseData
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

        showRiskCauses() {
            this.showcauses = true
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },

        showRiskEffects() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = true
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },

        showCurrentControls() {
            this.showcauses = false
            this.showcontrols = true
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = false
        },

        showRiskLevel() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = true
            this.showresidualrisklevel = false
            this.showtreatment = false
        },

        showResidualRiskLevel() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = true
            this.showtreatment = false
        },

        showTreatment() {
            this.showcauses = false
            this.showcontrols = false
            this.showeffects = false
            this.showrisklevels = false
            this.showresidualrisklevel = false
            this.showtreatment = true
        },

        loadRisk() {
            axios.get('/api/risks/' + localStorage.risk_id).then(res => {
                this.form.fill(res.data.ResponseData)
                this.BName = res.data.ResponseData.bunit.Name
                this.RName = res.data.ResponseData.item.Name
                this.scalesgroup = res.data.ResponseData.scalesgroup
                console.log('check-scalesgroup ====>   ', this.scalesgroup);
                this.scalesgroupResidual = res.data.ResponseData.scalesgroupresidual
            })
        },

        newModal() {
            this.editmode = false
            this.form.reset()
            $('#addNew').modal('show')
        },
        
        loadRiskEvents() {
            axios.get('/api/risklibrarysetup', {
                params: {
                    ObjType: 8
                }
            })
            .then(res => {
                if (res.data.ResultCode == 1200) {
                    this.riskevents = res.data.ResponseData.data
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

        GoBack() {
            this.$router.back()
        }
    },
    created() {
        this.showcauses = true
        this.loadCausesEffects()
        this.loadRisk()
        this.loadLikelihoodScale()
        this.loadConsequenceScale()
        this.showRiskCauses()
        this.loadRiskEvents(),
        Fire.$on('AfterCreate', () => {
            this.loadRisk()
        })
        this.riskName = this.RName
    }
}
</script>
