@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu Đề</label>
                        <input type="text" name="ten" value="{{ $slider->ten }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường Dẫn</label>
                        <input type="text" name="url" value="{{ $slider->url }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file" class="form-control" id="hinhanh">
                <div id="hinhanh_show">
                    <a href="{{ $slider->hinhanh }}">
                        <img src="{{ $slider->hinhanh }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="hinhanh" value="{{ $slider->hinhanh }}" id="hinhanh01">
            </div>


            <div class="form-group">
                <label for="menu">Sắp Xếp</label>
                <input type="number" name="sapxep" value="{{ $slider->sapxep }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="trangthai" name="trangthai"
                        {{ $slider->trangthai == 1 ? 'checked' : '' }}>
                    <label for="trangthai" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_trangthai" name="trangthai"
                        {{ $slider->trangthai == 0 ? 'checked' : '' }}>
                    <label for="no_trangthai" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Slider</button>
        </div>
        @csrf
    </form>
@endsection
