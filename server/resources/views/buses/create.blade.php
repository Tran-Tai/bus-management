@extends('layouts.admin-layout')
@section('title')
Add Staff
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin xe</legend>
        <div class="form-group">
            <label for="number">Biển số xe</label>
            <input type="text" class="form-control" name="number" autofocus required>
        </div>
        <div class="form-group">
            <label for="seat">Số ghế</label><br>
            <input type="number" class="form-control col-4" name="seat" required>
        </div>
        <div class="form-group">
            <label for="capacity">Số hành khách tối đa</label><br>
            <input type="number" class="form-control col-4" name="capacity" required>
        </div>
        <div class="form-group">
            <label for="route_name_id">Tuyến đi</label><br>
            <select class="form-control col-6" name="route_name_id">
            @forelse($route_names as $route_name)
                <option value="{{$route_name->id}}">Tuyến số {{$route_name->number}}: {{$route_name->name}}</option>
            @empty
                <option disabled>Không có tuyến phù hợp</option>
            @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm thông tin</button>
        <a type="button" class="btn btn-primary" href="/buses">Quay lại danh sách</a>
    </form>
</div>
@endsection