@extends('ChuShop.main')
@section('content')
    <form action="" method="POST" class="bg0 p-t-130 p-b-85" style="margin-bottom: 200px">
        <div class="card-body">
            <h2 style="margin-left: 400px">Chi tiết lịch đặt dịch vụ</h2>
            <div class="row" style="justify-content: center; align-items: center;">



                <div class="col-md-3">
                    <div class="form-group">
                        <label for="menu">Tên Shop</label>
                        <label class="form-control"> {{ $lichdats->shops->ten }} </label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <label class="form-control">{{ $lichdats->shops->diachi }} </label>
                    </div>
                </div>
            </div>

            <div class="row" style="justify-content: center; align-items: center;">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Tên người đặt lịch</label>

                        <label class="form-control">{{ $lichdats->ten }} </label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Email</label>
                        <label class="form-control">{{ $lichdats->email }} </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Số điện thoại</label>
                        <label class="form-control">{{ $lichdats->sdt }} </label>
                    </div>
                </div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Ngày</label>
                        <label class="form-control">{{ \Carbon\Carbon::parse($lichdats->ngay)->isoFormat('DD/MM/YYYY') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Giờ</label>
                        <label class="form-control">{{ $lichdats->gio }} </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="menu">Loại</label>
                        <label class="form-control">
                            @if ($lichdats->loaithucung == 1)
                                Chó
                            @elseif ($lichdats->loaithucung == 2)
                                Mèo
                            @endif
                        </label>

                    </div>
                </div>
            </div>

            <div class="row" style="justify-content: center; align-items: center;">

                <div class="col-md-3">

                    <label>Dịch vụ </label><br>

                    @foreach ($dichvu_dichvudats as $dichvu_dichvudat)
                        <ul>
                            <li>{{ $dichvu_dichvudat->dichvus->ten }}</li>
                        </ul>
                    @endforeach



                </div>
                <div class="col-md-3">

                    <label for="menu">Tổng giá (VNĐ)</label>
                    <label class="form-control">{{ number_format($lichdats->tongtien) }} VNĐ </label>

                </div>
            </div>
            <div class="row" style="justify-content: center; align-items: center;">

                <div class="col-md-6">
                    <label>Nhân viên</label>
                    <div class="input-group">
                        <select class="form-control" name="nhanvien">
                            {{ $lichdats->nhanvien_id }}
                            @foreach ($listnhanviens as $listnhanvien)
                                <option value="{{ $listnhanvien->id }}"
                                    {{ $listnhanvien->id == $lichdats->nhanvien_id ? 'selected' : '' }}>
                                    {{ $listnhanvien->ten }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <input type="hidden" name="trangthai" value="2">
            <div class="card-footer d-flex justify-content-center" style="margin-bottom: 200px">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            @csrf
    </form>
@endsection
