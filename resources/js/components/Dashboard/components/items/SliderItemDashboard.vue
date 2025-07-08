<template>

             <!--begin::Col-->
             <div class="col-xl-12 mb-5 mb-xl-10">       
                  

                <!--begin::Slider Widget 2-->
                <div id="kt_sliders_widget_2_slider" class="card card-flush carousel carousel-custom carousel-stretch slide h-xl-100" data-bs-ride="carousel" data-bs-interval="9500">
                    <!--begin::Header--> 
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h4 class="card-title d-flex align-items-start flex-column"> 

                            <span class="card-label fw-bold text-gray-800">Overview</span>

                            <!-- <span v-if="currentTitle == 'Risk'" class="card-label fw-bold text-gray-800">Risk Overview</span> -->
                            <!-- <span v-else-if="currentTitle == 'ERM'" class="card-label fw-bold text-gray-800">Risk Overview</span> -->

                            <!-- <span class="text-gray-400 mt-1 fw-bold fs-7">24 events on all activities</span> -->
                        </h4>
                        <!--end::Title-->
                
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">            
                            <!--begin::Carousel Indicators-->
                            <ol class="p-0 m-0 carousel-indicators carousel-indicators-bullet carousel-indicators-active-success">
                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="0" data-title="Risk" class="active ms-1"></li>
                                <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="1" data-title="ERM" class="ms-1"></li>
                                <!-- <li data-bs-target="#kt_sliders_widget_2_slider" data-bs-slide-to="2" class=" ms-1"></li> -->
                                 
                            </ol>
                            <!--end::Carousel Indicators-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header--> 
                    
                    <!--begin::Body-->
                    <div class="card-body py-6">
                        <!--begin::Carousel-->
                        <div class="carousel-inner">

                                <!--begin::Item-->
                                <div class="carousel-item active show">     

                                    
                                    <div class="d-flex flex-stack" style="width: 95%;" >
                                        <!--begin::Section-->
                                            <div class="d-flex align-items-center me-5">
                                              

                                               <span><strong>Risk</strong></span> 

                                            </div>
                                            <!--end::Section-->  



                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center"> 

                                               <span class="p-5"><strong>I.R</strong></span> 

                                                <!-- InherentValue -->

                                                <!--begin::Info--> 
                                                <div class="d-flex flex-center">

                                               <span class="p-5"><strong>R.R</strong></span> 

                                                    <!-- ResidualValue -->
                                                    
                                                </div>  
                                                <!--end::Info-->  


                                            </div>
                                            <!--end::Wrapper-->

                                    </div>
                                    <!--end::Item-->


                                    <div v-for="(mode, outerIndex) in this.reports.riskData" :key="outerIndex">
                                        <div v-for="(mode1, innerIndex) in mode.riskData" :key="innerIndex">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-9" >                                 
                                                
                                                    <!--begin::Items-->
                                                    <!-- <div class="m-0" >      -->

                                                        <!-- container -->
                                                        <!-- <div >  -->

                                                            <div class="d-flex flex-stack" style="width: 95%;" >
                                                                <!--begin::Section-->
                                                                    <div class="d-flex align-items-center me-5">
                                                                      
                                                                        <!--begin::Symbol-->
                                                                            <div class="symbol symbol-50px me-5">
                                                                                <span class="symbol-label bg-light-success">
                                                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                                                    <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                            <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                                            <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                                        </svg>
                                                                                    </span>
                                                                                    <!--end::Svg Icon-->
                                                                                </span>
                                                                            </div>
                                                                        <!--end::Symbol-->

                                                                        <!--begin::Content-->
                                                                        <div class="me-5">
                                                                            <!--begin::Title-->
                                                                            <a href="#" class="text-gray-800 fw-bold text-hover-success fs-6">{{mode1.RiskName}}</a>
                                                                            <!--end::Title-->

                                                                            <!--begin::Desc-->
                                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{mode.Name}}</span>   
                                                                            <!--end::Desc-->                                     
                                                                        </div>
                                                                        <!--end::Content-->     

                                                                    </div>
                                                                <!--end::Section-->  

                                                                <!--begin::Wrapper-->
                                                                    <div class="d-flex align-items-center"> 
                                                                        <!--begin::Number-->           
                                                                        <span v-if="mode1.InherentValue >= 15"  class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ec0d0d; width: 50px; height: auto;">{{mode1.InherentValue}}</span> 
                                                                        <!--end::Number-->     

                                                                         <!--begin::Number-->           
                                                                         <span v-else-if="mode1.InherentValue > 4" class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ffbf00; width: 50px; height: auto;">{{mode1.InherentValue}}</span> 
                                                                         <!--end::Number-->   

                                                                         <!--begin::Number-->           
                                                                         <span v-else="mode1.InherentValue =< 4" class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center"  style="background-color:#09f17d; width: 50px; height: auto;">{{mode1.InherentValue}}</span> 
                                                                         <!--end::Number-->                        
                                                                          
                                                                             
                                                                        <!--begin::Info--> 
                                                                        <div class="d-flex flex-center">

                                                                            <!--begin::label--> 
                                                                                <span v-if="mode1.ResidualValue >= 15" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ec0d0d; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ mode1.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label--> 

                                                                            <!--begin::label--> 
                                                                                <span v-else-if="mode1.ResidualValue > 4" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ffbf00; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ mode1.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label-->  

                                                                            <!--begin::label--> 
                                                                                <span v-else="mode1.ResidualValue =< 4" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#09f17d; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ mode1.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label-->  
                                                                           
                                                                        </div>  
                                                                        <!--end::Info-->  

                                                                    </div>
                                                                <!--end::Wrapper-->   
                                                        
                                                            </div>
                                                            <!--end::Item-->

                                                        <!-- </div> -->
                                                        <!-- end::container -->

                                                        <!--begin::Separator-->
                                                            <div class="separator separator-dashed my-3"></div>
                                                        <!--end::Separator-->

                                                    <!-- </div> -->
                                                    <!-- end::Item -->

                                            </div>
                                            <!--end::Wrapper-->  

                                        </div>
                                    </div>

                                    <!--begin::Action-->
                                    <div class="m-0">
                                        <!-- <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a> -->
                
                                        <!-- <a href="#" class="btn btn-sm btn-success mb-2" >View</a> -->
                                    </div>
                                    <!--end::Action--> 

                                </div>
                                <!--end::Item-->  
                                <!--begin::Item-->
                                <div class="carousel-item "> 
                                    <div class="d-flex flex-stack" style="width: 95%;" >
                                        <!--begin::Section-->
                                            <div class="d-flex align-items-center me-5">
                                              

                                               <span><strong>ERM</strong></span> 

                                            </div>
                                            <!--end::Section-->  



                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center"> 

                                               <span class="p-5"><strong>I.R</strong></span> 

                                                <!-- InherentValue -->

                                                <!--begin::Info--> 
                                                <div class="d-flex flex-center">

                                               <span class="p-5"><strong>R.R</strong></span> 

                                                    <!-- ResidualValue -->
                                                    
                                                </div>  
                                                <!--end::Info-->  


                                            </div>
                                            <!--end::Wrapper-->

                                    </div>
                                    <!--end::Item-->    
                                    <div v-for="(mode, index) in reportsErm" :key="mode.id" >
                                    <!-- <div v-for="(mode, outerIndex) in this.reports.riskData" :key="outerIndex"> -->
                                       <div v-for="(ermItem, index_) in mode.riskData">
                                        <!-- <div v-for="(mode1, innerIndex) in mode.riskData" :key="innerIndex"> -->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center mb-9" >                                 
                                                
                                                    <!--begin::Items-->
                                                    <!-- <div class="m-0" >      -->

                                                        <!-- container -->
                                                        <!-- <div >  -->

                                                             
                                   


                                                            <div class="d-flex flex-stack" style="width: 95%;" >
                                                                <!--begin::Section-->
                                                                    <div class="d-flex align-items-center me-5">
                                                                        <!--begin::Symbol-->
                                                                        <!-- <div class="symbol symbol-30px me-5">
                                                                            <span class="symbol-label">  
                                                                                <i class="ki-outline ki-magnifier fs-3 text-gray-600"></i>                             
                                                                            </span>                
                                                                        </div> -->
                                                                        <!--end::Symbol-->

                                                                        	<!--begin::Symbol-->
                                                                                <div class="symbol symbol-50px me-5">
                                                                                    <span class="symbol-label bg-light-success">
                                                                                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                                                        <span class="svg-icon svg-icon-2x svg-icon-success">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                                <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black" />
                                                                                                <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black" />
                                                                                            </svg>
                                                                                        </span>
                                                                                        <!--end::Svg Icon-->
                                                                                    </span>
                                                                                </div>
                                                                            <!--end::Symbol-->

                                                                        <!--begin::Content-->
                                                                        <div class="me-5">
                                                                            <!--begin::Title-->
                                                                            <a href="#" class="text-gray-800 fw-bold text-hover-success fs-6">{{ermItem.RiskName}}</a>
                                                                            <!--end::Title-->

                                                                            <!--begin::Desc-->
                                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">{{mode.RiskName}}</span>   
                                                                            <!--end::Desc-->                                     
                                                                        </div>
                                                                        <!--end::Content-->                                       
                                                                    </div>
                                                                <!--end::Section-->  

                                                                <!--begin::Wrapper-->
                                                                    <div class="d-flex align-items-center"> 
                                                                        <!--begin::Number-->           
                                                                        <span v-if="ermItem.InherentValue >= 15"  class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ec0d0d; width: 50px; height: auto;">{{ermItem.InherentValue}}</span> 
                                                                        <!--end::Number-->     

                                                                         <!--begin::Number-->           
                                                                         <span v-else-if="ermItem.InherentValue > 4" class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ffbf00; width: 50px; height: auto;">{{ermItem.InherentValue}}</span> 
                                                                         <!--end::Number-->   

                                                                         <!--begin::Number-->           
                                                                         <span v-else="ermItem.InherentValue =< 4" class="badge text-gray-700 fw-bold fs-6 me-3 pl-4 pt-3 pr-4 pb-3 text-center"  style="background-color:#09f17d; width: 50px; height: auto;">{{ermItem.InherentValue}}</span> 
                                                                         <!--end::Number-->                        
                                                                          
                                                                             
                                                                        <!--begin::Info--> 
                                                                        <div class="d-flex flex-center">

                                                                            <!--begin::label--> 
                                                                                <span v-if="ermItem.ResidualValue >= 15" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ec0d0d; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ ermItem.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label--> 

                                                                            <!--begin::label--> 
                                                                                <span v-else-if="ermItem.ResidualValue > 4" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#ffbf00; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ ermItem.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label-->  

                                                                            <!--begin::label--> 
                                                                                <span v-else="ermItem.ResidualValue =< 4" class="badge fs-base pl-4 pt-3 pr-4 pb-3 text-center" style="background-color:#09f17d; width: 50px; height: auto;">                                
                                                                                    <!-- <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>  -->
                                                                                    {{ ermItem.ResidualValue  }}
                                                                                </span>  
                                                                            <!--end::label-->  
                                                                           
                                                                        </div>  
                                                                        <!--end::Info-->  

                                                                    </div>
                                                                <!--end::Wrapper-->   
                                                        
                                                            </div>
                                                            <!--end::Item-->

                                                        <!-- </div> -->
                                                        <!-- end::container -->

                                                        <!--begin::Separator-->
                                                            <div class="separator separator-dashed my-3"></div>
                                                        <!--end::Separator-->

                                                    <!-- </div> -->
                                                    <!-- end::Item -->

                                            </div>
                                            <!--end::Wrapper-->  
                                        </div>
                                    </div>

                                    <!--begin::Action-->
                                    <div class="m-0">
                                        <!-- <a href="#" class="btn btn-sm btn-light me-2 mb-2">Details</a> -->
                
                                        <!-- <a href="#" class="btn btn-sm btn-success mb-2"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Join Event</a> -->
                                    </div>
                                    <!--end::Action-->  
                                </div>
                                <!--end::Item-->  
                               
                                          
                        </div>
                        <!--end::Carousel-->            
                    </div>
                    <!--end::Body-->     
                </div>
                <!--end::Slider Widget 2-->            
            
            </div>
            <!--end::Col-->   

</template>

<script>


export default {

name:'SliderItemDashboard',
props:['reports', 'reportsErm'],
// props:['ResidualValue'],

}
</script>