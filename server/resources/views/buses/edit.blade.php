@extends('layouts.admin-layout')
@section('title')
    Bus Edit
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form action="/buses/{{$bus->id}}" class="was-validated" method="POST">
        @method('PUT')
        @csrf
        <legend>Chỉnh sửa thông tin xe</legend>
        <div class="form-group">
            <label for="number">Biển số xe</label>
            <input type="text" class="form-control" name="number" value="{{$bus->number}}" required>
        </div>
        <div class="form-group">
            <label for="seat">Số ghế</label><br>
            <input type="number" name="seat" value="{{$bus->seat}}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Số hành khách tối đa</label><br>
            <input type="number" name="capacity" value="{{$bus->capacity}}" required>
        </div>
        <div class="form-group">
            <label for="route_name_id">Tuyến đi</label><br>
            <select class="form-control col-6" name="route_name_id">
            @forelse($route_names as $route_name)
                <option value="{{$route_name->id}}"
                    @if($route_name->id == $bus->route_name_id)
                        selected
                    @endif
                >Tuyến số {{$route_name->number}}: {{$route_name->name}}</option>
            @empty
                <option disabled>Không có tuyến phù hợp</option>
            @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
        <a type="button" class="btn btn-primary" href="/buses">Quay lại danh sách</a>
    </form>
</div>
@endsection