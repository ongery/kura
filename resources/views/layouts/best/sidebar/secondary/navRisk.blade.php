<div class="tab-pane fade" style="margin-left: -4px" id="kt_aside_nav_tab_risk" role="tabpanel">
    <div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-6 px-6 my-5 my-lg-0"
        id="kt_aside_menu" data-kt-menu="true">
        <div id="kt_aside_menu_wrapper" class="menu-fit">
            <div class="menu-item">
                <div class="menu-content">
                    <h1 class="page-heading text-white text-white text-active-dark pt-2 fw-bold flex-column" style="font-size: 20px;"> Risk Module </h1>
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
                            <span class="text-gray-400 fw-bold">Risk Module</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow"></span>
                        </span>
                    </div>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    {{-- Risk Criteria --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                        <span class="menu-link">
                            <div class="custom-list d-flex  pt-3">
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
                                
                                <div class="d-flex flex-column flex-grow-1 me-13">
                                    <h5 class="custom-list-title fw-bold text-white mb-1">Risk Criteria</h5>
                                    <span class="text-gray-400 fw-bold">Risk Module</span>
                                </div>
                                <span class="mt-5">
                                    <span class="menu-arrow"></span>
                                </span>
                            </div>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                                    <router-link to="/risk-criteria">
                                        <a class="menu-link" href="javascript:void(0)">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-white text-active-success">Risk Criteria</span>
                                        </a>
                                    </router-link">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END  Risk Criteria --}}

                    {{-- Risk Analysis --}}
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                        <span class="menu-link">
                            <div class="custom-list d-flex  pt-3">
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
                                
                                <div class="d-flex flex-column flex-grow-1 me-13">
                                    <h5 class="custom-list-title fw-bold text-white mb-1">Risk Analysis</h5>
                                    <span class="text-gray-400 fw-bold">Risk Module</span>
                                </div>

                                <span class="mt-5">
                                    <span class="menu-arrow"></span>
                                </span>
                            </div>
                        </span>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                                    <router-link to="/RiskAnalysis">
                                        <a class="menu-link" href="javascript:void(0)">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-white text-active-success">Risk Analysis</span>
                                        </a>
                                    </router-link">
                                </div>

                                <div class="menu-item " style="padding-left: 5px; padding-top: 3px;">
                                    <router-link to="/add_new_risk">
                                        <a class="menu-link" href="javascript:void(0)">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title text-white text-active-success">New Risk</span>
                                        </a>
                                    </router-link">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END  Risk Analysis --}}

                    {{-- My Actions --}}
                    <router-link to="/ActionTracking">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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
                            
                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">My Actions</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  My Actions --}}

                    {{-- Key Risk Indicators --}}
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
                                <div class="d-flex flex-column flex-grow-1 me-11">
                                    <h5 class="custom-list-title fw-bold text-white mb-1 text-nowrap">Key Risk Indicators</h5>
                                    <span class="text-gray-400 fw-bold">Risk Module</span>
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
                                        <router-link to="/MyKRIs">
                                            <a class="menu-link p-5" href="javascript:void(0)">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title text-white text-active-success">My KRIs</span>
                                            </a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Key Control Indicators --}}
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
                                
                                <div class="d-flex flex-column flex-grow-1 me-4">
                                    <h5 class="custom-list-title fw-bold text-white mb-1 text-nowrap">Key Control Indicators</h5>
                                    <span class="text-gray-400 fw-bold">Risk Module</span>
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
                                        <router-link to="/MyKCI">
                                            <a class="menu-link p-5" href="javascript:void(0)">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title text-white text-active-success">My KCI</span>
                                            </a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Risk Data Setup --}}
                    <router-link to="/RiskSetup">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Risk Data Setup</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END Risk Data Setup --}}

                    {{-- Incident Management --}}
                    <router-link to="/AllIncidents">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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
                            
                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Incident Management</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  Incident Management --}}
                </div>
            </div>

            {{-- Title QMS Management --}}
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
                            <h5 class="custom-list-title fw-bold text-white mb-1">QMS Management</h5>
                            <span class="text-gray-400 fw-bold">Risk Module</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow"></span>
                        </span>
                    </div>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    {{-- New Procedure --}}
                    <router-link to="/procedure-desc">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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
                            </div>

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">New Procedure</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  Incident Management --}}

                    {{-- ISO Procedure --}}
                    <router-link to="/Procedures">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">ISO Procedure</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  ISO Procedure --}}

                    {{-- NCR --}}
                    <router-link to="/qms/ncr">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">NCR</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  NCR  --}}

                    {{-- Audit Scheduler --}}
                    <router-link to="/AuditScheduler">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Audit Scheduler</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  Audit Scheduler  --}}

                    {{-- Self Assessments  --}}
                    <router-link to="/self/view">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Self Assessments</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END Self Assessments  --}}
                </div>
            </div>

            {{-- Title ERM Management --}}
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
                            <h5 class="custom-list-title fw-bold text-white mb-1">ERM Management</h5>
                            <span class="text-gray-400 fw-bold">Risk Module</span>
                        </div>
                        <span class="mt-5">
                            <span class="menu-arrow"></span>
                        </span>
                    </div>
                </span>

                <div class="menu-sub menu-sub-accordion">
                    {{-- Risk Analysis --}}
                    <router-link to="/MainRiskAnalysis">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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
                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Risk Analysis</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END  Risk Analysis  --}}

                    {{-- Main Risk Events --}}
                    <router-link to="/main-risk-events">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Main Risk Events Library</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END Main Risk Events  --}}

                    {{-- CORPORATE RISK --}}
                    <router-link to="/corporate-risks">
                        <a href="javascript:void(0)" class="custom-list d-flex align-items-center py-4">
                            <div class="symbol symbol-40px me-5 ">
                                <span class="symbol-label ms-4">
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

                            <div class="d-flex flex-column flex-grow-1">
                                <h5 class="custom-list-title fw-bold text-white mb-1">Corporate Risk</h5>
                                <span class="text-gray-400 fw-bold">Risk Module</span>
                            </div>
                        </a>
                    </router-link>
                    {{-- END CORPORATE RISK  --}}
                </div>
            </div>
        </div>
    </div>
</div>
