<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                @can('Dashboard')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href={{ route('dashboard') }} aria-expanded="false"><i
                                class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                @endcan

                @can('user-list')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href={{ route('user.list') }} aria-expanded="false"><i class="fas fa-user"></i><span
                                class="hide-menu">User</span></a></li>
                @endcan

                @can('role-list')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href={{ route('role.list') }} aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                                class="hide-menu">Role</span></a></li>
                @endcan

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cog"></i><span
                            class="hide-menu">Settings </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">

                        @can('store-data-type')
                            <li class="sidebar-item"><a href={{ route('settings.storeData') }} class="sidebar-link"><i
                                        class="mdi mdi-note-outline"></i><span class="hide-menu"> Store data type
                                    </span></a></li>
                        @endcan

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
