<template>
    <div class="row mt-2">
        <RiskAnalysisToolbar :title="this.RName"></RiskAnalysisToolbar>

        <form @submit.prevent="updateAnalzeRisk()">
            <div class="card card-body">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="m-0">
                        <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-5 bg-lighten" style="width: 280px;">
                            <div class="mx-3">
                                <div class="mb-12">
                                    <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showLevelOne" class="text-gray-800 text-hover-success fs-6 fw-bold">Risk Events</a>
                                        </div>
                                    </div>

                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showRiskCauses" class="text-gray-800 text-hover-success fs-6 fw-bold">Risk Level 2</a>
                                        </div>
                                    </div> -->

                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showRiskEffects" class="text-gray-800 text-hover-success fs-6 fw-bold">Impacts</a>
                                        </div>
                                    </div> -->
                                    
                                    <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showRiskLevel" class="text-gray-800 text-hover-success fs-6 fw-bold">Inherent Risk Level</a>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showCurrentControls" class="text-gray-800 text-hover-success fs-6 fw-bold">Current Control</a>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showResidualRiskLevel" class="text-gray-800 text-hover-success fs-6 fw-bold">Residual Risk Level</a>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showTreatment" class="text-gray-800 text-hover-success fs-6 fw-bold">Treatment</a>
                                        </div>
                                    </div> -->

                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showKRIs" class="text-gray-800 text-hover-success fs-6 fw-bold">KRIs</a>
                                        </div>
                                    </div> -->
                                    
                                    <!-- <div class="d-flex align-items-center mb-7 mt-5">
                                        <div class="symbol symbol-50px me-5">
                                            <span class="symbol-label bg-light-success">
                                                <span class="svg-icon svg-icon-2x svg-icon-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="javascript:void(0)" @click.prevent="showCompliance" class="text-gray-800 text-hover-success fs-6 fw-bold">KCI</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex-lg-row-fluid  mb-10" style="margin-left: 30px; margin-bottom: 10px;">
                        <div class="col-md-12">
                            <RiskEvents v-if="showlevelone"></RiskEvents>
                            <!-- <RiskLevel1 v-if="showlevelone"></RiskLevel1> -->
                            <RiskLevel2 v-if="showcauses"></RiskLevel2>
                            <RiskImpact v-if="showeffects"></RiskImpact>
                            <CurrentControl v-if="showcontrols"></CurrentControl>

                            <!-- Inherent Consequence Scale -->
                            <div class="form-row" v-if="showrisklevels">
                                <div class="card-header mb-3">
                                    <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Inherent Risk Level</h3>
                                </div>

                                <div class="form-group">
                                    <div class="card p-8 m-1 ">
                                        <span class="pb-3" style="font-size:medium">Inherent Likelihood Scale</span>
                                        <select
                                            class="form-control"
                                            v-model="form.InherentLikelihoodScale"
                                            name="CategoryID"
                                            :class="{
                                                'is-invalid': form.errors.has('InherentLikelihoodScale')
                                            }"
                                        >
                                            <option v-for="val in likelihoodscales" :value="val.id" :key="val.id">
                                                {{ val.Base + '-' + val.Name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="InherentLikelihoodScale"></has-error>
                                    </div>

                                    <div class="card p-8">
                                        <span class="badge badge-light p-6" style="font-size:medium">Inherent Consequence Scale</span>
                                    </div>
                                </div>

                                <div class="card m-1 ps-8 pe-8">
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
                                                
                                                <input type="text" class="form-control w-350px" name="consFandamental" :id="'consFandamental_'+mode.id" disabled v-model="mode.highestRank" />
                                            </div>

                                            <div :id="'accordion_' + mode.id" class="collapse fs-6 ms-1">
                                                <div v-for="(cMatrix,ind) in mode.ConsequenceMatrix" :key="cMatrix.id">
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
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Fundamental" value="5" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 5"  /> 5
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Major" value="4" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 4" /> 4
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Moderate" value="3" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 3" /> 3
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="1" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Minor" value="2" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 2" /> 2
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-grouptype="1" :data-scalesgroupid="mode.id" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Insignificant" value="1" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 1" /> 1
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
                            <!-- Inherent Consequence Scale End -->

                            <!-- Residual Consequence Scale -->
                            <div class="form-row" v-if="showresidualrisklevel">
                                <div class="card-header mb-3">
                                    <h3 class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Residual Risk Level</h3>
                                </div>

                                <div class="form-group">
                                    <div class="card p-8 m-1 ">
                                        <span class="pb-3" style="font-size:medium">Residual Likelihood Scale</span>
                                        <select
                                            class="form-control"
                                            v-model="form.ResidualLikelihoodScale"
                                            name="CategoryID"
                                            :class="{
                                                'is-invalid': form.errors.has('ResidualLikelihoodScale')
                                            }"
                                        >
                                            <option v-for="val in likelihoodscales" :value="val.id" :key="val.id">
                                                {{ val.Base + '-' + val.Name }}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="ResidualLikelihoodScale"></has-error>
                                    </div>

                                    <div class="card p-8">
                                        <span class="badge badge-light p-6" style="font-size:medium">Residual Consequence Scale</span>
                                    </div>
                                </div>

                                <div class="card m-1 ps-8 pe-8">
                                    <div v-for="mode in scalesgroupResidual" :key="mode.id">
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

                                                <!-- <select class="form-control w-350px" name="consFandamental" :id="'consFandamental_'+mode.id" :class="{ 'is-invalid': form.errors.has('ResidualLikelihoodScale') }" disabled>
                                                    <option :data-value="consFandamental.lValue" v-for="(consFandamental, index) in mode.ConsequenceFandamental" :key="index" :selected="consFandamental.lValue === mode.highestRank"> {{ consFandamental.lFundamental }} </option>
                                                </select> -->
                                                <input type="text" class="form-control w-350px" name="consFandamental" :id="'consFandamental_'+mode.id" disabled v-model="mode.highestRank" />
                                            </div>

                                            <div :id="'accordion_' + mode.id" class="collapse fs-6 ms-1">
                                                <div v-for="(cMatrix,ind) in mode.ConsequenceMatrix" :key="cMatrix.id">
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
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Fundamental" value="5" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 5"  /> 5
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Major" value="4" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 4" /> 4
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Moderate" value="3" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 3" /> 3
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-scalesgroupid="mode.id" :data-grouptype="2" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Minor" value="2" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 2" /> 2
                                                                        </th>
                                                                        <th>
                                                                            <input type="radio" class="consequence_matrix" :name="cMatrix.Fundamental.replace(/ /g, '_')+'_'+cMatrix.id" :data-segment="cMatrix.id" :data-listindex="ind" :data-section="cMatrix.id" :data-grouptype="2" :data-scalesgroupid="mode.id" :data-o_i_t_m_id="form.o_i_t_m_id" data-location="corporate" data-level="Insignificant" value="1" @click="handleConsequenceMatrixSelection" :checked="cMatrix.value === 1" /> 1
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
                            <!-- Residual Consequence Scale End -->

                            <CreateAction v-if="showtreatment"></CreateAction>

                            <KRIs v-if="showkris"></KRIs>
                            <Compliance v-if="showcompliance"></Compliance>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker'
    import CreateAction from './Actionindex.vue'
    import RiskEvents from './RiskProfile/RiskEvents'
    // import RiskLevel1 from './RiskProfile/RiskLevel1'
    import RiskLevel2 from './RiskProfile/RiskLevel2'
    import RiskImpact from './RiskProfile/RiskImpacts'
    import CurrentControl from './RiskProfile/CurrentControl'
    import KRIs from './RiskProfile/kris'
    import Compliance from './RiskProfile/compliance'
    import RiskAnalysisToolbar from './components/RiskAnalysisToolbar.vue'
    export default {
        data() {
            return {
                riskcauses: {},
                showlevelone: false,
                showcauses: false,
                showcontrols: false,
                showeffects: false,
                showtreatment: false,
                showrisklevels: false,
                showresidualrisklevel: false,
                showkris: false,
                showcompliance: false,
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
                    scalesgroupResidual: {}
                }),
                cMatrixRanking: new Form({
                    scalesGroupId: '',
                    groupType: '',
                    segment: '',
                    section: '',
                    level: '',
                    value: '',
                    itemName: '',
                    location: ''
                }),
                state: {
                    disabledDates: {
                        from: new Date()
                    }
                }
            }
        },
        components: {
            Datepicker,
            RiskEvents,
            RiskLevel2,
            RiskImpact,
            CurrentControl,
            // RiskLevel1,
            KRIs,
            Compliance,
            CreateAction,
            RiskAnalysisToolbar
        },
        watch: {
            '$route.params.id': {
                handler: 'loadRisk',
                immediate: true
            }
        },
        methods: {
            handleConsequenceMatrixSelection (e) {
                this.$Progress.start()
                this.cMatrixRanking.scalesGroupId   =   e.target.dataset.scalesgroupid;
                this.cMatrixRanking.o_i_t_m_id      =   e.target.dataset.o_i_t_m_id;
                this.cMatrixRanking.groupType       =   e.target.dataset.grouptype;
                this.cMatrixRanking.segment         =   e.target.dataset.segment;
                this.cMatrixRanking.section         =   e.target.dataset.section;
                this.cMatrixRanking.level           =   e.target.dataset.level;
                this.cMatrixRanking.value           =   e.target.value;
                this.cMatrixRanking.itemName        =   e.target.dataset.itemname;
                this.cMatrixRanking.location        =   e.target.dataset.location;

                this.cMatrixRanking.post('/api/consequence-matrix/ranking')
                .then(res => {
                    if (res.data.ResultCode == 1200) {
                        if(this.cMatrixRanking.groupType == 1) {
                            this.updateScalesGroup(this.cMatrixRanking.scalesGroupId, this.cMatrixRanking.groupType, res.data.ResponseData);
                        }
                        if(this.cMatrixRanking.groupType == 2) {
                            this.updateScalesGroup(this.cMatrixRanking.scalesGroupId, this.cMatrixRanking.groupType, res.data.ResponseData);
                        }
                        this.$Progress.finish()
                    } else {
                        toast.fire({ type: 'error', title: res.data.ResultDesc })
                    }
                })
                .catch(e => {
                    this.$Progress.fail()
                    toast.fire({ type: 'error', title: 'Operation not successfull' + '\n' + e.response.data.message })
                })
            },

            updateScalesGroup (id, groupType, ResponseData) {
                if(groupType == 1) {
                    let groupIndex = this.scalesgroup.findIndex(group => group.id == id);
                    if (groupIndex !== -1) {
                        this.$set(this.scalesgroup[groupIndex], 'highestRank', ResponseData[0]);
                        this.$set(this.scalesgroup[groupIndex], 'ConsequenceFandamental', ResponseData[1]);
                    }
                }
                if(groupType == 2) {
                    let groupIndex = this.scalesgroupResidual.findIndex(group => group.id == id);                
                    if (groupIndex !== -1) {
                        this.$set(this.scalesgroupResidual[groupIndex], 'highestRank', ResponseData[0]);
                        this.$set(this.scalesgroupResidual[groupIndex], 'ConsequenceFandamental', ResponseData[1]);
                    }
                }
                
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

            showLevelOne() {
                this.showlevelone = true
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showRiskCauses() {
                this.showlevelone = false
                this.showcauses = true
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showRiskEffects() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = true
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showCurrentControls() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = true
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showRiskLevel() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = true
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showResidualRiskLevel() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = true
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = false
            },

            showTreatment() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = true
                this.showkris = false
                this.showcompliance = false
            },

            showKRIs() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = true
                this.showcompliance = false
            },

            showCompliance() {
                this.showlevelone = false
                this.showcauses = false
                this.showcontrols = false
                this.showeffects = false
                this.showrisklevels = false
                this.showresidualrisklevel = false
                this.showtreatment = false
                this.showkris = false
                this.showcompliance = true
            },

            loadRisk(val) {
                axios.get('/api/corporate-risks/' + val, {
                    params: { location: 'corporate' }
                }).then(res => {
                    this.form.fill(res.data.ResponseData)
                    this.RName = res.data.ResponseData.item.Name;
                    this.scalesgroup = res.data.ResponseData.scalesgroup;
                    this.scalesgroupResidual = res.data.ResponseData.scalesgroupresidual;

                    console.log('check-scalesgroup ', this.scalesgroup);
                    console.log('check-scalesgroupResidual ', this.scalesgroupResidual);
                })
                localStorage.setItem('risk_id', val)
            },

            newModal() {
                this.editmode = false
                this.form.reset()
                $('#addNew').modal('show')
            },

            GoBack() {
                this.$router.go(-1)
            }
        },
        created() {
            this.loadLikelihoodScale()
            this.loadConsequenceScale()
            this.showLevelOne()
            Fire.$on('AfterCreate', () => {
                this.loadRisk()
            })
        }
    }
</script>
