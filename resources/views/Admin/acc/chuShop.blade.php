@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Shop</th>
                <th>Email</th>
                <th>Trạng Thái</th>
                <th>Cập Nhật Lần Cuối</th>

                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accs as $key => $acc)
                <tr>
                    <td>{{ $acc->id }}</td>
                    <td>{{ $acc->name }}</td>
                    <td>{{ $acc->email }}</td>
                    <td>{!! \App\Helpers\Helper::active($acc->trangthai) !!}</td>
                    <td>{{ $acc->updated_at }}</td>
                    <td>

                        <a class="btn btn-primary btn-sm" href="/admin/accs/edit/{{ $acc->id }}">
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
@endsection
