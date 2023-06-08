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
                <a href="/NhanVien" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img src="{{ $logo }}" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text" style="font-size: 30px">{{ $tenShop }}</span>
                </a>
            </li>


            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#submenu-app">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fas fa-list-alt"></i>
                        </span>
                        <a href="/NhanVien/congviecs/index?status=1"><span class="sidebar-text">Công Việc</span></a>

                    </span>
                    {{-- <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span> --}}
                </span>
                {{-- <div class="multi-level collapse " role="list" id="submenu-app" aria-expanded="false">

                    <ul class="flex-column nav">
                        <li class="nav-item ">

                            <a class="nav-link" href="/NhanVien/congviecs/index?status=1">

                                <span class="sidebar-text">Danh sách công việc</span>

                            </a>

                        </li>
                    </ul>
                </div> --}}
            </li>


        </ul>
    </div>
</nav>
