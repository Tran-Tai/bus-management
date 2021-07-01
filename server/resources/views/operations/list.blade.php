@extends('layouts.admin-layout')
@section('title')
    Buses List
@endsection
@section('header')
    Danh sách xe
@endsection
@section('body')
    <div class="container col-8 my-1 p-1">
        
    </div>
    <div class="container text-center my-3 p-1">
        <a type="button" class="btn btn-primary" href="/buses/create">Thêm thông tin xe mới</a>
    </div>
    @php 
        echo $operations;
    @endphp
@endsection