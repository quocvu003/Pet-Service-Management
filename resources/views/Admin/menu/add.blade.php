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


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo dịch vụ</button>
            </div>
            @csrf
    </form>
@endsection
