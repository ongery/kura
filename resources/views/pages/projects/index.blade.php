<!DOCTYPE html>

<html lang="en" >

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>
        <title>Zebra Top | Consulting (ERM)</title>
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
        <link rel="shortcut icon" href="{{ URL::asset('assets/media/logos/favicon.ico')}}"/>

        
        {{-- {{ asset('js/plugins.bundle.js') }} --}}
        {{-- {{ URL::asset('css/fullcalendar.bundle.css') }} --}}
        <!--begin::Fonts(mandatory for all pages)-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>        <!--end::Fonts-->

                    <!--begin::Vendor Stylesheets(used for this page only)-->
                            <link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
                            <link href="{{ URL::asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css"/>
                        <!--end::Vendor Stylesheets-->
        
        
                    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
                            <link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
                            <link href="{{ URL::asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
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
    <body  id="kt_body"  class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled" >
    
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


            {{-- SET : ASIDE (project aside) --}}

            @include('pages.projects.aside')












			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">



                {{-- SET : HEADER (project header) --}}
                @include('pages.projects.header')





                {{-- SET : CONTENT (projects content) --}}
                @include('pages.projects.content')





                {{-- SET : FOOTER (projects : footer) --}}
                @include('pages.projects.footer')

















			</div>
			<!--end::Wrapper-->




		</div>
		<!--end::Page-->





	</div>
	<!--end::Root-->





	
	<!--begin::Drawers-->


        {{-- SET : Actitiviy Log Drawer (projects : drawers) --}}
        @include('pages.projects.drawers.activities')


        {{-- SET : Chat Drawer (projects : Chat) --}}
        @include('pages.projects.drawers.chat')



        {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
        @include('pages.projects.drawers.shoppingCart')


    <!--end::Drawers-->


<!--end::Main-->



	<!--begin::Engage drawers-->

        {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
        @include('pages.projects.drawers.engage.explore')

        {{-- SET : Shopping Cart  Drawer (projects : shopping Cart) --}}
        @include('pages.projects.drawers.engage.help')

    <!--end::Engage drawers-->



    <!--begin::Engage toolbar-->
    <div class="engage-toolbar d-flex position-fixed px-5 fw-bold zindex-2 top-50 end-0 transform-90 mt-5 mt-lg-20 gap-2">  
                        
        <!--begin::Exolore drawer toggle-->
            <button 
                id="kt_explore_toggle" 
                class="engage-explore-toggle engage-btn btn shadow-sm fs-6 px-4 rounded-top-0" 
                title="Upgrade to Seven HTML Free" 
                data-bs-custom-class="tooltip-inverse" 
                data-bs-toggle="tooltip" 
                data-bs-placement="left" 
                data-bs-dismiss="click" 
                data-bs-trigger="hover">

                <span id="kt_explore_toggle_label">
                    Upgrade to Pro	</span>
            </button>
        <!--end::Exolore drawer toggle-->       

        <!--begin::Help drawer toggle-->
            <button 
                id="kt_help_toggle" 
                class="engage-help-toggle btn engage-btn shadow-sm px-5 rounded-top-0" 
                title="Learn & Get Inspired" 	
                data-bs-toggle="tooltip" 
                data-bs-custom-class="tooltip-inverse" 
                data-bs-placement="left" 
                data-bs-dismiss="click" 
                data-bs-trigger="hover">	
                Help
            </button>
        <!--end::Help drawer toggle-->        

        <!--begin::Purchase link-->
            <a 
                href="https://keenthemes.com/products/seven-html-pro"	
                target="_blank"
                class="engage-purchase-link btn engage-btn px-5 shadow-sm rounded-top-0">
                Buy now 
            </a>
        <!--end::Purchase link-->

        
    </div>
    <!--end::Engage toolbar-->





    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i></div>
    <!--end::Scrolltop-->

                        



    <!--begin::Modals-->



        {{-- SET : upgradePlan  Modal (projects : upgradePlan) --}}
        @include('pages.projects.modals.upgradePlan')



        {{-- SET : createAccount Cart  Modal (projects : createAccount) --}}
        @include('pages.projects.modals.createAccount')


        
        {{-- SET : campaign  Modal (projects : campaign) --}}
        @include('pages.projects.modals.campaign')



           
        {{-- SET : viewUsers  Modal (projects : viewUsers) --}}
        @include('pages.projects.modals.viewUsers')



        
        {{-- SET : createProject  Modal (projects : createProject) --}}
        @include('pages.projects.modals.createProject')



        
        {{-- SET : createApp  Modal (projects : createApp) --}}
        @include('pages.projects.modals.createApp')



        {{-- SET : newAddress  Modal (projects : newAddress) --}}
        @include('pages.projects.modals.newAddress')


        {{-- SET : usersSearch  Modal (projects : usersSearch) --}}
        @include('pages.projects.modals.usersSearch')


        {{-- SET : inviteFriends  Modal (projects : inviteFriends) --}}
        @include('pages.projects.modals.inviteFriends')


    <!--end::Modals-->
        
        <!--begin::Javascript-->

        
        {{-- {{ asset('js/plugins.bundle.js') }} --}}
        {{-- {{ URL::asset('css/fullcalendar.bundle.css') }} --}}
                    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                            <script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
                            <script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
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
                            <script src="{{ asset('assets/js/widgets.bundle.js')}}"></script>
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
                <!--end::Javascript-->
        
            </body>
    <!--end::Body-->

</html>