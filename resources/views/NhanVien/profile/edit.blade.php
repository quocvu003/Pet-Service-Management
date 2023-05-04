@extends('NhanVien.main')
@section('content')
    <main class="content">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow border-0 text-center p-0">
                    <div class="profile-cover rounded-top" style="background-color: #1F2937">
                    </div>
                    <div class="avatar-xl rounded-circle mx-auto mt-n7 mb-4" id="hinhanh_show">
                        <img src="{{ $user->hinhanh }} ">
                    </div>
                    <div class="card-body pb-5">

                        {{-- <input class="form-control" type="file"
                            id="hinhanh"style="display: block;margin: 0 auto;width: 90px;">
                        <input type="hidden" name="hinhanh" value="{{ $user->hinhanh }}" id="hinhanh01"> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Logo</label>

            <input type="file" id="hinhanh" class="form-control" />
            <div id="hinhanh_show">
            </div>
            <input type="hidden" name="hinhanh" id="hinhanh01">
        </div>


        <div class="card card-body border-0 shadow mb-4">
            <h2 class="h5 mb-4">Thông tin chung</h2>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="first_name">Chủ Sở Hữu</label>
                            <input class="form-control" type="text" name="ten" value="{{ $user->ten }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div>
                            <label for="last_name">Tên user</label>
                            <input class="form-control" type="text" name="tenuser" value="{{ $user->ten }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="email"name="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input class="form-control" type="number" name="sdt" value="{{ $user->sdt }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="address">Địa chỉ user</label>
                            <input class="form-control" type="text" name="diachi" value="{{ $user->diachi }}">
                        </div>
                    </div>

                </div>

                <div class="mt-3" style="display: flex;justify-content: center;">
                    <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Cập nhật</button>
                </div>
                @csrf
            </form>
        </div>

        </div>
    </main>
    @include('admin.footer')
@endsection
