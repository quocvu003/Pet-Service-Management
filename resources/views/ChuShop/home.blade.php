@extends('ChuShop.main')
@section('content')
    <section class="content" style="min-height: 1100px;">
        <div class="card-header  d-sm-flex flex-row align-items-center flex-0"
            style="background-color: bisque;margin-bottom: 50px">
            <div class="d-block mb-3 mb-sm-0">
                <div class="fs-5 fw-normal mb-2"> Tổng doanh thu</div>
                <h2 class="fs-3 fw-extrabold"><span id="doanhThu">{{ number_format($doanhthu) }}</span> VNĐ</h2>

            </div>
            <div class="d-flex ms-auto">
                <a href="#" class="btn btn-secondary text-dark btn-sm me-2">Tổng doanh thu</a>

            </div>
        </div>

        <div class="d-flex">

            <div class="col-md-3 mb-3 " style="margin-right: 100px;margin-left: 50px">
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
                                    <h2 class="h6 text-gray-400 mb-0" style="white-space: nowrap;">Dịch vụ chờ duyệt:
                                    </h2>
                                    <h2 class="fw-extrabold mb-2" style="text-align: center;color: rgb(19, 15, 146)">
                                        {{ $dv_choduyet }}</h2>
                                </div>
                                <div style="text-align: center">
                                    <a href="/ChuShop/lichdatdvs/list?status=1" class="small-box-footer fw-extrabold"
                                        style="color: rgb(19, 15, 146)">Xem thêm <i class="fas fa-arrow-circle-right"
                                            style="color: rgb(19, 15, 146)"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 " style="margin-right: 100px;">
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
                                        {{ $dv_hoanthanh }}</h2>
                                </div>
                                <div style="text-align: center">
                                    <a href="/ChuShop/lichdatdvs/list?status=3" class="small-box-footer fw-extrabold"
                                        style="color: rgb(14, 125, 49)">Xem thêm <i class="fas fa-arrow-circle-right"
                                            style="color: rgb(14, 125, 49)"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 ">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block d-xl-flex align-items-center">
                            <div style="max-width:80px"
                                class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                                <div class="icon-shape icon-shape-secondary rounded me-2 me-sm-0">
                                    <i class="fa-solid fa-users fa-xl"></i>
                                </div>

                            </div>

                            <div class="col-12 col-xl-7 px-xl-0">

                                <div class="d-none d-sm-block">
                                    <h2 class="h6 text-gray-400 mb-0" style="white-space: nowrap;">Số lượng Nhân viên:
                                    </h2>
                                    <h2 class="fw-extrabold mb-2" style="text-align: center;color: rgb(182, 25, 20)">
                                        {{ $nhanvien }}</h2>
                                </div>
                                <div style="text-align: center">
                                    <a href="/ChuShop/nhanviens/list" class="small-box-footer fw-extrabold"
                                        style="color: rgb(182, 25, 20)">Xem thêm <i class="fas fa-arrow-circle-right"
                                            style="color: rgb(182, 25, 20)"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4 style="text-align: center;margin-top: 30px">BIỂU ĐỒ THỂ HỆN SỐ LƯỢNG DỊCH VỤ ĐẶT HOÀN THÀNH VÀ TỪ CHỐI THEO
            TỪNG THÁNG</h4>
        <canvas id="myChart"></canvas>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var lichdatdvs = @json($lichdatdvs); // Dữ liệu lichdatdvs từ mã PHP

            // Tạo một đối tượng để lưu trữ số lượng lichdatdvs theo tháng, năm và trạng thái
            var data = {};

            lichdatdvs.forEach(function(lichdatdv) {
                var date = new Date(lichdatdv.ngay); // Tạo đối tượng Date từ trường "ngay"
                var month = date.getMonth() +
                    1; // Lấy tháng (phải cộng thêm 1 vì getMonth() trả về giá trị từ 0 đến 11)
                var year = date.getFullYear(); // Lấy năm

                var key = month + '-' + year; // Tạo khóa cho đối tượng data

                if (!data[key]) {
                    data[key] = {
                        month: month,
                        year: year,
                        status3: 0,
                        status4: 0
                    };
                }

                if (lichdatdv.trangthai == 3) {
                    data[key].status3++;
                } else if (lichdatdv.trangthai == 4) {
                    data[key].status4++;
                }
            });


            // Chuẩn bị dữ liệu cho biểu đồ
            var labels = Object.keys(data); // Nhãn trục x
            var datasetStatus3 = [];
            var datasetStatus4 = [];
            labels.sort(function(a, b) {
                var [monthA, yearA] = a.split('-');
                var [monthB, yearB] = b.split('-');

                if (yearA !== yearB) {
                    return yearA - yearB; // Sắp xếp theo năm tăng dần
                } else {
                    return monthA - monthB; // Sắp xếp theo tháng tăng dần trong cùng một năm
                }
            });

            labels.forEach(function(key) {
                datasetStatus3.push(data[key].status3);
                datasetStatus4.push(data[key].status4);
            });

            // Tạo biểu đồ bằng Chart.js
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Đã hoàn thành',
                        data: datasetStatus3,

                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền 
                        borderColor: 'rgba(54, 162, 235, 1)', // Màu viền 
                        borderWidth: 5,
                        fill: false
                    }, {
                        label: 'Đã từ chối',
                        data: datasetStatus4,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền 
                        borderColor: 'rgba(255, 99, 132, 1)', // Màu viền cho 
                        borderWidth: 5,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Tháng'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Số lượng'
                            },
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            });
        </script>

    </section>
@endsection
