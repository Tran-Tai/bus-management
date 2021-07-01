@extends('layouts.admin-layout')
@section('title')
Add Trips
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form action="/trips/{{$id}}/ticket/{{$station_id}}" method="POST">
        @csrf
        <input id="trip_id" type="number" name="trip_id" value="{{$id}}" hidden>
        <input id="station_id" type="number" name="station_id" value="{{$station_id}}" hidden>
        <input id="route_id" type="number" name="route_id" value="{{$route_id}}" hidden>
        <div class="form-group">
            <label for="normal_passenger">Số khách mua vé trực tiếp</label>
            <input type="number" class="form-control col-4" name="normal_passenger" autofocus required>
        </div>
        <div class="form-group">
            <label for="reserved_passenger">Số khách mua vé online</label><br>
            <input type="number" class="form-control col-4" name="reserved_passenger" required>
        </div>
        <div class="form-group">
            <label for="leave_passenger">Số khách xuống xe</label><br>
            <input type="number" class="form-control col-4" name="leave_passenger" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Xác nhận</button>
            <a type="button" href="/trips/{{$id}}" class="btn btn-primary">Bỏ qua</a>
        </div>
    </form>
</div>
@php 
    echo $id . "<br>";
    echo $station_id . "<br>";
    echo $route_id . "<br>";
    echo $reserved_code;
@endphp
@endsection