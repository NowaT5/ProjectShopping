<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Project Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" " class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('page') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie "></i>
                        <p>
                            แดชบอร์ด
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employee') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie "></i>
                        <p>
                            พนักงาน
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-apple-alt"></i>
                        <p>
                            รายการสินค้าทั้งหมด
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('type') }}" class="nav-link">
                                <i class="far fa-circle nav-icon "></i>
                                <p>
                                    ชนิดสินค้า
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ประเภทสินค้า</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            สินค้า
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order') }}" class="nav-link">
                        <i class="nav-icon fas fa-dumpster "></i>
                        <p>
                            คำสั่งซื้อ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('detail') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck "></i>
                        <p>
                            รายละเอียดคำสั่งซื้อ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-shopping-basket"></i>
                        <p>
                            รายการสินค้าทั้งหมด
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ประเภทสินค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายละเอียดสินค้า</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายการจำนวนสินค้า</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
