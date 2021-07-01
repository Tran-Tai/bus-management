@extends('layouts.admin-layout')
@section('title')
Add Route
@endsection
@section('addCSS')
<style>
    .dropdown-content {
        width: 400px;
        overflow: auto;
        z-index: 1;
    }

    option:hover {
        background-color: #ddd;
    }

    .search {
        width: 392px;
    }
</style>
@endsection
@section('body')
@php
    function formatTime($time)
    {
        $second = $time % 60;
        $time_in_minute = ($time - $second) / 60;
        $minute = $time_in_minute % 60;
        $hour = ($time_in_minute - $minute) / 60;

        if ($second < 10) $second = "0" . $second;
        if ($minute < 10) $minute = "0" . $minute;
        if ($hour < 10) $hour = "0" . $hour;

        if ($hour < 1) 
            echo $minute . ":" . $second;
        else echo $hour . ":" . $minute . ":" . $second;
    }
@endphp
<div class="container col-6 my-1 p-1">
    <form>
        <legend>Thông tin tuyến đường</legend>
        <div class="form-group">
            <label>Số tuyến</label>
            <p class="form-control">{{$route->number}}</p>
        </div>
        <div class="form-group">
            <label>Tên tuyến</label>
            <p class="form-control">{{$route->name}}</p>
        </div>
        <div class="form-group">
            <label>Hướng đi</label>
            <p class="form-control">
                @switch($route->direction)
                    @case(1)
                        Tuyến đi
                        @break
                    @case(2)
                        Tuyến về
                        @break
                @endswitch
            </p>
        </div>
        <div class="form-group">
            <label>Thời gian giãn cách</label>
            <p class="form-control">{{formatTime($route->time_interval)}}</p>
        </div>
    </form>
</div>
@if($number > 1)
<div class="container col-8 mt-5 p-1 clearfix">
    <legend>Chi tiết các trạm dừng</legend>
    <table class="table table-sm table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>STT</th>
                <th>Số trạm</th>
                <th>Tên trạm</th>
                <th>Thời gian đến trạm</th>
                <th>Các tuyến đi qua trạm</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stations as $key=>$station)
            <tr>
                <td class="text-center">{{$key + 1}}</td>
                <td class="text-center">{{$station->number}}</td>
                <td class="pl-5">{{$station->name}}</td>
                <td class="text-center">{{formatTime($station->arrive_time)}}</td>
                <td class="text-center">
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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endif
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin trạm</legend>
        <div class="form-group">
            <label for="name">Trạm số {{$number}}</label>
            <div id="dropdown" class="dropdown-content">
                <input class="search" type="text" id="search" placeholder="search for station" onkeyup="filterFunction()" autofocus>
            </div>
            <input type="number" id="station" name="station_id" hidden required>
            <input type="number" id="direction" name="direction" value="{{$route->direction}}" hidden required>
        </div>
        <div class="form-group">
            <label for="time">Thời gian đến trạm</label> <br>
            <input type="number" name="minute" min="0" max="59" value="05" required>
            :
            <input type="number" name="second" min="0" max="59" value="00" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm trạm</button>
        <a type="button" class="btn btn-primary" href="/stations">Quay lại danh sách</a>
    </form>
</div>
<script>
    function filterFunction() {
        var input, filter, option, ul, i, array;
        var list_stations = <?php if (isset($stations)) echo json_encode($list_stations); ?>;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        div = document.getElementById("dropdown");

        option = div.getElementsByTagName("option");
        for (i = option.length - 1; i >= 0; i--) {
            option[i].remove();
        }
        if (filter.length > 0) {
            for (i = 0; i < list_stations.length; i++) {
                txtValue = list_stations[i].name;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    var newlement = document.createElement("option");
                    newlement.setAttribute("value", list_stations[i].id);
                    newlement.setAttribute("onclick", "save(this.innerHTML, this.value)");
                    newlement.innerHTML = list_stations[i].name;

                    div.appendChild(newlement);
                }
            }
        }
    }

    function save(text, id) {
        document.getElementById("search").value = text;
        document.getElementById("station").value = id;
        let option = div.getElementsByTagName("option");
        for (i = option.length - 1; i >= 0; i--) {
            option[i].remove();
        }
    }
</script>
@php
    echo $id . '<br>';
    echo $number . '<br>';
    echo $route . '<br>';
    echo $stations . '<br>';
@endphp
@endsection