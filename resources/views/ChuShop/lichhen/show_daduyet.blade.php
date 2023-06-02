@extends('ChuShop.main')
@section('content')
    <form action="" method="POST">
        <main class="content">
            @include('admin.alert')
            <div class="row" style="margin: 0 50px">

                <div class="card card-body border-0 shadow mt-3 mb-5">
                    <h2>Chi tiết lịch đặt dịch vụ</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên Shop</label>
                                <label class="form-control"> {{ $lichdats->shops->ten }} </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <label class="form-control">{{ $lichdats->shops->diachi }} </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Tên người đặt lịch</label>

                                <label class="form-control">{{ $lichdats->ten }} </label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Email</label>
                                <label class="form-control">{{ $lichdats->email }} </label>
                                <input type="hidden" value="{{ $lichdats->email }}" name="email">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Số điện thoại</label>
                                <label class="form-control">{{ $lichdats->sdt }} </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Ngày</label>
                                <label
                                    class="form-control">{{ \Carbon\Carbon::parse($lichdats->ngay)->isoFormat('DD/MM/YYYY') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Giờ</label>
                                <label class="form-control">{{ $lichdats->gio }} </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
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
                    <div class="row">
                        <div class="col-md-8 mb-3">

                            <label>Dịch vụ </label><br>

                            @foreach ($dichvu_dichvudats as $key => $dichvu_dichvudat)
                                <ul>
                                    <li>{{ ++$key }}. {{ $dichvu_dichvudat->dichvus->ten }}</li>
                                </ul>
                            @endforeach



                        </div>
                        <div class="col-md-4 mb-3">

                            <label for="menu">Tổng giá (VNĐ)</label>
                            <label class="form-control">{{ number_format($lichdats->tongtien) }} VNĐ </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Nhân viên</label>
                            <div class="input-group">
                                <select class="form-control" name="nhanvien_id">
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

                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </main>
        @csrf
    </form>
@endsection
