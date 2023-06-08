<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">

            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="/ChuShop" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon" style="width: 80px !important;height: 80 !important">
                        <img src="{{ $logo }}"alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text"
                        style="font-size: 25px;font-weight: 600">{{ $tenShop }}</span>
                </a>
            </li>
            <li class="nav-item  trangthai ">

                <span class="sidebar-icon">
                    <i class="fa-solid fa-house me-2"></i>
                </span>
                <a href="/ChuShop"> <span class="sidebar-text">Trang Chủ</span></a>

                </a>
            </li>


            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-bars me-2"></i>
                        </span>
                        <a href="/ChuShop/lichdatdvs/list?status=1"><span class="sidebar-text">Lịch Đặt Dịch
                                Vụ</span></a>

                    </span>

            </li>

            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-sharp fa-solid fa-paw me-2"></i>
                        </span>
                        <a href="/ChuShop/dichvus/list"><span class="sidebar-text">Dịch Vụ</span></a>
                    </span>

                </span>

            </li>

            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-users "></i>
                        </span>
                        <a href="/ChuShop/nhanviens/list"> <span class="sidebar-text">Nhân Viên</span></a>

                    </span>

            </li>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-brands fa-windows me-2"></i>
                        </span>
                        <a href="/ChuShop/danhmucs/list"><span class="sidebar-text">Danh mục</span></a>
                    </span>

                </span>

            </li>
        </ul>
    </div>
</nav>
