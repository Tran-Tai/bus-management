@extends('layouts.admin-layout')
@section('title')
Add Trips
@endsection
@section('body')
<div class="container col-8 mx-auto">
    <div class="container col-4 my-1 p-1 float-left">
        <table class="col-12 table-bordered">
            <legend class="text-center">Vé lượt</legend>
            <tbody>
                <tr>
                    <td class="text-center">Số lượng</td>
                    <td class="text-center">{{$trip_ticket}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container col-4 my-1 p-1 float-left">
        <table class="col-12 table-bordered">
            <legend class="text-center">Vé tuần</legend>
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Từ ngày</th>
                    <th class="text-center">Đến ngày</th>
                </tr>
            </thead>
            <tbody>
                @foreach($week_tickets as $key=>$week_ticket)
                <tr>
                    <td class="text-center">{{$key + 1}}</td>
                    <td class="text-center">{{$week_ticket->start_day}}</td>
                    <td class="text-center">{{$week_ticket->end_day}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container col-4 my-1 p-1 float-left">
        <table class="col-12 table-bordered">
            <legend class="text-center">Vé tháng</legend>
            <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Từ ngày</th>
                    <th class="text-center">Đến ngày</th>
                </tr>
            </thead>
            <tbody>
                @foreach($month_tickets as $key=>$month_ticket)
                <tr>
                    <td class="text-center">{{$key + 1}}</td>
                    <td class="text-center">{{$month_ticket->start_day}}</td>
                    <td class="text-center">{{$month_ticket->end_day}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="clearfix"></div>
<div class="container col-8 mx-auto">
    <form method="POST">
    @csrf
        <input type="number" class="form-control" name="current_amount" value="{{$trip_ticket}}" hidden>
        <div class="container col-4 my-1 p-1 float-left">
            <legend class="text-center">Mua vé lượt</legend>
            <div class="form-group">
                <label for="amount">Số lượng</label><br>
                <input type="number" class="form-control" name="amount" value="0">
            </div>
        </div>
        <div class="container col-4 my-1 p-1 float-left">
            <legend class="text-center">Mua vé tuần</legend>
            <div class="form-group">
                <label for="week_amount">Số lượng</label><br>
                <input type="number" id="week_amount" class="form-control" name="week_amount" min="0" value="1" onchange="getWeekEndday()">
            </div>
            <div class="form-group">
                <label for="week_start_day">Từ ngày</label><br>
                <input type="date" id="week_start_day" class="form-control" name="week_start_day" onchange="getWeekEndday()">
            </div>
            <div class="form-group">
                <label for="week_end_day">Đến ngày</label><br>
                <input type="date" id="week_end_day" class="form-control" name="week_end_day" readonly>
            </div>
        </div>
        <div class="container col-4 my-1 p-1 float-left">
            <legend class="text-center">Mua vé tháng</legend>
            <div class="form-group">
                <label for="month_amount">Số lượng</label><br>
                <input type="number" id="month_amount" class="form-control" name="month_amount"  min="0" value="1" onchange="getMonthEndday()">
            </div>
            <div class="form-group">
                <label for="month_start_day">Từ ngày</label><br>
                <input type="date" id="month_start_day" class="form-control" name="month_start_day" onchange="getMonthEndday()">
            </div>
            <div class="form-group">
                <label for="month_end_day">Đến ngày</label><br>
                <input type="date" id="month_end_day" class="form-control" name="month_end_day" readonly>
            </div>
        </div>
        <input type="submit" value="submit">
    </form>
</div>
<script>
    function getWeekEndday() {
        week_start_day = document.getElementById("week_start_day").value;
        date = new Date(week_start_day);
        weeks = document.getElementById("week_amount").value;
        days = weeks * 7 - 1;
        date.setDate(date.getDate() + days);

        var year = date.getFullYear();

        var month = (1 + date.getMonth()).toString();
        month = month.length > 1 ? month : '0' + month;

        var day = date.getDate().toString();
        day = day.length > 1 ? day : '0' + day;

        end_date =  year + '-' + month + '-' + day;
        document.getElementById("week_end_day").value = end_date;
    }

    function getMonthEndday() {
        month_start_day = document.getElementById("month_start_day").value;
        date = new Date(month_start_day);
        months = document.getElementById("month_amount").value;
        days = months * 30 - 1;
        date.setDate(date.getDate() + days);

        var year = date.getFullYear();

        var month = (1 + date.getMonth()).toString();
        month = month.length > 1 ? month : '0' + month;

        var day = date.getDate().toString();
        day = day.length > 1 ? day : '0' + day;

        end_date =  year + '-' + month + '-' + day;
        document.getElementById("month_end_day").value = end_date;
    }
</script>
@endsection