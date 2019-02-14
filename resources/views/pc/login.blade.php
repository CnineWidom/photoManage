<!DOCTYPE html>
<html>
<meta charset='utf-8'>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />

<meta http-equiv="X-UA-Compatible" content="IE=Edge" /> -->

<head>
	<!--[if lte IE 8]>

<![endif]-->
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_hibh9nigtkb.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/common.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
	<title>{{config('app.name','PC端')}}</title>
</head>
<body style="background:url('image/assest/bg.jpg');background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color: #464646;">
<!-- 模板页开始 -->
		<!-- <form action="/login1" id='login_form' type='post' onSubmit="return false"> -->
		<!-- <form action="/login1" id='login_form' method='post'> -->
		<form action="{{ route('login')}}" id='login_form' method='post'>

            {{ csrf_field() }}
			<div id='username' class="form_item" style="margin-top:30px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='phone_number' autocomplete="off" class='input' placeholder="手机号">
			</div>
			@if ($errors)
			{{ $errors }}
			@endif
			<div id='password' class="form_item">
				<i class="icon iconfont icon-password"></i>
				<input type="password" name='password' class='input' id='password_input' placeholder="密码">
			</div>
			<input type="hidden" name='loginflag' id='loginflag'>
			<div id='tip'></div>
			<button id='button' class="button">登陆</button>
			<input type="submit" value="登录 ">
			<div id='link'>
				<div style='float:left;font-size:14px'><i class="iconfont icon-check-box-outline-bl" id='cookie' style="cursor:pointer"></i>&nbsp;记住密码</div>
				<a href="/register1" id='register'>尚未注册</a>
				|
				<a href="javascript:void(0);">忘记密码？</a>
			</div>
		</form>
<!-- 模板页结束 -->
		<div id='copyright'>
			<p>@2019 All Rights Reserved. Ophthalmic Center</p>
		</div>
</body>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/common.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
<!-- [if (lt IE 9) & (!IEMobile)]>
    <script type="text/javascript" src="js/respond.js"></script>
<![end if]-->

</html>