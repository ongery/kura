<template>
        <!--begin::Col-->
        <div class="col-xl-12">
            <!--begin::Tables Widget 3-->
            <div class="card card-xl-stretch mb-5 mb-xl-12">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1 text-muted">Overview</span>
                        <!-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 members</span> -->
                    </h3>
                   
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                          
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <!-- <th class="w-25px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-9-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-150px">Authors</th>
                                    <th class="min-w-140px">Company</th>
                                    <th class="min-w-120px">Progress</th>
                                    <th class="min-w-100px text-end">Actions</th>
     -->
    
                                  <!-- <th class="min-w-50px">Name</th>
                                  <th class="min-w-80px">Description</th>
                                  <th class="min-w-40px">Date Incidence Reported</th>
                                  <th class="min-w-40px">Date Incidence Occurred</th>
                                  <th class="min-w-50px">Related Risk Event</th>
                                  <th class="min-w-50px">Action</th>
                                  <th class="min-w-50px">Status</th> -->

                                    <th>Reference</th>
                                    <th>Name</th>
                                    <th>Frequency</th>
                                    <th style="text-align:center">Value</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                
                                <tr v-for="mode in this.alldata":key="mode.id">
                                    
                                    <td>
                                            
                                        <div class="d-flex justify-content-start flex-column">
                                            <a style="color: #258c37;" href="#" @click.prevent="attestModal(mode)" class="text-dark fw-bolder text-hover-success fs-6">{{ mode.DocNum }}</a>
                                            <!-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> -->
                                        </div>
    
                                    </td>
    
    
                                    <td>
                                        <a style="color: #258c37;" href="#" @click.prevent="attestModal(mode)" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
    
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.freq }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
    
                                    <td  :class="{
                                        'bg-success': mode.color === 'bg-success',
                                         'bg-danger': mode.color === 'bg-danger',
                                          'bg-warning': mode.color === 'bg-warning',
                                          }"
                                            style="text-align:center">
                                        <a href="#" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.activeKRI1 ?  mode.activeKRI1.Value : "PENDING" }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
                               
                                </tr>
                         
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>
            <!--end::Tables Widget 3-->
        </div>
        <!--end::Col-->
    
  </template>
  
  <script>
  
  
  export default {
    name:'MyRciContent',
    props:['alldata',],
    methods:{ 
        attestModal(mode) {
        localStorage.clear()
        localStorage.setItem('isCompliance', 0)
        localStorage.setItem('kricompliance_id', mode.id)
        this.$router.push({ name: 'ItemProfile' })
        }
    }
  }

  </script>
  