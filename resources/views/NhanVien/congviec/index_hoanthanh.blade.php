@extends('Nhanvien.main')
@section('content')
    <main class="content" style="height: 600px; margin-top: 20px">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="input-group input-group-merge search-bar">
                                    <span class="input-group-text" id="topbar-addon">
                                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="searchInputName"
                                        placeholder="Nhập tên khách hàng" aria-label="Search"
                                        aria-describedby="topbar-addon">
                                </div>
                            </div>
                        </div>
                        <div class="row d-block mt-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3 style="margin-bottom: 50px">Danh sách công việc</h3>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" style="width: 120px" onchange="handleChange(this)">
                                        <option value="/NhanVien/congviecs/index">Đã Duyệt</option>
                                        <option value="/NhanVien/congviecs/index_hoanthanh" selected>Hoàn Thành</option>
                                    </select>



                                </div>
                            </div>

                            @if (count($congviecs) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th style="width: 50px">Ảnh đại diện</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Thời gian cập nhật</th>
                                            <th style="width: 80px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($congviecs as $key => $congviec)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td><a href="{{ $congviec->hinhanh }}" target="_blank">
                                                        <img src="{{ $congviec->taikhoans->hinhanh }}" height="50px">
                                                    </a>
                                                </td>
                                                <td>{{ $congviec->ten }}</td>
                                                <td>{{ $congviec->soluongdv }}</td>

                                                <td>{{ $congviec->sdt }}</td>
                                                <td>{{ number_format($congviec->tongtien) }}VNĐ</td>
                                                <td>{!! \App\Helpers\Helper::trangthai_lichdat($congviec->trangthai) !!}</td>
                                                <td>{{ \Carbon\Carbon::parse($congviec->updated)->isoFormat('HH:mm:ss DD/MM/YYYY') }}
                                                </td>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/NhanVien/congviecs/show_hoanthanh/{{ $congviec->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="removeRow({{ $congviec->id }}, '/admin/accs/destroy')">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">
                                            Tuyệt vời! Bạn đã hoàn thành tất cả công việc trong ngày hôm nay!.
                                        </div>
                            @endif
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="noResultsMessage" class="alert alert-danger d-none text-center">Không tìm thấy kết quả.</div>
    </main>
@endsection
<script>
    function handleChange(select) {
        var selectedValue = select.value;

        if (selectedValue === '/NhanVien/congviecs/index') {
            // Chuyển trang sang trạng thái "Đã Duyệt"
            window.location.href = selectedValue;
        } else if (selectedValue === '/NhanVien/congviecs/index_hoanthanh') {
            // Chuyển trang sang trạng thái "Hoàn Thành"
            window.location.href = selectedValue;
        }
    }
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById("searchInputName");
        searchInput.addEventListener("input", searchByName);

        function searchByName() {
            var searchValue = searchInput.value.toLowerCase();

            var tableRows = document.querySelectorAll(".table tbody tr");
            var noResultsMessage = document.getElementById("noResultsMessage");
            var hasResults = false;

            tableRows.forEach(function(row) {
                var nameColumn = row.querySelector("td:nth-child(3)");
                var name = nameColumn.innerText.toLowerCase();

                if (name.includes(searchValue)) {
                    row.style.display = "table-row";
                    hasResults = true;
                } else {
                    row.style.display = "none";
                }
            });

            if (hasResults) {
                noResultsMessage.classList.add("d-none");
            } else {
                noResultsMessage.classList.remove("d-none");
            }
        }
    });
</script>
