@extends('layouts.admin-layout')
@section('title')
Trips List
@endsection
@section('header')
Danh sách chuyến
@endsection
@section('body')

<div class="container col-10 my-1 p-1">
    <table class="table table-sm table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>STT chuyến trong ngày</th>
                <th>Giờ khởi hành</th>
                <th>Giờ kết thúc</th>
                <th>Số xe</th>
                <th>Lái xe</th>
                <th>NV soát vé</th>
                <th></th>
            </tr>
        </thead>
        @foreach($trips as $key=>$trip)
        <tbody>
            <tr>
                <td class="text-center align-middle">{{$key + 1}}</td>
                <td class="text-center align-middle">{{date('d/m/Y', strtotime($trip->date))}}</td>
                <td class="text-center align-middle">{{$trip->number}}</td>
                <td class="text-center align-middle">{{date('H:i:s', $trip->start_time)}}</td>
                <td class="text-center align-middle">{{date('H:i:s', $trip->end_time)}}</td>
                <td class="text-center align-middle">{{$trip->bus_number}}</td>
                <td class="align-middle">{{$trip->driver_name}}</td>
                <td class="align-middle">{{$trip->ticket_collector_name}}</td>
                <td class="text-center align-middle"><a type="button" class="btn btn-primary" href="/trips/{{$trip->id}}">Chi tiết</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@php 
    echo $trips
@endphp
@endsection