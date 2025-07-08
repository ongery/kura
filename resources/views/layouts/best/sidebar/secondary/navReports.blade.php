{{-- REPORTS --}}
<div class="tab-pane fade" style="margin-left: -4px" id="kt_aside_nav_tab_report" role="tabpanel">
    <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-6 px-6 my-5 my-lg-0"
        id="kt_aside_menu" data-kt-menu="true">
        <div id="kt_aside_menu_wrapper" class="menu-fit">
            <div class="menu-item">
                <div class="menu-content">
                    <h1 class="page-heading text-white pt-2 fw-bold flex-column" style="font-size: 20px; color:#ffffff;">
                        Reports Module
                    </h1>
                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                <span class="menu-link">
                    <div class="custom-list d-flex  pt-3">
                        <div class="symbol symbol-40px me-5 ">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-2x svg-icon-danger btn-active-color-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                            fill="#4a4a49" />
                                        <path opacity="0.3"
                                            d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                            fill="#258c37" />
                                        <path opacity="0.3"
                                            d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                            fill="#f7a600" />
                                    </svg>
                                </span>
                            </span>
                        </div>
						
                        <div class="d-flex flex-column flex-grow-1 me-13">
                            <h5 class="custom-list-title fw-bold text-white mb-1">Risk Management</h5>
                            <span class="text-gray-400 fw-bold">Reports</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow"></span>
                        </span>
                    </div>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                            <router-link to="/report/risk_register">
                                <a class="menu-link" href="javascript:void(0)">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-white text-active-success">Risk Register</span>
                                </a>
							</router-link">
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item" style="padding-left: 5px;">
                            <router-link to="/report/kri/register">
                                <a class="menu-link" href="javascript:void(0)">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-white text-active-success">Key Risk Indicators</span>
                                </a>
                            </router-link>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item " style="padding-left: 5px;">
                            <router-link to="/report/kci/register">
                                <a class="menu-link" href="javascript:void(0)">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-white text-active-success">Key Control Indicators</span>
                                </a>
                            </router-link>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-item " style="padding-left: 5px;">
                            <router-link to="/report/incident/register">
                                <a class="menu-link" href="javascript:void(0)">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-white text-active-success">Incident Report</span>
                                </a>
                            </router-link>
                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-item " style="padding-left: 5px;">
                            <router-link to="/report/action/register">
                                <a class="menu-link" href="javascript:void(0)">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title text-white text-active-success">Action Report</span>
                                </a>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>

            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                <span class="menu-link">
                    <div class="custom-list d-flex ">
                        <div class="symbol symbol-40px me-5 ">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-2x svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                            fill="#4a4a49" />
                                        <path opacity="0.3"
                                            d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                            fill="#258c37" />
                                        <path opacity="0.3"
                                            d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                            fill="#f7a600" />
                                    </svg>
                                </span>
                            </span>
                        </div>
						
                        <div class="d-flex flex-column flex-grow-1 me-19" style="padding-right:55px">
                            <h5 class="custom-list-title fw-bold text-white text-active-success mb-1"> {{ __('QMS') }} </h5>
                            <span class="text-gray-400 fw-bold">Reports</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow"></span>
                        </span>
                    </div>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                        <router-link to="/report/qms">
                            <a class="menu-link p-5" href="javascript:void(0)">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title text-white text-active-success">QMS Report</span>
                            </a>
                        </router-link>
                    </div>
                </div>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                <span class="menu-link">
                    <div class="custom-list d-flex ">
                        <div class="symbol symbol-40px me-5 ">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-2x svg-icon-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M13 10.9128V3.01281C13 2.41281 13.5 1.91281 14.1 2.01281C16.1 2.21281 17.9 3.11284 19.3 4.61284C20.7 6.01284 21.6 7.91285 21.9 9.81285C22 10.4129 21.5 10.9128 20.9 10.9128H13Z"
                                            fill="#4a4a49" />
                                        <path opacity="0.3"
                                            d="M13 12.9128V20.8129C13 21.4129 13.5 21.9129 14.1 21.8129C16.1 21.6129 17.9 20.7128 19.3 19.2128C20.7 17.8128 21.6 15.9128 21.9 14.0128C22 13.4128 21.5 12.9128 20.9 12.9128H13Z"
                                            fill="#258c37" />
                                        <path opacity="0.3"
                                            d="M11 19.8129C11 20.4129 10.5 20.9129 9.89999 20.8129C5.49999 20.2129 2 16.5128 2 11.9128C2 7.31283 5.39999 3.51281 9.89999 3.01281C10.5 2.91281 11 3.41281 11 4.01281V19.8129Z"
                                            fill="#f7a600" />
                                    </svg>
                                </span>
                            </span>
                        </div>
						
                        <div class="d-flex flex-column flex-grow-1 me-19" style="padding-right:55px">
                            <h5 class="custom-list-title fw-bold text-white text-active-success mb-1">ERM</h5>
                            <span class="text-gray-400 fw-bold">Reports</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow "></span>
                        </span>
                    </div>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <div class="symbol" style="">
                            <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                                <router-link to="/report/ERM/register">
                                    <a class="menu-link p-5" href="javascript:void(0)">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title text-white text-active-success">ERM Register</span>
                                    </a>
                                </router-link>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end::Menu-->
</div>
<!--end::Tab pane-->
