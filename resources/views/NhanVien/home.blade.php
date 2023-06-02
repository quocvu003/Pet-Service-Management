@extends('NhanVien.main')
@section('content')
    <section class="content mt-5">
        <div class="d-flex ">
            <div class="col-md-3 mb-3 " style="margin-right: 200px;margin-left: 150px">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div style="max-width:80px"
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-2 me-sm-0" style="width: 50px;">
                                    <i class="fa-solid fa-square-check fa-xl"></i>
                                </div>
                            </div>
                            <div class="col-12 col-xl-7 px-xl-0">

                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0" style="white-space: nowrap;">Dịch vụ đã hoàn thành:
                                    </h2>
                                    <h2 class="fw-extrabold mb-2" style="text-align: center;color: rgb(14, 125, 49)">
                                        {{ $dv_hoanthanh }}
                                    </h2>
                                </div>
                                <div style="text-align: center">
                                    <a href="/NhanVien/congviecs/index" class="small-box-footer fw-extrabold"
                                        style="color: rgb(14, 125, 49)">Xem thêm <i class="fas fa-arrow-circle-right"
                                            style="color: rgb(14, 125, 49)"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 " style="margin-right: 100px">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div style="max-width:80px"
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-2 me-sm-0">
                                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>

                            </div>

                            <div class="col-12 col-xl-7 px-xl-0">

                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0" style="white-space: nowrap;">Dịch vụ cần thực hiện:
                                    </h2>
                                    <h2 class="fw-extrabold mb-2" style="text-align: center;color: rgb(19, 15, 146)">
                                        {{ $dv_cho }}
                                    </h2>
                                </div>
                                <div style="text-align: center">
                                    <a href="/NhanVien/congviecs/index_hoanthanh" class="small-box-footer fw-extrabold"
                                        style="color: rgb(19, 15, 146)">Xem thêm <i class="fas fa-arrow-circle-right"
                                            style="color: rgb(19, 15, 146)"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
