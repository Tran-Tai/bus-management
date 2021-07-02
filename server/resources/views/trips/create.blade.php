@extends('layouts.admin-layout')
@section('title')
Add Trips
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin nhóm số {{$group}}</legend>
        <div class="form-group">
            <label for="routename_id">Chọn lái xe</label>
            <select class="form-control col-6" name="driver_id" required>
                @forelse ($drivers as $driver)
                <option value="{{$driver->id}}">{{$driver->name}}</option>
                @empty
                <option disabled selected>Không có nhân viên phù hợp</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="ticket_collector_id">Chọn Nhân viên soát vé</label>
            <select class="form-control col-6" name="ticket_collector_id" required>
                @forelse ($ticket_collectors as $ticket_collector)
                <option value="{{$ticket_collector->id}}">{{$ticket_collector->name}}</option>
                @empty
                <option disabled selected>Không có nhân viên phù hợp</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="bus_id">Chọn Xe buýt</label>
            <select class="form-control col-6" name="bus_id" required>
                @forelse ($buses as $bus)
                <option value="{{$bus->id}}">{{$bus->number}}</option>
                @empty
                <option disabled selected>Không có xe phù hợp</option>
                @endforelse
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm chuyến</button>
        <a type="button" class="btn btn-primary" href="/trips/route/{{$route_name->first_route_id}}">Đến danh sách chuyến</a>
    </form>
</div>
@endsection