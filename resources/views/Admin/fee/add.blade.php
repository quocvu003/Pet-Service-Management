@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên Shop</label>
                        <select class="form-control" name="shop_id">
                            @foreach ($fees as $fee)
                                <option value="{{ $fee->id }}">
                                    {{ $fee->ten }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fee">Phí thu</label>
                        <input type="number" name="tien" value="{{ old('tien') }}" class="form-control">
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Phí Thu</button>
        </div>
        @csrf
    </form>
@endsection
