@extends('ChuShop.main')
@section('content')
    <main class="content">
        @include('admin.alert')
        <form action="" method="POST">
            <div class="row" style="margin: 0 200px">
                <div class="card card-body border-0 shadow mt-3 mb-5">

                    <h3>Dịch vụ {{ $dichvus->ten }}</h3>
                    <div class="form-group mb-4">
                        <label>Tên dịch vụ</label>
                        <div class="input-group">

                            <input type="text" class="form-control" value="{{ $dichvus->ten }}" id="ten"
                                name="ten" autofocus>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label>Loại Dịch Vụ</label>
                        <div class="input-group">

                            <select class="form-control" name="danhmuc_id">
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ $menu->id == $dichvus->danhmuc_id ? 'selected' : '' }}>
                                        {{ $menu->ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="email">Giá</label>
                        <div class="input-group">

                            <input type="text" class="form-control"value="{{ $dichvus->gia }}" name="gia" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="trangthai"
                                name="trangthai" {{ $dichvus->trangthai == 1 ? ' checked=""' : '' }}>
                            <label for="trangthai" class="custom-control-label">Kích Hoạt</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_trangthai"
                                name="trangthai" {{ $dichvus->trangthai == 0 ? ' checked=""' : '' }}>
                            <label for="no_trangthai" class="custom-control-label">Khóa</label>
                        </div>
                    </div>
                    <div class="mt-3" style="display: flex;justify-content: center;">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">CẬP NHẬT</button>
                    </div>
                    @csrf
                </div>
            </div>

        </form>
        </div>

    </main>
@endsection
