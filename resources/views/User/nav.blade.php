@include('ChuShop.head')
<style>
    .nav-link {
        display: {{ $display }};
    }

    .main-menu li a {
        font-size: 16px;
        font-family: "Inter", sans-serif;
        font-weight: 600;
    }

    .dropdown-menu.show {
        left: 145px !important;
    }

    .sub-menu {
        min-width: 260px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        border-radius: 6px;
    }

    .sub-menu li:hover {
        background-color: #6c7ae0
    }

    .sub-menu li a:hover {
        color: white;
    }
</style>
<header>
    @php $menusHtml = \App\Helpers\Helper::danhmucs($danhmucs); @endphp

    <!-- Header desktop -->
    <div class="container-menu-desktop">


        <div class="wrap-menu-desktop menu_desktop_update">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="/template/petcare.png" alt="IMG-LOGO" width="70px">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu" style="">
                        <li class="active-menu">
                            <a href="/">Trang Chủ</a>
                        </li>

                        <li>
                            <a href="/shop">Các Shop Thú Cưng</a>
                        </li>

                        <li>
                            <a href="#"> Dịch Vụ Thú Cưng </a>

                            <ul class="sub-menu">
                                @foreach ($danhmucs as $danhmuc)
                                    <li>
                                        <a href="/dichvu/{{ $danhmuc->id }}">{{ $danhmuc->ten }}</a>
                                    </li>
                                @endforeach
                            </ul>



                        </li>

                        <li>
                            <a href="">Khuyến mãi</a>
                        </li>
                        <li>
                            <a href="">Về Chúng Tôi</a>
                        </li>

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">

                    <div>
                        <li class="nav-item dropdown ms-lg-3" style="margin-left: 50px;display: flex">


                            <a class="nav-link dropdown-toggle pt-1 px-0 dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="{{ $avatar }}">
                                </div>
                            </a>


                            <div style="margin-top: 15px;margin-left: 25px;">
                                <a href="{{ $link }}"> <span
                                        style="font-weight: 600">{{ $username }}</span></a>
                            </div>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1 "
                                style="margin-left: 145px !important">
                                <a class="dropdown-item d-flex align-items-center" href="/profiles/index">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Trang cá nhân
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/datlichs/index">
                                    <div class="dropdown-icon text-gray-400 me-2" style="margin-left: 3px">
                                        <i class="fas fa-list"></i>
                                    </div>


                                    Đặt dịch vụ
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Đổi mật khẩu
                                </a>


                                <a class="dropdown-item d-flex align-items-center" href="/logout">
                                    <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>
                    </div>

                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="/template/petcare.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>

            <li>
                <a href="/shop">Các Shop Thú Cưng</a>
            </li>

            <li>
                <a href="#"> Dịch Vụ Thú Cưng </a>

                <ul class="sub-menu">
                    @foreach ($danhmucs as $danhmuc)
                        <a href="/dichvu/{{ $danhmuc->id }}">
                            <li>{{ $danhmuc->ten }}</li>
                        </a>
                    @endforeach
                </ul>



            </li>

            <li>
                <a href="">Khuyến mãi</a>
            </li>
            <li>
                <a href="">Về Chúng Tôi</a>
            </li>

        </ul>



    </div>


</header>
<!-- Core -->
<script src="/template/chuShop/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="/template/chuShop/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Vendor JS -->
<script src="/template/chuShop/vendor/onscreen/dist/on-screen.umd.min.js"></script>

<!-- Slider -->
<script src="/template/chuShop/vendor/nouislider/distribute/nouislider.min.js"></script>

<!-- Smooth scroll -->
<script src="/template/chuShop/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

<!-- Charts -->
<script src="/template/chuShop/vendor/chartist/dist/chartist.min.js"></script>
<script src="/template/chuShop/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

<!-- Datepicker -->
<script src="/template/chuShop/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Sweet Alerts 2 -->
<script src="/template/chuShop/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="/template/chuShop/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

<!-- Notyf -->
<script src="/template/chuShop/vendor/notyf/notyf.min.js"></script>

<!-- Simplebar -->
<script src="/template/chuShop/vendor/simplebar/dist/simplebar.min.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="/template/chuShop/assets/js/volt.js"></script>
