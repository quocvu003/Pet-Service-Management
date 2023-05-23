@extends('Nhanvien.main')
@section('content')
    <main class="content" style="height: 600px; margin-top: 20px">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">
                            <h3 style="margin-bottom: 50px">Danh sách công việc</h3>
                            @if (count($congviecs) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">STT</th>
                                            <th style="width: 50px">Ảnh đại diện</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Số điện thoại</th>
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

                                                <td>{{ $congviec->sdt }}</td>
                                                <td>{{ number_format($congviec->tongtien) }}VNĐ</td>
                                                <td>{!! \App\Helpers\Helper::trangthai_lichdat($congviec->trangthai) !!}</td>
                                                <td>{{ \Carbon\Carbon::parse($congviec->updated)->isoFormat('DD/MM/YYYY HH:mm:ss') }}
                                                </td>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm"
                                                        href="/NhanVien/congviecs/edit/{{ $congviec->id }}">
                                                        <i class="fas fa-edit"></i>
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


    </main>
@endsection
