    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/" target="_blank">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                        <span class="badge badge-pill bg-success" data-key="t-new">{{auth()->user()->user_type}}</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'candidate.authorized_agency.index' ? 'active':''}}" href="{{ route('candidate.authorized_agency.index') }}">
                        <i class="ri-briefcase-5-line"></i> <span data-key="t-widgets">Agency Detail</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'candidate.information_list.index' ? 'active':''}}" href="{{ route('candidate.information_list.index') }}">
                        <i class="ri-user-2-line"></i> <span data-key="t-widgets">Candidate Information</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'candidate.authorized_agency.proprietor.index' ? 'active':''}}" href="{{ route('candidate.authorized_agency.proprietor.index') }}">
                        <i class="ri-briefcase-5-line"></i> <span data-key="t-widgets">Proprietor</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'candidate.authorized_agency.labor_representative.index' ? 'active':''}}" href="{{ route('candidate.authorized_agency.labor_representative.index') }}">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">Labor Representative</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
