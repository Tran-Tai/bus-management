@extends('layouts.admin-layout')
@section('title')
    Routes List
@endsection
@section('header')
    Đường đi
@endsection
@section('body')
    @php
        function formatTime($time)
        {
            $second = $time % 60;
            $time_in_minute = ($time - $second) / 60;
            $minute = $time_in_minute % 60;
            $hour = ($time_in_minute - $minute) / 60;

            if ($second < 10) $second="0" . $second; 
            if ($minute < 10) $minute="0" . $minute; 
            if ($hour < 10) $hour="0" . $hour; 
            if ($hour < 1) echo $minute . ":" . $second; else echo $hour . ":" . $minute . ":" . $second; } 
    @endphp 
    <div class="container col-8 my-1 p-1">
    <h3>Đường đi từ {{$paths[0]->station_name}} đến {{$paths[count($paths)-1]->station_name}}</h3>
    <table class="table table-sm table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>STT</th>
                <th>Đường đi</th>
            </tr>
        </thead>
        @for($i = 0; $i < count($paths) - 1; $i++)
        <tr>
            <td class="text-center align-middle">{{$i + 1}}</td>
            <td class="pl-3 align-middle">
            Đi theo tuyến số {{$paths[$i]->route_number}}: {{$paths[$i]->route_name}}, tuyến 
            @switch($paths[$i]->route_direction)
                @case(1)
                    đi
                    @break
                @case(2)
                    về
                    @break
            @endswitch
             từ {{$paths[$i]->station_name}} đến {{$paths[$i + 1]->station_name}}
             </td>
        </tr>
        @endfor
    </table>
    </div>
    <div class="container text-center my-3 p-1">
        <a type="button" class="btn btn-primary" href="/routes/createname">Thêm thông tin tuyến</a>
        <a type="button" class="btn btn-primary" href="/routes/create">Thiết lập chi tiết tuyến</a>
    </div>
    @endsection