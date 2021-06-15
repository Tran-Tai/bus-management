<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('addCSS')
</head>
<body>
    <nav class="navbar navbar-dark bg-light">
        <ul class="mx-auto nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('staffs*')) ? 'active' : '' }}" href="/staffs">Nhân viên</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('stations*')) ? 'active' : '' }}" href="/stations">Trạm dừng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('routes*')) ? 'active' : '' }}" href="/routes">Tuyến</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('buses*')) ? 'active' : '' }}" href="/buses">Xe buýt</a>
            </li>
        </ul>



        <!-- <form method="POST" action="/sign-out">
            @csrf
            <button type="submit" class="btn btn-secondary btn-sm">Sign Out</button>
        </form> -->
    </nav>
    <div class="text-center">
        <h1>@yield('header', '')</h1>
    </div>
    @if(Session::has('success'))
        <div class="container col-6 alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @elseif(Session::has('fail'))
        <div class="container col-6 alert alert-success" role="alert">
            {{Session::get('fail')}}
        </div>
    @endif
    @yield('body')
</body>
</html>