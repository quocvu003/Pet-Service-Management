@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Danh Mục</label>
                <input type="text" name="name" value="{{ $danhmuc->ten }}" class="form-control"
                    placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="danhmuccha">

                    <option value="0" {{ $danhmuc->danhmuccha == 0 ? 'selected' : '' }}> Danh Mục Cha </option>
                    @foreach ($danhmucs as $menuParent)
                        <option value="{{ $menuParent->id }}" {{ $danhmuc->danhmuccha == $danhmuc->id ? 'selected' : '' }}>
                            {{ $menuParent->ten }}
                        </option>
                    @endforeach
                </select>
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

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
