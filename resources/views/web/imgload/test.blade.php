<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="{{route('kou')}}" method="post">
    {{csrf_field()}}
    手机号：<input type="text" name='phone_number'>
    密码: <input  type="password" name='password'>
    <input type="submit" value="提交">
</form>
</body>
</html>