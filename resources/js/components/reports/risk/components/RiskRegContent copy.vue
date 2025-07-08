
<template>
    <div style="margin-left: -20px;">
      <div class="card m-5"  v-for="(mode1, outerIndex) in reports" :key="mode1.id">
  
        <!--begin::Body-->
        <div class="card-body p-lg-15">
  
          <!--begin::Layout-->
          <div class="d-flex flex-column flex-xl-row">
  
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-xl-15 mb-10 mb-xl-0">
  
              <!--begin::Head-->
              <div class="d-flex flex-stack flex-wrap mb-lg-10">

                <h1  class="text-gray-800 text-hover-success fw-bold" style="font-size: 16px;">{{mode1.Name}}</h1>

              </div>
              <!--end::Head-->
  
              <!--begin::Wrapper-->
              <div class="mb-0">
  
                <!--begin::Accordion-->
                <div v-for="(mode , innerIndex) in mode1.riskRegisterData" :key="mode.id">
  
                  <!--begin::Section-->
                  <div class="m-0 pl-5 pt-2">


                    <!-- v-if="mode1.InherentValue >= 15" -->
                    <!-- v-else-if="mode1.InherentValue > 4" -->

                    <!-- begin::Heading -->
                    <div v-if="mode.Count!=''" class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" :data-bs-target="'#accordion_' + outerIndex + '_' + innerIndex">
                        
                        <!--begin::Icon-->
                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
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
						<h5 class="custom-list-title fw-bold text-gray-700 mb-1">{{mode.RiskName}}</h5>

                      <!-- <h4 class="text-gray-700 fw-bold fs-3 cursor-pointer mb-0">{{mode1.RiskName}}</h4> -->
                    </div>
                    <!-- end::Heading -->
  


                    <!--begin::Body-->
                    <div  v-if="mode.Count!=''" :id="'accordion_' + outerIndex + '_' + innerIndex" class="collapse fs-6 ms-1">
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
												<a href="#" class="text-gray-700  text-hover-success"  style="font-size: 15px;">I.R</a>
                                            </th>

                                            <th class="p-0 min-w-130px text-center">
												<a href="#" class="text-gray-700  text-hover-success" style="font-size: 15px;">R.R</a>
                                            </th>
                                            <!-- <th class="p-0 min-w-50px text-end pb-2"></th> -->
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    
                                        <tr>
                                            <!-- <td> -->
                                                <!-- ICON -->
                                            <!-- </td> -->
                                            <td>
                                                <!-- PLACE HOLDER -->
                                            </td>
                                            <td style="align-items: center; ">
                                                <OctagonInherentValue :mode1="mode"></OctagonInherentValue>
                                            </td>
                                            <td style="align-items: center; ">
                                                <OctagonResidualValue :mode1="mode"></OctagonResidualValue>

                                            </td>
                                        </tr>
                                        <tr>
                                          
                                            <td class="">
												<p class="badge text-gray-800 text-hover-success mb-1 py-3 px-4 badge-light-dark">Risk Source</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4  py-3 px-4  badge-light-dark">Key Control Indicators</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center">
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                           		 <a href="#" class="text-gray-700  text-hover-success mb-1">{{mode.RiskSource}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.TotalQuestions}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center"> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1">Non-Compliance</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">7</span> -->
                                            <!-- </td> -->


                                            <!-- <td class="text-end">
                                                <span class="badge badge-light-success">Approved</span>
                                            </td> -->

                                            <!-- <td class="text-end"> -->
                                                <!-- <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Risk Impacts</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Key Risk Indicators</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center">
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700  text-hover-success mb-1 ">{{mode.RiskImpact}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.TotalKRIs}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #ffcdcd;">Red -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">Red KRIs</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.RedKRIs}}</span> -->
                                            <!-- </td> -->


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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Current Controls</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.ControlItems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Key Control Indicators</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.KCIitems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
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

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.KRIitems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
                                            <!-- </td> -->
                                            

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
												<h5 class="badge fw-bold text-gray-800 text-hover-success mb-1  py-3 px-4  badge-light-dark">Treatment Plans</h5>

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
                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">{{mode.TreatmentsPlans}}</a>
                                                <!-- <span class="text-muted fw-bold d-block">7</span> -->
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
                    <div  v-if="mode.Count!=''" class="separator separator-dashed"></div>
                    <!--end::Separator-->

                    
                    <!--begin::Body-->
                    <div >

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
												<a href="#" class="text-gray-700  text-hover-success"  style="font-size: 15px;">I.R</a>
                                            </th>

                                            <th class="p-0 min-w-130px text-center">
												<a href="#" class="text-gray-700  text-hover-success" style="font-size: 15px;">R.R</a>
                                            </th>
                                            <!-- <th class="p-0 min-w-50px text-end pb-2"></th> -->
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    
                                        <tr>
                                            <!-- <td> -->
                                                <!-- ICON -->
                                            <!-- </td> -->
                                            <td>
                                                <!-- PLACE HOLDER -->
                                            </td>
                                            <td style="align-items: center; ">
                                                <OctagonInherentValue :mode1="mode"></OctagonInherentValue>
                                            </td>
                                            <td style="align-items: center; ">
                                                <OctagonResidualValue :mode1="mode"></OctagonResidualValue>

                                            </td>
                                        </tr>
                                        <tr>
                                          
                                            <td class="">
												<p class="badge text-gray-800 text-hover-success mb-1 py-3 px-4 badge-light-dark">Risk Source</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4  py-3 px-4  badge-light-dark">Key Control Indicators</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center">
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                           		 <a href="#" class="text-gray-700  text-hover-success mb-1">{{mode.RiskSource}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.TotalQuestions}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center"> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1">Non-Compliance</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">7</span> -->
                                            <!-- </td> -->


                                            <!-- <td class="text-end">
                                                <span class="badge badge-light-success">Approved</span>
                                            </td> -->

                                            <!-- <td class="text-end"> -->
                                                <!-- <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Risk Impacts</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Key Risk Indicators</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center">
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700  text-hover-success mb-1 ">{{mode.RiskImpact}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.TotalKRIs}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #ffcdcd;">Red -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">Red KRIs</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.RedKRIs}}</span> -->
                                            <!-- </td> -->


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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Current Controls</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.ControlItems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
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
												<p class="badge fw-bold text-gray-800 text-hover-success mb-1 py-3 px-4  badge-light-dark">Key Control Indicators</p>

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.KCIitems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
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

                                                <!-- <a href="#" class="badge text-dark text-hover-success mb-1 fs-4 py-3 px-4  badge-light-dark">Treatment Plans</a> -->
                                                <!-- <span class="text-muted fw-bold d-block">Movie Creator</span> -->
                                            </td>

                                            <td  class="text-center" style="background-color: #f2ecda; "><!-- Yellow -->
                                                <!-- fw-bolder text-gray-700 fs-5 text-end -->
                                            	<a href="#" class="text-gray-700 text-hover-success mb-1 ">{{mode.KRIitems}}</a>
                                                <!-- <span class="text-muted fw-bolder d-block">{{mode1.NotStartedOverdue}}</span> -->
                                            </td>
                                            <!-- <td class="text-end text-muted fw-bold">React, HTML</td> -->

                                            <!-- <td  class="text-center" style="background-color: #cdd0ff; "> -->
                                            	<!-- <a href="#" class="text-gray-700  text-hover-success mb-1 ">WIP-Overdue</a> -->
                                                <!-- <span class="text-muted fw-bolder d-block">45</span> -->
                                            <!-- </td> -->
                                            

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
												<h5 class="badge fw-bold text-gray-800 text-hover-success mb-1  py-3 px-4  badge-light-dark">Treatment Plans</h5>

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
                                            <a href="#" class="text-gray-700 fw-bolder text-hover-success mb-1 fs-6">{{mode.TreatmentsPlans}}</a>
                                                <!-- <span class="text-muted fw-bold d-block">7</span> -->
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
  
            </div>
            <!--end::Content-->
  
          </div>
          <!--end::Layout-->
          
        </div>
        <!--end::Body-->
  
      </div>
      <!-- End: card -->
    </div>

  </template>
  

<script>
    import OctagonInherentValue from './items/OctagonInherentValue.vue';
    import OctagonResidualValue from './items/OctagonResidualValue.vue';


    export default {
        name:'RiskRegContent',
        props:['reports', ],
        components:{OctagonInherentValue, OctagonResidualValue}

    }
</script>