@extends('ChuShop.main')
@section('content')
    <form action="" method="POST">
        <main class="content">
            @include('admin.alert')
            <div class="row" style="margin: 0 100px">

                <div class="card card-body border-0 shadow mt-3">

                    <h3>Tài khoản nhân viên: {{ $nhanviens->ten }}</h3>
                    <div class="row">
                        <div class="col-md-12 mb-3 d-flex align-items-center">
                            <label for="menu" class="mr-5">Ảnh đại diện</label>
                            <div id="hinhanh_show" style="margin-left: 50px">
                                <a href="{{ $nhanviens->hinhanh }}" target="_blank">
                                    <img src="{{ $nhanviens->hinhanh }}" width="60px" style="border-radius: 50%;">
                                </a>
                            </div>

                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="file" class="form-control " id="hinhanh">
                        </div>
                        <input type="hidden" name="hinhanh" value="{{ $nhanviens->hinhanh }}"id="hinhanh01">
                    </div>






                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Tên Nhân Viên</label>
                                <input class="form-control" type="text" name="ten" value="{{ $nhanviens->ten }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="{{ $nhanviens->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" type="text" name="sdt" value="{{ $nhanviens->sdt }}">
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" type="text" name="diachi" value="{{ $nhanviens->diachi }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="trangthai"
                                    name="trangthai" {{ $nhanviens->trangthai == 1 ? ' checked=""' : '' }}>
                                <label for="trangthai" class="custom-control-label">Kích Hoạt</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_trangthai"
                                    name="trangthai" {{ $nhanviens->trangthai == 0 ? ' checked=""' : '' }}>
                                <label for="no_trangthai" class="custom-control-label">Khóa</label>
                            </div>
                        </div>

                    </div>


                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
                    </div>
                </div>
            </div>
            @csrf
    </form>
@endsection
@include('admin.footer')
<style>
    .row {
        justify-content: center;
        align-items: center
    }
</style>
