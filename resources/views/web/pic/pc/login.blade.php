<!DOCTYPE html>
<html style="height:100%;
width:100%;
min-width: 1000px;">
<meta charset='utf-8'>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />

<meta http-equiv="X-UA-Compatible" content="IE=Edge" /> -->

<head>
	<!--[if lte IE 8]>

<![endif]-->
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_m07hzsg4z3f.css">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/common.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/index.css')}}">
	<title>登陆</title>
</head>
<body style="background:url('{{URL::asset('/assest/bg.jpg')}}');background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color: #464646;
height:100%;
    width:100%;
    min-width: 1000px;">
<!-- 模板页开始 -->
		<form action="{{ route('login') }}" id='login_form' method="POST">
			{{ csrf_field() }}
			<img src="{{URL::asset('/assest/logo.png')}}" width="350px">
			<!-- 用户名 -->
			<div id='username' class="form_item" style="margin-top:30px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='phone_number' value="{{ old('phone_number') }}" autocomplete="off" class='input' placeholder="手机号">
			</div>
			@if ($errors->has('phone_number'))
				<p>手机号码错误</p>
			@endif
			<!-- 密码 -->
			<div id='password' class="form_item">
				<i class="icon iconfont icon-password"></i>
				<input type="password" name='password' class='input' id='password_input' placeholder="密码">
			</div>
			@if ($errors->has('password'))
			<p>密码错误</p>
			@endif
			<!-- cookie是否自动登录 -->
			<input type="hidden" name='loginflag' id='loginflag' value="false">
			<!-- 此处是验证信息 开始 后端如果需要验证可以再此处添加提示信息，前端已经做了初步的认证，如果后端需要的就在此处添加-->
			<div id='tip'></div>
			<!-- 此处是验证信息 结束-->
			<button id='submitbutton' type='button' class="button">登陆</button>
			<div id='link'>
				<div style='float:left;font-size:14px'><i class="iconfont icon-check-box-outline-bl" id='cookie' style="cursor:pointer"></i>&nbsp;记住密码</div>
				<a href="{{route('register')}}" id='register'>尚未注册</a>
				|
				<a href="{{ route('password.request') }}">忘记密码？</a>
			</div>
		</form>
<!-- 模板页结束 -->
		<div id='copyright'>
			<p>@2019 All Rights Reserved. Ophthalmic Center</p>
		</div>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<!-- <script type="text/javascript" src="js/common.js"></script> -->
<script type="text/javascript" src="{{URL::asset('js/index.js')}}"></script>
<!-- [if (lt IE 9) & (!IEMobile)]>
    <script type="text/javascript" src="{{ URL::asset('js/respond.js')}} "></script>
<![end if]-->

</html>