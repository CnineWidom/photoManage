<!DOCTYPE html>
<html>
<meta charset='utf-8'>
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />

<meta http-equiv="X-UA-Compatible" content="IE=Edge" /> -->

<head>
	<!--[if lte IE 8]>

<![endif]-->
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_hibh9nigtkb.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>pic</title>
</head>
<body style="background:url('image/assest/bg.jpg');background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;background-color: #464646;">
	<!-- 模板页开始 -->	
	<!-- <form action="" id='register_form' type='post' onSubmit="return false"> -->
	<form action="{{ route('register') }}" id='register_form' type='post' >
			<img src="image/assest/logo.png" width="350px">
			<div  class="form_item" style="margin-top:30px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='username' autocomplete="off" class='input' placeholder="用户名">
			</div>
			<div class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-password"></i>			
				<input type="text" name='phone' class='input' autocomplete="off" id='register_password_input' placeholder="手机号">
                <span style='color: rgba(229,229,229,0.8)'>|</span>
                <span id='getCodeButton' style='color: rgba(229,229,229,0.8);text-align: center;font-size:14px;margin-left:13px;cursor: pointer;'>获取验证码</span>
            </div>
            <div  class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='code' autocomplete="off" class='input' placeholder="验证码">
            </div>
            <div id='username' class="form_item" style="margin-top:15px">
				<i class="icon iconfont icon-lufu"></i>
				<input type="text" name='phone' autocomplete="off" class='input' placeholder="密码">
			</div>
			<input type="hidden" name='cookieflag' id='cookieflag'>
			<div id='tip'></div>
			<button id='registerbutton' class='button'>注册</button>
			<div id='link'>
				<div style='float:left;font-size:14px'>
					<i class="iconfont icon-check-box-outline-bl" id='cookie' style="cursor:pointer"></i>
					&nbsp;直接登陆
				</div>
				<a href="/loginpc">已有账号</a>
			</div>
		</form>
		<!-- 模板页结束 -->
		<div id='copyright'>
			<p>@2019 All Rights Reserved. Ophthalmic Center</p>
		</div>
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<!-- [if (lt IE 9) & (!IEMobile)]>
    <script type="text/javascript" src="js/respond.js"></script>
<![end if]-->

</html>