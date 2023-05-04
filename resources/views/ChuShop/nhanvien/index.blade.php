@extends('ChuShop.main')
@section('content')
    <main class="content">
        @include('admin.alert')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="row d-block mt-4">

                            <div class="col-lg-4">
                                <!-- Button Modal -->
                                <button type="button" class="btn btn-block btn-gray-800 mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-form-signup">Thêm tài khoản nhân viên</button>
                                <!-- Modal Content -->
                                <div class="modal fade" id="modal-form-signup" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-form-signup" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <div class="card p-3 p-lg-4">
                                                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="text-center text-md-center mb-4 mt-md-0">
                                                        <h1 class="mb-0 h4">Thêm tài khoản nhân viên</h1>
                                                    </div>

                                                    <form action="" class="mt-4" method="POST">
                                                        <!-- Form -->
                                                        <div class="form-group mb-4">
                                                            <label for="email">Tên Nhân Viên</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <i class="fas fa-user"></i>
                                                                </span>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('ten') }}" placeholder="Nhập Họ và Tên"
                                                                    id="name" name="name" autofocus>
                                                            </div>
                                                            <label for="email">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text" id="basic-addon1">
                                                                    <i class="fas fa-envelope"></i>
                                                                </span>
                                                                <input type="email"
                                                                    class="form-control"value="{{ old('email') }}"
                                                                    placeholder="Nhập Email" id="email" name="email"
                                                                    autofocus>
                                                            </div>
                                                        </div>
                                                        <!-- End of Form -->
                                                        <div class="form-group">
                                                            <!-- Form -->
                                                            <div class="form-group mb-4">
                                                                <label for="password">Mật Khẩu</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <i class="fas fa-lock"></i>
                                                                    </span>
                                                                    <input type="password" placeholder="Nhập Mật Khẩu"
                                                                        class="form-control" id="password" name="password">
                                                                </div>
                                                            </div>
                                                            <!-- End of Form -->
                                                            <!-- Form -->
                                                            <div class="form-group mb-4">
                                                                <label for="confirm_password">Xác Nhận Mật Khẩu</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text" id="basic-addon2">
                                                                        <i class="fas fa-lock-open"></i>
                                                                    </span>
                                                                    <input type="password" placeholder="Nhập Lại Mật Khẩu"
                                                                        class="form-control" id="confirm_password"
                                                                        name="confirm_password">
                                                                </div>
                                                            </div>
                                                            <!-- End of Form -->

                                                        </div>
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-gray-800">TẠO TÀI
                                                                KHOẢN</button>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">STT</th>
                                        <th>Ảnh đại diện</th>
                                        <th>Họ và Tên</th>
                                        <th>Email</th>
                                        <th>Trạng Thái</th>
                                        <th>Ngày Tạo</th>

                                        <th style="width: 100px">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($accs as $key => $acc)
                                        @php
                                            $stt = $key + 1;
                                        @endphp
                                        <tr>
                                            <td>{{ $stt }}</td>
                                            <td><a href="{{ $acc->hinhanh }}" target="_blank">
                                                    <img src="{{ $acc->hinhanh }}" height="40px">
                                                </a>
                                            </td>
                                            <td>{{ $acc->ten }}</td>
                                            <td>{{ $acc->email }}</td>
                                            <td>{!! \App\Helpers\Helper::trangthai($acc->trangthai) !!}</td>
                                            <td>{{ \Carbon\Carbon::parse($acc->created_at)->isoFormat('DD/MM/YYYY') }}</td>

                                            <td>

                                                <a class="btn btn-primary btn-sm"
                                                    href="/admin/accs/edit/{{ $acc->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    onclick="removeRow({{ $acc->id }}, '/admin/accs/destroy')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
