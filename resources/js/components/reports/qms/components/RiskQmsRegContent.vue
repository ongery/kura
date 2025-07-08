<template>
    <div>
        <div style="margin-left: -20px;" v-for="(mode1, outerIndex) in reports" :key="mode1.id">
            <div class="card m-5" v-if="mode1.procedureData[outerIndex]">
                <div class="card-body p-lg-15">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="flex-lg-row-fluid me-xl-15 mb-10 mb-xl-0">
                            <div class="d-flex flex-stack flex-wrap mb-lg-10">
                                <h1 class="text-gray-800 text-hover-success fw-bold" style="font-size: 16px;">{{ mode1.Name }}</h1>
                            </div>
                            
                            <div class="mb-0">
                                <div v-for="(mode, innerIndex) in mode1.procedureData" :key="mode.id">
                                    <div class="m-0 pl-5 pt-2">
                                        <!-- <div v-if="mode.Count != ''" class="d-flex align-items-center collapsible py-3 toggle active mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + outerIndex + '_' + innerIndex"> -->
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
                                            <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ mode.ProcedureTitle }}</h5>
                                        <!-- </div> -->
                                        
                                        <div v-if="mode.Count != ''" :id="'accordion_' + outerIndex + '_' + innerIndex" class="collapse show fs-6 ms-1">
                                            <div class="table-responsive m-0 pt-5">
                                                <div class="card">
                                                    <div class="card-body table-responsive p-0">
                                                        <table class="table table-hover  table-sm">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Procedure #</th>

                                                                    <th>Risk Event</th>
                                                                    <th>I.R</th>
                                                                    <th>R.R</th>
                                                                    <th>Opportunites</th>
                                                                </tr>

                                                                <tr v-for="mode in mode1.procedureData" :key="mode.id">
                                                                    <td>
                                                                        {{ mode.ProcedureNo }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.RiskEvent }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.InherentValue }}
                                                                    </td>

                                                                    <td>
                                                                        {{ mode.ResidualValue }}
                                                                    </td>

                                                                    <td></td>
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
import OctagonInherentValue from '../items/OctagonInherentValue.vue'
import OctagonResidualValue from '../items/OctagonResidualValue.vue'

export default {
    name: 'RiskQmsRegContent',
    props: ['reports'],
    components: { OctagonInherentValue, OctagonResidualValue }
}
</script>
