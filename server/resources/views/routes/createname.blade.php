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
            <label for="number">Số tuyến</label>
            <input type="number" class="form-control" name="number" autofocus required>
        </div>
        <div class="form-group">
            <label for="name">Tên tuyến</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="time_interval">Thời gian giãn cách</label> <br>
            <input type="number" name="time_interval_hour" min="0" max="23" value="00" required>
            :
            <input type="number" name="time_interval_minute" min="0" max="59" value="00" required>
            :
            <input type="number" name="time_interval_second" min="0" max="59" value="00" required>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Thêm tuyến</button>
        <a type="button" class="btn btn-primary" href="/routes">Quay lại danh sách</a>
    </form>
</div>
@endsection