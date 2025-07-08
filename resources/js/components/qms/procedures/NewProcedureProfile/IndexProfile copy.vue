<template>
  <div class="row mt-2">

    

     <!--begin::Toolbar-->
     <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
              {{ this.RName }} 
  
                
              </h1>
              <!--end::Title-->
  
              <!--begin::Breadcrumb-->
              <ol style="margin-left: -6px;" role="list" class="flex items-center space-x-4 breadcrumb  breadcrumb-separatorless text-gray-400 fw-semibold pt-1">
                  <li>
                  <div>
                      <a href="#" class="text-gray-400 hover:text-gray-500">
                      <!-- Heroicon name: solid/home -->
                      <svg class="flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                      </svg>
                      <span class="sr-only">Dashboard</span>
                      </a>
                  </div>
                  </li>
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        New Procedure
                      </a>

                    </div>
  
                  </li>
                  <!--end::Item-->
                  
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                          Procedures Process
                        </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">

                    <div class="flex items-center">
                      -
                        <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                          {{ this.RName }}
                        </a>

                    </div>

                </li>
                <!--end::Item-->
                            
              </ol>
              <!--end::Breadcrumb-->
  
          </div>
          <!--end::Page title-->
  
              
          <!--begin::Actions-->
          <div class="d-flex align-items-center gap-2 gap-lg-3">

            <!--begin::Primary button-->
              <a href="#" @click.prevent="printProcedure"
              class="btn btn-sm fw-bold btn-danger btn-active-color-dark" >
                <i class="fa fa-print"></i>
                Print        
              </a>
            <!--end::Primary button-->

            <!--begin::Primary button-->
              <a href="#" @click.prevent="GoBack"
              class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
                close        
              </a>
            <!--end::Primary button-->

           
          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  
