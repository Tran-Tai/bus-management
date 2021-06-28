@extends('layouts.admin-layout')
@section('title')
Trips List
@endsection
@section('header')
Đặt vé
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form method="POST">
        @csrf
        <label for="trip_id">Trip ID</label></br>
        <input id="trip_id" type="number" name="trip_id"></br>
        <label for="station_id">Station ID</label></br>
        <input id="station_id" type="number" name="station_id"></br>
        <label for="ticket_type">Ticket Type</label></br>
        <input id="route_id" type="number" name="ticket_type"></br>
        <input type="submit" value="Đặt">
    </form>
</div>
@endsection