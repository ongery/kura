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
                  <!--begin::Item-->
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
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
                        NRC
                      </a>

                    </div>

                  </li>
                  <!--end::Item-->


                  <!--begin::Item-->
                  <li class="breadcrumb-item text-muted">
  
                    <div class="flex items-center">
                    -
                      <a  class="text-gray-500 mt-1 fw-semibold fs-6 text-muted ">
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
           
            <!-- v-if="title != 'All Incindents'" -->

             <!--begin::Primary button-->
              <a href="#" @click.prevent="GoBack"
              class="btn btn-sm fw-bold btn-info btn-active-color-dark" >
              Back        
            </a>
            <!--end::Secondary button-->

          </div>
          <!--end::Actions-->
  
      </div>
      <!--end::Toolbar container-->
  
    </div>
    <!--end::Toolbar-->                     


    <!-- start:Content -->
    <form @submit.prevent="updateAnalzeRisk()"> 

      <div class="card card-body">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-xl-row">

          <!--begin::Sidebar-->
          <div class="m-0">

            <!--begin::Sidebar-->
              <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 p-5 bg-lighten" style="width: 280px;">
                  
                <!--begin::Tasks-->
                  <div class="mx-3">

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
                              <a href="#" @click.prevent="showPurpose" class="text-gray-800 text-hover-success fs-6 fw-bold">Requirement</a>
                              <!-- <span class="text-muted fw-bold">ERM Report</span> -->
                            </div>
                            <!--end::Text-->

                        

                      </div>
                      <!--end::Item-->




                        <!--begin::Item-->
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
                            <a href="#" @click.prevent="showScope" class="text-gray-800 text-hover-success fs-6 fw-bold">Non Conformity/Evidence</a>
                            <!-- <span class="text-muted fw-bold">ERM Report</span> -->
                          </div>
                          <!--end::Text-->

                      

                        </div>
                      <!--end::Item-->


                        <!--begin::Item-->
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
                          <a href="#" @click.prevent="showAuditAction" class="text-gray-800 text-hover-success fs-6 fw-bold">Audit Action</a>
                          <!-- <span class="text-muted fw-bold">ERM Report</span> -->
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
          <div class="flex-lg-row-fluid  mb-10" style="margin-left: 30px; margin-bottom: 10px;">
          
            <div class="col-md-12">

              <!-- showpurpose  -->
              <div v-if="showpurpose">
                <!-- <div> -->

                  <!-- start:card-header -->
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Requirement</h3>
                  </div>
                  <!-- end:card-header -->

                  <div class="card card-body p-7">
                    <textarea
                    rows="5"
                    v-model="form.Requirement"
                    placeholder="Requirement"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('Requirement') }"
                  ></textarea>
                  </div>
              </div>
              <!-- </div> -->

              <!-- start:showscope -->
              <div v-if="showscope">

                <!-- start:container -->
                <div>

                  <!-- start:card-header -->
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Non conformity/evidence</h3>
                  </div>
                  <!-- end:card-header -->

                  <!-- start:card-body -->
                  <div class="card card-body  p-7">

                    <textarea
                      rows="5"
                      v-model="form.Purpose"
                      placeholder="Non conformity/evidence"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>

                    <!-- <div class="form-group col-md-12"> -->

                      <!--end::Label-->
                        <label class="badge badge-btn badge-light fs-5 fw-semibold mb-2 p-7 mt-7 mb-5 " for>Select Category</label>
                      <!--end::Label-->
                
                      <!--begin::Input group-->
                      <div class="row pt-3" style="margin-left: 7px; margin-bottom: 7px;">
                    
                        <!--begin::Col-->
                        <div class="col-md-6">

                          <div class="row">
                            <input
                              class="form-check-input form-control p-3 col-md-2"
                              type="checkbox"
                              v-model="cMinor"
                              id="inlineCheckbox1"
                              value="option1"
                            />

                            <label class="form-check-label col-md-4" for="inlineCheckbox1">Minor</label>

                          </div>

                        </div>
                        <!--end::Col-->

                        <!--begin::Col (3 Flower)-->
                        <div class="col-md-6">

                          <div class="row">
                              <input
                                class="form-check-input form-control p-3 col-md-2"
                                type="checkbox"
                                v-model="cMajor"
                                id="inlineCheckbox2"
                                value="option2"
                              />

                              <label class="form-check-label  col-md-4" for="inlineCheckbox2">Major</label>

                          </div>

                        </div>
                        <!--end::Col-->

                      </div>
                      <!--end::Input group-->


                      <!-- <div class="form-check form-check-inline">
                        <input
                          class="form-check-input form-control"
                          type="checkbox"
                          v-model="cMajor"
                          id="inlineCheckbox2"
                          value="option2"
                        />
                        <label
                          class="form-check-label"
                          for="inlineCheckbox2"
                        >Major</label>
                      </div> -->


                    <!-- </div> -->


                      <!--end::Label-->
                      <label class="badge badge-btn badge-light fs-5 fw-semibold mb-2 col-md-10 p-7 mt-7 mb-5" for>Attach Evidence</label>
                      <!--end::Label-->

                        <!--begin::Input group-->
                        <div class="row mb-5">
                    
                        <!--begin::Col-->
                        <div class="col-md-8 fv-row">


                          <input
                            class="form-control"
                            type="file"
                            name="records"
                            id="records"
                            required="required"
                          />

                        </div>
                        <!--end::Col-->

                      </div>
                      <!--end::Input group-->


                    <!-- <div class="form-group col-md-12"> -->
                      <!-- <label>Attach Evidence</label> -->
                      <!-- <input
                        class="form-control"
                        type="file"
                        name="records"
                        id="records"
                        required="required"
                      /> -->
                    <!-- </div> -->



                  </div>
                  <!-- end:card-body -->



                </div>
                <!-- end:container -->

                
              </div>
              <!-- end:showscope -->

              <!-- start:showreferences -->
              <div v-if="showreferences">

                <!-- <div> -->

                  <!-- start:card-header -->
                  <div class="card-header mb-3">
                    <h3  class="text-gray-800 text-hover-success fw-bold" style="font-size: 20px; margin-top: 21px;">Audit Actions</h3>
                  </div>
                  <!-- end:card-header -->


                  <!-- <div class="card-header">
                    <h3 class="card-title">Audit Actions</h3>
                  </div> -->
                  <!-- /.card-header -->


                  <!-- <div class="card card-body  p-0"> -->
                  <div class="card card-body p-7">

                  
                    <!--end::Label-->
                      <label class="badge badge-btn badge-light  text-dark fs-5 fw-semibold mb-2 p-7 mb-5 " for>Root Causes</label>
                    <!--end::Label-->

                    <textarea
                      rows="4"
                      v-model="form.Scope"
                      placeholder="Root Cause"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>

                    <!--end::Label-->
                      <label class="badge badge-btn badge-light text-dark fs-5 fw-semibold mb-2 p-7 mt-7 mb-5 " for>Correction</label>
                    <!--end::Label-->

                    <textarea
                      rows="4"
                      v-model="form.Scope"
                      placeholder="Correction"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('message') }"
                    ></textarea>


                    <!--begin::Input group-->
                    <div class="row mb-5 mt-9" style="margin-left: 6px;">

                      <!--begin::Col-->
                      <div class="col-md-10 fv-row">
                          <!--begin::Label-->
                          <label class="fs-5 fw-semibold mb-2">Follow up (to be completed by the auditor):</label>
                          <!--end::Label-->
                        
                          <!--begin::Input-->
                          <div class="form-check p-5" style="margin-left: 12px;">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckIndeterminate"
                            >
                            <label
                              class="form-check-label"
                              for="flexCheckIndeterminate"
                            >
                              Action fully completed
                            </label>
                          </div>
    
    
                          <div class="form-check p-5" style="margin-left: 12px;">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckIndeterminate"
                            >
                            <label
                              class="form-check-label"
                              for="flexCheckIndeterminate"
                            >
                              Action partially completed
                            </label>
                          </div>
    
    
                          <div class="form-check p-5" style="margin-left: 12px;">
                            <input
                              class="form-check-input"
                              type="checkbox"
                              value=""
                              id="flexCheckIndeterminate"
                            >
                            <label
                              class="form-check-label"
                              for="flexCheckIndeterminate"
                            >
                              No action taken
                            </label>
                          </div>
    
                          <!--end::Input-->
                      </div>
                      <!--end::Col-->

                    </div>
                    <!--end::Input group-->

                
                    <!--begin::Input group-->
                    <div class="row mb-5 mt-3" style="margin-left: 6px;">

                      <!--begin::Col-->
                      <div class="col-md-10 fv-row">
                          <!--begin::Label-->
                          <label class="fs-5 fw-semibold mb-2">Effectiveness of corrective action ( to be completed during the next audit by auditor):</label>
                          <!--end::Label-->
                        
                          <!--begin::Input-->
                          <label class="pt-5"> Was the corrective action taken effective? </label>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input form-control"
                              type="checkbox"
                              id="inlineCheckbox1"
                              value="option1"
                            />
                            <label
                              class="form-check-label"
                              for="inlineCheckbox1"
                            >Yes</label>
                          </div>
    
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input form-control"
                              type="checkbox"
                              id="inlineCheckbox2"
                              value="option2"
                            />
                            <label
                              class="form-check-label"
                              for="inlineCheckbox2"
                            >No</label>
                          </div>
                          <!--end::Input-->
                      </div>
                      <!--end::Col-->

                    </div>


                  </div>

                    <!-- <div class="form-group col-md-12">
                      <label for>Root Causes</label>
                     <textarea
                            rows="3"
                            v-model="form.Scope"
                            placeholder="Root Cause"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('message') }"
                        >
                        </textarea>
                    </div> -->

                    <!-- <div class="form-group col-md-12">
                      <label for>Correction</label>
                      <textarea
                        rows="3"
                        v-model="form.Scope"
                        placeholder="Correction"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('message') }"
                      ></textarea>
                    </div> -->

                    <!-- <div class="form-group col-md-12">
                      <label for>Follow up (to be completed by the auditor):</label>

                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="flexCheckIndeterminate"
                        >
                        <label
                          class="form-check-label"
                          for="flexCheckIndeterminate"
                        >
                          Action fully completed
                        </label>
                      </div>


                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="flexCheckIndeterminate"
                        >
                        <label
                          class="form-check-label"
                          for="flexCheckIndeterminate"
                        >
                          Action partially completed
                        </label>
                      </div>


                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="flexCheckIndeterminate"
                        >
                        <label
                          class="form-check-label"
                          for="flexCheckIndeterminate"
                        >
                          No action taken
                        </label>
                      </div>

                    </div> -->

                    <!-- <div class="form-group col-md-12">

                      <label for>Effectiveness of corrective action ( to be completed during the next audit by auditor):</label> </br>

                      <label> Was the corrective action taken effective? </label>
                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input form-control"
                          type="checkbox"
                          id="inlineCheckbox1"
                          value="option1"
                        />
                        <label
                          class="form-check-label"
                          for="inlineCheckbox1"
                        >Yes</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input
                          class="form-check-input form-control"
                          type="checkbox"
                          id="inlineCheckbox2"
                          value="option2"
                        />
                        <label
                          class="form-check-label"
                          for="inlineCheckbox2"
                        >No</label>
                      </div>

                    </div> -->

                  <!-- </div> -->


                <!-- </div> -->
                <!-- /.card -->

              </div>
              <!-- end:showreferences -->

            </div>

            <div class="modal-footer">
              <button
                type="submit"
                class="btn btn-primary"
              >Update</button>
            </div>

          </div>
          <!--end::Content-->

        </div>
        <!--end::Layout-->

      </div>

    </form>
    <!-- end:Content -->




    <!-- <div class="card-header">
      <h3 class="card-title">
        <b>{{ this.RName }}</b>
      </h3>
      <div class="card-tools">
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


    <!-- <div class="card card-body table-responsive p-0">
      <div>
        <form @submit.prevent="updateAnalzeRisk()"> -->

          <!-- <div class="modal-body"> -->

            <!-- <div class="form-row"> -->


              <!-- <div class="sidebar col-md-2 border">
                <nav>

                  <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="true"
                  >
                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showPurpose"
                      >Requirement</a>

                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showScope"
                      >Non Conformity/Evidence</a>

                    </li>

                    <li class="nav-item nav-link">
                      <a
                        href="#"
                        @click="showAuditAction"
                      >Audit Action</a>

                    </li>

                  </ul>
                </nav>
              </div> -->

              <!-- <div class=" col-md-10"> -->

                <!-- <div
                  class="col-md-12"
                  v-if="showpurpose"
                >
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Requirement</h3>

                    </div>

                    <div class="card-body  p-0">
                      <textarea
                        rows="5"
                        v-model="form.Requirement"
                        placeholder="Requirement"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('Requirement') }"
                      ></textarea>
                    </div>
                  </div>

                </div> -->



                <!-- <div
                  class="col-md-12"
                  v-if="showscope"
                >

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Non conformity/evidence</h3>

                    </div>

                    <div class="card-body  p-0">
                      <textarea
                        rows="5"
                        v-model="form.Purpose"
                        placeholder="Non conformity/evidence"
                        class="form-control"
                        :class="{ 'is-invalid': form.errors.has('message') }"
                      ></textarea>

                      <div class="form-group col-md-12">

                        <label for>Category</label> </br>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input form-control"
                            type="checkbox"
                            v-model="cMinor"
                            id="inlineCheckbox1"
                            value="option1"
                          />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox1"
                          >Minor</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input form-control"
                            type="checkbox"
                            v-model="cMajor"
                            id="inlineCheckbox2"
                            value="option2"
                          />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox2"
                          >Major</label>
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <label>Attach Evidence</label>
                        <input
                          class="form-control"
                          type="file"
                          name="records"
                          id="records"
                          required="required"
                        />
                      </div>
                    </div>
                  </div>

                </div> -->




                <!-- <div
                  class="col-md-12"
                  v-if="showreferences"
                >
                  <div class="card">

                    <div class="card-header">
                      <h3 class="card-title">Audit Actions</h3>

                    </div>


                    <div class="card-body  p-0">

                      <div class="form-group col-md-12">
                        <label for>Root Causes</label>
                        <textarea
                          rows="3"
                          v-model="form.Scope"
                          placeholder="Root Cause"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('message') }"
                        ></textarea>
                      </div>

                      <div class="form-group col-md-12">
                        <label for>Correction</label>
                        <textarea
                          rows="3"
                          v-model="form.Scope"
                          placeholder="Correction"
                          class="form-control"
                          :class="{ 'is-invalid': form.errors.has('message') }"
                        ></textarea>
                      </div>

                      <div class="form-group col-md-12">
                        <label for>Follow up (to be completed by the auditor):</label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckIndeterminate"
                          >
                          <label
                            class="form-check-label"
                            for="flexCheckIndeterminate"
                          >
                            Action fully completed
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckIndeterminate"
                          >
                          <label
                            class="form-check-label"
                            for="flexCheckIndeterminate"
                          >
                            Action partially completed
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckIndeterminate"
                          >
                          <label
                            class="form-check-label"
                            for="flexCheckIndeterminate"
                          >
                            No action taken
                          </label>
                        </div>
                      </div>

                      <div class="form-group col-md-12">

                        <label for>Effectiveness of corrective action ( to be completed during the next audit by auditor):</label> </br>

                        <label> Was the corrective action taken effective? </label>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input form-control"
                            type="checkbox"
                            id="inlineCheckbox1"
                            value="option1"
                          />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox1"
                          >Yes</label>
                        </div>

                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input form-control"
                            type="checkbox"
                            id="inlineCheckbox2"
                            value="option2"
                          />
                          <label
                            class="form-check-label"
                            for="inlineCheckbox2"
                          >No</label>
                        </div>
                      </div>

                    </div>


                  </div>


                </div> -->



              <!-- </div> -->

            <!-- </div> -->


          <!-- </div> -->

<!-- 
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-success"
            >Update</button>
          </div>



        </form> -->

<!-- 
      </div>
    </div> -->


  </div>
</template>
<script>
import ListItem from './ListItems.vue'

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
      cMinor: false,
      cMajor: false,
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
        fullImagePath: ''
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
    },
    cMinor: {
      handler: 'cMinorChange',
      immediate: true
    },
    cMajor: {
      handler: 'cMajorChange',
      immediate: true
    }
  },
  methods: {
    cMinorChange(val) {
      if (val == true) {
        this.cMajor = false
      }
    },
    cMajorChange(val) {
      if (val == true) {
        this.cMinor = false
      }
    },
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
    },
    showScope() {
      this.showpurpose = false
      this.showscope = true
      this.showreferences = false
    },
    showAuditAction() {
      this.showpurpose = false
      this.showscope = false
      this.showreferences = true
    },
    loadRisk(val) {
      axios.get('/api/ncr/' + val).then((res) => {
        this.form.fill(res.data.ResponseData)
        this.RName = res.data.ResponseData.AreaUnderReview
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
    }
  },
  created() {
    this.showPurpose()
  }
}
</script>
