


				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">


   <!--begin::Row-->
   <div class="row g-5 g-xl-10 mb-xl-10">
        
    <!--begin::Col-->
    {{-- <div class="col-md-6 col-lg-6 col-xl-12 col-xxl-3 mb-md-5 mb-xl-10"> --}}
        
      
        {{-- SET : HIGH ; LOW ; MEDIUM (RISK OVERVIEW) --}}



            <div class=" d-flex flex-wrap align-items-center">

            
                <div class="mr-3 mb-xl-4">
                    @include('layouts.best.components.riskOverviewCardHighRisk')
                </div>
                    
                <div class="mr-3 mb-xl-4">
                    @include('layouts.best.components.riskOverviewCardMediumRisk')
                </div>
                    
                <div class="mr-3 ">
                    @include('layouts.best.components.riskOverviewCardLowRisk')
                </div>



            </div> 


        </div>
        {{-- //End:Row --}}

        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-xl-10">
            @include('layouts.best.components.items.riskMidOverview')
        </div>

        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-xl-10">
        
            <!--begin::Col-->
            {{-- <div class="col-md-6 col-lg-6 col-xl-12 col-xxl-3 mb-md-5 mb-xl-10"> --}}
                
              
                {{-- SET : HIGH ; LOW ; MEDIUM (RISK OVERVIEW) --}}

               {{-- <div class=" d-flex flex-wrap align-items-center">

                <div class="mr-3 mb-xl-4">
                    @include('layouts.best.components.riskOverviewCardHighRisk')
                </div>
                    
                <div class="mr-3 mb-xl-4">
                    @include('layouts.best.components.riskOverviewCardMediumRisk')
                </div>
                    
                <div class="mr-3 mb-xl-4">
                    @include('layouts.best.components.riskOverviewCardLowRisk')
                </div>

               </div> --}}

                <!--begin::List widget 25-->
                <div class="card card-flush h-lg-50">  
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title text-gray-800">Highlights</h3>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar d-none">          
                            <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4">           
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">
                                Loading date range...
                                </div>
                                <!--end::Display range-->

                                <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i>          
                            </div>  
                            <!--end::Daterangepicker-->                         
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-5">                 
                                    <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="text-gray-700 fw-semibold fs-6 me-2">HR Department</div>                   
                                <!--end::Section-->  

                                <!--begin::Statistics--> 
                                <div class="d-flex align-items-senter">
                                                            <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>  
                                                        
                                    <!--begin::Number-->           
                                    <span class="text-gray-900 fw-bolder fs-6">7.8</span> 
                                    <!--end::Number-->  
                                    
                                                            <span class="text-gray-400 fw-bold fs-6"></span> 
                                                    </div>  
                                <!--end::Statistics-->           
                            </div>
                            <!--end::Item-->

                                            <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            
                                    <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="text-gray-700 fw-semibold fs-6 me-2">ERM</div>                   
                                <!--end::Section-->  

                                <!--begin::Statistics--> 
                                <div class="d-flex align-items-senter">
                                                            
                                    <i class="ki-duotone ki-arrow-down-right fs-2 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>                 
                                                        
                                    <!--begin::Number-->           
                                    <span class="text-gray-900 fw-bolder fs-6"></span> 
                                    <!--end::Number-->  
                                    
                                                                            
                                                    </div>  
                                <!--end::Statistics-->           
                            </div>
                            <!--end::Item-->

                                            <!--begin::Separator-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--end::Separator-->
                            
                                    <!--begin::Item-->
                            <div class="d-flex flex-stack">
                                <!--begin::Section-->
                                <div class="text-gray-700 fw-semibold fs-6 me-2">ICT</div>                   
                                <!--end::Section-->  

                                <!--begin::Statistics--> 
                                <div class="d-flex align-items-senter">
                                                            
                                    <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>  
                                                        
                                    <!--begin::Number-->           
                                    <span class="text-gray-900 fw-bolder fs-6"></span> 
                                    <!--end::Number-->  
                                    
                                                                            
                                                    </div>  
                                <!--end::Statistics-->           
                            </div>
                            <!--end::Item-->

                            
                            
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 25-->


            {{-- </div> --}}
            <!--end::Col-->



        </div>
        <!--end::Row-->  




<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <!--begin::Col-->
    <div class="col-xxl-6">
        
<!--begin::Card widget 18-->
<div class="card card-flush h-md-100">
    <!--begin::Body-->
    <div class="card-body py-9">  
        <!--begin::Row-->               
        <div class="row gx-9 h-100">
            <!--begin::Col-->               
            <div class="col-sm-6 mb-10 mb-sm-0">
                <!--begin::Image-->
                <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100" 
                    style="background-size: 100% 100%;background-image:url('assets/media/stock/600x600/img-33.jpg')">              
                </div> 
                <!--end::Image-->
            </div>
            <!--end::Col-->  

            <!--begin::Col-->               
            <div class="col-sm-6">
                <!--begin::Wrapper-->               
                <div class="d-flex flex-column h-100">
                    <!--begin::Header-->               
                    <div class="mb-7">
                        <!--begin::Headin-->               
                        <div class="d-flex flex-stack mb-6">
                            <!--begin::Title-->               
                            <div class="flex-shrink-0 me-5">
                                <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">Featured</span>

                                <span class="text-gray-800 fs-1 fw-bold">9 Degree</span>
                            </div>
                            <!--end::Title-->

                            <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">In Process</span>
                        </div>
                        <!--end::Heading-->

                        <!--begin::Items-->               
                        <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                            <!--begin::Item-->                  
                            <div class="d-flex align-items-center me-5 me-xl-13">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-30px symbol-circle me-3">                                                   
                                    <img src="assets/media/avatars/300-3.jpg" class="" alt=""/>                                                    
                                </div>
                                <!--end::Symbol--> 
                                
                                <!--begin::Info-->
                                <div class="m-0">                            
                                    <span class="fw-semibold text-gray-400 d-block fs-8">Manager</span>
                                    <a href="pages/user-profile/overview.html" class="fw-bold text-gray-800 text-hover-success fs-7">Robert Fox</a>
                                </div>
                                <!--end::Info-->
                            </div>                    
                            <!--end::Item-->  

                            <!--begin::Item-->                    
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-30px symbol-circle me-3">
                                    <span class="symbol-label bg-success">
                                        <i class="ki-duotone ki-abstract-41 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>                                    </span>                
                                </div>
                                <!--end::Symbol-->                        
                                
                                <!--begin::Info-->
                                <div class="m-0">                            
                                    <span class="fw-semibold text-gray-400 d-block fs-8">Budget</span>
                                    <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                                </div>
                                <!--end::Info-->
                            </div>                      
                            <!--end::Item-->  
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->               
                    <div class="mb-6">
                        <!--begin::Text-->
                        <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                            Flat cartoony illustrations with vivid 
                            unblended colors and asymmetrical  beautiful purple hair lady
                        </span>
                        <!--end::Text-->

                        <!--begin::Stats-->
                        <div class="d-flex">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                <!--begin::Date-->                                     
                                <span class="fs-6 text-gray-700 fw-bold">Feb 6, 2021 </span>                                
                                <!--end::Date-->

                                <!--begin::Label-->
                                <div class="fw-semibold text-gray-400">Due Date</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                <!--begin::Number-->                                 
                                <span class="fs-6 text-gray-700 fw-bold">$<span class="ms-n1" data-kt-countup="true" data-kt-countup-value="284,900.00">0</span></span>                               
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold text-gray-400">Budget</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->                             
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->

                    <!--begin::Footer-->
                    <div class="d-flex flex-stack mt-auto bd-highlight">  
                        <!--begin::Users group-->
                        <div class="symbol-group symbol-hover flex-nowrap">
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                                                            <img alt="Pic" src="assets/media/avatars/300-2.jpg" />
                                                                    </div>
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                                                            <img alt="Pic" src="assets/media/avatars/300-3.jpg" />
                                                                    </div>
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                                                    </div>
                                                         
                        </div>
                        <!--end::Users group-->

                        <!--begin::Actions-->                       
                        <a href="#" class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">
                            View Project

                            <i class="ki-duotone ki-exit-right-corner fs-4 ms-1"><span class="path1"></span><span class="path2"></span></i> 
                        </a>          
                        <!--end::Actions-->
                    </div>
                    <!--end::Footer-->




                </div>
                <!--end::Wrapper-->  
            </div>
            <!--end::Col-->  
        </div>
        <!--end::Row-->         
    </div>
    <!--end::Body-->
</div>
<!--end::Card widget 18-->


      </div>
    <!--end::Col--> 


    <!--begin::Col-->
    <div class="col-xxl-6">
        <!--begin::Engage widget 8-->
<div class="card border-0 h-md-100" data-bs-theme="light" style="background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)"> 
    <!--begin::Body-->
    <div class="card-body"> 
        <!--begin::Row-->
        <div class="row align-items-center h-100">
            <!--begin::Col-->
            <div class="col-7 ps-xl-13">
                <!--begin::Title-->               
                <div class="text-white mb-6 pt-6">
                    <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">Get best offer</span>

                    <span class="fs-2qx fw-bold">Upgrade Your Plan</span>
                </div>
                <!--end::Title-->

                <!--begin::Text-->
                <span class="fw-semibold text-white fs-6 mb-8 d-block opacity-75">
                    Flat cartoony and illustrations with vivid unblended purple hair lady
                </span>
                <!--end::Text-->

                <!--begin::Items-->               
                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-10 mb-xl-20">
                    <!--begin::Item-->                  
                    <div class="d-flex align-items-center me-5 me-xl-13">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label" style="background: #35C7FF">
                                <i class="ki-duotone ki-abstract-41 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>                            </span>                
                        </div>
                        <!--end::Symbol-->   
                        
                        <!--begin::Info-->
                        <div class="text-white">                            
                            <span class="fw-semibold d-block fs-8 opacity-75">Projects</span>
                            <span class="fw-bold fs-7">Up to 500</span>
                        </div>
                        <!--end::Info-->
                    </div>                    
                    <!--end::Item-->  

                    <!--begin::Item-->                    
                    <div class="d-flex align-items-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-30px symbol-circle me-3">
                            <span class="symbol-label" style="background: #35C7FF">
                                <i class="ki-duotone ki-abstract-26 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>                            </span>                
                        </div>
                        <!--end::Symbol-->                        
                        
                        <!--begin::Info-->
                        <div class="text-white">                            
                            <span class="fw-semibold opacity-75 d-block fs-8">Tasks</span>
                            <span class="fw-bold fs-7">Unlimited</span>
                        </div>
                        <!--end::Info-->
                    </div>                      
                    <!--end::Item-->  
                </div>
                <!--end::Items-->

                <!--begin::Action-->
                <div class="d-flex flex-column flex-sm-row d-grid gap-2">
                    <a href="#" class="btn btn-success flex-shrink-0 me-lg-2"  data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                    <a href="#" class="btn btn-primary flex-shrink-0" style="background: rgba(255, 255, 255, 0.2)"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Read Guides</a>
                </div>
                <!--end::Action--> 
            </div>
            <!--end::Col--> 

            <!--begin::Col-->
            <div class="col-5 pt-10">
                <!--begin::Illustration-->
                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px" style="background-image:url('/seven-html-free/assets/media/svg/illustrations/easy/5.svg">                 
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Col--> 
        </div>
        <!--end::Row-->         
    </div>
    <!--end::Body-->
</div>
<!--end::Engage widget 8-->

     </div>
    <!--end::Col--> 
</div>
<!--end::Row-->  

<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <!--begin::Col-->
    <div class="col-xl-4">
        
<!--begin::Chart Widget 35-->
<div class="card card-flush h-md-100">
    <!--begin::Header-->
    <div class="card-header pt-5 mb-6">        
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">               
            <!--begin::Statistics-->
            <div class="d-flex align-items-center mb-2">   
                <!--begin::Currency-->
                <span class="fs-3 fw-semibold text-gray-400 align-self-start me-1">$</span>
                <!--end::Currency-->

                <!--begin::Value-->
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">3,274.94</span>
                <!--end::Value-->

                <!--begin::Label-->
                <span class="badge badge-light-success fs-base">                                
                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i> 
                    9.2%
                </span>
                <!--end::Label-->
            </div>
            <!--end::Statistics-->

            <!--begin::Description-->
            <span class="fs-6 fw-semibold text-gray-400">Avg. Agent Earnings</span>
            <!--end::Description-->             
        </h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">            
            <!--begin::Menu-->
            <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">                
                <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                             
            </button>

            
<!--begin::Menu 2-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator mb-3 opacity-75"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            New Ticket
        </a>
    </div>
    <!--end::Menu item-->
    
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            New Customer
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
        <!--begin::Menu item-->
        <a href="#" class="menu-link px-3">
            <span class="menu-title">New Group</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu item-->

        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Admin Group
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Staff Group
                </a>
            </div>
            <!--end::Menu item-->

            <!--begin::Menu item-->            
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Member Group
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            New Contact
        </a>
    </div>
    <!--end::Menu item-->

    <!--begin::Menu separator-->
    <div class="separator mt-3 opacity-75"></div>
    <!--end::Menu separator-->

    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content px-3 py-3">
            <a class="btn btn-primary  btn-sm px-4" href="#">
                Generate Reports
            </a>
        </div>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu 2-->
 
            <!--end::Menu-->             
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-0 px-0">
        <!--begin::Nav-->             
        <ul class="nav d-flex justify-content-between mb-3 mx-9">
                            <!--begin::Item--> 
                <li class="nav-item mb-3">
                    <!--begin::Link--> 
                    <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px active" data-bs-toggle="tab" id="kt_charts_widget_35_tab_1" 
                        href="#kt_charts_widget_35_tab_content_1">               
                        
                        1d                                          
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item--> 
                            <!--begin::Item--> 
                <li class="nav-item mb-3">
                    <!--begin::Link--> 
                    <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px " data-bs-toggle="tab" id="kt_charts_widget_35_tab_2" 
                        href="#kt_charts_widget_35_tab_content_2">               
                        
                        5d                                          
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item--> 
                            <!--begin::Item--> 
                <li class="nav-item mb-3">
                    <!--begin::Link--> 
                    <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px " data-bs-toggle="tab" id="kt_charts_widget_35_tab_3" 
                        href="#kt_charts_widget_35_tab_content_3">               
                        
                        1m                                          
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item--> 
                            <!--begin::Item--> 
                <li class="nav-item mb-3">
                    <!--begin::Link--> 
                    <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px " data-bs-toggle="tab" id="kt_charts_widget_35_tab_4" 
                        href="#kt_charts_widget_35_tab_content_4">               
                        
                        6m                                          
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item--> 
                            <!--begin::Item--> 
                <li class="nav-item mb-3">
                    <!--begin::Link--> 
                    <a class="nav-link btn btn-flex flex-center btn-active-danger btn-color-gray-600 btn-active-color-white rounded-2 w-45px h-35px " data-bs-toggle="tab" id="kt_charts_widget_35_tab_5" 
                        href="#kt_charts_widget_35_tab_content_5">               
                        
                        1y                                          
                    </a>
                    <!--end::Link-->
                </li>
                <!--end::Item--> 
                        
        </ul>             
        <!--end::Nav-->

        <!--begin::Tab Content-->
        <div class="tab-content mt-n6">
              
                
                <!--begin::Tap pane-->
                <div class="tab-pane fade active show" id="kt_charts_widget_35_tab_content_1">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_35_chart_1" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                    <!--end::Chart-->

                    <!--begin::Table container-->
                    <div class="table-responsive mx-9 mt-n6">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr>                                    
                                    <th class="min-w-100px"></th>
                                    <th class="min-w-100px text-end pe-0"></th>
                                    <th class="text-end min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-danger">-139.34</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">3:10 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$3,207.03</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-success">+576.24</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">3:55 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$3,274.94</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-success">+124.03</span>                                                                                
                                        </td>
                                    </tr>
                                                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
              
                
                <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_35_tab_content_2">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_35_chart_2" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                    <!--end::Chart-->

                    <!--begin::Table container-->
                    <div class="table-responsive mx-9 mt-n6">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr>                                    
                                    <th class="min-w-100px"></th>
                                    <th class="min-w-100px text-end pe-0"></th>
                                    <th class="text-end min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,345.45</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-success">+134.02</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">11:35 AM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-primary">-124.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">3:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$1,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-danger">+144.04</span>                                                                                
                                        </td>
                                    </tr>
                                                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
              
                
                <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_35_tab_content_3">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_35_chart_3" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                    <!--end::Chart-->

                    <!--begin::Table container-->
                    <div class="table-responsive mx-9 mt-n6">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr>                                    
                                    <th class="min-w-100px"></th>
                                    <th class="min-w-100px text-end pe-0"></th>
                                    <th class="text-end min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">3:20 AM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$3,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-primary">+185.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">12:30 AM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-danger">+124.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-success">-154.03</span>                                                                                
                                        </td>
                                    </tr>
                                                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
              
                
                <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_35_tab_content_4">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_35_chart_4" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                    <!--end::Chart-->

                    <!--begin::Table container-->
                    <div class="table-responsive mx-9 mt-n6">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr>                                    
                                    <th class="min-w-100px"></th>
                                    <th class="min-w-100px text-end pe-0"></th>
                                    <th class="text-end min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-warning">+124.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">5:30 AM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$1,756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-info">+144.65</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">4:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,085.25</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-primary">+154.06</span>                                                                                
                                        </td>
                                    </tr>
                                                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
              
                
                <!--begin::Tap pane-->
                <div class="tab-pane fade " id="kt_charts_widget_35_tab_content_5">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_35_chart_5" data-kt-chart-color="primary" class="min-h-auto h-200px ps-3 pe-6"></div>
                    <!--end::Chart-->

                    <!--begin::Table container-->
                    <div class="table-responsive mx-9 mt-n6">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr>                                    
                                    <th class="min-w-100px"></th>
                                    <th class="min-w-100px text-end pe-0"></th>
                                    <th class="text-end min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">2:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$2,045.04</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-warning">+114.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">3:30 AM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-primary">-124.03</span>                                                                                
                                        </td>
                                    </tr>
                                                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-gray-600 fw-bold fs-6">10:30 PM</a>                                            
                                        </td>

                                        <td class="pe-0 text-end">                                                             
                                            <span class="text-gray-800 fw-bold fs-6 me-1">$1.756.26</span>                                                                                      
                                        </td>

                                        <td class="pe-0 text-end">                                                 
                                            <span class="fw-bold fs-6 text-info">+165.86</span>                                                                                
                                        </td>
                                    </tr>
                                                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--end::Tap pane-->
             
        </div>
        <!--end::Tab Content-->             
    </div>
    <!--end::Body-->
</div>
<!--end::Chart Widget 35-->
    </div>
    <!--end::Col--> 

    <!--begin::Col-->
    <div class="col-xl-8">
        
<!--begin::Table widget 14-->
<div class="card card-flush h-md-100">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">			
            <span class="card-label fw-bold text-gray-800">Projects Stats</span>
			
            <span class="text-gray-400 mt-1 fw-semibold fs-6">Updated 37 minutes ago</span>
		</h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">   
            <a href="#" class="btn btn-sm btn-light">History</a>             
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-6">             
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                <!--begin::Table head-->
                <thead>
                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">                                    
                        <th class="p-0 pb-3 min-w-175px text-start">ITEM</th>
                        <th class="p-0 pb-3 min-w-100px text-end">BUDGET</th>
                        <th class="p-0 pb-3 min-w-100px text-end">PROGRESS</th>
                        <th class="p-0 pb-3 min-w-175px text-end pe-12">STATUS</th>  
                        <th class="p-0 pb-3 w-125px text-end pe-7">CHART</th>                                   
                        <th class="p-0 pb-3 w-50px text-end">VIEW</th>
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                                            
                        <tr>                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">                                                   
                                        <img src="assets/media/stock/600x600/img-49.jpg" class="" alt=""/>                                                    
                                    </div>
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-success mb-1 fs-6">Mivy App</a>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Jane Cooper</span>
                                    </div>
                                </div>                                
                            </td>

                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">$32,400</span>                                
                            </td>
                           
                            <td class="text-end pe-0">
                                                                    <!--begin::Label--> 
                                    <span class="badge badge-light-success fs-base">                                
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>                                               
                                        9.2%
                                    </span>  
                                    <!--end::Label-->   
                                                        
                            </td>                            
                            
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                            </td>                           

                            <td class="text-end pe-0">
                                <div id="kt_table_widget_14_chart_1" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>                                
                            </td>    

                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>                                </a>
                            </td>
                        </tr>                        
                                            
                        <tr>                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">                                                   
                                        <img src="assets/media/stock/600x600/img-40.jpg" class="" alt=""/>                                                    
                                    </div>
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-success mb-1 fs-6">Avionica</a>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Esther Howard</span>
                                    </div>
                                </div>                                
                            </td>

                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">$256,910</span>                                
                            </td>
                           
                            <td class="text-end pe-0">
                                                                    <!--begin::Label--> 
                                    <span class="badge badge-light-danger fs-base">                           
                                        <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i> 
                                        0.4%
                                    </span>  
                                    <!--end::Label-->               
                                                        
                            </td>                            
                            
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-warning">On Hold</span>
                            </td>                           

                            <td class="text-end pe-0">
                                <div id="kt_table_widget_14_chart_2" class="h-50px mt-n8 pe-7" data-kt-chart-color="danger"></div>                                
                            </td>    

                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>                                </a>
                            </td>
                        </tr>                        
                                            
                        <tr>                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">                                                   
                                        <img src="assets/media/stock/600x600/img-39.jpg" class="" alt=""/>                                                    
                                    </div>
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-success mb-1 fs-6">Charto CRM</a>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Jenny Wilson</span>
                                    </div>
                                </div>                                
                            </td>

                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">$8,220</span>                                
                            </td>
                           
                            <td class="text-end pe-0">
                                                                    <!--begin::Label--> 
                                    <span class="badge badge-light-success fs-base">                                
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>                                               
                                        9.2%
                                    </span>  
                                    <!--end::Label-->   
                                                        
                            </td>                            
                            
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                            </td>                           

                            <td class="text-end pe-0">
                                <div id="kt_table_widget_14_chart_3" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>                                
                            </td>    

                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>                                </a>
                            </td>
                        </tr>                        
                                            
                        <tr>                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">                                                   
                                        <img src="assets/media/stock/600x600/img-47.jpg" class="" alt=""/>                                                    
                                    </div>
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-success mb-1 fs-6">Tower Hill</a>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Cody Fisher</span>
                                    </div>
                                </div>                                
                            </td>

                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">$74,000</span>                                
                            </td>
                           
                            <td class="text-end pe-0">
                                                                    <!--begin::Label--> 
                                    <span class="badge badge-light-success fs-base">                                
                                        <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>                                               
                                        9.2%
                                    </span>  
                                    <!--end::Label-->   
                                                        
                            </td>                            
                            
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-success">Complated</span>
                            </td>                           

                            <td class="text-end pe-0">
                                <div id="kt_table_widget_14_chart_4" class="h-50px mt-n8 pe-7" data-kt-chart-color="success"></div>                                
                            </td>    

                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>                                </a>
                            </td>
                        </tr>                        
                                            
                        <tr>                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">                                                   
                                        <img src="assets/media/stock/600x600/img-48.jpg" class="" alt=""/>                                                    
                                    </div>
                                    
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-success mb-1 fs-6">9 Degree</a>
                                        <span class="text-gray-400 fw-semibold d-block fs-7">Savannah Nguyen</span>
                                    </div>
                                </div>                                
                            </td>

                            <td class="text-end pe-0">
                                <span class="text-gray-600 fw-bold fs-6">$183,300</span>                                
                            </td>
                           
                            <td class="text-end pe-0">
                                                                    <!--begin::Label--> 
                                    <span class="badge badge-light-danger fs-base">                           
                                        <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i> 
                                        0.4%
                                    </span>  
                                    <!--end::Label-->               
                                                        
                            </td>                            
                            
                            <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                            </td>                           

                            <td class="text-end pe-0">
                                <div id="kt_table_widget_14_chart_5" class="h-50px mt-n8 pe-7" data-kt-chart-color="danger"></div>                                
                            </td>    

                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                    <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>                                </a>
                            </td>
                        </tr>                        
                                    </tbody>
                <!--end::Table body-->
            </table>
        </div>
        <!--end::Table-->       
    </div>
    <!--end: Card Body-->
</div>
<!--end::Table widget 14-->    </div>
    <!--end::Col--> 
</div>
<!--end::Row-->  

<!--begin::Row-->
<div class="row g-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-xl-4">
        
<!--begin::Engage widget 1-->
<div class="card h-md-100" dir="ltr"> 
    <!--begin::Body-->
    <div class="card-body d-flex flex-column flex-center">  
        <!--begin::Heading-->
        <div class="mb-2">
            <!--begin::Title-->
            <h1 class="fw-semibold text-gray-800 text-center lh-lg">           
                Have your tried <br/> new
                <span class="fw-bolder"> Invoice Manager?</span>
            </h1>
            <!--end::Title--> 
            
            <!--begin::Illustration-->
            <div class="py-10 text-center">
                                    <img src="assets/media/svg/illustrations/easy/2.svg" class="theme-light-show w-200px" alt=""/>
                    <img src="assets/media/svg/illustrations/easy/2-dark.svg" class="theme-dark-show w-200px" alt=""/>
                            </div>
            <!--end::Illustration-->
        </div>
        <!--end::Heading-->

        <!--begin::Links-->
        <div class="text-center mb-1"> 
            <!--begin::Link-->
            <a class="btn btn-sm btn-primary me-2"  data-bs-target="#kt_modal_new_address" data-bs-toggle="modal" >
                Try Now            </a>
            <!--end::Link-->

            <!--begin::Link-->
            <a class="btn btn-sm btn-light"  href="#" >
                Learn More            </a>
            <!--end::Link-->
        </div>
        <!--end::Links-->
    </div>
    <!--end::Body-->
</div>
<!--end::Engage widget 1-->

     </div>
    <!--end::Col--> 

    <!--begin::Col-->
    <div class="col-xl-8">
        <!--begin::Timeline Widget 4-->
<div class="card h-md-100">
    <!--begin::Card header-->
    <div class="card-header position-relative py-0 border-bottom-1">
        <!--begin::Card title-->
        <h3 class="card-title text-gray-800 fw-bold">Active Tasks</h3>
        <!--end::Card title-->
        
        <!--begin::Tabs-->
        <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-4">
            <!--begin::Nav item-->
            <li class="nav-item p-0 ms-0">
                <a class="nav-link btn btn-color-gray-400 flex-center px-3 active" 
                data-kt-timeline-widget-4="tab" data-bs-toggle="tab" href="#kt_timeline_widget_4_tab_day"> 
                    <!--begin::Title-->
                    <span class="nav-text fw-semibold fs-4 mb-3">Day</span> 
                    <!--end::Title--> 

                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                    <!--end::Bullet-->  
                </a>
            </li>
            <!--end::Nav item-->

            <!--begin::Nav item-->
            <li class="nav-item p-0 ms-0">
                <a class="nav-link btn btn-color-gray-400 flex-center px-3" 
                data-kt-timeline-widget-4="tab" data-bs-toggle="tab" href="#kt_timeline_widget_4_tab_week">
                <!--begin::Title-->
                <span class="nav-text fw-semibold fs-4 mb-3">Week</span> 
                <!--end::Title--> 

                <!--begin::Bullet-->
                <span class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                    <!--end::Bullet-->  
                </a>
            </li>
            <!--end::Nav item-->

            <!--begin::Nav item-->
            <li class="nav-item p-0 ms-0">
                <a class="nav-link btn btn-color-gray-400 flex-center px-3" 
                data-kt-timeline-widget-4="tab" data-bs-toggle="tab" href="#kt_timeline_widget_4_tab_month">
                    <!--begin::Title-->
                    <span class="nav-text fw-semibold fs-4 mb-3">Month</span> 
                    <!--end::Title--> 

                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                    <!--end::Bullet-->  
                </a>
            </li>
            <!--end::Nav item-->

            <!--begin::Nav item-->
            <li class="nav-item p-0 ms-0">
                <a class="nav-link btn btn-color-gray-400 flex-center px-3" 
                data-kt-timeline-widget-4="tab" data-bs-toggle="tab" href="#kt_timeline_widget_4_tab_2022">
                    <!--begin::Title-->
                    <span class="nav-text fw-semibold fs-4 mb-3">2022</span> 
                    <!--end::Title--> 

                    <!--begin::Bullet-->
                    <span class="bullet-custom position-absolute z-index-2 w-100 h-1px top-100 bottom-n100 bg-primary rounded"></span>
                    <!--end::Bullet-->  
                </a>
            </li>
            <!--end::Nav item-->
        </ul>
        <!--end::Tabs-->        
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pb-0">
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane active" id="kt_timeline_widget_4_tab_day" role="tabpanel" aria-labelledby="day-tab" data-kt-timeline-widget-4-blockui="true">
                <div class="table-responsive pb-10">
                    <!--begin::Timeline-->
                    <div id="kt_timeline_widget_4_1" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-4-image-root="/seven-html-free/assets/media/"></div>
                    <!--end::Timeline-->
                </div>
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane" id="kt_timeline_widget_4_tab_week" role="tabpanel" aria-labelledby="week-tab" data-kt-timeline-widget-4-blockui="true">
                <div class="table-responsive pb-10">
                    <!--begin::Timeline-->
                    <div id="kt_timeline_widget_4_2" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-4-image-root="/seven-html-free/assets/media/"></div>
                    <!--end::Timeline-->
                </div>
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane" id="kt_timeline_widget_4_tab_month" role="tabpanel" aria-labelledby="month-tab" data-kt-timeline-widget-4-blockui="true">
                <div class="table-responsive pb-10">
                    <!--begin::Timeline-->
                    <div id="kt_timeline_widget_4_3" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-4-image-root="/seven-html-free/assets/media/"></div>
                    <!--end::Timeline-->
                </div>
            </div>
            <!--end::Tab pane-->

            <!--begin::Tab pane-->
            <div class="tab-pane" id="kt_timeline_widget_4_tab_2022" role="tabpanel" aria-labelledby="week-tab" data-kt-timeline-widget-4-blockui="true">
                <div class="table-responsive pb-10">
                    <!--begin::Timeline-->
                    <div id="kt_timeline_widget_4_4" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-4-image-root="/seven-html-free/assets/media/"></div>
                    <!--end::Timeline-->
                </div>
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Timeline Widget 1-->    </div>
    <!--end::Col--> 
</div>
<!--end::Row-->  
 
</div>
<!--end::Container-->				</div>
				<!--end::Content-->

                