<!-- 
    <div class="card-header">
      <h3 class="card-title">
        <b>{{ this.RName }}</b>
      </h3>
      <div class="card-tools">
        <button
          class="btn btn-danger btn-sm"
          @click="printProcedure"
        >
          <i class="fa fa-print"></i>
          Print
        </button>
        <button
          class="btn btn-info btn-sm"
          @click="GoBack"
        >
          <i class="fas fa-angle-double-left"></i>
          Close
        </button>
      </div>
    </div> -->
    <!-- /.card-header -->




    <form @submit.prevent="updateAnalzeRisk()">

      <div class="card card-body">
    
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">

          <!--begin::Sidebar-->
          <div class="m-0">

            <!--begin::Sidebar-->
              <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-5 bg-lighten" style="width: 250px;">
                  
                    <!--begin::Tasks-->
                      <div class="mx-3">

                        <!--begin::Header-->
                        <!-- <h3 class="fw-bolder text-dark mb-10 mx-0">Main Risk</h3> -->
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="mb-12">

                          <!--begin::Item-->
                          <!-- v-for="(mode, index) in reports" :key="mode.id"  @click="selectReport(mode,index)"  -->
                          <div class="d-flex align-items-center mb-7 mt-5">

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

                                <!--begin::Text-->
                                <div class="d-flex flex-column">
                                  <a href="#" @click.prevent="showPurpose" class="text-gray-800 text-hover-success fs-6 fw-bold">Purpose</a>
                                  <!-- <span class="text-muted fw-bold">ERM Report</span> -->
                                </div>
                                <!--end::Text-->

                            

                          </div>
                          <!--end::Item-->


                          <!--begin::Item-->
                          <div class="d-flex align-items-center mb-7">

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

                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                              <a href="#" @click.prevent="showScope" class="text-gray-800 text-hover-success fs-6 fw-bold">Scope</a>
                            </div>
                            <!--end::Text-->

                          </div>
                          <!--end::Item-->


                          <!--begin::Item-->
                          <div class="d-flex align-items-center mb-7">

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

                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                              <a href="#" @click.prevent="showaReferences" class="text-gray-800 text-hover-success fs-6 fw-bold">References</a>
                            </div>
                            <!--end::Text-->

                          </div>
                          <!--end::Item-->



                          <!--begin::Item-->
                          <div class="d-flex align-items-center mb-7">

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

                            <!--begin::Text-->
                            <div class="d-flex flex-column">
                              <a href="#" @click.prevent="showTerminologies" class="text-gray-800 text-hover-success fs-6 fw-bold">Terminologies</a>
                            </div>
                            <!--end::Text-->

                          </div>
                          <!--end::Item-->



                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showPrincipal" class="text-gray-800 text-hover-success fs-6 fw-bold">Responsibility</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->



                            
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showInputs" class="text-gray-800 text-hover-success fs-6 fw-bold">Inputs</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->




                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showMethod" class="text-gray-800 text-hover-success fs-6 fw-bold">Method</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->

                          

                            
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showOutputs" class="text-gray-800 text-hover-success fs-6 fw-bold">Outputs</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->


                            

                            
                            
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showRecords" class="text-gray-800 text-hover-success fs-6 fw-bold">Records</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->


                            
                                                      
                            
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showRisks" class="text-gray-800 text-hover-success fs-6 fw-bold">Risks</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->


                            
                                                      
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-7">

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
    
                              <!--begin::Text-->
                              <div class="d-flex flex-column">
                                <a href="#" @click.prevent="showAppendices" class="text-gray-800 text-hover-success fs-6 fw-bold">Appendices</a>
                              </div>
                              <!--end::Text-->
    
                            </div>
                            <!--end::Item-->


                      </div>
                      <!--end::Body-->
                      
                </div>
                <!--end::Tasks-->


                    
              </div>
            <!--end::Report sidebar-->

          </div>
          <!--end::Sidebar-->


          <!--begin::Content d-flex flex-xl-row class="flex-lg-row-fluid  mb-10"-->
          <div class="flex-lg-row-fluid " style="margin-left: 30px; margin-bottom: 10px;">
             
            <!-- <ErmContentview :selectedItems="selectedData"></ErmContentview> -->
            <!-- class=" " -->
            <div class="col-md-12 m-0 ">
              
              <!-- showpurpose -->
              <div
                v-if="showpurpose"
              >
                <div>
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Purpose</h3>
                </div>
                <!-- /.card-header -->

                
                <div class="card card-body p-7">
                    <textarea
                      rows="10"
                      v-model="form.Purpose"
                      placeholder="Purpose"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>
                </div>


              </div>
              <!-- /.card -->

              </div>

              <!-- showscope -->
              <div
                v-if="showscope"
              >
                <div>
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Scope</h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card card-body p-7">
                    <textarea
                      rows="10"
                      v-model="form.Scope"
                      placeholder="Scope"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>
                  </div>
                </div>
                <!-- /.card -->
              </div>


              
              <!--  showreferences -->
              <div
                v-if="showreferences"
              >

                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />

              </div>




              <!-- showeterminilogies -->
              <div
                v-if="showeterminilogies"
              >
                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />
                <!-- /.card -->
              </div>




              <!-- showprincipal  -->
              <div
                v-if="showprincipal"
              >
                <div>
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Principal Responsibility</h3>
                  </div>

                  <!-- /.card-header -->
                  <div class="card card-body p-7">
                    <textarea
                      rows="10"
                      v-model="form.PrincipalResponsibility"
                      placeholder="Principal Responsibility"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>
                  </div>
                </div>
              </div>




              <!-- showinputs -->
              <div
                v-if="showinputs"
              >
                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />
              </div>





              <!-- showoutputs  -->
              <div
                v-if="showoutputs"
              >
                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />
              </div>




              <!-- showmethod -->
              <div
                v-if="showmethod"
              >
                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />
              </div>




              <!--  showrecords -->
              <div
                v-if="showrecords"
              >
                <ListItem
                  :msg="this.cardTitle"
                  :category_id="this.CategoryID"
                />
              </div>




              <!-- showrisks -->
              <div
                v-if="showrisks"
              >
                <div class="card-header mb-3">
                  <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Risk</h3>
                </div>

                <div class="card card-body p-7">
                  <p> For risks associated with this process, refer to the KURA Risks Register.</p>
                </div>
              </div>




              <!-- showappendices -->
              <div
                v-if="showappendices"
              >
                <div class="card-header mb-3">
                  <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Appendices</h3>
                </div>

                <div class="form-group col-md-12">

                  <div class="card card-body p-7">

                    <!-- Select File -->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col col-md-10 mb-5 fv-row">
                      <label class="fs-6 fw-semibold mb-2" for>Select File</label>
                      <input
                      class="form-control"
                      type="file"
                      name="records"
                      id="records"
                      required="required"
                    />
                    </div>
                    <!--end::Input group-->

                  </div>

                  <!-- <label>Select File</label> -->
                  <!-- <input
                    class="form-control"
                    type="file"
                    name="records"
                    id="records"
                    required="required"
                  /> -->


                </div>



                <div class="form-group col-md-12">
                  <img
                    :src="this.form.fullImagePath"
                    alt="LetterHead"
                    width="100%"
                    height="50%"
                  />
                </div>
              </div>

            </div>

          </div>
          <!--end::Content-->


