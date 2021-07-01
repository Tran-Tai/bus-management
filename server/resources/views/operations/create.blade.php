@extends('layouts.admin-layout')
@section('title')
Add Staff
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin xe</legend>
        <table>
            <tr>
                <td>
                    <label>Ngày</label>
                </td>
                <td>
                    <input type="date" name="date">
                </td>
            </tr>
            @foreach($routes as $route)
            <tr>
                <td>Tuyến số {{$route->number}}: {{$route->name}}</td>
                <td>
                    <select class="form-control col-12" name="operator_route_{{$route->id}}" required>
                        @foreach ($operators as $operator)
                        <option value="{{$operator->id}}">{{$operator->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @endforeach
        </table>

        <button type="submit" class="btn btn-primary">Thêm thông tin</button>
        <a type="button" class="btn btn-primary" href="/buses">Quay lại danh sách</a>
    </form>
</div>
@php
echo $routes;
echo $operators;
@endphp
@endsection