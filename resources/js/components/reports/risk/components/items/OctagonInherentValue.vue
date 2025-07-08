<template>

    <!-- High Risk -->

        <div class="d-flex flex-column align-items-center" >

                <!--begin::Item-->
                <div v-if="mode1.InherentValue >= 15" class="octagon d-flex flex-center h-60px w-60px"  style="background-color:#ec0d0d">
                    <!--begin::Content-->

                    <div class="text-center" >

                        <!--begin::Text-->
                            <div class="mt-1">
                                <!--begin::Animation-->
                                <div class="fs-6 fw-bolder d-flex align-items-center">
                                    
                                    <div class="text-dark text-white-400" style="margin-left: -2px; font-size: 25px;" data-kt-countup="true" :data-kt-countup-value="mode1.InherentValue">{{ mode1.InherentValue }}</div>
                                
                                </div>
                            
                            </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Item-->


                <!--begin::Item-->
                <div v-else-if="mode1.InherentValue > 4" class="octagon d-flex flex-center h-60px w-60px"  style="background-color:#ffbf00">
                    <!--begin::Content-->

                    <div class="text-center" >

                        <!--begin::Text-->
                            <div class="mt-1">
                                <!--begin::Animation-->
                                <div class="fs-6 fw-bolder d-flex align-items-center">
                                    
                                    <div class="text-dark text-white-400" style="margin-left: -2px; font-size: 25px;" data-kt-countup="true" :data-kt-countup-value="mode1.InherentValue">{{ mode1.InherentValue}}</div>
                                
                                </div>
                            
                            </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Item-->


                <!--begin::Item-->
                <div v-else="mode1.InherentValue =< 4" class="octagon d-flex flex-center h-60px w-60px"  style="background-color:#09f17d">
                    <!--begin::Content-->

                    <div class="text-center" >

                        <!--begin::Text-->
                            <div class="mt-1">
                                <!--begin::Animation-->
                                <div class="fs-6 fw-bolder d-flex align-items-center">
                                    
                                    <div class="text-dark text-white-400" style="margin-left: -2px; font-size: 25px;" data-kt-countup="true" :data-kt-countup-value="mode1.InherentValue">{{ mode1.InherentValue }}</div>
                                
                                </div>
                            
                            </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Item-->

        </div>



</template>
<script>

export default {

    name:'OctagonInherentValue',
    props:['mode1'],
    
}
</script>