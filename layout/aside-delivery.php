<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=".#" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="Atrumart Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Atrumart Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
               <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/order/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="/index.php" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>
                            Logout
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                    
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>