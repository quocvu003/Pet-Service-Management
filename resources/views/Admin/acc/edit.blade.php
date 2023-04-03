@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body ">
            <label for="menu">Họ và Tên</label>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" value="{{ $acc->name }}" placeholder="Full name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Email</label>
            <div class="input-group mb-3">
                <input type="email" name="email"class="form-control"value="{{ $acc->email }}" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <label for="menu">Mật Khẩu(Đã được mã hóa)</label>
            <div class="input-group mb-3">
                <input type="password" id="password" name="password" class="form-control"
                    value="{{ $acc->password }}"placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span id="toggle-password" class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye-slash"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $acc->trangthai == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Kích Hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $acc->trangthai == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Hủy Kích Hoạt</label>
                </div>
            </div>
            <div class="form-group">
                <label>Phân Quyền</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="admin" name="role_id" value="1"
                        {{ $acc->role_id == 1 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="admin">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="chushop" name="role_id" value="2"
                        {{ $acc->role_id == 2 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="chushop">ChuShop</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="khachhang" name="role_id" value="3"
                        {{ $acc->role_id == 3 ? 'checked=""' : '' }}>
                    <label class="custom-control-label" for="khachhang">Khách hàng</label>
                </div>

            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
            @csrf






    </form>
@endsection
@section('footer')
@endsection
