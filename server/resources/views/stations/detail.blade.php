@extends('layouts.admin-layout')
@section('title')
    Station Info
@endsection
@section('body')
    <div class="container col-6 my-1 p-1">
            <legend>Thông tin trạm</legend>
            <div class="form-group">
                <label>ID</label>
                <p class="form-control">{{$station->id}}</p>
                <label>Tên trạm</label>
                <p class="form-control">{{$station->name}}</p>
                <label>Danh sách các tuyến qua trạm</label>
                <p class="form-control">
                    @php
                        $routes_list_arr = explode(' ', $station->routes_list);
                        foreach($routes_list_arr as $route_list_str) {
                            $pos = strpos($route_list_str, "-");
                            $id = substr($route_list_str,0,$pos);
                            $name = substr($route_list_str,$pos+1);
                            echo "<a href='/routes/" . $id . "'>" . $name . " </a>";
                        }
                    @endphp
                </p>
            </div>
    <div class="text-center"><a href="/stations/{{$station->id}}/edit"
                                    type="button" 
                                    class="btn btn-info py-1 px-3 my-0 rounded float-left">Sửa</a> 
                                <a href="/stations/{{$station->id}}/delete"
                                    type="button" 
                                    class="btn btn-danger py-1 px-3 mx-3 my-0 rounded float-left">Xóa</a>
                                <a type="button" 
                                    class="btn btn-primary py-1 px-3 my-0 rounded float-right" 
                                    href="/stations">Quay lại danh sách</a>
    </div>
    
    </div>
@endsection