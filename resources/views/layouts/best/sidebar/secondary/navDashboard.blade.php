{{-- DASHBOARD --}}
<div class="tab-pane fade active show" id="kt_aside_nav_tab_dashboard" role="tabpanel">
    <div class="m-0">
        <div class="m-0">
            <h1 class=" p-5 fw-bold text-white flex-column" style="font-size: 20px; color:#ffffff;"> Dashboard </h1>
            <div class="mb-10 ">
                <router-link :to="{ path: '/dashboards/risk' }">
                    <a href="javascript:void(0)" class="custom-list d-flex align-items-center px-5 py-4">
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
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="custom-list-title fw-bold text-white mb-1">Risk Dashboard</h5>
                            <span class="text-gray-400 fw-bold">Dashboard</span>
                        </div>
                    </a>
                </router-link>
<!-- 
                <router-link :to="{ path: '/dashboard/incident' }">
                    <a href="javascript:void(0)" class="custom-list d-flex align-items-center px-5 py-4">
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
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="custom-list-title fw-bold text-white mb-1">Incident Dashboard</h5>
                            <span class="text-gray-400 fw-bold">Dashboard</span>
                        </div>
                    </a>
                </router-link>
				
                <router-link :to="{ path: '/dashboard/kri' }">
                    <a href="javascript:void(0)" class="custom-list d-flex align-items-center px-5 py-4">
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
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="custom-list-title fw-bold text-white mb-1">KRI Dashboard</h5>
                            <span class="text-gray-400 fw-bold">Dashboard</span>
                        </div>
                    </a>
                </router-link>
				
                <router-link :to="{ path: '/dashboard/kci' }">
                    <a href="javascript:void(0)" class="custom-list d-flex align-items-center px-5 py-4">
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
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="custom-list-title fw-bold text-white mb-1">KCI Dashboard</h5>
                            <span class="text-gray-400 fw-bold">Dashboard</span>
                        </div>
                    </a>
                </router-link> -->
				
                <router-link :to="{ path: '/dashboards/erm' }">
                    <a href="javascript:void(0)" class="custom-list d-flex align-items-center px-5 py-4">
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
                        <div class="d-flex flex-column flex-grow-1">
                            <h5 class="custom-list-title fw-bold text-white mb-1">ERM Dashboard</h5>
                            <span class="text-gray-400 fw-bold">Dashboard</span>
                        </div>
                    </a>
                </router-link>
            </div>
        </div>
    </div>
</div>
