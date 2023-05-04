@extends('ChuShop.main')
@section('content')
    <main class="content">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" style="background-color: rgb(170, 173, 132)">
                    </div>
                    <div class="card-body pb-5">
                        <img src="{{ $shop->hinhanh }}" class="avatar-xl rounded-circle mx-auto mt-n7 mb-4"
                            alt="Neil Portrait">
                        <h1>{{ $shop->ten }}</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin chung</h2>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="first_name">Chủ Sở Hữu</label>
                        <label class="form-control">{{ $user->ten }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div>
                        <label for="last_name">Tên Shop</label>
                        <label class="form-control">{{ $shop->ten }}</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <label class="form-control">{{ $user->email }}</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <label class="form-control">{{ $shop->sdt }}</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label for="address">Địa chỉ Shop</label>
                        <label class="form-control">{{ $shop->diachi }}</label>
                    </div>
                </div>

            </div>

            <div class="mt-3" style="display: flex;justify-content: center;">
                <a href="/ChuShop/profiles/edit">
                    <button class="btn btn-gray-800 mt-2 animate-up-2">Chỉnh Sửa </button></a>
            </div>

        </div>

        </div>






    </main>
@endsection
