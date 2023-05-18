@extends('admin.main')



@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $danhmuc->ten }}" class="form-control"
                    placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Tiêu đề</label>
                <textarea name="tieude" id="content "class="form-control">{{ $danhmuc->tieude }}</textarea>
            </div>
            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $danhmuc->mota }}</textarea>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" class="form-control" id="hinhanh">
                <div id="hinhanh_show">
                    <a href="{{ $danhmuc->hinhanh }}">
                        <img src="{{ $danhmuc->hinhanh }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="hinhanh" value="{{ $danhmuc->hinhanh }}" id="hinhanh01">
            </div>
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="trangthai" name="trangthai"
                        {{ $danhmuc->trangthai == 1 ? 'checked=""' : '' }}>
                    <label for="trangthai" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_trangthai" name="trangthai"
                        {{ $danhmuc->trangthai == 0 ? 'checked=""' : '' }}>
                    <label for="no_trangthai" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection
