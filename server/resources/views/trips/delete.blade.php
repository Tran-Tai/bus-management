@extends('layouts.admin-layout')
@section('title')
    Stations Delete
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form action="/trips/{{$id}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="form-group">
            <label>Bạn có muốn hủy chuyến này hay không?</label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Hủy</button>
            <a type="button" href="/trips/{{$id}}" class="btn btn-primary">Bỏ qua</a>
        </div>
    </form>
</div>
@php 
    echo $id;
    echo $station_id;
    echo $route_id;
    echo $estimated_time;
    echo $actual_time;
@endphp
@endsection