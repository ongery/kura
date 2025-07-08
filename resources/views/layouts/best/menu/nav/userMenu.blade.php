
    <!--begin::User-->
    <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
        
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-40px" 
        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"				
        data-kt-menu-overflow="true"
        data-kt-menu-placement="top-start"		
        >
            <img  alt="Logo" src="{{ asset('img/users.png')}}" style="height:25px; width:25px">          
      
            {{-- <img src="{{ asset('assets/media/avatars/300-1.jpg')}}" alt="image"/> --}}
        </div>
        
                        
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
           
            <!--begin::Menu item-->
            <div class="menu-item px-3">

                <div class="menu-content d-flex align-items-center px-3">

                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img  alt="Logo" src="{{ asset('img/users.png')}}" style="height:25px; width:25px">          
      
                    </div>
                    <!--end::Avatar-->
        
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{Auth::user()->full_name}}                   
                            {{-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span> --}}
                        </div>
        
                        {{-- <a href="#" class="fw-semibold text-muted text-hover-success fs-7">
                            max@kt.com                
                        </a> --}}
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
                <router-link to="/Category" >
                    <a href="#" class="menu-link px-5">
                        Category
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->
        

            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <router-link to="/ConsequenceScaleGroup" >
                    <a href="#" class="menu-link px-5">
                        Scale Group
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->
        

            
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <router-link to="/LikelikehoodScale" >
                    <a href="#" class="menu-link px-5">
                        Likely Hood 
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->
        
        

            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <router-link to="/BusinessUnit" >
                    <a href="#" class="menu-link px-5">
                        Business Units
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->
        


         
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <router-link to="/SystemUsers" >
                    <a href="" class="menu-link px-5">
                        Employees
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->


            
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <router-link to="/GeneralAuthrorization" >
                    <a href="" class="menu-link px-5">
                        General Authorization
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->

         <!--begin::Menu item-->
         <div class="menu-item px-5 my-1">
            <router-link to="/history-logs">
                <a href="" class="menu-link px-5">
                    History Logs
                </a>
            </router-link>
        </div>
        <!--end::Menu item-->

            
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <router-link to="/settings" >
                    <a href="" class="menu-link px-5">
                        Settings
                    </a>
                </router-link>
            </div>
            <!--end::Menu item-->


            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
        
            
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                </form>

                <a href="{{ route('logout') }}" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign Out
                </a>
            </div>
            <!--end::Menu item-->


        </div>
        <!--end::User account menu-->





        <!--end::Menu wrapper-->

    </div>
    <!--end::User-->
