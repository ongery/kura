<!DOCTYPE html>
<!--
Author: Clickstart Studios
Product Name: ZebraTop ERM 
Product Version: 1.0.8
Website: http://www.zebratop.co.ke
Contact: clickstart@hotmail.com
-->

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--begin::Head-->

    <head>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

        <title>{{ config('app.name', 'Zebra Top | Consulting (ERM)') }}</title>
        
        <meta charset="utf-8"/>
        <meta name="description" content=" "/>
        <meta name="keywords" content=" "/>

        <meta name="viewport" content="width=device-width, initial-scale=1"/>      
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content=" " />
        <meta property="og:url" content="https://zebratop.co.ke"/>
        <meta property="og:site_name" content="Zebra Top | Consulting" />

        <link rel="canonical" href="https://zebratop.co.ke"/>

        <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>


        <!-- Fonts -->
        {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
 
        <!--begin::Fonts(mandatory for all pages)-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        
        <!--end::Fonts-->
        

        <!--begin::Vendor Stylesheets(used for this page only)-->
        {{-- <link href="{{ URL::asset('css/fullcalendar.bundle.css') }}"  rel="stylesheet">
        <link href="{{ URL::asset('css/datatables.bundle.css') }}"  rel="stylesheet"> --}}
        <!--end::Vendor Stylesheets-->

        <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
       
        {{-- <link href="{{ URL::asset('css/plugins.bundle.css') }}"  rel="stylesheet">
        <link href="{{ URL::asset('css/style.bundle.css') }}"  rel="stylesheet"> --}}
        <!--end::Global Stylesheets Bundle-->


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ URL::asset('css/app.css') }}"  rel="stylesheet"> --}}
     

        <!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{ URL::asset('css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ URL::asset('css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

        
        <script>
            // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
            if (window.top != window.self) {
                window.top.location.replace(window.self.location.href);
            }
        </script>

    </head>
    <!--end::Head-->


    <!--begin::Body-->
    <body  id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true"  class="app-default" >
        
        {{-- //View App --}}
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
        
            
            <!--begin::App-->
            <div class="d-flex flex-column flex-root app-root" id="kt_app_root">

                <!--begin::Page-->
                <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">     


                    {{-- @include('pages.dashboard.app.header') --}}
                    @include('layouts.components.header1')


                    
                    <!-- Page Side-Navigation -->
                    {{-- @include('layouts.components.sidebar1') --}}
                    @include('layouts.components.sidebar.index')

                    <!-- Main Sidebar Container -->
                    


                    <!--begin::Wrapper-->
                    <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                        
                        {{-- <main class="py-4"> --}}
                            {{-- @yield('content') --}}
                        {{-- </main> --}}

                        <main class="py-4">
                            <div class="container-fluid">
                                <router-view></router-view>
                                <vue-progress-bar></vue-progress-bar>
                            </div>        
                        </main>

                        
                        @stack('modals')

                        <!--begin::Scrolltop-->
                        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                            <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
                        <!--end::Scrolltop-->

                        @include('layouts.components.footer')

                    </div>
                    <!--end::Wrapper-->




                    @include('layouts.components.aside')




                    
                </div>
                <!--end::Page-->



            </div>
            <!--end::App-->



            {{-- 
            <body style="background-color: #E6E6E6">
                <div id="app">

                    <nav class="navbar navbar-expand-md shadow-sm">
                        <div class="container">

                            <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item rounded">
                                        <a class="nav-link text-black bg-red" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-black bg-red" href="{{ route('register') }}">{{ __('Register')
                                            }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div> --}}
            {{-- </body> --}}



        </div>

        {{-- //End::View App --}}

        <script src={{ URL::asset('/js/app.js') }}></script>

        <script href="{{ URL::asset('js/plugins.bundle.js') }}"></script>
        <script href="{{ URL::asset('js/plugins.js') }}"></script>
        <script href="{{ URL::asset('js/scripts.bundle.js') }}"></script>
        <!--end::Global Javascript Bundle-->

        <!--begin::Vendors Javascript(used for this page only)-->
        <script href="{{ URL::asset('js/datatables.bundle.js') }}"></script>
        <!--end::Vendors Javascript-->


        
        @auth
            <script>
                window.user = @json(auth()->user())
            </script>
        @endauth

        

        {{-- <script src="{{ asset('js/treeview.js') }}"></script> --}}
        
        {{-- @livewireScripts --}}


    </body>

</html>





















{{-- 


                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                            <script src="assets/plugins/global/plugins.bundle.js"></script>
                            <script src="assets/js/scripts.bundle.js"></script>
                        <!--end::Global Javascript Bundle-->
        
                    <!--begin::Vendors Javascript(used for this page only)-->
                            <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/index.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/xy.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/percent.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/radar.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/themes/Animated.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/map.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
                            <script src="../../../cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
                            <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
                        <!--end::Vendors Javascript-->
        
                    <!--begin::Custom Javascript(used for this page only)-->
                            <script src="assets/js/widgets.bundle.js"></script>
                            <script src="assets/js/custom/widgets.js"></script>
                            <script src="assets/js/custom/apps/chat/chat.js"></script>
                            <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
                            <script src="assets/js/custom/utilities/modals/users-search.js"></script>
                        <!--end::Custom Javascript-->
                <!--end::Javascript-->
         --}}
            </body>
    <!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic8/demo39/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 May 2023 12:29:38 GMT -->
</html>