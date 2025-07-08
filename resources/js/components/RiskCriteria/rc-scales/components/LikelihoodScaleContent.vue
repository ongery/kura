<template>
    
    <!--begin::Col-->
    <div  style="margin-top:17px; margin-left: 17px; margin-right:17px">

        <!--begin::Tables Widget 3-->
        <div class="card card-xl-stretch mb-5 mb-xl-12">

          

            <!--begin::Body-->
            <div class="card-body py-3">

                <!--begin::Table container-->
                <div class="table-responsive">

                    <!--begin::Table-->
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bolder text-muted " style="font-size: 14px;" >

                              <th class="min-w-50px">#</th>
                              <th class="min-w-80px">Descriptor</th>
                              <th class="min-w-40px">Frequency</th>
                              <th class="min-w-40px">Probability</th>

                            </tr>
                        </thead>
                        <!--end::Table head-->


                        <!--begin::Table body-->
                        <tbody>

                            <!-- Index:#5 -->
                            <tr>
                                <td>
                                        
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">5</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> -->
                                    </div>

                                </td>

                                <td>
                                        
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">Almost Certain</a>
                                        <!-- <span class="text-muted fw-bold text-muted d-block fs-7">HTML, JS, ReactJS</span> -->
                                    </div>

                                </td>


                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold  d-block fs-6">Likely to arise within the next 0 -3 months</a>
                                    <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Strong probability (>90%) that the risk event will occur</a>
                                    <!-- <span class="text-muted fw-bold text-muted d-block fs-7">Web, UI/UX Design</span> -->
                                </td>

                               
                            </tr>


                            <!-- Index:#4 -->
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">4</a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">Likely</a>
                                    </div>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Likely to arise within the next 3 – 6 months</a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Probable that the risk event will occur (55 - 89%)</a>
                                </td>
                               
                            </tr>


                            <!-- Index:#3 -->
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">3</a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">Possible</a>
                                    </div>
                                </td>


                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Possible to occur within the next 6 – 9 months</a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Risk event could potentially take place (25 - 54%)</a>
                                </td>
                               
                            </tr>


                            <!-- Index:#2 -->
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">2</a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">Rare</a>
                                    </div>
                                </td>


                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Possible to occur within the next 9 months - 1 year</a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Risk event not expected to happen, however an outside chance exists (5 - 24%)</a>
                                </td>
                               
                            </tr>


                            <!-- Index:#1 -->
                            <tr>
                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">1</a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-dark fw-bolder text-hover-success fs-6">Unlikely</a>
                                    </div>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Not likely to happen within the next 1 year or only in exceptional circumstances.</a>
                                </td>

                                <td>
                                    <a href="#" class="text-gray-800 text-hover-success fw-bold d-block fs-6">Likely in exceptional circumstances (0 - 4%)</a>
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
        name:'LikelihoodScaleContent',
    }
</script>