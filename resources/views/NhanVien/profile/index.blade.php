@extends('NhanVien.main')
@section('content')
    <main class="content">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" style="background-color: rgb(170, 173, 132)">
                    </div>
                    <div class="card-body pb-5">
                        <img src="{{ $user->hinhanh }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4">
                        <h1>{{ $user->ten }}</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin chung</h2>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="first_name">Họ và Tên</label>
                        <label class="form-control">{{ $user->ten }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <label class="form-control">{{ $user->email }}</label>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" value="{{ $user->sdt }}">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="address">Địa chỉ </label>
                        <input class="form-control" type="text" value="{{ $user->diachi }}">
                    </div>
                </div>
            </div>








            <div class="mt-3" style="display: flex;justify-content: center;">
                <a href="/NhanVien/profiles/edit">
                    <button class="btn btn-gray-800 mt-2 animate-up-2">Chỉnh Sửa </button></a>
            </div>

        </div>

        </div>






    </main>
@endsection
