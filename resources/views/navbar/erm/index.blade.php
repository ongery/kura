@foreach ($navbarModule3 as $nav)
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">

        <i class="nav-icon fas fa-business-time cyan"></i>
        <p>
            ERM
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <router-link to="/MainRiskAnalysis" class="nav-link">

                <i class=" nav-icon fas fa-bolt green"></i>
                <p>
                    Risk Analysis
                </p>

            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/main-risk-events" class="nav-link">

                <i class=" nav-icon fas fa-tools green"></i>
                <p>
                    Main Risk Events Library
                </p>

            </router-link>
        </li>
    </ul>

</li>
@endforeach
