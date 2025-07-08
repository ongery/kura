 <!--begin::Sidebar-->

 <div id="kt_app_sidebar" class="app-sidebar  flex-column "
                    data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
                    >


                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="#">
                            <img alt="Logo" src="{{ Vite::asset('resources/images/parking-logo-workflow-indigo-500.svg') }}" class="h-25px app-sidebar-logo-default"/>

                            <img alt="Logo" src="{{ Vite::asset('resources/images/parking-logo-workflow-indigo-500.svg') }}" class="h-20px app-sidebar-logo-minimize"/>
                        </a>
                        <!--end::Logo image-->

                                <!--begin::Sidebar toggle-->
                         <!--begin::Minimized sidebar setup:
                            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
                            }
                        -->
                            <div
                                id="kt_app_sidebar_toggle"
                                class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate active"
                                data-kt-toggle="true"
                                data-kt-toggle-state="active"
                                data-kt-toggle-target="body"
                                data-kt-toggle-name="app-sidebar-minimize"
                                >

                                <i class="ki-duotone ki-double-left fs-2 rotate-180"><span class="path1"></span><span class="path2"></span></i>        </div>
                            <!--end::Sidebar toggle-->
                        </div>
                    <!--end::Logo-->


                    <!--begin::sidebar menu-->
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div
                            id="kt_app_sidebar_menu_wrapper"
                            class="app-sidebar-wrapper hover-scroll-overlay-y my-5"

                            data-kt-scroll="true"
                            data-kt-scroll-activate="true"
                            data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu"
                            data-kt-scroll-offset="5px"
                            data-kt-scroll-save-state="true"
                        >
                            <!--begin::Menu-->
                            <div
                                class="menu menu-column menu-rounded menu-sub-indention px-3"

                                id="#kt_app_sidebar_menu"

                                data-kt-menu="true"
                                data-kt-menu-expand="false"
                            >



            <!--begin:Menu item-->
            <div  data-kt-menu-trigger="click"  class="menu-item here show menu-accordion" >

                <!--begin:Menu link-->
                <span class="menu-link active" >
                    <span  class="menu-icon" >
                        <i class="ki-outline ki-home-2 fs-2 "></i>
                        {{-- <i class="ki-duotone ki-element-11 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i> --}}
                    </span>
                    <span  class="menu-title" >Dashboard</span>
                    {{-- <span  class="menu-arrow" ></span> --}}
                </span>
                <!--end:Menu link-->

                {{-- <!--begin:Menu sub-->
                    <div  class="menu-sub menu-sub-accordion" >

                        <!--begin:Menu item-->
                        <div  class="menu-item" >
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="../../index.html" >
                                <span  class="menu-bullet" >
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span  class="menu-title" >Default</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div  class="menu-item" >
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="../../dashboards/ecommerce.html" >
                                <span  class="menu-bullet" >
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span  class="menu-title" >eCommerce</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div  class="menu-item" >
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="../../dashboards/projects.html" >
                                <span  class="menu-bullet" >
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span  class="menu-title" >Projects</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div  class="menu-item" >
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="../../dashboards/online-courses.html" >
                                <span  class="menu-bullet" >
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span  class="menu-title" >Online Courses</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div  class="menu-item" >
                            <!--begin:Menu link-->
                            <a class="menu-link"  href="../../dashboards/marketing.html" >
                                <span  class="menu-bullet" >
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span  class="menu-title" >Marketing</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <div class="menu-inner flex-column collapse " id="kt_app_sidebar_menu_dashboards_collapse">

                            <!--begin:Menu item-->
                            <div  class="menu-item" >
                                <!--begin:Menu link-->
                                <a class="menu-link"  href="../../dashboards/bidding.html" >
                                    <span  class="menu-bullet" >
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span  class="menu-title" >Bidding</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div  class="menu-item" >
                                <!--begin:Menu link-->
                                <a class="menu-link"  href="../../dashboards/pos.html" >
                                    <span  class="menu-bullet" >
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span  class="menu-title" >POS System</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/call-center.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Call Center</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/logistics.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Logistics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/website-analytics.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Website Analytics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/finance-performance.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Finance Performance</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/store-analytics.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Store Analytics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/social.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Social</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/delivery.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Delivery</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/crypto.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Crypto</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/school.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >School</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="../../dashboards/podcast.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Podcast</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item-->
                            <div  class="menu-item" >
                                <!--begin:Menu link-->
                                <a class="menu-link"  href="../../landing.html" >
                                    <span  class="menu-bullet" >
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span  class="menu-title" >Landing</span>
                                <a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->

                        </div>

                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse" data-kt-toggle-text="Show Less">
                                    <span data-kt-toggle-text-target="true">Show 12 More</span>
                                    <i class="ki-outline ki-minus-square toggle-on fs-2 me-0"></i>
                                    <i class="ki-outline ki-plus-square toggle-off fs-2 me-0"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!--end:Menu sub--> --}}


            </div>
            <!--end:Menu item-->


            @include('layouts.menu.services') 

            @include('layouts.menu.utilities')

            @include('layouts.menu.help')   


</div>
    <!--end::Sidebar menu-->


<!--begin::Teames-->
<div class="app-sidebar-menu-secondary menu menu-rounded menu-column ps-5 pe-6">
    <!--begin::Heading-->
    <div class="menu-item menu-labels">
        <div class="menu-content d-flex flex-stack fw-bold text-gray-600 text-uppercase fs-7">
            <span class="menu-heading ps-1">
                QUICK ACCESS
            </span>

            {{-- <!--begin::Link-->
            <a class="menu-btn ps-2" href="../../authentication/layouts/corporate/sign-in.html">
                <i class="ki-outline ki-plus-square fs-2 text-success"></i>
            </a>
            <!--end::Link--> --}}
        </div>
    </div>
    <!--end::Heading-->

    <!--begin::Separator-->
    <div class="app-sidebar-separator separator mx-5 mt-2 mb-2"></div>
    <!--end::Separator-->

        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-primary">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Sales
                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        6
                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item-->


        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-warning">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Naomi
                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        Acitve
                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item-->

        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-warning">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Jackline
                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        Offline
                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item-->


         {{-- <!--begin::Menu Item-->
         <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-success">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Partners
                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        2
                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item--> --}}


{{--
        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-danger">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Fitnes App                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        4                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item--> --}}


        {{-- <!--begin::Collapsible items-->
        <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_projects_collapse">

        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-info">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Oppo CRM                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        12                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item-->



        <!--begin::Menu Item-->
        <div class="menu-item">
            <!--begin::Menu link-->
            <a class="menu-link" href="../../apps/projects/project.html">
                <!--begin::Bullet-->
                <span class="menu-icon ps-2">
                    <span class="bullet bullet-dot h-10px w-10px bg-warning">
                    </span>
                </span>
                <!--end::Bullet-->

                <!--begin::Title-->
                <span class="menu-title text-gray-700 fw-bold fs-6">
                    Finance Dispatch                </span>
                <!--end::Title-->

                <!--begin::Badge-->
                <span class="menu-badge">
                    <span class="badge badge-secondary">
                        25                    </span>
                </span>
                <!--end::Badge-->
            </a>
            <!--end::Menu link-->
        </div>
        <!--end::Menu Item-->

                    </div>
            <!--end::Collapsible items--> --}}


    {{-- <!--begin::Collapse toggle-->
    <div class="menu-item">
        <!--begin::Toggle-->
        <a class="menu-link menu-collapse-toggle toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_projects_collapse" data-kt-toggle-text="Show less">
            <span class="menu-icon ps-2">
                <i class="ki-outline ki-down toggle-off fs-4 text-gray-700 me-0"></i>                <i class="ki-outline ki-up toggle-on fs-4 text-gray-700 me-0"></i>            </span>

            <!--begin::Title-->
            <span class="menu-title text-gray-600 fw-semibold" data-kt-toggle-text-target="true">
                Show more
            </span>
            <!--end::Title-->
        </a>
        <!--end::Toggle-->
    </div>
    <!--end::Collapse toggle--> --}}


</div>
<!--end::Teames-->

</div>
<!--end::Wrapper-->

</div>
<!--end::Sidebar-->


   <!--begin::Footer-->
   <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
    <a
        href="#"
        class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
        data-bs-toggle="tooltip"
        data-bs-trigger="hover"
        data-bs-dismiss-="click"
        title="">

        {{-- <span class="btn-label">
            &copy; 2023 Clickstart Studios
        </span> --}}

        <i class="ki-duotone ki-document btn-icon fs-2 m-0">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </a>
</div>
<!--end::Footer-->

</div>
<!--end::Sidebar-->
