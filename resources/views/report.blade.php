<body>
    <h1 style="text-align: center"> BÁO CÁO DOANH THU</h1>

    <h2 style="text-align: center">Tên Shop : {{ $shop->ten }}</h2>

    <h3>Chủ sở hữu: {{ $users->ten }} - Số điện thoại: {{ $shop->sdt }}</h3>
    <h3></h3>


    <h3>Email: {{ $users->email }} - Địa chỉ: {{ $shop->diachi }}</h3>
    <h3></h3>

    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px">STT</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Số Lượng</th>
                <th>Tổng Tiền</th>
                <th>Nhân Viên</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($lichdatdvs as $key => $lichdatdv)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $lichdatdv->ten }}</td>
                    <td>{{ $lichdatdv->sdt }}</td>
                    <td>{{ $lichdatdv->soluongdv }}</td>
                    <td>{{ number_format($lichdatdv->tongtien) }}VNĐ</td>
                    @foreach ($listnhanviens as $listnhanvien)
                        @if ($listnhanvien->id == $lichdatdv->nhanvien_id)
                            <td>{{ $listnhanvien->ten }}</td>
                        @endif
                    @endforeach

                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="float: right">Tổng tiền: {{ number_format($tongtien) }} VNĐ</h3>

</body>

<style>
    body {
        font-family: 'DejaVu Sans', sans-serif;
        font-size: 10px !important;
    }
</style>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
