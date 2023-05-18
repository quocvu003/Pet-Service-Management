@extends('user.main')
@section('content')
    <section>
        <div class="row" style="margin: 80px ">

            <div class="card shadow border-0 text-center p-0 mt-3">

                @include('admin.alert')



                <h3 style="margin: 30px 0;text-align: center">Danh Sách Đặt Dịch Vụ</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 30px">STT</th>
                            <th>Tên Người Đặt </th>
                            <th>Tên Shop</th>
                            <th>Ngày</th>
                            <th>Giờ</th>
                            <th>Loại Thú Cưng</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng Thái</th>
                            <th style="width: 100px">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($dichvudats as $key => $dichvudat)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $dichvudat->ten }}</td>
                                <td>{{ $dichvudat->shops->ten }}</td>
                                <td>{{ \Carbon\Carbon::parse($dichvudat->ngay)->isoFormat('DD/MM/YYYY') }}</td>
                                <td>{{ $dichvudat->gio }}</td>
                                <td>
                                    @if ($dichvudat->loaithucung == 1)
                                        Chó
                                    @elseif ($dichvudat->loaithucung == 2)
                                        Mèo
                                    @endif
                                </td>
                                <td>{{ number_format($dichvudat->tongtien) }} VNĐ</td>
                                <td>{!! \App\Helpers\Helper::trangthai_lichdat($dichvudat->trangthai) !!}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/datlichs/edit/{{ $dichvudat->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm"
                                        onclick="removeRow({{ $dichvudat->id }}, '/datlichs/destroy')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div style="display: flex;justify-content: center;align-content: center; margin-top: 50px">
            {{ $dichvudats->links() }}</div>
    </section>
@endsection
