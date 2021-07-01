@extends('layouts.admin-layout')
@section('title')
Stations Create
@endsection
@section('body')
<div class="container col-6 my-1 p-1">
    <form class="was-validated" method="POST">
        @csrf
        <legend>Điền thông tin trạm</legend>
        <div class="form-group">
            <label for="name">Tên trạm</label>
            <input id="input" type="text" class="form-control" name="name" onchange="checkDuplicate()" autofocus required>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Thêm trạm</button>
        <a type="button" class="btn btn-primary" href="/stations">Quay lại danh sách</a>
    </form>
</div>
<script>
    function checkDuplicate() {
        var stations = <?php if(isset($stations)) echo json_encode($stations); ?>;
        input = document.getElementById("input").value;
        duplicate = false;
        for (var i = 0; i < stations.length; i++) {
            if (stations[i].name == input) {
                duplicate = true;
                break;
            }
        }
        if (duplicate) {
            document.getElementById("submit").addEventListener("click", function(event){
                event.preventDefault();
            });
        };
    }
</script>
@php
    echo "[ </br>";
    foreach ($shorts as $short) {
        echo "[ </br>";
        echo "'name' => '" . $short->name . "',</br>";
        echo "'routes_list' => '" . $short->routes_list . "',</br>";
        echo "'status' => '" . $short->status . "'</br>";
        echo "], </br>";
    }
    echo "] </br>";
@endphp
@endsection