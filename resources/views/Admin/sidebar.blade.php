<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">

        <h1 style="margin-left: 40px;display:block">ADMIN</h1>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" height="100px" width="100px">
                <img src="{{ $avatar }}" alt="User Image"
                    style="border: 1px solid rgb(0, 0, 0);border-radius: 50%;object-fit: cover">
            </div>
            <div class="info">
                <a href="/admin" class="d-block" style="text-decoration: unset">{{ $fullNameUser }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                {{-- Danh muc --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Danh mục dịch vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/danhmucs/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm dịch vụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/danhmucs/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách dịch vụ</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Slider --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-photo-video"></i>

                        <p>
                            Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Duyệt đơn đăng ký --}}

                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-th-list"></i>
                        <p> Đơn đăng ký
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/accs/application" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách đơn đăng ký </p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- Tai khoan --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-user"></i>
                        <p> Tài Khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/accs/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm tài khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/admin" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài Khoản Admin </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/chuShop" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài Khoản Chủ Shop </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/accs/khachhang" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tài Khoản Khách Hàng </p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- Phí thu --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-money-check"></i>
                        <p> Phí thu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/fees/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm phí thu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/fees/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doanh sách phí thu </p>
                            </a>
                        </li>
                    </ul>
                </li>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
