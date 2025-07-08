<template>
    <div>
        <div class="card m-5" v-for="(mode1, index) in alldata">
            <div class="card-body p-lg-15">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-lg-row-fluid me-xl-15 mb-10 mb-xl-0">
                        <div class="d-flex flex-stack flex-wrap mb-lg-10">
                            <h1 class="text-gray-800 text-hover-success fw-bold" style="font-size: 16px;">{{ mode1.ImpactMeasure }}</h1>
                        </div>
                        
                        <div class="mb-0">
                            <div v-for="(mode, innerIndex) in mode1.allData">
                                <div class="m-0 pl-5 pt-2">
                                    <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + index + innerIndex">
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

                                        <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{ mode.Fundamental }}</h5>
                                    </div>

                                    <div :id="'accordion_' + index + innerIndex" class="collapse fs-6 ms-1">
                                        <div>
                                            <table class="table table-hover  table-sm">
                                                <tbody>
                                                    <tr>
                                                        <th>Level</th>
                                                        <!-- <th>
                                                            <input type="radio" class="consequence_matrix" :name="mode1.ImpactMeasure.replace(/ /g, '_')+'_'+mode.id" :data-segment="mode1.id" :data-section="mode.id" data-level="Fundamental" value="5" @click="handleConsequenceMatrixSelection"> 5
                                                        </th> -->
                                                        <th> 5 </th>
                                                        <th> 4 </th>
                                                        <th> 3 </th>
                                                        <th> 2 </th>
                                                        <th> 1 </th>
                                                    </tr>

                                                    <tr>
                                                        <th>Impact Measure</th>
                                                        <th>Fundamental</th>
                                                        <th>Major</th>
                                                        <th>Moderate</th>
                                                        <th>Minor</th>
                                                        <th>Insignificant</th>
                                                    </tr>

                                                    <tr class="text-gray-800 text-hover-success fw-bold">
                                                        <td>{{ mode.ImpactMeasure }}</td>
                                                        <td>{{ mode.Fundamental }}</td>
                                                        <td>{{ mode.Major }}</td>
                                                        <td>{{ mode.Moderate }}</td>
                                                        <td>{{ mode.Minor }}</td>
                                                        <td>{{ mode.Insignificant }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="separator separator-dashed"></div>
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
import $ from 'jquery';

export default {
    name: 'ConsequenceMatrixContent',
    props: ['alldata'],
    data() {
        return {
            form: new Form({
                segment: "",
                section: "",
                level: "",
                value: "",
            })
        }
    }
}
</script>
