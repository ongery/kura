<template>
  <!-- High Risk -->
  <div class="col-xl-3 pt-7">

<!--begin::Title-->
<div class="card-title d-flex flex-column">   
    <!--begin::Info--> 
    <div class="d-flex align-items-center">
        <!--begin::Title-->
        <!-- <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">High Risk</span>  -->
        
        <span class="text-dark text-white-400" style="font-size: 14px; margin-left: 5px;">Low Risk</span>
        <!--end::Title-->
    </div>
    <!--end::Info--> 

    <!--begin::Subtitle-->
    <!-- <span class="text-gray-400 pt-1 fw-semibold fs-6">Risk Report</span> -->
    <!--end::Subtitle--> 
</div>
<!--end::Title-->      


<div class="d-flex flex-column pt-2">

  
        <!-- <OctagonHighRisk :risk="summaryReports"></OctagonHighRisk> -->

<!-- aquamarine -->
        <!--begin::Item-->
        <div class="octagon d-flex flex-center h-80px w-80px"  style="background-color:#09f17d">
            <!--begin::Content-->

            <div class="text-center" >

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
                    <div class="mt-1">
                        <!--begin::Animation-->
                        <div class="d-flex align-items-center">
                            
                            <div class="text-dark text-white-400" style="margin-left: -2px; font-size: 35px;" data-kt-countup="true" :data-kt-countup-value="summaryReports.totalGreenRisks">{{ summaryReports.totalGreenRisks}}</div>
                        
                        </div>
                        <!--end::Animation-->

                        <!--begin::Label-->
                            <!-- <span class="text-gray-600 fw-bold fs-5 lh-0">Businesses</span> -->
                        <!--end::Label-->
                    </div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Item-->

</div>



</div>
</template>

<script>

export default {
    name:'OctagonLowRisk',
    props:['summaryReports'],

}

</script>