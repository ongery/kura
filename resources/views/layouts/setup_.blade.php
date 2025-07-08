<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>ERM</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="shortcut icon" href="{{asset('/img/users.png')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    @livewireStyles
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
                        {{ Auth::user()->name }}
                        Welcome {{ Auth::user()->name }}
                        <i class="fas fa-user-circle green"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cogs mr-2"></i> Category

                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{asset('/img/users.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">ERM</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="true">
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>

                        {{-- <li class="nav-item">

                            <router-link to="/ReportNewRisk" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle blue"></i>
                                <p>
                                    Report New Risk
                                </p>
                            </router-link>
                        </li> --}}
                        <li class="nav-item">
                            <router-link to="/RiskAnalysis" class="nav-link">

                                <i class=" nav-icon fas fa-bolt green"></i>
                                <p>
                                    Risk Analysis
                                </p>

                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/ActionTracking" class="nav-link">
                                <i class="nav-icon fas fa-map yellow"></i>
                                <p>
                                    My Actions
                                </p>
                            </router-link>
                        </li>

                        {{--
                        <li class="nav-item">
                            <router-link to="/RiskLibrary" class="nav-link">
                                <i class="nav-icon fas fa-tools purple"></i>
                                <p>
                                    Risk Library
                                </p>
                            </router-link>
                        </li> --}}




                        @include('../navbar/KeyRiskIndicators')
                        @include('../navbar/ComplianceIndicators')

                        @include('../navbar/Settings')
                        @include('../navbar/Category')

                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-power-off red"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
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
            <strong>Copyright &copy; 2021 <a href="https://softcloudtech.co.ke/" target="_target">Risk Management System
                    Gas</a>.</strong>
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
    <script src="{{ asset('js/treeview.js') }}"></script>
    @livewireScripts
</body>

</html>