<!--           
        <div class="modal-footer">
          <button
            type="submit"
            class="btn btn-primary"
          >Update</button>
        </div> -->

        
        </div>
        <!--end::Layout-->




      </div>

  </form>


































    <!-- <div class="card-body table-responsive p-0">
      <div> -->
        <!-- <form @submit.prevent="updateAnalzeRisk()"> -->

          <!-- <div class="modal-body">

            <div class="form-row"> -->

              <!-- <div class="sidebar col-md-2 border">
                <nav>

                  <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="true"
                  > -->
                    <!-- <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showPurpose"
                      >Purpose</a>

                    </li> -->

                    <!-- <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showScope"
                      >Scope</a>

                    </li> -->

                    <!-- <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showaReferences"
                      >References</a>
                    </li> -->

                    <!-- <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showTerminologies"
                      >Terminologies</a>

                    </li>
                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showPrincipal"
                      >Principal Responsibility</a>

                    </li> -->

                    <!-- <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showInputs"
                      >Inputs</a>

                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showMethod"
                      >Method</a>

                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showOutputs"
                      >Outputs</a>
                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showRecords"
                      >Records</a>
                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showRisks"
                      >Risks</a>
                    </li> -->
<!-- 
                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showAppendices"
                      >Appendices</a>
                    </li> -->

                  <!-- </ul>
                </nav>
              </div> -->









            <!-- </div>
          </div> -->





          <!-- <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Update</button>
          </div> -->


        <!-- </form>

      </div>
    </div> -->


  </div>
