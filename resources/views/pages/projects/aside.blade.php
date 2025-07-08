			<!--begin::Aside-->
            <div
            id="kt_aside"
            class="aside aside-extended "
            data-kt-drawer="true"
            data-kt-drawer-name="aside"
            data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="auto"
            data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_aside_toggle"
            >
        
            <!--begin::Primary-->
            <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
                <!--begin::Logo-->
                <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">		
                    <a href="index-2.html">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-default.svg')}}" class="h-50px"/>
                    </a>
                </div>
                <!--end::Logo-->
        
                <!--begin::Nav-->
                <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
                    
        <!--begin::Wrapper-->
        <div class="hover-scroll-overlay-y mb-10 scroll-ms"
            data-kt-scroll="true"     
            data-kt-scroll-activate="{default: false, lg: true}"
            data-kt-scroll-height="auto"    
            data-kt-scroll-wrappers="#kt_aside_nav"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" 
            data-kt-scroll-offset="0px"
         >   
            <!--begin::Nav-->
            <ul class="nav flex-column">
                                                <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Projects">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon active" data-bs-toggle="tab"  href="#kt_aside_nav_tab_projects">
                            <i class="ki-duotone ki-abstract-41 fs-2x"><span class="path1"></span><span class="path2"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                                        <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Menu">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_menu">
                            <i class="ki-duotone ki-element-11 fs-2x"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                                        <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Subscription">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_subscription">
                            <i class="ki-duotone ki-chart-simple fs-2x"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                                        <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Tasks">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_tasks">
                            <i class="ki-duotone ki-shield-tick fs-2x"><span class="path1"></span><span class="path2"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                                        <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Notifications">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_notifications">
                            <i class="ki-duotone ki-abstract-26 fs-2x"><span class="path1"></span><span class="path2"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                                        <!--begin::Nav item-->
                    <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Authors">
                        <!--begin::Nav link-->
                        <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_authors">
                            <i class="ki-duotone ki-briefcase fs-2x"><span class="path1"></span><span class="path2"></span></i>                     
                        </a>
                        <!--end::Nav link-->
                    </li>
                    <!--end::Nav item-->            
                    
            </ul>     
            <!--end::Tabs-->
        </div>
        <!--end::Nav-->
        
                </div>
                <!--end::Nav-->
        
                <!--begin::Footer-->
                <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
                    <!--begin::Chat-->
                    <div class="d-flex align-items-center mb-2">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-custom" id="kt_drawer_chat_toggle">
                            <i class="ki-duotone ki-message-text-2 fs-2 fs-lg-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>				</div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Chat-->
        
                    <!--begin::Notifications-->
                    <div class="d-flex align-items-center mb-2">
                        <!--begin::Menu wrapper-->
                        <div class="btn btn-icon btn-custom" 
                            data-kt-menu-trigger="click"				
                            data-kt-menu-overflow="true"
                            data-kt-menu-placement="top-start"
        
                            data-bs-toggle="tooltip" 
                            data-bs-placement="right" 
                            data-bs-dismiss="click"
                            title="Notifications">
                            <i class="ki-duotone ki-element-11 fs-2 fs-lg-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>				</div>
        
                        
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
            <!--begin::Heading-->
            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('assets/media/misc/pattern-1.html')">
                <!--begin::Title-->
                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                    Notifications <span class="fs-8 opacity-75 ps-3">24 reports</span>
                </h3>
                <!--end::Title-->
        
                <!--begin::Tabs-->
                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9">
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1">Alerts</a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2">Updates</a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3">Logs</a>
                    </li>
                </ul>
                <!--end::Tabs-->
            </div>
            <!--end::Heading-->
        
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                    <!--begin::Items-->
                    <div class="scroll-y mh-325px my-5 px-8">
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-primary">      
                                            <i class="ki-duotone ki-technology-2 fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Project Alice</a>
                                        <div class="text-gray-400 fs-7">Phase 1 development</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">1 hr</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-danger">      
                                            <i class="ki-duotone ki-information-5 fs-2 text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">HR Confidential</a>
                                        <div class="text-gray-400 fs-7">Confidential staff documents</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">2 hrs</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-warning">      
                                            <i class="ki-duotone ki-briefcase fs-2 text-warning"><span class="path1"></span><span class="path2"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Company HR</a>
                                        <div class="text-gray-400 fs-7">Corporeate staff profiles</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">5 hrs</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-success">      
                                            <i class="ki-duotone ki-cloud-change fs-2 text-success"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Project Redux</a>
                                        <div class="text-gray-400 fs-7">New frontend admin theme</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">2 days</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-primary">      
                                            <i class="ki-duotone ki-geolocation fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Project Breafing</a>
                                        <div class="text-gray-400 fs-7">Product launch status update</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">21 Jan</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-info">      
                                            <i class="ki-duotone ki-graph-3 fs-2 text-info"><span class="path1"></span><span class="path2"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Banner Assets</a>
                                        <div class="text-gray-400 fs-7">Collection of banner images</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">21 Jan</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-warning">      
                                            <i class="ki-duotone ki-color-swatch fs-2 text-warning"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span><span class="path20"></span><span class="path21"></span></i>                                                    
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
        
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-success fw-bold">Icon Assets</a>
                                        <div class="text-gray-400 fs-7">Collection of SVG icons</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">20 March</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                          
                    </div>
                    <!--end::Items-->
        
                    <!--begin::View more-->
                    <div class="py-3 text-center border-top">
                        <a href="pages/profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">
                            View All 
                            <i class="ki-duotone ki-arrow-right fs-5"><span class="path1"></span><span class="path2"></span></i>                </a>			 
                    </div>
                    <!--end::View more--> 
                </div>
                <!--end::Tab panel-->      
        
                <!--begin::Tab panel-->
                <div class="tab-pane fade show active" id="kt_topbar_notifications_2" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column px-9">
                        <!--begin::Section-->
                        <div class="pt-10 pb-0">
                            <!--begin::Title-->
                            <h3 class="text-dark text-center fw-bold">
                                Get Pro Access                
                            </h3>
                            <!--end::Title-->
        
                            <!--begin::Text-->
                            <div class="text-center text-gray-600 fw-semibold pt-1">
                                Outlines keep you honest. They stoping you from amazing poorly about drive
                            </div>
                            <!--end::Text-->
        
                            <!--begin::Action-->
                            <div class="text-center mt-5 mb-9">
                                <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>                  
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Section-->
        
                        <!--begin::Illustration-->
                        <div class="text-center px-4">
                            <img class="mw-100 mh-200px" alt="metronic" src="assets/media/illustrations/sigma-1/6.png"/>
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Tab panel-->
                
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">
                    <!--begin::Items-->
                    <div class="scroll-y mh-325px my-5 px-8">
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">New order</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Just now</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">New customer</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">2 hrs</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Payment process</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">5 hrs</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Search query</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">2 days</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">API connection</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">1 week</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Database restore</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Mar 5</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">System update</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">May 15</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Server OS update</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Apr 3</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">API rollback</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Jun 30</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Refund process</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Jul 10</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Withdrawal process</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Sep 10</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                                            <!--begin::Item-->
                            <div class="d-flex flex-stack py-4">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center me-2">
                                    <!--begin::Code-->
                                    <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                    <!--end::Code-->
        
                                    <!--begin::Title-->
                                    <a href="#" class="text-gray-800 text-hover-success fw-semibold">Mail tasks</a>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
        
                                <!--begin::Label-->
                                <span class="badge badge-light fs-8">Dec 10</span>
                                <!--end::Label-->
                            </div>
                            <!--end::Item-->
                          
                    </div>
                    <!--end::Items-->
        
                    <!--begin::View more-->
                    <div class="py-3 text-center border-top">
                        <a href="pages/profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">
                            View All 
                            <i class="ki-duotone ki-arrow-right fs-5"><span class="path1"></span><span class="path2"></span></i>                </a>			 
                    </div>
                    <!--end::View more--> 
                </div>
                <!--end::Tab panel-->
            </div>
            <!--end::Tab content-->
        </div>
        <!--end::Menu-->				<!--end::Menu wrapper-->
                    </div>
                    <!--end::Notifications-->
        
                    <!--begin::Activities-->
                    <div class="d-flex align-items-center mb-3">
                        <!--begin::Drawer toggle-->
                        <div class="btn btn-icon btn-custom" 
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"		
                        data-kt-menu-overflow="true"
                        data-kt-menu-placement="top-start"
        
                        data-bs-toggle="tooltip" 
                        data-bs-placement="right" 
                        data-bs-dismiss="click"
                        title="Activity Logs"								 
                        id="kt_activities_toggle">
                            <i class="ki-duotone ki-chart-simple fs-2 fs-lg-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>				</div>
                        <!--end::drawer toggle-->
                    </div>
                    <!--end::Activities-->    
        
                    <!--begin::Theme mode-->
                    <div class="d-flex align-items-center mb-3">
                        
        <!--begin::Menu toggle-->
        <a href="#" class="btn btn-icon btn-custom" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
            <i class="ki-duotone ki-night-day theme-light-show fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>    <i class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span class="path2"></span></i></a>
        <!--begin::Menu toggle-->
        
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
            <!--begin::Menu item-->
            <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                    <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i>            </span>
                    <span class="menu-title">
                        Light
                    </span>
                </a>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                    <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span class="path2"></span></i>            </span>
                    <span class="menu-title">
                        Dark
                    </span>
                </a>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                    <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>            </span>
                    <span class="menu-title">
                        System
                    </span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
        
                    </div>
                    <!--end::Theme mode-->
                
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-40px" 
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"				
                        data-kt-menu-overflow="true"
                        data-kt-menu-placement="top-start"		
                        >
                            <img src="assets/media/avatars/300-1.jpg" alt="image"/>
                        </div>
        
                        
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="assets/media/avatars/300-1.jpg"/>
                    </div>
                    <!--end::Avatar-->
        
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            Max Smith                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                        </div>
        
                        <a href="#" class="fw-semibold text-muted text-hover-success fs-7">
                            max@kt.com                </a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="account/overview.html" class="menu-link px-5">
                    My Profile
                </a>
            </div>
            <!--end::Menu item-->
            
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="apps/projects/list.html" class="menu-link px-5">
                    <span class="menu-text">My Projects</span>
                    <span class="menu-badge">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                    </span>
                </a>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title">My Subscription</span>
                    <span class="menu-arrow"></span>
                </a>
        
                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">
                            Referrals
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">
                            Billing
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->            
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-5">
                            Payments
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->            
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link d-flex flex-stack px-5">
                            Statements
        
                            <span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
                                <i class="ki-duotone ki-information-5 fs-5"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    </span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    
                    <!--begin::Menu separator-->
                    <div class="separator my-2"></div>
                    <!--end::Menu separator-->
        
                    <!--begin::Menu item-->            
                    <div class="menu-item px-3">
                        <div class="menu-content px-3">
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications"/>
                                <span class="form-check-label text-muted fs-7">
                                    Notifications
                                </span>
                            </label>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu sub-->
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">
                    My Statements
                </a>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
        
            
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                    <span class="menu-title position-relative">
                        Language 
        
                        <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                            English <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt=""/>
                        </span>
                    </span>
                </a>
        
                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="account/settings.html" class="menu-link d-flex px-5 active">
                            <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="assets/media/flags/united-states.svg" alt=""/>
                            </span>
                            English
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="account/settings.html" class="menu-link d-flex px-5">
                            <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="assets/media/flags/spain.svg" alt=""/>
                            </span>
                            Spanish
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="account/settings.html" class="menu-link d-flex px-5">
                            <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="assets/media/flags/germany.svg" alt=""/>
                            </span>
                            German
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="account/settings.html" class="menu-link d-flex px-5">
                            <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="assets/media/flags/japan.svg" alt=""/>
                            </span>
                            Japanese
                        </a>
                    </div>
                    <!--end::Menu item-->
        
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="account/settings.html" class="menu-link d-flex px-5">
                            <span class="symbol symbol-20px me-4">
                                <img class="rounded-1" src="assets/media/flags/france.svg" alt=""/>
                            </span>
                            French
                        </a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu sub-->
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <a href="account/settings.html" class="menu-link px-5">
                    Account Settings
                </a>
            </div>
            <!--end::Menu item-->
        
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="authentication/sign-in/basic.html" class="menu-link px-5">
                    Sign Out
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Primary-->	 
        
                    <!--begin::Secondary-->
                <div class="aside-secondary d-flex flex-row-fluid">
                    <!--begin::Workspace-->
                    <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
                        <div class="d-flex h-100 flex-column">
            <!--begin::Wrapper-->
            <div class="flex-column-fluid hover-scroll-y"
                data-kt-scroll="true"     
                data-kt-scroll-activate="true"
                data-kt-scroll-height="auto"    
                data-kt-scroll-wrappers="#kt_aside_wordspace"
                data-kt-scroll-dependencies="#kt_aside_secondary_footer"
                data-kt-scroll-offset="0px">
        
                <!--begin::Tab content-->
                <div class="tab-content">
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade active show" id="kt_aside_nav_tab_projects" role="tabpanel">
                         
        <!--begin::Wrapper-->
        <div class="m-0">
            <!--begin::Toolbar-->
            <div class="d-flex mb-10">
                
        <!--begin::Search-->
        <div 
            id="kt_header_search" 
            class="header-search d-flex align-items-center w-100 w-lg-300px"
            
            data-kt-search-keypress="true"
            data-kt-search-min-length="2"
            data-kt-search-enter="enter"     
            data-kt-search-layout="menu"
            data-kt-search-responsive="false"
            
            data-kt-menu-trigger="auto" 
            data-kt-menu-permanent="true" 
            data-kt-menu-placement="bottom-start"
        
            
                >
            
                    <!--begin::Tablet and mobile search toggle-->
                <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                    <div class="d-flex ">
                                            <i class="ki-duotone ki-magnifier fs-1 "><span class="path1"></span><span class="path2"></span></i>                            </div>
                </div>
                <!--end::Tablet and mobile search toggle-->
            
            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
        <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">	
            <!--begin::Hidden input(Added to disable form autocomplete)-->
            <input type="hidden"/>
            <!--end::Hidden input-->
        
            <!--begin::Icon-->
            <i class="ki-duotone ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"><span class="path1"></span><span class="path2"></span></i>    <!--end::Icon-->
        
            <!--begin::Input-->
            <input type="text" class="search-input form-control form-control-solid  ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input"/>
            <!--end::Input-->
        
            <!--begin::Spinner-->
            <span class="search-spinner  position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
            </span>
            <!--end::Spinner-->
        
            <!--begin::Reset-->
            <span class="search-reset  btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span class="path2"></span></i>    </span>
            <!--end::Reset-->
        </form>
        <!--end::Form-->
            <!--begin::Menu-->
            <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
                <!--begin::Wrapper-->
                <div data-kt-search-element="wrapper">
                    <!--begin::Recently viewed-->
        <div data-kt-search-element="results" class="d-none">
            <!--begin::Items-->
            <div class="scroll-y mh-200px mh-lg-350px">
                            <!--begin::Category title-->
                    <h3 class="fs-5 text-muted m-0  pb-5" data-kt-search-element="category-title">
                        Users            </h3>
                    <!--end::Category title-->
        
                                    
                        
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <img src="assets/media/avatars/300-6.jpg" alt=""/>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Karina Clark</span>
                                    <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                                                    
                        
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <img src="assets/media/avatars/300-2.jpg" alt=""/>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Olivia Bold</span>
                                    <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                                                    
                        
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <img src="assets/media/avatars/300-9.jpg" alt=""/>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Ana Clark</span>
                                    <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                                                    
                        
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <img src="assets/media/avatars/300-14.jpg" alt=""/>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Nick Pitola</span>
                                    <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                                                    
                        
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <img src="assets/media/avatars/300-11.jpg" alt=""/>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                    <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                                                        <!--begin::Category title-->
                    <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                        Customers            </h3>
                    <!--end::Category title-->
        
                                    
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <img class="w-20px h-20px" src="assets/media/svg/brand-logos/volicity-9.svg" alt=""/>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Company Rbranding</span>
                                    <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                                                    
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <img class="w-20px h-20px" src="assets/media/svg/brand-logos/tvit.svg" alt=""/>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Company Re-branding</span>
                                    <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                                                    
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <img class="w-20px h-20px" src="assets/media/svg/misc/infography.svg" alt=""/>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Business Analytics App</span>
                                    <span class="fs-7 fw-semibold text-muted">Administration</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                                                    
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <img class="w-20px h-20px" src="assets/media/svg/brand-logos/leaf.svg" alt=""/>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                    <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                                                    
                        
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <img class="w-20px h-20px" src="assets/media/svg/brand-logos/tower.svg" alt=""/>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                    <span class="fs-6 fw-semibold">Tower Group Website</span>
                                    <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                                                        <!--begin::Category title-->
                    <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
                        Projects            </h3>
                    <!--end::Category title-->
        
                                    
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <i class="ki-duotone ki-notepad fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                    <span class="fs-7 fw-semibold text-muted">#45670</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                        
                                                    
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <i class="ki-duotone ki-frame fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                    <span class="fs-7 fw-semibold text-muted">#45690</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                        
                                                    
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <i class="ki-duotone ki-message-text-2 fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
                                    <span class="fs-7 fw-semibold text-muted">#21090</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                        
                                                    
                                            <!--begin::Item-->
                            <a href="#" class="d-flex text-dark text-hover-success align-items-center mb-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px me-4">
                                    <span class="symbol-label bg-light">                             
                                        <i class="ki-duotone ki-profile-circle fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                          
                                    </span>
                                </div>
                                <!--end::Symbol-->
        
                                <!--begin::Title-->
                                <div class="d-flex flex-column">
                                    <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                    <span class="fs-7 fw-semibold text-muted">#34560</span>
                                </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Item-->
                        
                        
                                                </div>
            <!--end::Items-->
        </div>
        <!--end::Recently viewed-->
                    <!--begin::Recently viewed-->
        <div class="" data-kt-search-element="main">
            <!--begin::Heading-->
            <div class="d-flex flex-stack fw-semibold mb-4">
                <!--begin::Label-->
                <span class="text-muted fs-6 me-2">Recently Searched:</span>
                <!--end::Label-->
        
                            <!--begin::Toolbar-->
                    <div class="d-flex" data-kt-search-element="toolbar">
                        <!--begin::Preferences toggle-->
                        <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2 data-bs-toggle="tooltip" title="Show search preferences">
                            <i class="ki-duotone ki-setting-2 fs-2"><span class="path1"></span><span class="path2"></span></i>                </div>
                        <!--end::Preferences toggle-->
        
                        <!--begin::Advanced search toggle-->
                        <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1" data-bs-toggle="tooltip" title="Show more search options">
                            <i class="ki-duotone ki-down fs-2"></i>                </div>
                        <!--end::Advanced search toggle-->
                    </div>
                    <!--end::Toolbar-->
                    </div>
            <!--end::Heading-->
        
            <!--begin::Items-->
            <div class="scroll-y mh-200px mh-lg-325px">
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-laptop fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">BoomApp by Keenthemes</a>
                            <span class="fs-7 text-muted fw-semibold">#45789</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-chart-simple fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">"Kept API Project Meeting</a>
                            <span class="fs-7 text-muted fw-semibold">#84050</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-chart fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">"KPI Monitoring App Launch</a>
                            <span class="fs-7 text-muted fw-semibold">#84250</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-chart-line-down fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">Project Reference FAQ</a>
                            <span class="fs-7 text-muted fw-semibold">#67945</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-sms fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">"FitPro App Development</a>
                            <span class="fs-7 text-muted fw-semibold">#84250</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-bank fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">Shopix Mobile App</a>
                            <span class="fs-7 text-muted fw-semibold">#45690</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-4">
                            <span class="symbol-label bg-light">                             
                                <i class="ki-duotone ki-chart-line-down fs-2 text-primary"><span class="path1"></span><span class="path2"></span></i>                          
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="fs-6 text-gray-800 text-hover-success fw-semibold">"Landing UI Design" Launch</a>
                            <span class="fs-7 text-muted fw-semibold">#24005</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Item-->
                    </div>
            <!--end::Items-->
        </div>
        <!--end::Recently viewed-->
                    <!--begin::Empty-->
        <div data-kt-search-element="empty" class="text-center d-none">
            <!--begin::Icon-->
            <div class="pt-10 pb-10">
                <i class="ki-duotone ki-search-list fs-4x opacity-50"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>    </div>
            <!--end::Icon-->
        
            <!--begin::Message-->
            <div class="pb-15 fw-semibold">
                <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                <div class="text-muted fs-7">Please try again with a different query</div>
            </div>
            <!--end::Message-->
        </div>
        <!--end::Empty-->        </div>
                <!--end::Wrapper-->
        
                <!--begin::Preferences-->
        <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
            <!--begin::Heading-->
            <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
            <!--end::Heading-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query"/>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <!--begin::Radio group-->
                <div class="nav-group nav-group-fluid">       
                    <!--begin::Option-->     
                    <label>     
                        <input type="radio" class="btn-check" name="type" value="has" checked="checked"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
                            All
                        </span>
                    </label>
                    <!--end::Option-->
        
                    <!--begin::Option-->          
                    <label>  
                        <input type="radio" class="btn-check" name="type" value="users"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                            Users
                        </span>
                    </label>
                    <!--end::Option-->
        
                    <!--begin::Option-->        
                    <label>    
                        <input type="radio" class="btn-check" name="type" value="orders"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                            Orders
                        </span>
                    </label>
                    <!--end::Option-->
        
                    <!--begin::Option-->     
                    <label>       
                        <input type="radio" class="btn-check" name="type" value="projects"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                            Projects
                        </span>
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Radio group-->
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value=""/>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value=""/>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <!--begin::Radio group-->
                <div class="nav-group nav-group-fluid"> 
                    <!--begin::Option-->     
                    <label>     
                        <input type="radio" class="btn-check" name="attachment" value="has" checked="checked"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
                            Has attachment
                        </span>
                    </label>
                    <!--end::Option-->
        
                    <!--begin::Option-->          
                    <label>  
                        <input type="radio" class="btn-check" name="attachment" value="any"/>
                        <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
                            Any
                        </span>
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Radio group-->
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="mb-5">
                <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="date_period" class="form-select form-select-sm form-select-solid">
                    <option value="next">Within the next</option>
                    <option value="last">Within the last</option>
                    <option value="between">Between</option>
                    <option value="on">On</option>
                </select>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-6"> 
                    <input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value=""/>
                </div>
                <!--end::Col-->
        
                <!--begin::Col-->
                <div class="col-6"> 
                    <select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="Period" class="form-select form-select-sm form-select-solid">
                        <option value="days">Days</option>
                        <option value="weeks">Weeks</option>
                        <option value="months">Months</option>
                        <option value="years">Years</option>
                    </select>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        
            <!--begin::Actions-->
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
        
                <a href="pages/search/horizontal.html" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Preferences-->
                <!--begin::Preferences-->
        <form data-kt-search-element="preferences" class="pt-1 d-none">
            <!--begin::Heading-->
            <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
            <!--end::Heading-->
        
            <!--begin::Input group-->
            <div class="pb-4 border-bottom">
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                        Projects
                    </span>
        
                    <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                </label>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="py-4 border-bottom">
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                        Targets
                    </span>
                    <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                </label>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="py-4 border-bottom">
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                        Affiliate Programs
                    </span>
                    <input class="form-check-input" type="checkbox" value="1" />
                </label>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="py-4 border-bottom">
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                        Referrals
                    </span>
                    <input class="form-check-input" type="checkbox" value="1" checked="checked"/>
                </label>
            </div>
            <!--end::Input group-->
        
            <!--begin::Input group-->
            <div class="py-4 border-bottom">
                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                    <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
                        Users
                    </span>
                    <input class="form-check-input" type="checkbox" value="1" />
                </label>
            </div>
            <!--end::Input group-->
        
            <!--begin::Actions-->
            <div class="d-flex justify-content-end pt-7">
                <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Preferences-->    </div>
            <!--end::Menu-->
        </div>
        <!--end::Search-->
                <!--begin::Filter-->
                <div class="flex-shrink-0 ms-2">
                    <!--begin::Menu toggle-->
                    <button type="button" class="btn btn-icon btn-bg-light btn-active-icon-primary btn-color-gray-400" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i>            </button>
                    <!--end::Menu toggle-->
        
                    <!--begin::Menu-->
                    
        
        <!--begin::Menu 1-->
        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_65e190e989554">
            <!--begin::Header-->
            <div class="px-7 py-5">
                <div class="fs-5 text-dark fw-bold">Filter Options</div>
            </div>
            <!--end::Header-->
        
            <!--begin::Menu separator-->
            <div class="separator border-gray-200"></div>
            <!--end::Menu separator-->
            
        
            <!--begin::Form-->
            <div class="px-7 py-5">
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label fw-semibold">Status:</label>
                    <!--end::Label-->
        
                    <!--begin::Input-->
                    <div>
                        <select class="form-select form-select-solid" multiple data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_65e190e989554" data-allow-clear="true">
                            <option></option>
                            <option value="1">Approved</option>
                            <option value="2">Pending</option>
                            <option value="2">In Process</option>
                            <option value="2">Rejected</option>
                        </select>
                    </div>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
        
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label fw-semibold">Member Type:</label>
                    <!--end::Label-->
        
                    <!--begin::Options-->
                    <div class="d-flex">
                        <!--begin::Options-->    
                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                            <input class="form-check-input" type="checkbox" value="1"/>
                            <span class="form-check-label">
                                Author
                            </span>
                        </label>
                        <!--end::Options-->    
        
                        <!--begin::Options-->    
                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="2" checked="checked"/>
                            <span class="form-check-label">
                                Customer
                            </span>
                        </label>
                        <!--end::Options-->    
                    </div>        
                    <!--end::Options-->    
                </div>
                <!--end::Input group-->
        
                <!--begin::Input group-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <label class="form-label fw-semibold">Notifications:</label>
                    <!--end::Label-->
        
                    <!--begin::Switch-->
                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" name="notifications" checked />
                        <label class="form-check-label">
                            Enabled
                        </label>
                    </div>
                    <!--end::Switch-->
                </div>
                <!--end::Input group-->
        
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
        
                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Menu 1-->            <!--end::Menu-->
                </div>
                <!--end::Filter-->
            </div>
            <!--end::Toolbar-->
         
            <!--begin::Projects-->
            <div class="m-0">
                <!--begin::Heading-->
                <h1 class="text-gray-800 fw-semibold mb-6 mx-5">Projects</h1>
                <!--end::Heading-->
        
                <!--begin::Items-->
                <div class="mb-10">
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/bebo.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Briviba SaaS</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By James</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/vimeo.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Vine Quick Reports</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By Andres</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/kickstarter.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">KC Account CRM</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By Keenthemes</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/beats-electronics.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Baloon SaaS</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By SIA Team</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/rgb.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">RGB Cloud System</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By Andrei</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/disqus.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Disqus Forum</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By Disqus Inc.</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                                <!--begin::Item-->    
                    <a href="#" class="custom-list d-flex align-items-center px-5 py-4">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-40px me-5">
                            <span class="symbol-label">
                                <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt=""/>                
                            </span>
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Description-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Proove Quick CRM</h5>
                            <!--end::Title-->
        
                            <!--begin::Link-->
                            <span class="text-gray-400 fw-semibold">By Proove Limited</span>
                            <!--end::Link-->
                        </div>
                        <!--begin::Description-->
                    </a>   
                    <!--end::Item-->   
                            </div>       
                <!--end::Items-->
            </div>
            <!--end::Projects--> 
        </div>
        <!--end::Wrapper-->  
        
                     </div>
                    <!--end::Tab pane-->
        
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade " id="kt_aside_nav_tab_menu" role="tabpanel">
                        <!--begin::Menu-->
        <div class="menu menu-column menu-sub-indention menu-rounded menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 px-2 my-5 my-lg-0" 
            id="kt_aside_menu" 
            data-kt-menu="true">
        
            <div id="kt_aside_menu_wrapper">
                <!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu content--><div  class="menu-content pb-2" ><span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span></div><!--end:Menu content--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item here show menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span  class="menu-title" >Dashboard</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link active"  href="index-2.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Projects</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >eCommerce<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Logistics<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Marketing<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Store Analytics<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Finance Performance<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-gift fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span  class="menu-title" >Pages</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="pages/about.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >About Us</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="pages/invoice.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Invoice</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="pages/faq.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >FAQ</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Wizard<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Pricing<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-profile-circle fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span  class="menu-title" >Account</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="account/overview.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Overview</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="account/settings.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Settings</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Security<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Activity<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Billing<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Statements<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Referrals<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >API Keys<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Logs<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-fingerprint-scanning fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i></span><span  class="menu-title" >Authentication<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Sign In</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion menu-active-bg" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="authentication/sign-in/basic.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Basic</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="authentication/sign-in/password-reset.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Password Reset</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="authentication/sign-in/new-password.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >New Password</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Sign Up</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion menu-active-bg" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="authentication/sign-up/basic.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Basic</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Multi-steps<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Free Trial<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Coming Soon<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Welcome Message<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Verify Email<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Password Confirmation<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Account Deactivation<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Error 404<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Error 500<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Email Templates</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion menu-active-bg" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" target="_blank" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Verify Email<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" target="_blank" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Account Invitation<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" target="_blank" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Password Reset<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" target="_blank" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Password Changed<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-rocket fs-2"><span class="path1"></span><span class="path2"></span></i></span><span  class="menu-title" >Projects<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/projects/list.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >My Projects</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >View Project<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Targets<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Budget<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Users<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Files<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Activity<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Settings<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-handcart fs-2"></i></span><span  class="menu-title" >eCommerce<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Catalog</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/ecommerce/catalog/products.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Products</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Categories<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Add Product<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Edit Product<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Add Category<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Edit Category<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Sales</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Orders Listing<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Order Details<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Add Order<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Edit Order<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Customers</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/ecommerce/customers/listing.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Customer Listing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Customer Details<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Reports</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Products Viewed<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Sales<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Returns<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Customer Orders<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Shipping<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Settings<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-shield-tick fs-2"><span class="path1"></span><span class="path2"></span></i></span><span  class="menu-title" >User Management<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Users</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/user-management/users/list.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Users List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >View User<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Roles</span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Roles List<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >View Role<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Permissions<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-briefcase fs-2"><span class="path1"></span><span class="path2"></span></i></span><span  class="menu-title" >File Manager<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Folders<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Files<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Blank Directory<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Settings<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-basket fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span  class="menu-title" >Subscriptions<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/subscriptions/getting-started.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Getting Started</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="apps/subscriptions/list.html" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Subscription List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Add Subscription<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >View Subscription<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  data-kt-menu-trigger="click"  class="menu-item menu-accordion mb-1" ><!--begin:Menu link--><span class="menu-link" ><span  class="menu-icon" ><i class="ki-duotone ki-message-text-2 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span  class="menu-title" >Chat<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span><span  class="menu-arrow" ></span></span><!--end:Menu link--><!--begin:Menu sub--><div  class="menu-sub menu-sub-accordion" ><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Private Chat<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Group Chat<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span><span  class="menu-title" >Drawer Chat<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu link--><a class="menu-link"  href="#" data-kt-page="pro" ><span  class="menu-icon" ><i class="ki-duotone ki-calendar-8 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i></span><span  class="menu-title" >Calendar<span class="badge badge-pro badge-light-danger fw-semibold fs-8 px-2 py-1 ms-1" data-bs-toggle="tooltip" title="Upgrade to Pro to get this">Pro</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item" ><!--begin:Menu content--><div  class="menu-content" ><div class="separator mx-1 my-4"></div></div><!--end:Menu content--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item mb-1" ><!--begin:Menu link--><a class="menu-link"  href="https://preview.keenthemes.com/html/seven-html-pro/docs/base/utilities" target="_blank" title="Check out over 200 in-house components, plugins and ready for use solutions" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-icon" ><i class="ki-duotone ki-element-8 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span  class="menu-title" >Components</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item mb-1" ><!--begin:Menu link--><a class="menu-link"  href="layout-builder.html" title="Build your layout, preview and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" ><span  class="menu-icon" ><i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i></span><span  class="menu-title" >Layout Builder</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div  class="menu-item mb-1" ><!--begin:Menu link--><a class="menu-link"  href="https://preview.keenthemes.com/html/seven-html-pro/docs/getting-started/changelog" target="_blank" ><span  class="menu-icon" ><i class="ki-duotone ki-code fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span  class="menu-title" >Changelog v1.1.3</span></a><!--end:Menu link--></div><!--end:Menu item-->    </div>
        </div>
        <!--end::Menu-->            </div>
                    <!--end::Tab pane-->
        
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_aside_nav_tab_subscription" role="tabpanel">
                        <!--begin::Subscription-->
        <div class="mx-5">                   
            <!--begin::Container-->
            <div class="text-center pt-10 mb-20">
                <!--begin::Title-->
                <h2 class="fs-2 fw-bold mb-7">My Subscription</h2>
                <!--end::Title-->
        
                <!--begin::Description-->
                <p class="text-gray-400 fs-6 fw-semibold mb-10">
                    There are no customers added yet.<br/>
                    Kickstart your CRM by adding a your first customer
                </p>
                <!--end::Description-->
        
                <!--begin::Action-->
                <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                <!--end::Action-->
            </div>
            <!--end::Container-->
        
            <!--begin::Illustration-->
            <div class="text-center px-4">
                <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sigma-1/1.png"/>
            </div>
            <!--end::Illustration-->              
        </div>
        <!--end::Subscription-->                      </div>
                    <!--end::Tab pane-->   
                    
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_aside_nav_tab_tasks" role="tabpanel">
                        
        <!--begin::Tasks-->
        <div class="mx-5">
            <!--begin::Header-->               
            <h3 class="fw-bold text-dark mb-10 mx-0">
                Tasks Overview                   
            </h3>                  
            <!--end::Header-->
        
            <!--begin::Body-->
            <div class="mb-12">
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-success">
                                <i class="ki-duotone ki-abstract-26 fs-2x text-success"><span class="path1"></span><span class="path2"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">Project Briefing</a>
        
                            <span class="text-muted fw-semibold">Project Manager</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-warning">
                                <i class="ki-duotone ki-pencil fs-2x text-warning"><span class="path1"></span><span class="path2"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">Concept Design</a>
        
                            <span class="text-muted fw-semibold">Art Director</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-primary">
                                <i class="ki-duotone ki-message-text-2 fs-2x text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">Functional Logics</a>
        
                            <span class="text-muted fw-semibold">Lead Developer</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-danger">
                                <i class="ki-duotone ki-disconnect fs-2x text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">Development</a>
        
                            <span class="text-muted fw-semibold">DevOps</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-info">
                                <i class="ki-duotone ki-security-user fs-2x text-info"><span class="path1"></span><span class="path2"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">Testing</a>
        
                            <span class="text-muted fw-semibold">QA Managers</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-success">
                                <i class="ki-duotone ki-briefcaseFile-Upload.svg fs-2x text-success"></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">HTML, CSS Coding</a>
        
                            <span class="text-muted fw-semibold">Art Director</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center ">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-50px me-5">
                            <span class="symbol-label bg-light-danger">
                                <i class="ki-duotone ki-chart-pie-4 fs-2x text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                    </span>                
                        </div>
                        <!--end::Symbol-->
        
                        <!--begin::Text-->
                        <div class="d-flex flex-column">
                            <a href="pages/profile/overview.html" class="text-gray-800 text-hover-success fs-6 fw-semibold">ReactJS Developer</a>
        
                            <span class="text-muted fw-semibold">Web, UI/UX Design</span>
                        </div>
                        <!--end::Text-->
                    </div>
                    <!--end::Item-->
                    
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tasks-->            </div>
                    <!--end::Tab pane-->    
        
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_aside_nav_tab_notifications" role="tabpanel">
                        
        <!--begin::Notifications-->
        <div class="mx-5">
            <!--begin::Header-->                
            <h3 class="fw-bold text-dark mb-10 mx-0">Notifications</h3>                    
            <!--end::Header-->
        
            <!--begin::Body-->
            <div class="mb-12">
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon text-warning me-5">
                            <i class="ki-duotone ki-abstract-26 fs-1 text-warning"><span class="path1"></span><span class="path2"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">Project Launch</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 29 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-warning py-1">+28%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon text-success me-5">
                            <i class="ki-duotone ki-file-added fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">Navigation App</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 2 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-success py-1">+50%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon text-danger me-5">
                            <i class="ki-duotone ki-message-text-2 fs-1 text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">Client Meeting</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 5 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-danger py-1">-27%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon text-info me-5">
                            <i class="ki-duotone ki-briefcase fs-1 text-info"><span class="path1"></span><span class="path2"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">Real Estate App</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 8 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-info py-1">+21%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-primary rounded p-5 mb-7">
                        <!--begin::Icon-->
                        <span class="svg-icon text-primary me-5">
                            <i class="ki-duotone ki-arrows-loop fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">B&Q Mobile App</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 6 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-primary py-1">+12%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center bg-light-danger rounded p-5 ">
                        <!--begin::Icon-->
                        <span class="svg-icon text-danger me-5">
                            <i class="ki-duotone ki-pencil fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>                                    
                        </span>
                        <!--end::Icon-->
        
                        <!--begin::Title-->
                        <div class="flex-grow-1 me-2">
                            <a href="widgets/lists.html" class="fw-bold text-gray-800 text-hover-success fs-6">Nexa - CRM App</a>
                            
                            <span class="text-muted fw-semibold d-block">Due in 4 Days</span>
                        </div>
                        <!--end::Title-->
        
                        <!--begin::Lable-->
                        <span class="fw-bold text-danger py-1">+34%</span>
                        <!--end::Lable-->
                    </div>
                    <!--end::Item-->
                        
            </div>
            <!--end::Body-->
        </div>
        <!--end::Notifications-->              </div>
                    <!--end::Tab pane--> 
        
                    <!--begin::Tab pane-->
                    <div class="tab-pane fade" id="kt_aside_nav_tab_authors" role="tabpanel">            
                                        
        <!--begin::Authors-->
        <div class="mx-5">
            <!--begin::Header-->               
            <h3 class="fw-bold text-dark mx-0 mb-10">Authors</h3>                    
            <!--end::Header-->
        
            <!--begin::Body-->
            <div class="mb-12">
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-6.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Emma Smith</a>
                            
                            <span class="text-muted d-block fw-semibold">Project Manager</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-5.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Sean Bean</a>
                            
                            <span class="text-muted d-block fw-semibold">PHP, SQLite, Artisan CLI</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-11.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Brian Cox</a>
                            
                            <span class="text-muted d-block fw-semibold">HTML5, jQuery, CSS3</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-23.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Dan Wilson</a>
                            
                            <span class="text-muted d-block fw-semibold">MangoDB, Java</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-10.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Natali Trump</a>
                            
                            <span class="text-muted d-block fw-semibold">NET, Oracle, MySQL</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center mb-7">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-9.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Francis Mitcham</a>
                            
                            <span class="text-muted d-block fw-semibold">React, Vue</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                            <!--begin::Item-->
                    <div class="d-flex align-items-center ">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="assets/media/avatars/300-12.jpg" class="" alt=""/> 
                        </div>
                        <!--end::Avatar-->
        
                        <!--begin::Text-->
                        <div class="flex-grow-1">
                            <a href="pages/projects/users.html" class="text-dark fw-bold text-hover-success fs-6">Jessie Clarcson</a>
                            
                            <span class="text-muted d-block fw-semibold">Angular, React</span>                   
                        </div>
                        <!--end::Text-->                
                    </div>
                    <!--end::Item-->
                       
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authors-->            </div>
                    <!--end::Tab pane--> 
                </div>
                <!--end::Tab content-->
            </div>
            <!--end::Wrapper-->
        
            <!--begin::Footer-->
            <div class="flex-column-auto pt-10 px-5" id="kt_aside_secondary_footer">
                <a href="https://preview.keenthemes.com/html/seven-html-pro/docs" class="btn btn-bg-light btn-color-gray-600 btn-flex btn-active-color-primary flex-center w-100" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-trigger="hover" data-bs-offset="0,5" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
                    <span class="btn-label">
                        Docs & Components
                    </span>
                    <i class="ki-duotone ki-document btn-icon fs-4 ms-2"><span class="path1"></span><span class="path2"></span></i>        </a>
            </div>
            <!--end::Footer-->
        </div>			</div>
                    <!--end::Workspace-->
                </div>
                <!--end::Secondary-->
        
                            <!--begin::Aside Toggle-->
                    <button class="btn btn-sm btn-icon bg-body btn-color-gray-600 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex " 			
                        data-kt-toggle="true" 
                        data-kt-toggle-state="active" 
                        data-kt-toggle-target="body" 
                        data-kt-toggle-name="aside-minimize"
                        
                        style="margin-bottom: 1.35rem">
                        
                        <i class="ki-duotone ki-arrow-left fs-2 rotate-180"><span class="path1"></span><span class="path2"></span></i>			</button>
                    <!--end::Aside Toggle-->
                    </div> 
        <!--end::Aside-->
        
         
        