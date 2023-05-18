@extends('admin.main')



@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="">Tên dịch vụ</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Tiêu đề</label>
                <textarea name="tieude" id="content "class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content "class="form-control"></textarea>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Ảnh</label>

                <input type="file" id="hinhanh" class="form-control" />
                <div id="hinhanh_show">
                </div>
                <input type="hidden" name="hinhanh" id="hinhanh01">
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo dịch vụ</button>
            </div>
            @csrf
    </form>
@endsection
