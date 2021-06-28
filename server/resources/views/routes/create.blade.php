@extends('layouts.admin-layout')
@section('title')
Add Route
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin tuyến</legend>
        <div class="form-group">
            <label for="routename_id">Chọn tuyến</label>
            <select class="form-control col-6" name="routename_id" required>
                @forelse ($routenames as $routename)
                <option value="{{$routename->id}}">Tuyến số {{$routename->number}}: {{$routename->name}}</option>
                @empty
                <option disabled>Không có tuyến phù hợp</option>
                @endforelse
            </select>
        </div>
        <div class="form-group">
            <label for="direction">Hướng đi</label><br>
            <input type="radio" id="leave" name="direction" value="1">
            <label for="direction">Tuyến đi</label><br>
            <input type="radio" id="back" name="direction" value="2">
            <label for="female">Tuyến về</label><br>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Thêm tuyến</button>
        <a type="button" class="btn btn-primary" href="/routes">Quay lại danh sách</a>
    </form>
</div>
@php
echo $routenames
@endphp
@endsection