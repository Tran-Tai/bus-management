<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if (Auth::check())
    <h1>Nguoi dung {{Auth::user()->name }} da dang nhap he thong</h1>
    <a href="/logout">Đăng xuất</a>
    @else
    <h1>Người dùng chưa đăng nhập</h1>
    @endif
</body>

</html>
