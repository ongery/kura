@foreach ($navbarModule5 as $nav)
<li class="nav-header">Strategic Planning Module</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-line green"></i>
        <p>
            Strategic Planning
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <router-link to="/strategic/objective" class="nav-link">
                <i class="nav-icon fas fa-align-left green"></i>
                <p>
                    Strategic Objective
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/strategic/planning" class="nav-link">
                <i class="nav-icon fas fa-align-left green"></i>
                <p>
                    Strategic Planning
                </p>
            </router-link>
        </li>


        <li class="nav-item">
            <router-link to="/strategic/actions" class="nav-link">
                <i class="nav-icon fas fa-align-left green"></i>
                <p>
                    My Actions
                </p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/strategic/setup" class="nav-link">
                <i class="nav-icon fas fa-align-left green"></i>
                <p>
                    Setup
                </p>
            </router-link>
        </li>
    </ul>

</li>
@endforeach
