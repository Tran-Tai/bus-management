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
@php
@endphp
@endsection