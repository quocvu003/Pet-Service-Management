@extends('admin.main')

@section('content')
    <div class="col-4 mt-3">
        <div class="form-group">
            <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" class="form-control" id="searchInputName" placeholder="Nhập tên Shop" aria-label="Search"
                    aria-describedby="topbar-addon">
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">STT</th>
                <th>Logo</th>
                <th>Tên Shop</th>
                <th>Chủ Sở Hữu</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Ngày Tạo</th>

                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($accs as $key => $acc)
                @php
                    $stt = $key + 1;
                @endphp
                <tr>

                    <td>{{ $stt }}</td>
                    <td><a href="{{ $acc->shops->hinhanh }}" target="_blank">
                            <img src="{{ $acc->shops->hinhanh }}" height="50px">
                        </a>
                    </td>
                    <td>{{ $acc->shops->ten }}</td>
                    <td>{{ $acc->ten }}</td>
                    <td>{{ $acc->email }}</td>
                    <td>{!! \App\Helpers\Helper::trangthai($acc->trangthai) !!}</td>
                    <td>{{ \Carbon\Carbon::parse($acc->created_at)->isoFormat('HH:mm DD/MM/YYYY') }}
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/accs/editshop/{{ $acc->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $acc->shop_id }}, '/admin/accs/destroyshop')">
                            <i class="fas fa-trash"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
            {{ $accs->links() }}

        </tbody>

    </table>
    <div id="noResultsMessage" class="alert alert-danger d-none text-center">Không tìm thấy kết quả.</div>
@endsection
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
