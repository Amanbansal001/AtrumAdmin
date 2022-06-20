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
                    <a href="/dashboard/index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashbaord
                            <!-- <i class="right fas fa-angle-left"></i> -->
                        </p>
                    </a>
                   
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Website Appearance Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/config/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Site</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/category/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/banner/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Banner Management</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact Forms
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/request/enquiry.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Enquiry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/request/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/request/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request Category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Product Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/product/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/featuredArtwork/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Featured Artwork</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/nft/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>NFT</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cloud"></i>
                        <p>
                            Auction Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                       
                        
                        <li class="nav-item">
                            <a href="/auctionName/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Auction Config</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/auction/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Auction</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/bids/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Auction Bids</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/config/auction.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Auction Banner Config</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User & Vendor Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/user/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/deliveryuser/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendor Management</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="/featuredArtist/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Featured Artist</p>
                            </a>
                        </li>

                    </ul>
                </li>
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
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/order/payout.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payout</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-pencil-ruler"></i>
                        <p>
                            Content Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/content/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            World Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/country/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Country List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/state/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>State List</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="/city/list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>City List</p>
                            </a>
                        </li> -->

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