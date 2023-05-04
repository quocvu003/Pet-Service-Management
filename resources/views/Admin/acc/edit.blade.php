@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body ">
            <label for="menu">Họ và Tên</label>
            <div class="input-group mb-3">
                <input type="text" name="ten" class="form-control" value="{{ $acc->ten }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Email</label>
            <div class="input-group mb-3">
                <input type="email" name="email"class="form-control"value="{{ $acc->email }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            {{-- <label for="menu">Mật Khẩu(Đã được mã hóa)</label>
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control" value="{{ $acc->matkhau }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span id="toggle-password" class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>
            </div> --}}
            <label for="menu">Số điện thoại</label>
            <div class="input-group mb-3">
                <input type="text" name="sdt"class="form-control"value="{{ $acc->sdt }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>
            <label for="menu">Địa chỉ</label>
            <div class="input-group mb-3">
                <input type="text" name="diachi"class="form-control"value="{{ $acc->diachi }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="menu">Ảnh đại diện</label>
                <input type="file" class="form-control" id="hinhanh">
                <div id="hinhanh_show">
                    <a href="{{ $acc->hinhanh }}" target="_blank">
                        <img src="{{ $acc->hinhanh }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="hinhanh" value="{{ $acc->hinhanh }}" id="hinhanh01">
            </div>

            <div class="form-group">
                <label>Trạng thái</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="trangthai" name="trangthai"
                        {{ $acc->trangthai == 1 ? ' checked=""' : '' }}>
                    <label for="trangthai" class="custom-control-label">Kích Hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_trangthai" name="trangthai"
                        {{ $acc->trangthai == 0 ? ' checked=""' : '' }}>
                    <label for="no_trangthai" class="custom-control-label">khóa</label>
                </div>
            </div>

            {{-- <div class="form-group">
                <label>Phân Quyền</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="admin" name="quyen_id" value="1"
                        {{ $acc->quyen_id == 1 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="admin">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="chushop" name="quyen_id" value="2"
                        {{ $acc->quyen_id == 2 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="chushop">Chủ Shop</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="khachhang" name="quyen_id" value="3"
                        {{ $acc->quyen_id == 3 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="khachhang">Khách hàng</label>
                </div>

            </div> --}}
            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Cập nhật tài khoản</button>
                </div>
                <!-- /.col -->
            </div>
            @csrf

    </form>
@endsection
@section('footer')
@endsection
