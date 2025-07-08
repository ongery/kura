<template>
    <!--begin::Row-->
    <div class="row g-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-md-6 col-xl-6 mb-xxl-10">
            <!--begin::Card widget 8-->
                <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                <!--begin::Card body-->
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <!--begin::Statistics-->
                    <div class="mb-4 px-9">   
                        <!--begin::Info-->
                        <div class="d-flex align-items-center mb-2"> 


                            
                                <!--begin::Chart-->
                                <div class="d-flex flex-center me-5 mb-6 pt-2 pb-4" style="margin-left: -10px;">

                                    <div 
                                        id="kt_card_widget_4_chart" 
                                        style="min-width: 55px; min-height: 55px" 
                                        data-kt-size="35" 
                                        data-kt-line="8"
                                        data-kt-percent="100">
                                    </div>
                                        
                                    <div  class="fw-bolder text-gray-800 text-white-500" style="margin-left: -78px; font-size: 40px;" data-kt-countup="true" :data-kt-countup-value="11">{{             
                                        11
                                    }}</div>

                                  

                                </div>
                                <!--end::Chart-->
                                
                                <!--begin::Currency-->
                                    <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1>">$</span>                                    
                                <!--end::Currency--> 
                            
                            
                            <!--begin::Value-->
                                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">69,700</span>
                            <!--end::Value-->

                            <!--begin::Label-->
                                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i> 
                                    2.2%                    </span>  
                                
                            <!--end::Label-->               
                        </div>
                        <!--end::Info-->

                        <!--begin::Description-->
                        <span class="fs-6 fw-semibold text-gray-400">Total Online Sales</span>
                        <!--end::Description-->
                    </div>
                    <!--end::Statistics-->        
                    
                    <!--begin::Chart-->
                    <!-- <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div> -->
                    <!--end::Chart--> 
                </div>
                <!--end::Card body-->


                </div>
            <!--end::Card widget 8--> 

        </div>
        <!-- end:col -->
</div>
<!-- end:Row -->
</template>

<script>

import { Doughnut } from 'vue-chartjs'

export default {

    name:'CardOverviewDashboardTotalRisk',
    // props:['ResidualValue'],
    components:{Doughnut}
}
</script>