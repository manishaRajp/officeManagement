<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="index.html" class="logo"><img src="assets/images/logo-dark.png" height="20"
                    alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>
                <li><a class="waves-effect" href="{{ route('admin.department.index') }}"><i
                            class="mdi mdi-bookmark"></i><span>Department</span></a></li>
                <li><a class="waves-effect" href="{{ route('admin.system-category.index') }}"><i
                            class=" mdi mdi-account-plus"></i><span>Category List</span></a></li>
                <li><a class="waves-effect" href="{{ route('admin.system.index') }}"><i
                            class="mdi mdi-alarm-plus"></i><span>System</span></a></li>

                <li><a class="waves-effect" href="{{ route('admin.employee.index') }}"><i
                            class=" mdi mdi-account-plus"></i><span>Employee</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
