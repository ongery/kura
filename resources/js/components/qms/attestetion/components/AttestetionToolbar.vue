<template>

    <!--begin::Toolbar-->
    <div class="app-toolbar py-3">
  
      <!--begin::Toolbar container-->
      <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                  
          <!--begin::Page title-->
          <div class="mb-2 mt-4 page-title d-flex flex-column justify-content-start flex-wrap">       
            
              <!--begin::Title-->
              <h1 class="page-heading d-flex text-dark text-white-400 fw-bold fs-3 flex-column">
              {{ title }} 
  
                
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
                        ISO KMI
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                        <!--begin::Item-->
                        <!-- <li class="breadcrumb-item text-muted">
        
                          <div class="flex items-center">
                          -
                            <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                              Procedures
                            </a>

                          </div>

                        </li> -->
                        <!--end::Item-->


                         <!--begin::Item-->
                         <li class="breadcrumb-item text-muted">
  
                          <div class="flex items-center">
                            -
                              <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ml-4 text-hover-success">
                                {{ title }}
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
           
            <!-- v-if="title != 'All Incindents'" -->

            <AllKRIsButton v-if="title === 'All KRIs'"></AllKRIsButton>
            <NewKRIsButton v-if="title === 'All Attestation'"></NewKRIsButton>
            <BackButton v-if="title != 'All KRIs'"></BackButton>
           
          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     
  
  </template>
  
  
  <script>

  import BackButton from './BackButton.vue';
  import AllKRIsButton from './AllKRIsButton';
  import NewKRIsButton from './NewKRIsButton';
  
  export default {
      name:'AttestetionToolbar',
      props:['title', ],
      components:{BackButton,AllKRIsButton, NewKRIsButton},
      
  }
  </script>