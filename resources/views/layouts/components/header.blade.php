<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                        
    <!--begin::Header-->
    <div id="kt_app_header" class="app-header">
    
        <!--begin::Header container-->
        <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between " id="kt_app_header_container">
                    
            <!--begin::Sidebar mobile toggle-->
            <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                <div class="btn btn-icon btn-active-color-success w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span class="path2"></span></i>		</div>
            </div>
            <!--end::Sidebar mobile toggle-->
    
    
            <!--begin::Mobile logo-->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="#" class="d-lg-none">
                    <img alt="Logo" src="{{ Vite::asset('resources/images/parking-logo-workflow-indigo-500.svg') }}" class="h-30px"/>
                </a>
            </div>
            <!--end::Mobile logo-->
    
            
            <!--begin::Header wrapper-->
            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                    
                {{-- New NAV --}}
                @include('layouts.items.navigation.main')
    
                <!--begin::Navbar-->
                <div class="app-navbar flex-shrink-0">
                    {{-- OLD NAV --}}
                    {{-- <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('zones') }}" :active="request()->routeIs('zones')">
                        {{ __('Sites') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('sales') }}" :active="request()->routeIs('sales')">
                        {{ __('Sales') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                        {{ __('Users') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('cashiers') }}" :active="request()->routeIs('cashiers')">
                        {{ __('Cashier') }}
                    </x-nav-link>
                    @if(auth()->user()->hasRole(['admin','manager']))
                    <x-nav-link href="{{ route('receipts') }}" :active="request()->routeIs('receipts')">
                        {{ __('Receipts') }}
                    </x-nav-link>
                    @endif --}}
    
    
                    {{-- TODO : Update OTHER FEATURES --}}
                    {{-- @include('layouts.items.navigation.search') --}}
    
                    {{-- @include('layouts.items.navigation.activity_logs') --}}
    
                    {{-- @include('layouts.items.navigation.chats') --}}
    
                    {{-- @include('layouts.items.navigation.notifications') --}}
    
                    {{-- @include('layouts.items.navigation.app_services') --}}
    
                    @include('layouts.items.navigation.theme_mode')
    
                    @include('layouts.items.navigation.user_profile')
    
                    <!--begin::Header menu toggle-->
                        <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                            <div class="btn btn-flex btn-icon btn-active-color-success w-30px h-30px" id="kt_app_header_menu_toggle">
                                <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span class="path2"></span></i>
                            </div>
                        </div>
                    <!--end::Header menu toggle-->
    
                </div>
                <!--end::Navbar-->	
    
            </div>
            <!--end::Header wrapper-->           
    
        </div>
        <!--end::Header container-->
    
    </div>
    <!--end::Header-->       
    
    </nav>
    
    
    