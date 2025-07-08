<template>
<!--begin::Item-->
<div class="octagon d-flex flex-center h-200px w-200px bg-body mx-2">
    <!--begin::Content-->

    <div class="text-center">

        <!--begin::Symbol-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        <!--end::Symbol-->

        <!--begin::Text-->
            <div class="mt-1">
                <!--begin::Animation-->
                <div class="fs-lg-2hx fs-2x fw-bolder text-gray-800 d-flex align-items-center">
                    <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700">0</div>+</div>
                <!--end::Animation-->

                <!--begin::Label-->
                    <span class="text-gray-600 fw-bold fs-5 lh-0">Businesses</span>
                <!--end::Label-->
            </div>
        <!--end::Text-->
    </div>
    <!--end::Content-->
</div>
<!--end::Item-->
</template>

<script>

export default {
    name:'OctagonMidRisk',
    props:['summaryReports'],

}

</script>