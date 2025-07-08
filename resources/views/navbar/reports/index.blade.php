<li class="nav-item has-treeview">
    <a href="#" class="nav-link">

        <i class="nav-icon  fas fa-chart-pie cyan"></i>
        <p>
            Reports Module
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @foreach ($navbarModule1 as $nav)
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line green"></i>
                <p>
                    Risk Management
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/report/risk_register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Risk Register
                        </p>
                    </router-link>
                    <router-link to="/report/kri/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Key Risk Indicators
                        </p>
                    </router-link>
                    <router-link to="/report/kci/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Key Control Indicators
                        </p>
                    </router-link>
                    <router-link to="/report/incident/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Incident Report
                        </p>
                    </router-link>
                    <router-link to="/report/action/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Action Report
                        </p>
                    </router-link>
                </li>

            </ul>

        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line green"></i>
                <p>
                    QMS
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/report/qms" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            QMS Report
                        </p>
                    </router-link>
                </li>

            </ul>

        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line green"></i>
                <p>
                    ERM
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/report/ERM/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            ERM Register
                        </p>
                    </router-link>
                </li>

            </ul>

        </li>
        @endforeach
        @foreach ($navbarModule4 as $nav)
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line green"></i>
                <p>
                    CRM
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/report/CRM/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            CRM Report
                        </p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/report/CRM/report" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            CRA Report
                        </p>
                    </router-link>
                </li>

            </ul>

        </li>
        @endforeach
        @foreach ($navbarModule5 as $nav)
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line green"></i>
                <p>
                    Strategic
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <router-link to="/report/strategic/register" class="nav-link">
                        <i class="nav-icon fas fa-align-left green"></i>
                        <p>
                            Strategic Plan Matrix
                        </p>
                    </router-link>
                </li>

            </ul>

        </li>
        @endforeach
    </ul>

</li>
