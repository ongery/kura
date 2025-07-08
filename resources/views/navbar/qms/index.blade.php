@foreach ($navbarModule2 as $nav)
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">

        <i class="nav-icon fas fa-business-time purple"></i>
        <p>
            QMS
            <i class="right fa fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <router-link to="/procedure-desc" class="nav-link">

                <i class=" nav-icon fas fa-bolt green"></i>
                <p>
                    New Procedure
                </p>

            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/Procedures" class="nav-link">

                <i class=" nav-icon fas fa-bolt green"></i>
                <p>
                    ISO Procedures
                </p>

            </router-link>
        </li>

        <li class="nav-item">
            <router-link to="/qms/ncr" class="nav-link">

                <i class=" nav-icon fas fa-bolt green"></i>
                <p>
                    NCR
                </p>

            </router-link>
        </li>




        @include('../../navbar/qms/sa')
        @include('../../navbar/qms/compliance')

        <li class="nav-item">
            <router-link to="/AuditScheduler" class="nav-link">

                <i class=" nav-icon fas fa-bolt green"></i>
                <p>
                    Audit Scheduler
                </p>

            </router-link>
        </li>
    </ul>

</li>
@endforeach
