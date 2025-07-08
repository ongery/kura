<template>
    
<!--begin::Row-->
<!-- <div class="row g-6 g-xl-9"> -->
    
  
    <!--begin::Col-->
    <div class="col-sm-3 col-xl-3" >
        <!--begin::Card-->
        <div class="card ml-1">
            <!--begin::Card header-->
            <div class="card-header flex-nowrap border-0 pt-9">
                <!--begin::Card title-->
                <div class="card-title m-0 row ">
                   

                    <!--begin::Title-->
                    <a href="#" class="fs-4 fw-bold text-hover-success text-gray-600 col-10" >
                        Medium Risk 
                    </a>
                    <!--end::Title-->
                     <!--begin::Icon-->
                     <!-- <div class="symbol symbol-45px w-45px bg-light me-5"> -->
                        <!-- <img src="../../assets/media/svg/brand-logos/twitch.svg" alt="image" class="p-3"/> -->



                                                
                        <div class="d-flex flex-column pt-2 col-2"  >

                        
                            <!-- <OctagonHighRisk :risk="summaryReports"></OctagonHighRisk> -->

                                <!-- aquamarine -->
                                    <!--begin::Item-->
                                    <div class="octagon d-flex flex-center h-35px w-35px"  style="background-color:#ffbf00; margin-top: -17px;">

                                        <!--begin::Content-->
                                        <!-- <div class="text-center" > -->

                                            <!--begin::Symbol-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                                <!-- <span class="svg-icon svg-icon-2tx svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                                    </svg>
                                                </span> -->
                                                <!--end::Svg Icon-->
                                            <!--end::Symbol-->

                                            <!--begin::Text-->
                                                <!-- <div class="mt-1"> -->
                                                    <!--begin::Animation-->
                                                    <!-- <div class="d-flex align-items-center"> -->
                                                        
                                                        <!-- <div class="text-dark text-white-400" style="margin-left: -2px; font-size: 35px;" ></div> -->
                                                    
                                                    <!-- </div> -->
                                                    <!--end::Animation-->

                                                    <!--begin::Label-->
                                                        <!-- <span class="text-gray-600 fw-bold fs-5 lh-0">Businesses</span> -->
                                                    <!--end::Label-->
                                                <!-- </div> -->
                                            <!--end::Text-->


                                        <!-- </div> -->
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->

                        </div>

                    <!-- </div> -->
                    <!--end::Icon-->
                </div>
                <!--end::Card title-->

               
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body d-flex flex-column px-9" >
                <!--begin::Heading-->
                <!-- <div class="fs-2tx fw-bold ml-9" style="margin-top: -15px; margin-left: 8px">
                    5
                </div> -->

                 <!--begin::Animation-->
                 <div class="d-flex align-items-center">
                    <div class="text-dark text-white-400 fs-2tx fw-bold ml-9" style="margin-top: -15px; margin-left: 8px" data-kt-countup="true" :data-kt-countup-value=" summaryReports.totalMediumRisks">{{ summaryReports.totalMediumRisks}}</div>
                
                </div>
                <!--end::Animation-->

                <!--end::Heading-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->

    <!-- </div> -->
    <!-- end:Row -->
</template>



<script>

// import { Doughnut } from 'vue-chartjs'

export default {

    name:'CardOverviewMidRiskDash',
    props:['summaryReports'],
                    
                   
    // props:['ResidualValue'],
    // components:{Doughnut}
}
</script>