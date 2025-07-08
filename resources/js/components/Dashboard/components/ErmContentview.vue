<template>
     <!--begin::Wrapper-->
     <div >

        <!--begin::Header-->
        
        <!-- <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">{{ selectedItems.RiskName }}</h3> -->
  
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            
            <!--begin::Col-->
            <div class="col-md-8 fv-row">
  
              <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">{{selectedItems.RiskName}}</h3>
                    
            </div>
            <!--end::Col-->
                               
                  
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
  
              <div v-if="InherentValue != ''" class="col fw-bold text-center">
                <OctagonInherentValue2 v-if="InherentValue != ''" :InherentValue="InherentValue"></OctagonInherentValue2>
                I.R
              </div>
  
              <div v-if="ResidualValue != ''" class="col fw-bold text-center">
                <OctagonResidualValue2 v-if="ResidualValue != ''" :ResidualValue="ResidualValue"></OctagonResidualValue2>
                R.R
              </div>
             
            </div>
            <!--end::Actions-->
            
          </div>
          <!--end::Header-->
  
        <!--begin::Accordion-->
        <div v-for="(selectedItem, index) in selectedItems.riskData">

            <!--begin::Section-->
            <div class="m-0 pl-5 pt-2">

            <!-- begin::Heading -->
            <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + '_' + index">
                
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
                
                <!-- <h3 style="margin-left: 8px;"  class="custom-list-title  text-gray-800 text-hover-success">{{mode1.RiskName}}</h3> -->
                <h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{selectedItem.RiskName}}</h5>

                <!-- <h4 class="text-gray-700 fw-bold fs-3 cursor-pointer mb-0">{{mode1.RiskName}}</h4> -->
            </div>
            <!-- end::Heading -->

            <!--begin::Body-->
            <div :id="'accordion_' + '_' + index" class="collapse fs-6 ms-1">
                <!-- fafafa f7f7ff-->
                

                <!--begin::Tap pane-->
                <!-- <div class="tab-pane fade" id="kt_table_widget_5_tab_1"> -->

                    <!--begin::Table container-->
                    <div class="table-responsive m-0 pt-5">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="border-0" style="margin-bottom: -30px;">
                                    <!-- <th class="p-0 w-50px"></th> -->
                                    <th class="p-0 min-w-130px text-start"></th>
                                    
                                    <th class="p-0 min-w-140px text-center">
                                        <a href="#" class="text-gray-700  text-hover-success"  style="font-size: 15px;">Inherent Value</a>

                                        <!-- <a href="#" class="text-gray-800 text-bold  text-hover-success">Inherent Value</a> -->

                                        <!-- <a href="#" class=" text-dark text-muted text-hover-success mb-1 px-6 ">Inherent Value</a> -->
                                        <!-- <a href="#" class="custom-list-title fw-bold text-gray-800 mb-1 text-hover-success mb-1">Inherent Value</a> -->
                                        
                                    </th>
                                    <th class="p-0 min-w-130px text-center">
                                        <a href="#" class="text-gray-700  text-hover-success" style="font-size: 15px;">Residual Value</a>

                                        <!-- <a href="#" class="text-gray-800 text-bold text-hover-success"></a> -->

                                        <!--  -->
                                        <!-- <a href="#" class=" text-dark text-muted text-hover-success mb-1 px-4 ">Residual Value</a> -->
                                        <!-- <a href="#" class="custom-list-title fw-bold text-gray-800 mb-1 text-hover-success mb-1">Residual Value</a> -->

                                    </th>
                                    <!-- <th class="p-0 min-w-50px text-end pb-2"></th> -->
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                <!-- <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6 py-3 px-4 badge-light-dark">Inherent Value</a>

                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-success mb-1 fs-6 py-3 px-4 badge-light-dark">Residual Value</a>

                                    </td>
                                </tr> -->
                                <tr>
                                    <!-- <td> -->
                                        <!-- ICON -->
                                    <!-- </td> -->
                                    <td>
                                        <!-- PLACE HOLDER --> 
                                    </td>
                                    <td style="align-items: center; ">
                                        <OctagonInherentValue :mode1="selectedItem"></OctagonInherentValue>
                                    </td>
                                    <td style="align-items: center; ">
                                        <OctagonResidualValue :mode1="selectedItem"></OctagonResidualValue>

                                    </td>
                                </tr>
                                <tr>
                                    <!-- <td> -->
                                        <!-- <div class="symbol symbol-45px me-2"> -->
                                            <!-- <span class="symbol-label"> -->
                                                <!-- <i class="fa fa-gender-o text-primary fs-2 me-2"></i> -->
                                                <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                            <!-- </span> -->
                                        <!-- </div> -->
                                    <!-- </td> -->

                                    <td class="">
                                        <p class="badge text-gray-800 text-hover-success mb-1 py-3 px-4 badge-light-dark">Key Control Indicators</p>

                                        <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4  py-3 px-4  badge-light-dark">Key Control Indicators</a> -->
                                        <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                    </td>

                                    <td  class="text-center">
                                        <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            <a href="#" class="text-gray-700  text-hover-success mb-1">Total Questions</a>
                                        <span class="text-muted fw-bolder d-block">{{selectedItem.TotalQuestions}}</span>
                                    </td>
                                    <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                    <td  class="text-center">
                                        <a href="#" class="text-gray-700  text-hover-success mb-1">Non-Compliance</a>
                                        <span class="text-muted fw-bolder d-block">7</span>
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
                                    <!-- <td> -->
                                        <!-- <div class="symbol symbol-45px me-2"> -->
                                            <!-- <span class="symbol-label"> -->
                                                <!-- <i class="fa fa-gender-o text-primary fs-2 me-2"></i> -->
                                                <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                            <!-- </span> -->
                                        <!-- </div> -->
                                    <!-- </td> -->

                                    <td>
                                        <p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Key Risk Indicators</p>

                                        <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Key Risk Indicators</a> -->
                                        <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                    </td>

                                    <td  class="text-center">
                                        <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                        <a href="#" class="text-gray-700  text-hover-success mb-1 ">Total KRIs</a>
                                        <span class="text-muted fw-bolder d-block">{{selectedItem.TotalKRIs}}</span>
                                    </td>
                                    <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                    <td  class="text-center" style="background-color: red;"><!-- Red -->
                                        <a href="#" class="text text-dark  text-hover-success mb-1 ">Red KRIs</a>
                                        <span class="text text-dark fw-bolder d-block">{{selectedItem.RedKRIs}}</span>
                                    </td>
                                    <!-- <td class="text-end">
                                        <span class="badge badge-light-success">Approved</span>
                                    </td> -->

                                </tr>

                                <tr>
                                    <!-- <td> -->
                                        <!-- <div class="symbol symbol-45px me-2"> -->
                                            <!-- <span class="symbol-label"> -->
                                                <!-- <i class="fa fa-gender-o text-primary fs-2 me-2"></i> -->
                                                <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                            <!-- </span> -->
                                        <!-- </div> -->
                                    <!-- </td> -->

                                    <td>
                                        <p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Treatment Plans</p>

                                        <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                        <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                    </td>
                                    
                                    <!-- f2ecda -->
                                    <td  class="text-center" style="background-color: red; "><!-- Yellow -->
                                        <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                        <a href="#" class="text text-dark text-hover-success mb-1 ">Non-Started Overdue</a>
                                        <span class="text text-dark fw-bolder d-block">{{selectedItem.NotStartedOverdue}}</span>
                                    </td>
                                    <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                    <td  class="text-center" style="background-color: #f7a600; ">
                                        <a href="#" class="text text-dark  text-hover-success mb-1 ">WIP-Overdue</a>
                                        <span class="text text-dark fw-bolder d-block">45</span>
                                    </td>
                                    

                                </tr>

                                <tr >
                                    <!-- <td> -->
                                        <!-- <div class="symbol symbol-45px me-2"> -->
                                            <!-- <span class="symbol-label"> -->
                                                <!-- <i class="fa fa-gender-o text-primary fs-2 me-2"></i> -->
                                                <!-- <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" /> -->
                                            <!-- </span> -->
                                        <!-- </div> -->
                                    <!-- </td> -->
                                    <!-- <td class="text-start text-gray-800 text-hover-success">
                                        <span class="badge py-3 px-4 fs-7 badge-light-success">{{$sale->customer_name}}</span>      
                                    </td> -->
                                    <td>
                                        <h5 class="badge fw-bold text-gray-800 text-hover-success mb-1  py-3 px-4  badge-light-dark">Incidents Reported</h5>

                                        <!-- <a href="#" class="badge text-dark fw-bold text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Incidents Reported</a> -->
                                        <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                    </td>

                                    <td>
                                        <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                    <!-- <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Total Questions</a>
                                        <span class="text-muted fw-bold d-block">0</span> -->
                                    </td>
                                    <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                    <td  class="text-center" style="background-color: #cdd0ff;">
                                    <!-- <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">Non-Compliance</a> -->
                                        <span class="text-muted fw-bold d-block">7</span>
                                    </td>
                                    
                                </tr>

                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <!--end::Table-->

                <!-- </div> -->
                <!--end::Tap pane-->


            </div>
            <!--end::Body-->

            <!--begin::Separator-->
            <div class="separator separator-dashed"></div>
            <!--end::Separator-->

            </div>
            <!--end::Section-->

        </div>
        <!--end::Accordion-->

    </div>
    <!--end::Wrapper-->

</template>

<script>


import OctagonInherentValue from './items/OctagonInherentValue.vue';
import OctagonResidualValue from './items/OctagonResidualValue.vue';

import OctagonInherentValue2 from './items/OctagonInherentValue2.vue';
import OctagonResidualValue2 from './items/OctagonResidualValue2.vue';


export default {

    name:'ErmContentview',
    props:['selectedItems', 'InherentValue', 'ResidualValue' ],
    // data() {
    //     return {
    //         // selectedItem: {},
    //     }
    // },
   
    components:{
        OctagonInherentValue,
        OctagonResidualValue,
        OctagonInherentValue2,
        OctagonResidualValue2,
    },

    // methods:{
    //     selectData() {
    //         this.selectedItem = selectedData
    //     }
    // },

    // created() {
    //     this.selectData()
    // }
}
</script>