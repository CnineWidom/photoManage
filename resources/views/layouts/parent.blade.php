<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

	<meta content='initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width' name='viewport'>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ URL::asset('css/common.css?190330') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/index.css?1903301') }}">
	@section('styleCss')
	    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_kpunaqreyg.css">
	    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	@show
	<title>@yield('title')</title>
</head>
<style>
.body{
    background-color:rgb(250,250,250);
    background: url({{ URL::asset("picture/Group.jpg")}}) no-repeat right 50px ;
	background-size: 1120px 1100px;
}
</style>

<body class= '@yield("body")'>
	<div class='layout' style="clear: both;">
		@section('siderbar')
			<div class="header" style="width:100%;height:28px;">
	            <div class="index_logo"><img src="{{ URL::asset('assest/logoblue.png') }}" alt=""></div>
	            <div class="index_nav">
	                <ul>
	                    <li><a href="test">首页</a></li>
	                    <li><a href="{{ route('upload') }}">上传</a></li>
	                    <li><a href="normalProblem.html">常见问题</a></li>
	                    <li><a href="aboutUs.html">关于我们</a></li>
	                </ul>
	            </div>
	            <div class='index_user'>
					@auth
						<a href="javascript:void(0);" style="font-weight:bold">{{Auth::user()->user_name}}</a>  
						<a href="{{ route('logout') }}" class='index_loginout' onclick="event.preventDefault();document.getElementById('logout-form').submit();"
						style="opacity: 0.5;color: rgba(42, 42, 42, 1);cursor: pointer;">[退出]</a>
	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
	                @else
					<span >
						<span class='index_login_span'>登录</span> |
						<span class='index_register_span'> <a href="{{route('register')}}" style="color:rgb(39,39,39)">注册</a></span>
					</span>
					@endauth
				</div>
		    </div>
	    @show

	    @section('modal')
	    	<div class="mask" style='position: absolute;width: 100%;top:0px;left:0px;height:2069px;background:rgb(0,0,0,0.39);z-index: 89;display:none'>
    		</div>
		    <form class='index_login_form' action="{{ route('login') }}" id='login_form' method="POST" style="position:fixed;top:10%;height: 582.4px;width:976px;display:none;background:white;left:50%;margin-left:-488px;z-index: 99">
		    	{{ csrf_field() }}
		        <div style="position:absolute;right:29px;top:29px;cursor: pointer;">
		            <i class='iconfont icon-jiaocha index_login_form_close' style='color:rgba(109,109,109,0.5);font-size:32px;'></i>
		        </div>
		        <div style='width: 453.6px;margin:0px auto;'>
		            <img src="{{URL::asset('/assest/logoblue.png')}}" width="100%" style='margin-top:69px;'>
		              <!-- 用户名 -->
		            <div id='username' class="form_item" style="margin-top:50px;width:100%;border: 1px solid rgb(48,79,146,0.49)">
		                <i class="icon iconfont icon-lufu" style='color:rgba(48,79,146,0.79)'></i>
		                <input type="text" name='phone_number' autocomplete="off" class='login_input input' style="width:399px;color: rgb(39,39,39)" placeholder="手机号">
		            </div>
		            @if ($errors->has('phone_number'))
						<p>手机号码错误</p>
					@endif
		            <!-- 密码 -->
		            <div id='password' class="form_item" style="margin-top:30px;width:100%;border: 1px solid rgb(48,79,146,0.49)">
		                <i class="icon iconfont icon-password" style='color:rgba(48,79,146,0.79)'></i>
		                <input type="password" name='password' class='login_input input' id='password_input' style="width:399px;color: rgb(39,39,39)" placeholder="密码">
		            </div>
		            @if ($errors->has('password'))
						<p>密码错误</p>
					@endif
		            <!-- cookie是否自动登录 -->
		            <input type="hidden" name='loginflag' id='loginflag' value="false">
		            <!-- 此处是验证信息 开始 后端如果需要验证可以再此处添加提示信息，前端已经做了初步的认证，如果后端需要的就在此处添加-->
		            <div id='tip'></div>
		            <!-- 此处是验证信息 结束-->

		            <button type='submit' class="button" style="width:100%">登陆</button>
		            <div id='link' style="color:black;width:100%">
		                <div style='float:left;font-size:14px'>
		                    <i class="iconfont icon-check-box-outline-bl" id='cookie' style="cursor:pointer"></i>&nbsp;记住密码
		                </div>
		                <a href="{{route('register')}}" id='register' style="color:rgb(39,39,39)">尚未注册</a>
		                |
		                <a href="{{ route('password.request') }}" style="color:rgb(39,39,39)">忘记密码？</a>
		            </div>
		            @include('flash::message')
		        </div>
		        <!-- </form> -->
		    </form>
	    @show

	    @section('content')
			<p>主要内容存放</p>
	    @show
	</div>
	<div class="footer">
		@section('footer')
			<div class="footer_detail">
                <div class='footer_detail_content footer_detail_content1'>
                        <div class='footer_title'>导航</div>
                        <div class='footer_nav'>
                            <ul>
                                <li> <a href="test">主页</a> </li>
                                <li><a href="aboutUs.html">关于我们</a></li>
                                <li><a href="uploadPictureTip.html">分享</a></li>
                                <li><a href="havascript:void(0);">联系我们</a></li>
                                <li><a href="normalProblem.html">常见问题</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='footer_detail_content footer_detail_content2'>
                        <div class='footer_title'>中山眼科中心</div>
                        <div class='footer_nav'>
                            <ul>
                                <li>邮箱地址: info@gmail.com</li>
                                <li>联系方式: （020）6660-7666</li>
                                <li>联系地址: 广州市先烈南路54号（区庄院区）</li>
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;广州市天河区金穗路7号（珠江新城院区）</li>
                            </ul>
                        </div>
                    </div>
                    <div class='footer_detail_content footer_detail_content3'>
                        <div class='footer_title'>语言</div>
                        <div class='footer_nav'>
                            <ul>
                                <li>简体</li>
                                <li>English</li>
                            </ul>
                        </div>
                    </div>
                    <div class='footer_detail_content footer_detail_content4'>
                        <div class='footer_title'>其他</div>
                        <div class='footer_nav'>
                            <ul>
                                <li>隐私政策</li>
                                <li>条款及细则</li>
                            </ul>
                        </div>
                    </div>
        	</div>    
	        <div class="footer_copyright" style="line-height:60px;">
	        	<div class='footer_copyright_content' >
		            <img src="assest/logoblue.png" alt="" style='float: left;'>
		            <h5 style="font-size:16px;float: left;">版权归 © 2019  中山大学眼科中心 所有</h5>
		            <h5 style="font-size:16px;float: right;margin-left: 5px;">粤ICP备11021180号</h5>
		            <img src="assest/Bitmap.png" alt="" style='float: right;margin-top: 20px;' width="20">
	          </div>
	        </div>
		@show
	</div>
</body>
</html>
<script src='{{URL::asset("js/jquery.min.js")}}'></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src='{{URL::asset("js/index/stackgrid.adem.js")}}'></script>

@section('uploadjs')
	<script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.min.js"></script>
@show

@section('script')
	<script src='{{URL::asset("js/index/velocity.js")}}'></script>
	<script src='{{URL::asset("js/index.js?1904076")}}'></script>
@show

<script>
	$('#flash-overlay-modal').modal();
	var islogin = {{ $loginType }}
    if (islogin === -1 ){
    	$('.mask').fadeIn('fast');
		$('.index_login_form').fadeIn('fast');
    }
</script>