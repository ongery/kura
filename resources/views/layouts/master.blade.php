<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>ERM</title>
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link rel="shortcut icon" href="{{asset('/img/users.png')}}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    @livewireStyles --}}

    
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ URL::asset('css/fullcalendar.bundle.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('css/datatables.bundle.css') }}"  rel="stylesheet">
    <!--end::Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    
    <link href="{{ URL::asset('css/plugins.bundle.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('css/style.bundle.css') }}"  rel="stylesheet">
    <!--end::Global Stylesheets Bundle-->

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">


                        <router-link to="/notificatons">
                            <i class="fas fa-bell fa-1x green"></i>
                            16
                            <span class="badge badge-warning navbar-badge">17</span>
                        </router-link>


                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">

                        <i class="fas fa-user-circle fa-1x green"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <router-link to="/Category" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Category
                            </router-link>
                        </a>

                        <a href="#" class="dropdown-item">
                            <router-link to="/ConsequenceScaleGroup" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Scale Group
                            </router-link>
                        </a>

                        <a href="#" class="dropdown-item">
                            <router-link to="/LikelikehoodScale" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Likelikehood
                            </router-link>
                        </a>

                        <a href="#" class="dropdown-item">
                            <router-link to="/BusinessUnit" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Business units
                            </router-link>
                        </a>

                        <a href="#" class="dropdown-item">
                            <router-link to="/SystemUsers" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Employees
                            </router-link>
                        </a>
                        <a href="#" class="dropdown-item">
                            <router-link to="/GeneralAuthrorization" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> General Authorizations
                            </router-link>
                        </a>

                        <a href="#" class="dropdown-item">
                            <router-link to="/settings" class="dropdown-item">
                                <i class="fas fa-cogs mr-4 left"></i> Settings
                            </router-link>
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-power-off fa-1x  red"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            {{-- <a href="/home" class="brand-link">
                <img src="{{asset('/img/users.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">ERM</span>
            </a> --}}

            <!-- Sidebar -->
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('/img/users.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> {{Auth::user()->full_name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="true">
                        
                        @foreach ($navbarModule1 as $nav)
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                        @endforeach


                        @include('../navbar/reports/index')
                        @include('../navbar/strategic_plan/index')
                        @include('../navbar/risk-management/index')
                        @include('../navbar/qms/index')
                        @include('../navbar/erm/index')
                        @include('../navbar/crm/corruptionriskmanagement')


                   
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">

                <div class="container-fluid">
                    <router-view></router-view>
                    <vue-progress-bar></vue-progress-bar>
                </div>


                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="https://softcloudtech.co.ke/" target="_target">Risk Management
                    System</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    
    
    @auth
        <script>
            window.user = @json(auth()->user())
        </script>
    @endauth

    <script src="/js/app.js"></script>

    {{-- <script src="{{ asset('js/treeview.js') }}"></script> --}}
    
    {{-- @livewireScripts --}}

</body>

</html>
