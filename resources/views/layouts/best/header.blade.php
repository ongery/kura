<!--begin::Header-->
<div id="kt_header" class="header " data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">

    <!--begin::Container-->
    <div class=" container-xxl  d-flex align-items-center justify-content-between" id="kt_header_container">

        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0"
            data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

            <!--begin::Heading-->
            <h1 class="text-dark fw-semibold my-0 fs-2">
                Dashboard </h1>
            <!--end::Heading-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-line text-muted fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="index-2.html" class="text-muted">
                        Home </a>
                </li>
                <li class="breadcrumb-item text-muted">
                    Dashboard </li>
                <li class="breadcrumb-item text-dark">
                    Projects </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title--->

        <!--begin::Wrapper-->
        <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
            <!--begin::Aside mobile toggle-->
            <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2x"><span class="path1"></span><span class="path2"></span></i>
            </div>
            <!--end::Aside mobile toggle-->

            <!--begin::Logo-->
            <a href="index-2.html" class="d-flex align-items-center">
                <img alt="Logo" src="assets/media/logos/logo-default.svg" class="h-40px" />
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Toolbar wrapper-->
        <div class="d-flex flex-shrink-0">
            <!--begin::Invite user-->
            <div class="d-flex ms-3">
                <a href="#" class=" btn bg-body btn-color-gray-600 btn-active-info" tooltip="New Member"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">
                    New User
                </a>
            </div>
            <!--end::Invite user-->

            <!--begin::Create app-->
            <div class="d-flex ms-3">
                <a href="#" class="btn btn-info" tooltip="New App" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_campaign">
                    New Goal
                </a>
            </div>
            <!--end::Create app-->
        </div>
        <!--end::Toolbar wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
