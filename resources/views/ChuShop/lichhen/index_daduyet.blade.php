@extends('ChuShop.main')
@section('content')
    <main class="content" style="height: 600px">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">
                            <h3 style="margin-bottom: 50px">Danh sách đặt dịch vụ</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th style="width: 50px">Ảnh đại diện</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Tổng Tiền</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày Tạo</th>

                                        <th style="width: 80px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($lichdatdvs as $key => $lichdatdv)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td><a href="{{ $lichdatdv->hinhanh }}" target="_blank">
                                                    <img src="{{ $lichdatdv->taikhoans->hinhanh }}" height="30px">
                                                </a>
                                            </td>
                                            <td>{{ $lichdatdv->ten }}</td>

                                            <td>{{ $lichdatdv->sdt }}</td>
                                            <td>{{ number_format($lichdatdv->tongtien) }}VNĐ</td>
                                            <td>{!! \App\Helpers\Helper::trangthai_lichdat($lichdatdv->trangthai) !!}</td>
                                            <td>{{ \Carbon\Carbon::parse($lichdatdv->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss') }}


                                            <td>
                                                <a class="btn btn-primary btn-sm"
                                                    href="/ChuShop/lichdatdvs/edit_daduyet/{{ $lichdatdv->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="removeRow({{ $lichdatdv->id }}, '/admin/accs/destroy')">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.footer')
    </main>
@endsection
