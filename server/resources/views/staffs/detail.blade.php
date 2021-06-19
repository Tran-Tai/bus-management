@extends('layouts.admin-layout')
@section('title')
Staff Info
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form>
        <legend>Thông tin nhân viên</legend>
        <div class="form-group">
            <label>Họ và tên</label>
            <p class="form-control">{{$staff->name}}</p>
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <p class="form-control">
                @switch($staff->gender)
                @case(1)
                Nam
                @break
                @case(0)
                Nữ
                @break
                @endswitch
            </p>
        </div>
        <div class="form-group">
            <label">Ngày sinh</label>
                <p class="form-control">{{$staff->birthday}}</p>
        </div>
        <div class="form-group">
            <label>Số CMND</label>
            <p class="form-control">{{$staff->identity_number}}</p>
        </div>
        <div class="form-group">
            <label>Vị trí</label><br>
            <p class="form-control">
                @switch($staff->role_code)
                @case(1)
                Lái xe
                @break
                @case(2)
                Soát vé
                @break
                @case(3)
                Điều phối viên
                @break
                @endswitch
            </p>
        </div>
    </form>
</div>
@if($staff->role_code < 3) <div class="container col-10 my-1 p-1">
    <table class="table table-sm table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
            <tr>
                <th>STT</th>
                <th>Ngày</th>
                <th>Tuyến</th>
                <th>Hướng</th>
                <th>STT chuyến trong ngày</th>ư
                <th>Giờ khởi hành</th>
                <th>Giờ kết thúc</th>
                <th>Số xe</th>
                @switch($staff->role_code)
                @case(1)
                <th>NV soát vé</th>
                @break
                @case(2)
                <th>Lái xe</th>
                @break
                @endswitch
                <th></th>
            </tr>
        </thead>
        @foreach($trips as $key=>$trip)
        <tbody>
            <tr>
                <td class="text-center align-middle">{{$key + 1}}</td>
                <td class="text-center align-middle">{{date('d/m/Y', strtotime($trip->date))}}</td>
                <td class="text-center align-middle">{{$trip->route_name}}</td>
                <td class="text-center align-middle">
                    @switch($trip->route_direction)
                        @case(1)
                            Tuyến đi
                            @break
                        @case(2)
                            Tuyến về
                            @break
                    @endswitch
                </td>
                <td class="text-center align-middle">{{$trip->number}}</td>
                <td class="text-center align-middle">{{date('H:i:s', $trip->start_time)}}</td>
                <td class="text-center align-middle">{{date('H:i:s', $trip->end_time)}}</td>
                <td class="text-center align-middle">{{$trip->bus_number}}</td>
                @switch($staff->role_code)
                @case(1)
                <td class="align-middle">{{$trip->ticket_collector_name}}</td>
                @break
                @case(2)
                <td class="align-middle">{{$trip->driver_name}}</td>
                @break
                @endswitch
                <td class="text-center align-middle"><a type="button" class="btn btn-primary" href="/trips/{{$trip->id}}">Chi tiết</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
    </div>
    @endif
    <div class="text-center container col-6"><a href="/staffs/{{$staff->id}}/edit" type="button" class="btn btn-info py-1 px-3 my-0 rounded float-left">Sửa</a>
        <a href="/staffs/{{$staff->id}}/delete" type="button" class="btn btn-danger py-1 px-3 mx-5 my-0 rounded float-left">Xóa</a>
        <a href="/staffs" type="button" class="btn btn-primary py-1 px-3 my-0 rounded float-right">Quay lại danh sách</a>
    </div>
    @endsection