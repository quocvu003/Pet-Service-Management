@extends('admin.main')

@section('content')
    @include('admin.alert')
    @if (count($accs) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">STT</th>
                    <th>Logo</th>
                    <th>Tên Shop</th>
                    <th>Chủ Sở Hữu</th>
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
                        <td><a href="{{ $acc->shops->hinhanh }}" target="_blank">
                                <img src="{{ $acc->shops->hinhanh }}" height="50px">
                            </a>
                        </td>
                        <td>{{ $acc->shops->ten }}</td>
                        <td>{{ $acc->ten }}</td>
                        <td>{{ $acc->email }}</td>
                        <td>{!! \App\Helpers\Helper::trangthai($acc->trangthai) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($acc->created_at)->isoFormat('DD/MM/YYYY HH:mm:ss') }}
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/accs/showappli/{{ $acc->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{-- <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $acc->shops->id }}, '/admin/accs/destroyshop')">
                                <i class="fas fa-trash"></i>
                            </a> --}}
                        </td>
                    </tr>
                @endforeach
                {{ $accs->links() }}
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            Tất cả các đơn đăng ký đã được duyệt.
        </div>
    @endif
@endsection
