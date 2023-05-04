@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục">
            </div>


            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="danhmuccha">
                    <option value="0">Danh mục cha</option>

                    <!-- Thêm danh mục con theo danh mục cha -->
                    @foreach ($danhmucs as $danhmuc)
                        <option value="{{ $danhmuc->id }}">{{ $danhmuc->ten }}</option>
                    @endforeach

                </select>
            </div>





            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tạo danh mục</button>
            </div>
            @csrf
    </form>
@endsection
@section('footer')
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
