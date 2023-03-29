@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Khách Hàng</th>
                <th>Email</th>


                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accs as $key => $acc)
                <tr>
                    <td>{{ $acc->id }}</td>
                    <td>{{ $acc->name }}</td>

                    <td>{{ $acc->email }}</td>
                    <td>

                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $acc->id }}, '/admin/customers/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
