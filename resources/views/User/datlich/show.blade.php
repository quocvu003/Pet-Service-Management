@extends('user.main')

@section('content')
    <section style="margin-bottom: 50px">
        <div class="row" style="margin: 80px 100px 0 100px ">

            <div class="card card-body border-0 shadow mt-3 mb-5">

                <div class="card-body">
                    <h2 style="margin-left: 400px;margin-bottom: 50px">Chi tiết lịch đặt dịch vụ</h2>

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
                                {{-- <input type="text" name="ten" value="{{ $lichdats->ten }}" class="form-control"
                                        placeholder="Nhập tên"> --}}
                                <label class="form-control"> {{ $lichdats->ten }} </label>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Email</label>
                                {{-- <input type="email" name="email" value="{{ $lichdats->email }}" class="form-control"
                                        placeholder="Nhập email"> --}}
                                <label class="form-control"> {{ $lichdats->email }} </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Số điện thoại</label>
                                {{-- <input type="text" name="sdt" value="{{ $lichdats->sdt }}" class="form-control"
                                        placeholder="Nhập số điện thoại"> --}}
                                <label class="form-control"> {{ $lichdats->sdt }} </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Ngày</label>
                                {{-- <input type="date" name="ngay" value="{{ $lichdats->ngay }}" class="form-control"> --}}
                                <label class="form-control"> {{ $lichdats->ngay }} </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="menu">Giờ</label>
                                {{-- <input type="time" name="gio" value="{{ $lichdats->gio }}" class="form-control"> --}}
                                <label class="form-control"> {{ $lichdats->gio }} </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">

                            <label for="menu">Loại</label>

                            {{-- <select class="form-control" name="loaithucung">
                                    <option value="1" {{ $lichdats->loaithucung == 1 ? 'selected' : '' }}>Chó
                                    </option>
                                    <option value="2" {{ $lichdats->loaithucung == 2 ? 'selected' : '' }}>Mèo</option>
                                </select> --}}
                            @if ($lichdats->loaithucung == 1)
                                <label class="form-control"> Chó</label>
                            @else
                                <label class="form-control"> Mèo</label>
                            @endif
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
                            <input class="form-control" name='tongtien' id='tongtien' value={{ $lichdats->tongtien }}
                                hidden>

                            <label for="menu">Tổng giá (VNĐ)</label>
                            <input class="form-control" name='tongtiensting' id='tongtiensting'
                                value={{ number_format($lichdats->tongtien) }} disabled>

                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="/datlichs/index"><button class="btn btn-primary">Quay lại</button></a>


                    </div>
                </div>

            </div>
        </div>



    </section>
@endsection
