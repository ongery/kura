<template>

    <!--begin::Invoice-->
    <!-- <div v-for="mode in reports.riskData" -->
        
    <!-- <div> -->
        <div>

            <div class="card" v-for="mode in reports.riskData"
                :key="mode.id">

                <!--begin::Body-->
                <div class="card-body p-lg-20">

                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row">

                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">

                            <!--begin::Head-->
                            <div class="d-flex flex-stack flex-wrap mb-10 mb-lg-15">


                                <!--begin::Logo-->
                                <!-- <a href="#">
                                    <img alt="Logo" class="h-50px" src="assets/media/svg/brand-logos/the-blockchain-group-tbg.svg" />
                                </a> -->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">{{mode.Name}}</span>

                                
                                <!--end::Logo-->


                                <!--begin::Actions-->
                                <!-- <div class="my-2">
                                    <a href="#" class="btn btn-sm btn-light me-2">Download</a>
                                    <a href="#" class="btn btn-sm btn-success me-2" onclick="window.print()">Print</a>
                                    <a href="#" class="btn btn-sm btn-primary">Pay Now</a>
                                </div> -->
                                <!--end::Actions-->


                            </div>
                            <!--end::Head-->


                            <!--begin::Wrapper-->
                            <div class="mb-0">


                                <!--begin::Label-->
                                <!-- <div class="fw-bolder fs-3 text-gray-800 mb-8">Invoice #34782</div> -->
                                <!--end::Label-->


                                <!--begin::Content-->
                                <div class="flex-grow-1">


                                    

                            <!--begin::Accordion-->


                            <!--begin::Section-->
                            <div class="m-0" v-for="(mode1, index) in mode.riskData":key="mode1.id">

                                <!--begin::Heading-->
                                <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#kt_job_4_3_'+mode1.RiskName+index">
                                    <!--begin::Icon-->
                                    <div class="btn btn-sm btn-icon mw-20px btn-active-color-success me-5">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                                        <span class="svg-icon toggle-on svg-icon-primary svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                                        <span class="svg-icon toggle-off svg-icon-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    
                                    <!--begin::Title-->
                                    <h4 class="text-gray-700 fw-bolder fs-3 cursor-pointer mb-0">{{mode1.RiskName}}</h4>
                                    <!--end::Title-->

                                </div>
                                <!--end::Heading-->
                                
                                <!--begin::Body-->
                                <div id="'#kt_job_4_3_'+mode1.RiskName+index" class="collapse fs-6 ms-1">
                                    
                                    <!--begin::Tap pane-->
                                        <div class="tab-pane fade" id="kt_table_widget_5_tab_1">

                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="border-0">
                                                            <th class="p-0 w-50px"></th>
                                                            <th class="p-0 min-w-130px text-start pb-2"></th>
                                                            <th class="p-0 min-w-140px text-start pb-2"></th>
                                                            <th class="p-0 min-w-130px text-end pb-2"></th>
                                                            <!-- <th class="p-0 min-w-50px text-end pb-2"></th> -->
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <!-- <div class="symbol symbol-45px me-2"> -->
                                                                    <span class="symbol-label">
                                                                        <i class="fa fa-genderless text-primary fs-2 me-2"></i>
                                                                        <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                                                    </span>
                                                                <!-- </div> -->
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6">Key Control Indicators</a>
                                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                                            </td>

                                                            <td>
                                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Total Questions</a>
                                                                <span class="text-muted fw-bold d-block">{{mode1.TotalQuestions}}</span>
                                                            </td>
                                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                                            <td>
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Non-Compliance</a>
                                                                <span class="text-muted fw-bold d-block">7</span>
                                                            </td>
                                                            <!-- <td class="text-end">
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td> -->

                                                            <!-- <td class="text-end"> -->
                                                                <!-- <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-success">
                                                                    <span class="svg-icon svg-icon-2">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                                <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a> -->
                                                            <!-- </td> -->

                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>
                                                                <!-- <div class="symbol symbol-45px me-2"> -->
                                                                    <span class="symbol-label">
                                                                        <i class="fa fa-genderless text-primary fs-2 me-2"></i>
                                                                        <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                                                    </span>
                                                                <!-- </div> -->
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6">Key Risk Indicators</a>
                                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                                            </td>

                                                            <td>
                                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Total KRIs</a>
                                                                <span class="text-muted fw-bold d-block">{{mode1.TotalKRIs}}</span>
                                                            </td>
                                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                                            <td>
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Red KRIs</a>
                                                                <span class="text-muted fw-bold d-block">{{mode1.RedKRIs}}</span>
                                                            </td>
                                                            <!-- <td class="text-end">
                                                                <span class="badge badge-light-success">Approved</span>
                                                            </td> -->

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <!-- <div class="symbol symbol-45px me-2"> -->
                                                                    <span class="symbol-label">
                                                                        <i class="fa fa-genderless text-primary fs-2 me-2"></i>
                                                                        <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                                                    </span>
                                                                <!-- </div> -->
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6">Treatment Plans</a>
                                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                                            </td>

                                                            <td>
                                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Non-Started Overdue</a>
                                                                <span class="text-muted fw-bold d-block">{{mode1.NotStartedOverdue}}</span>
                                                            </td>
                                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                                            <td>
                                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">WIP-Overdue</a>
                                                                <span class="text-muted fw-bold d-block">45</span>
                                                            </td>
                                                            

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                <!-- <div class="symbol symbol-45px me-2"> -->
                                                                    <span class="symbol-label">
                                                                        <i class="fa fa-genderless text-primary fs-2 me-2"></i>
                                                                        <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                                                    </span>
                                                                <!-- </div> -->
                                                            </td>

                                                            <td>
                                                                <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6">Incidents Reported</a>
                                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                                            </td>

                                                            <td>
                                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                                            <!-- <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Total Questions</a>
                                                                <span class="text-muted fw-bold d-block">0</span> -->
                                                            </td>
                                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                                            <td>
                                                            <!-- <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Non-Compliance</a> -->
                                                                <span class="text-muted fw-bold d-block">7</span>
                                                            </td>
                                                            
                                                        </tr>

                                                    </tbody>
                                                    <!--end::Table body-->
                                                </table>
                                            </div>
                                            <!--end::Table-->

                                        </div>
                                    <!--end::Tap pane-->

                                </div>
                                <!--end::Content-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed"></div>
                                <!--end::Separator-->

                            </div>
                            <!--end::Section-->




                            <!--end::Accordion-->



                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Content-->




                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Body-->

            </div>
            <!-- End: card -->

        </div>
        <!--end::Invoice-->

    <!-- </div> -->

</template>

<script>
// import RiskTableContent from './RiskTableContent.vue';


export default {
    name:'RiskContent',
    props:['reports', 'reportsRiskData'],

}
</script>