@extends('layouts.admin-layout')
@section('title')
Add Trips
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form action="/trips/{{$id}}/create/{{$station_id}}" method="POST">
        @csrf
        <input id="trip_id" type="number" name="trip_id" value="{{$id}}" hidden>
        <input id="station_id" type="number" name="station_id" value="{{$station_id}}" hidden>
        <input id="station_number" type="number" name="station_number" value="{{$station_number}}" hidden>
        <input id="route_id" type="number" name="route_id" value="{{$route_id}}" hidden>
        <input id="estimated_time" type="number" name="estimated_time" value="{{$estimated_time}}" hidden>
        <div class="form-group">
            <label>Bạn có muốn xác nhận đến trạm này hay không?</label>
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
    echo date("Y-m-d h:i:sa", $estimated_time) . "<br>";
@endphp
@endsection