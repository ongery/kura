 <!--begin::Primary-->
 <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
    <!--begin::Logo-->
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">		
        <a href="#">
            {{-- <img alt="Logo" src="{{ asset('assets/media/logos/logo-default.svg')}}" class="h-50px"/> --}}
            <img alt="Logo" src="{{ asset('img/zebra.png')}}" />
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
                       <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="white" />
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="white" />
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="white" />
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="white" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                                    
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Menu">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_projects">
                        {{-- #kt_aside_nav_tab_menu --}}
                        <span class="menu-icon" data-kt-element="icon">
                            <img src="{{ asset('img/pie-chart_nav.png')}}" style="height:25px; width:25px">          
                        </span>
{{--                         
                        <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z" fill="white" />
                                    <path opacity="0.3" d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z" fill="white" />
                                </svg>
                            </span>
                        <!--end::Svg Icon--> --}}
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                                    
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Subscription">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_subscription">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="8" y="9" width="3" height="10" rx="1.5" fill="white" />
                                <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="white" />
                                <rect x="18" y="11" width="3" height="8" rx="1.5" fill="white" />
                                <rect x="3" y="13" width="3" height="6" rx="1.5" fill="white" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                                    
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Tasks">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_tasks">
                         <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="white" />
                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="white" />
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                                    
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Notifications">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_notifications">
                         <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="white" />
                                    <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="white" />
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                                    
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Authors">
                    <!--begin::Nav link-->
                    <a class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_authors">
                        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="white" />
                                    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="white" />
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->            
                
            </ul>     
            <!--end::Tabs-->

        </div>
        <!--end::Wrapper-->


    </div>
    <!--end::Nav-->



    <!--begin::Footer (NAV)-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
       
    
      
        {{-- SET CHAT-MENU : (best : chatMenu) --}}
        @include('layouts.best.menu.nav.chatMenu')




        {{-- SET NOTIFICATIONS-MENU : (best : notificationsMenu) --}}
        @include('layouts.best.menu.nav.notificationsMenu')


        

        {{-- SET TOGGLE-MENU-ITEM : (best : toggleMenuItem) --}}
        @include('layouts.best.menu.nav.toggleMenuItem')


        {{-- SET THEME-MODE-MENU : (best : themeModeMenu) --}}
        @include('layouts.best.menu.nav.themeModeMenu')


        {{-- SET USER-MENU : (best : userMenu) --}}
        @include('layouts.best.menu.nav.userMenu')




    </div>
    <!--end::Footer-->





</div>
<!--end::Primary-->	 

