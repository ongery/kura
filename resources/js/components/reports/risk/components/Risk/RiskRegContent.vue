<template>
    <div>
        <div class="card card-xl-stretch mb-5 mb-xl-12">
            <div class="card-header border-0 pt-5">
                <div class="col-md-6 fv-row">
                    <form class="mb-10">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1"> Select Risk Register </span>
                        </h3>

                        <select class="form-control" v-model="selectedOption" @change="filterRiskRegister()" >
                            <option value=""> -- </option>
                            <option v-for="val in reports" :value="val.Name" :key="val.id">
                                {{ val.Name }}
                            </option>
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <div style="margin-left: -20px;" v-for="(mode1, outerIndex) in reports" :key="mode1.id">
            <div class="card m-5" v-if="selectedOption === mode1.Name || selectedOption === ''">
                <div class="card-body p-lg-15">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="flex-lg-row-fluid me-xl-15 mb-10 mb-xl-0">
                            <div class="d-flex flex-stack flex-wrap mb-lg-10">
                                <h1 class="text-gray-800 text-hover-success fw-bold" style="font-size: 16px;">{{ mode1.Name }}</h1>
                            </div>
                            
                            <div class="mb-0">
                                <div v-for="(mode, innerIndex) in mode1.riskRegisterData" :key="mode.id">
                                    <div class="m-0 pl-5 pt-2">
                                        <!-- <div v-if="mode.Count != ''" class="d-flex align-items-center collapsible py-3 toggle mb-0 active" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + outerIndex + '_' + innerIndex" aria-expanded="true"> -->
                                            <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5 d-none">
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
                                            
                                            <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ mode.RiskName }}</h5>
                                        <!-- </div> -->
                                        
                                        <div v-if="mode.Count != ''" :id="'accordion_' + outerIndex + '_' + innerIndex" class="collapse show fs-6 ms-1">
                                            <div class="table-responsive m-0 pt-5">
                                                <div class="card">
                                                    <div class="card-body table-responsive p-0">
                                                        <table class="table table-hover  table-sm">
                                                            <tbody>
                                                                <tr class="thead-light">
                                                                    <th>Risk Event</th>
                                                                    <th>Risk Source</th>
                                                                    <th>Risk Impacts</th>
                                                                    <th style="text-align:center">I.R</th>
                                                                    <th>Current Controls</th>
                                                                    <th style="text-align:center">R.R</th>
                                                                    <th>key Control Indicators</th>
                                                                    <th>Key Risk Indicators</th>
                                                                    <th>Treatment Plans</th>
                                                                </tr>
                                                                <tr v-for="mode in mode1.riskRegisterData" :key="mode.id">
                                                                    <td>
                                                                        {{ mode.RiskName }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.RiskSource }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.RiskImpact }}
                                                                    </td>

                                                                    <td style="background-color:#ec0d0d" v-if="mode.InherentValue > 15">{{ mode.InherentValue }}</td>

                                                                    <td style="background-color:#ffbf00" v-else-if="mode.InherentValue > 4">{{ mode.InherentValue }}</td>

                                                                    <td style="background-color:#09f17d" v-else-if="mode.InherentValue > 0 && mode.InherentValue <= 4">{{ mode.InherentValue }}</td>

                                                                    <td v-else>{{ mode.InherentValue }}</td>
                                                                    <td>
                                                                        {{ mode.ControlItems }}
                                                                    </td>

                                                                    <td style="background-color:#ec0d0d" v-if="mode.ResidualValue >= 15">{{ mode.ResidualValue }}</td>

                                                                    <td style="background-color:#ffbf00" v-else-if="mode.ResidualValue > 4">{{ mode.ResidualValue }}</td>

                                                                    <td style="background-color:#09f17d" v-else-if="mode.ResidualValue > 0 && mode.ResidualValue <= 4">{{ mode.ResidualValue }}</td>

                                                                    <td v-else>{{ mode.ResidualValue }}</td>

                                                                    <td>
                                                                        {{ mode.KCIitems }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.KRIitems }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.TreatmentsPlans }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="mode.Count != ''" class="separator separator-dashed"></div>
                                    </div>
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
import { forEach } from 'lodash'
import OctagonInherentValue from '../items/OctagonInherentValue.vue';
import OctagonResidualValue from '../items/OctagonResidualValue.vue';

export default {
    name: 'RiskRegContent',
    props: ['reports'],
    components: { OctagonInherentValue, OctagonResidualValue },

    data() {
        return {
            titleCategories: [],
            titleCategoriesInfo: [],
            selectedOption: ""
        }
    },
    methods: {
        filterRiskRegister(e) {
            this.selectedOption = e.target.value;
        }
    }
}
</script>
<style>
.toggle.collapsible.collapsed .toggle-on, .toggle:not(.collapsible):not(.active) .toggle-on {
  display: none;
}
</style>
