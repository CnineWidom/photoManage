<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<a href="">{{Auth::user()->user_name}}</a>
<a href="{{ route('logout') }}">退出</a>
{{--<form id="logout-form" action="" method="POST" style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
{{--</form>--}}
</body>
</html>