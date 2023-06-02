@extends('ChuShop.main')
@section('content')
    <main class="content">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-form-add">Thêm dịch vụ thú
                                    cưng</button>
                                <!-- Modal thêm dịch vụ -->
                                <div class="modal fade" id="modal-form-add" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-form-signup" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card p-3 p-lg-4">
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="text-center text-md-center mb-4 mt-md-0">
                                                        <h1 class="mb-0 h4">Thêm dịch vụ thú cưng</h1>
                                                    </div>

                                                    <form action="" class="mt-4" method="POST"
                                                        enctype="multipart/form-data">
                                                        <!-- Form -->
                                                        <div class="form-group mb-4">
                                                            <label>Tên dịch vụ</label>
                                                            <div class="input-group">

                                                                <input type="text" class="form-control"
                                                                    value="{{ old('ten') }}" placeholder="Nhập tên "
                                                                    id="name" name="ten" autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label>Loại Dịch Vụ</label>
                                                            <div class="input-group">

                                                                <select class="form-control" name="danhmuc_id">
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->ten }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="email">Giá</label>
                                                            <div class="input-group">

                                                                <input type="text"
                                                                    class="form-control"value="{{ old('gia') }}"
                                                                    placeholder="Nhập giá " name="gia">
                                                            </div>
                                                        </div>

                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-gray-800">THÊM DỊCH
                                                                VỤ</button>
                                                        </div>
                                                </div>

                                                @csrf
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- End of Modal Content -->
                        </div>
                        @if (count($dichvus) > 0)
                            <div style='overflow-x:scroll'>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px">STT</th>
                                            <th>Tên Dịch Vụ</th>
                                            <th>Danh Mục Dịch Vụ</th>
                                            <th>Giá</th>

                                            <th>Trạng Thái</th>
                                            <th>Ngày Tạo</th>

                                            <th style="width: 100px">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dichvus as $key => $dichvu)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $dichvu->ten }}</td>
                                                <td>{{ $dichvu->danhmucs->ten }}</td>
                                                <td>{{ number_format($dichvu->gia) }} VNĐ</td>
                                                <td>{!! \App\Helpers\Helper::trangthai($dichvu->trangthai) !!}</td>
                                                <td>{{ \Carbon\Carbon::parse($dichvu->created_at)->isoFormat('HH:mm:ss DD/MM/YYYY') }}
                                                <td>
                                                </td>

                                                <td>

                                                    <a class="btn btn-primary btn-sm"
                                                        href="/ChuShop/dichvus/edit/{{ $dichvu->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="removeRow({{ $dichvu->id }}, '/admin/accs/destroy')">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    Shop của bạn hiện chưa có dịch vụ nào!
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('admin.footer')
    </main>
@endsection
