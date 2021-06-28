@extends('layouts.admin-layout')
@section('title')
Stations List
@endsection
@section('header')
Danh sách trạm
@endsection
@section('body')
<div class="container col-8 my-1 p-1">
    <form method="POST">
        <div class="input-group mb-3">
            @csrf
            <input type="text" class="form-control" name="keyword">
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>STT</th>
                <th>Tên trạm</th>
                <th>Các tuyến đi qua trạm</th>
                <th></th>
            </tr>
        </thead>
        @foreach($stations as $key=>$station)
        <tr>
            <td class="text-center align-middle">{{$key + 1}}</td>
            <td class="pl-3 align-middle">{{$station->name}}</td>
            <td class="align-middle text-center">
                @php
                $routes_list_arr = explode(' ', $station->routes_list);
                foreach($routes_list_arr as $route_list_str) {
                $pos = strpos($route_list_str, "-");
                $id = substr($route_list_str,0,$pos);
                $name = substr($route_list_str,$pos+1);
                echo "<a href='/routes/" . $id . "'>" . $name . " </a>";
                }
                @endphp
            </td>
            <td class="text-center align-middle"><a type="button" class="btn btn-primary" href="/stations/{{$station->id}}">Chi tiết</a></td>
        </tr>
        @endforeach
    </table>
</div>
<div class="container text-center my-3 p-1">
    <a type="button" class="btn btn-primary" href="/stations/create">Thêm trạm</a>
</div>
@php
echo $stations;
@endphp
@endsection