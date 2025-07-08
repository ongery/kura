<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- <html lang="en" > --}}


    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <head>
        <title>KURA | Risk Governance</title>
        <meta charset="utf-8"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="" />
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content="" />
        <link rel="canonical" href=""/>
        <link rel="shortcut icon" href="{{ URL::asset('assets/media/logos/faviconn.ico')}}"/>
        {{-- <link rel="shortcut icon" href="{{ URL::asset('assets/media/logos/favicon.ico')}}"/> --}}

        
        {{-- {{ asset('js/plugins.bundle.js') }} --}}
        {{-- {{ URL::asset('css/fullcalendar.bundle.css') }} --}}
        {{-- <link rel="stylesheet" href="/css/custom.css"> --}}

        

        <!--begin::Fonts(mandatory for all pages)-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
        <!--end::Fonts-->

        <!--begin::Vendor Stylesheets(used for this page only)-->
            <link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ URL::asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <!--end::Vendor Stylesheets-->

        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
            <link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ URL::asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ URL::asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
        <!--end::Global Stylesheets Bundle-->
            
        
        {{-- <link rel="stylesheet" href="/css/app.css"> --}}


        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>

    </head>
    <!--end::Head-->

    <!--begin::Body--> 
    <body  id="kt_body"  class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled" >
        <?php // Start the session
            session_start(); ?>

        {{-- Root(View) : VueApp --}}
        <div  id="app">
            
            <!--begin::Theme mode setup on page load-->
                <script>
                    var defaultThemeMode = "light";
                    var themeMode;

                    if ( document.documentElement ) {
                        if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                        } else {
                            if ( localStorage.getItem("data-bs-theme") !== null ) {
                                themeMode = localStorage.getItem("data-bs-theme");
                            } else {
                                themeMode = defaultThemeMode;
                            }			
                        }

                        if (themeMode === "system") {
                            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                        }

                        document.documentElement.setAttribute("data-bs-theme", themeMode);
                    }            
                </script>
            <!--end::Theme mode setup on page load-->   
            
            <!--begin::Main-->

                <!--begin::Root-->
                <div class="d-flex flex-column flex-root">

                    <!--begin::Page-->
                    <div class="page d-flex flex-row flex-column-fluid">


                        {{-- SET : ASIDE (best aside) --}}

                        @include('layouts.best.sidebar.index')
                        {{-- @include('layouts.best.aside') --}}
                        {{-- @include('layouts.components.sidebar.index') --}}

                        <!--begin::Wrapper-->
                        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">


                            {{-- SET : HEADER (best header) --}}
                            {{-- @include('layouts.best.header') --}}


                            {{-- SET : CONTENT (best content) --}}
                            {{-- @include('layouts.best.content') --}}

                        
                                
                                {{-- <main class="py-4"> --}}
                                    {{-- @yield('content') --}}
                                {{-- </main> --}}

                                <main class="py-4">
                                    <div class="container-fluid">
                                        <router-view></router-view>
                                        <vue-progress-bar></vue-progress-bar>
                                    </div>        
                                </main>

                                
                                <!--begin::Scrolltop-->
                                <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                                    <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
                                <!--end::Scrolltop-->




                            {{-- SET : FOOTER (projects : footer) --}}
                            {{-- @include('layouts.best.footer') --}}



                        </div>
                        <!--end::Wrapper-->




                    </div>
                    <!--end::Page-->





                </div>
                <!--end::Root-->

        
                <!--begin::Drawers-->


                    {{-- SET : Actitiviy Log Drawer (projects : drawers) --}}
                    @include('layouts.best.drawers.activities')


                    {{-- SET : Chat Drawer (projects : Chat) --}}
                    @include('layouts.best.drawers.chat')



                    {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
                    @include('layouts.best.drawers.shoppingCart')


                <!--end::Drawers-->

            <!--end::Main-->


            <!--begin::Engage drawers-->

                {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
                @include('layouts.best.drawers.engage.explore')

                {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
                @include('layouts.best.drawers.engage.help')

            <!--end::Engage drawers-->


            {{-- SET : Engage Toolbars  --}}
            {{-- @include('layouts.best.engageToolbars') --}}


            <!--begin::Scrolltop-->
            {{-- <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div> --}}
            <!--end::Scrolltop-->


            <!--begin::Modals-->



                {{-- SET : upgradePlan  Modal (projects : upgradePlan) --}}
                @include('layouts.best.modals.upgradePlan')



                {{-- SET : createAccount Cart  Modal (projects : createAccount) --}}
                @include('layouts.best.modals.createAccount')


                
                {{-- SET : campaign  Modal (projects : campaign) --}}
                @include('layouts.best.modals.campaign')



                
                {{-- SET : viewUsers  Modal (projects : viewUsers) --}}
                @include('layouts.best.modals.viewUsers')



                
                {{-- SET : createProject  Modal (projects : createProject) --}}
                @include('layouts.best.modals.createProject')



                
                {{-- SET : createApp  Modal (projects : createApp) --}}
                @include('layouts.best.modals.createApp')



                {{-- SET : newAddress  Modal (projects : newAddress) --}}
                @include('layouts.best.modals.newAddress')


                {{-- SET : usersSearch  Modal (projects : usersSearch) --}}
                @include('layouts.best.modals.usersSearch')


                {{-- SET : inviteFriends  Modal (projects : inviteFriends) --}}
                @include('layouts.best.modals.inviteFriends')


            <!--end::Modals-->
            
            <!--begin::Javascript-->

    
                {{-- {{ asset('js/plugins.bundle.js') }} --}}
                {{-- {{ URL::asset('css/fullcalendar.bundle.css') }} --}}

                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                        <script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
                        <script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>

                        <script src="{{ asset('assets/js/app.js')}}"></script>
                <!--end::Global Javascript Bundle-->

                <!--begin::Vendors Javascript(used for this page only)-->
                    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
                    <script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
                    {{-- <script src="../../cdn.amcharts.com/lib/5/index.js"></script>
                    <script src="../../cdn.amcharts.com/lib/5/xy.js"></script>
                    <script src="../../cdn.amcharts.com/lib/5/percent.js"></script>
                    <script src="../../cdn.amcharts.com/lib/5/radar.js"></script>
                    <script src="../../cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}
                <!--end::Vendors Javascript-->

                <!--begin::Custom Javascript(used for this page only)-->
                    {{-- <script src="{{ asset('assets/js/widgets.bundle.js')}}"></script> --}}

                    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-account.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/type.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/budget.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/settings.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/team.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/targets.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/files.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/complete.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-project/main.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/new-address.js')}}"></script>
                    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
                <!--end::Custom Javascript-->

                    
                <script src={{ URL::asset('/js/app.js') }}></script>
            
                @auth
                    <script>
                        window.user = @json(auth()->user())
                        window.API_URL = @json(env('APP_URL'));
                    </script>
                @endauth

                {{-- //Reload Stuff --}}
                {{-- @env('local')
                    <script src="http://localhost:35729/livereload.js"></script>
                @endenv --}}

            <!--end::Javascript-->

        </div>
        <!-- End: Root: (View) : VueApp -->
            
        <script>
            $(document).ready(function () {
                var authToken = @json(Session::get('authToken'));
                var loggedInUserId = @json(Session::get('loggedInUserId'));
                var loggedInFullName = @json(Session::get('loggedInFullName'));

                if (authToken) { localStorage.setItem('authToken', authToken); }
                if (loggedInUserId) { 
                    localStorage.setItem('loggedInUserId', loggedInUserId); 
                    localStorage.setItem('loggedInFullName', loggedInFullName);
                }
            });
            if(document.documentElement){

                const asideToogleBtn = document.querySelector('#kt_aside_toggle');
                asideToogleBtn.display = 'none';

                const aside = document.querySelector('#kt_aside');


                if(asideToogleBtn){
                    var toggle = KTToggle.getInstance(aside);
                    
                    var drawerName = asideToogleBtn.getAttribute('data-kt-drawer');


                    asideToogleBtn.display = 'none';

                    if(drawerName){
                        
                        asideToogleBtn.display = 'none';

                    }

                }
            }

        </script>
    </body>
    <!--end::Body-->

</html>
