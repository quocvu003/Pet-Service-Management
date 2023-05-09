@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="">Tên dịch vụ</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
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
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
