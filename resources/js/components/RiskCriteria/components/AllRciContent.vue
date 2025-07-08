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

                                    <th>Reference</th>
                                    <th>Name</th>
                                    <th>Frequency</th>
                                    <th style="text-align:center">Value</th>
                                    <th></th>
                                  </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                
                                <tr v-for="mode in this.alldata":key="mode.id">
                                    
                                    <td>
                                            
                                        <div class="d-flex justify-content-start flex-column">
                                            <span>
                                                <a style="color: #258c37;" href="#" @click.prevent="editModal(mode)" class="text-dark fw-bolder text-hover-success fs-6"> {{ mode.DocNum }}</a>
                                                <i  @click="editModal(mode)" class="fa fa-edit blue"></i>
                                            </span>
                                            <!-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> -->
                                        </div>
    
                                    </td>
    
    
                                    <td>
                                        <a style="color: #258c37;" href="#" @click.prevent="attestModal(mode)" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.Name }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
    
                                    <td>
                                        <a class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.freq }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
    
                                    <td  :class="{
                                        'bg-success': mode.color === 'bg-success',
                                         'bg-danger': mode.color === 'bg-danger',
                                          'bg-warning': mode.color === 'bg-warning',
                                          }"
                                            style="text-align:center">
                                        <a href="#" class="text-dark fw-bolder text-hover-success d-block fs-6">{{ mode.kri1 ?  mode.kri1.Value : null }}</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                    </td>
                               
                                    <td class="justify-content-center">
                                        <a href="#" @click.prevent="deleteRoute(mode.id)" class="text-dark fw-bolder text-hover-success d-block fs-6"></a>
                                        
                                        <i @click="deleteRoute(mode.id)" class="fa fa-trash red justify-content-center"></i>
                                        
                                        <span class="text-muted fw-bold text-muted d-block fs-7">Delete</span>
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
    name:'AllRciContent',
    props:['alldata',],
    methods:{ 
        editModal(mode) {
            this.$router.push({ name: 'EditRCI', params: { ObjType: mode.ObjType, id: mode.id } })
        },

        deleteRoute(id) {
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
            // Send request to the server
            if (result.value) {
                this.form
                .delete('/api/category/' + id)
                .then(() => {
                    swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                    Fire.$emit('AfterCreate')
                })
                .catch(() => {
                    swal.fire('Failed!', 'Something when wrong', 'warning')
                })
            }
            })
        },

    }
  }

  </script>
  