@foreach ($navbarModule1 as $nav)
<li class="nav-header">Risk Management Module</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon {{$nav->Icon}} {{$nav->Color}}"></i>
        <p>
            {{$nav->Label}}
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        
        @include('../../navbar/risk-management/risk-criteria/index')

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
                <i class="nav-icon fas fa-map green"></i>
                <p>
                    My Actions
                </p>
            </router-link>
        </li>

        @include('../../navbar/risk-management/KeyRiskIndicators')
        @include('../../navbar/risk-management/ComplianceIndicators')
        @include('../../navbar/risk-management/Settings')

        <li class="nav-item">
            <router-link to="/AllIncidents" class="nav-link">
                <i class="nav-icon fas fa-map green"></i>
                <p>
                    Incident Management
                </p>
            </router-link>
        </li>
    </ul>
</li>
@endforeach
