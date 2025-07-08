<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto" >
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10" id="kt_aside_logo">		
        <a href="javascript:void(0)">
            <img alt="Logo" src="{{ asset('img/KURAlogo.png')}}" class="h-50px" />
        </a>
    </div>

    <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
        <div class="mb-10"
            data-kt-scroll="true"     
            data-kt-scroll-activate="{default: false, lg: true}"
            data-kt-scroll-height="auto"    
            data-kt-scroll-wrappers="#kt_aside_nav"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" 
            data-kt-scroll-offset="0px"
        >   
            <ul class="nav flex-column">
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"  data-bs-placement="right" data-bs-dismiss="click" title="Dashboard">
                    <a id="navDashboard" class="nav-link btn btn-custom btn-icon active" data-bs-toggle="tab"  data-bs-toggle="tab"  href="#kt_aside_nav_tab_dashboard" >
                        <span class="menu-icon" data-kt-element="icon">                        
                            <img src="{{ asset('img/home.png')}}" style="height:24px; width:24px">          
                        </span>
                    </a>
                </li>

                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Reports Module">
                    <a id="navReport" class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_report" >
                        <span class="menu-icon" data-kt-element="icon">
                            <img src="{{ asset('img/pie-chart_nav.png')}}" style="height:24px; width:24px">          
                        </span>
                    </a>
                </li>    

                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Risk Management Module">
                    <a id="navRisk" class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_risk">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                                <rect x="8" y="9" width="3" height="10" rx="1.5" fill="white" />
                                <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="white" />
                                <rect x="18" y="11" width="3" height="8" rx="1.5" fill="#258c37" />
                                <rect x="3" y="13" width="3" height="6" rx="1.5" fill="white" />
                            </svg>
                        </span>
                    </a>
                </li>

                {{-- <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right" data-bs-dismiss="click" title="Corruption Risk Mgt Module">
                    <a id="navCorruption" class="nav-link btn btn-custom btn-icon " data-bs-toggle="tab"  href="#kt_aside_nav_tab_corruption" >
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.7" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="#258c37" />
                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="white" />
                            </svg>
                        </span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>

    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
        @include('layouts.best.menu.nav.userMenu')
        @include('layouts.best.menu.nav.chatMenu')
        @include('layouts.best.menu.nav.themeModeMenu')
    </div>
</div>

<script>

    function setSession(navItem) {
            var identifier = 'report';
            $.ajax({
                url: '/saveToSession', // Replace with your server-side script
                method: 'POST',
                data: { navItem: identifier },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
                },
                success: function (response) {

                    console.log('@(setSession)'+response.message);
                    console.log('(setSession) Session set successfully');
                },
                error: function (xhr, status, error) {
                    console.error('(setSession) Failed to set session', status, error);
                }
            });

        }

</script>