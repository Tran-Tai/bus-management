@extends('layouts.admin-layout')
@section('title')
Add Trips
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin chuyến</legend>
        <div class="form-group">
            <label for="name">Tuyến</label>
            <input id="route_name_id" type="number" name="route_name_id" value="{{$route_name->id}}" hidden>
            <p class="form-control">Số {{$route_name->number}}: {{$route_name->name}}</p>
        </div>
        <div class="form-group">
            <label for="direction">Hướng đi</label><br>
            <input type="radio" id="leave" name="direction" value="1">
            <label for="leave">Tuyến đi</label><br>
            <input type="radio" id="back" name="direction" value="2">
            <label for="female">Tuyến về</label><br>
        </div>
        <div class="form-group">
            <label for="date">Ngày</label>
            <input id="date" type="date" class="form-control" name="date" required onblur="getAvailable()">
        </div>
        <div class="form-group">
            <label for="time">Thời gian khởi hành</label> <br>
            <input id="start_hour" type="number" name="start_hour" min="00" max="23" value="00" required onchange="getAvailable()">
            :
            <input id="start_minute" type="number" name="start_minute" min="0" max="59" value="00" required onchange="getAvailable()">
            :
            <input id="start_second" type="number" name="start_second" min="0" max="59" value="00" required onchange="getAvailable()">
        </div>
        <div id="getData">

        </div>
        <button type="submit" class="btn btn-primary">Thêm chuyến</button>
        <a type="button" class="btn btn-primary" href="/trips/route/{{$route_name->first_route_id}}">Đến danh sách chuyến</a>
    </form>
</div>
<script>
    function getAvailable() {
        route_name_id = document.getElementById("route_name_id").value;
        date = document.getElementById("date").value;
        hour = document.getElementById("start_hour").value;
        minute = document.getElementById("start_minute").value;
        second = document.getElementById("start_second").value;
        
        var radios = document.getElementsByName('direction');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                direction = radios[i].value;
                break;
            }
        }

        const data = {
            _token: document.querySelector(`[name="_token"]`).value,
            route_name_id: route_name_id,
            direction : direction,
            date: date,
            hour: hour,
            minute: minute,
            second: second
        }

        console.log(data);

        $.ajax({
            url: '/trips/getInfo',
            type: 'POST',
            data: data,
            success: function(xml) {
                console.log(xml);
                document.getElementById("getData").innerHTML = xml;
            },
            error: function() {
                alert("Get Failed");
            }
        })
    }
</script>
@endsection