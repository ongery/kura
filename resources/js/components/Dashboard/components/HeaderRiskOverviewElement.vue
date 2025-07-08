<template>
    
<!--begin::Card widget 4-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
      <!--begin::Header-->
      <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">   
            <!--begin::Info--> 
            <div class="d-flex align-items-center">
                <!--begin::Title-->
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">High Risk</span> 
                <!--end::Title-->
            </div>
            <!--end::Info--> 

            <!--begin::Subtitle-->
            <span class="text-gray-400 pt-1 fw-semibold fs-6">Risk Report</span>
            <!--end::Subtitle--> 
        </div>
        <!--end::Title-->      
    </div>
    <!--end::Header-->

    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex align-items-center">
        <!--begin::Chart-->
        <div class="d-flex flex-center me-5 pt-2">
            <div 
                id="kt_card_widget_4_chart" 
                style="min-width: 70px; min-height: 70px" 
                data-kt-size="70" 
                data-kt-line="11">
            </div>
        </div>
        <!--end::Chart-->
        
       
        
        <div class="d-flex flex-column flex-wrap align-items-center">
            
            <!--begin::Stats-->
            <div class="fw-bolder text-gray-700 pr-1 pb-3 fs-2hx ">6</div>
            <!--end::Stats-->


            <!--begin::Label-->
            <div class="text-gray-500 flex-grow-1">High Risk</div>
            <!--end::Label-->

        </div>

    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 4--> 

</template>