</template>
<script>
import ListItem from './ListItems.vue'
import jsPDF from 'jspdf'
import 'jspdf-autotable'
import moment from 'moment'
export default {
  data() {
    return {
      riskcauses: {},
      showpurpose: true,
      showscope: false,
      showreferences: false,
      showeterminilogies: false,
      showprincipal: false,
      showinputs: false,
      showmethod: false,
      showoutputs: false,
      showrecords: false,
      showrisks: false,
      showappendices: false,

      cardTitle: '',
      CategoryID: '',
      BName: '',
      RName: '',
      form: new Form({
        id: '',
        Name: '',
        o_i_t_m_id: '',
        ObjType: 12,
        Description: '',
        title: '',
        DocNum: '',
        Subject: '',
        DocDate: '',
        Purpose: '',
        Scope: '',
        PrincipalResponsibility: '',
        fullImagePath: '',
        Custodian: ''
      }),
      state: {
        disabledDates: {
          from: new Date()
        }
      }
    }
  },
  components: {
    ListItem
  },
  watch: {
    '$route.params.id': {
      handler: 'loadRisk',
      immediate: true
    }
  },
  methods: {
    updateAnalzeRisk() {
      this.$Progress.start()
      this.form
        .put('/api/procedure_process/' + this.form.id)
        .then(() => {
          swal.fire('Updated!', 'Information has been updated.', 'success')
          this.$Progress.finish()
          this.UploadImage()
          this.loadRisk(this.form.id)
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },

    UploadImage() {
      let formData = new FormData()
      const fileInput = document.getElementById('records')
      formData.append('records', fileInput.files[0])
      this.$Progress.start()

      axios
        .post('/api/procedure_process_image/' + this.form.id, formData)
        .then((res) => {
          if (res.data.ResultCode == 1200) {
            $('#addNew').modal('hide')
            Fire.$emit('AfterCreate')
            toast.fire({
              type: 'success',
              title: 'Created successfully'
            })
            this.$Progress.finish()
          } else {
            console.log(res.data.ResultDesc)
            toast.fire({
              type: 'error',
              title: res.data.ResultDesc
            })
          }
        })
        .catch((e) => {
          this.$Progress.fail()
          toast.fire({
            type: 'error',
            title: 'Operation not successfull' + '\n' + e.response.data.message
          })
        })
    },
    showPurpose() {
      this.showpurpose = true
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
    },
    showScope() {
      this.showpurpose = false
      this.showscope = true
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
    },
    showaReferences() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = true
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'References'
      this.CategoryID = 3
    },
    showTerminologies() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = true
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'Terminologies'
      this.CategoryID = 4
    },
    showPrincipal() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = true
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
    },
    showInputs() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = true
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'Inputs'
      this.CategoryID = 6
    },
    showMethod() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = true
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'Method'
      this.CategoryID = 7
    },

    showOutputs() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = true
      this.showrecords = false
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'Outputs'
      this.CategoryID = 8
    },
    showRecords() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = true
      this.showrisks = false
      this.showappendices = false
      this.cardTitle = 'Records'
      this.CategoryID = 9
    },
    showRisks() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = true
      this.showappendices = false
      this.cardTitle = 'Risks'
      this.CategoryID = 10
    },

    showAppendices() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = false
      this.showeterminilogies = false
      this.showprincipal = false
      this.showinputs = false
      this.showmethod = false
      this.showoutputs = false
      this.showrecords = false
      this.showrisks = false
      this.showappendices = true
      this.cardTitle = 'Appendices'
      this.CategoryID = 8
    },
    loadRisk(val) {
      axios.get('/api/procedure_process/' + val).then((res) => {
        this.form.fill(res.data.ResponseData)
        this.RName = res.data.ResponseData.title
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
    },
    printProcedure() {
      var doc = new jsPDF({ compress: true })

      const documentDefaultFontSize = 8

      var pageHeight = doc.internal.pageSize.height || doc.internal.pageSize.getHeight()
      var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth()

      //   var img = new Image()
      //   img.src = this.form.logoPath

      //   doc.addImage(img, 'png', 10, 3, 190, 50)

      //Setting Items Title:
      doc.setFontSize(15)
      doc.text('Zebra Top', pageWidth / 2, 10, 'center')
      doc.setFontSize(12)

      const dataHeader = []
      var firstHeader = [
        {
          title: '',
          dataKey: 'count'
        },
        {
          title: '',
          dataKey: 'name'
        }
      ]

      const row1Data = {
        count: 'TITLE: ' + this.form.title,
        name: 'DOC. NO.:  :' + this.form.DocNum
      }
      const row1Data1 = {
        name: 'SUBJECT: ' + this.form.Subject,
        count: 'ISSUE NO : ' + this.form.IssueNo
      }
      const row1Data2 = {
        name: 'CUSTODIAN: ' + this.form.Custodian,
        count: 'DATE : ' + this.form.IssueNo
      }

      dataHeader.push(row1Data)
      dataHeader.push(row1Data1)
      dataHeader.push(row1Data2)

      doc.autoTable(firstHeader, dataHeader, {
        theme: 'grid',
        columnStyles: {
          total_amount: {
            fontSytel: 'bold',
            halign: 'right'
          },
          bodyStyles: {
            textColor: '#000000',
            fontSize: documentDefaultFontSize
          }
        },
        // didParseCell: function (data) {
        //   if (data.row.index === incomes.length - 1) {
        //     data.cell.styles.fillColor = [216, 224, 223]
        //     colSpan: 1
        //   }
        // },
        // tableWidth: 100,
        startY: 15
      })

      //Setting Items Title:
      doc.setFontSize(8)
      doc.text('CONTENTS', 10, doc.autoTable.previous.finalY + 10)
      doc.text('1.	Purpose', 20, doc.autoTable.previous.finalY + 15)
      doc.text('2.	Scope', 20, doc.autoTable.previous.finalY + 18)
      doc.text('3.	References', 20, doc.autoTable.previous.finalY + 21)
      doc.text('4.	Termi5.	Principal Responsibilitynologies', 20, doc.autoTable.previous.finalY + 24)
      doc.text('5.	Principal Responsibility', 20, doc.autoTable.previous.finalY + 27)
      doc.text('6.	Inputs', 20, doc.autoTable.previous.finalY + 30)
      doc.text('7.	Method', 20, doc.autoTable.previous.finalY + 33)
      doc.text('8.	Outputs', 20, doc.autoTable.previous.finalY + 36)
      doc.text('9.	Records', 20, doc.autoTable.previous.finalY + 39)
      doc.text('10.	Risks', 19, doc.autoTable.previous.finalY + 42)
      doc.text('11.	Appendices', 19, doc.autoTable.previous.finalY + 45)

      doc.save(this.RName + '.pdf')
    }
  },
  created() {
    this.showPurpose()
  }
}
</script>
