// login js 开始

var cookieflag = true;
// 登陆验证格式
var loginvalidaterule = [
    {
        name:'phone',
        regular:[
            {
                itemname:'手机号不能为空',
                regularitem:/\S/,
                message:'手机号不能为空'
            },
            {   
                itemname:'手机格式验证',
                regularitem:/^1[34578]\d{9}$/,
                message:'手机号格式不正确'
            }
        ]
    },
    {
        name:'password',
        regular:[
            {
                itemname:'密码不能为空',
                regularitem:/\S/,
                message:'密码不能为空'
            }
        ]
    }
];

//input焦点事件
$(".input").bind('focus',function(){
    $(this).parent('.form_item').find('i').css({"color":"white"});
})

$(".input").bind('blur',function(){
    $(this).parent('.form_item').find('i').css({"color":"rgba(229,229,229,0.8)"});
})

//checkbox 记住密码点击事件
$("#cookie").bind('click',function(){
    if(cookieflag){
        $(this).removeClass('icon-check-box-outline-bl');
        $(this).addClass('icon-checkboxoutline');
        cookieflag = false;
    }else{
        $(this).addClass('icon-check-box-outline-bl');
        $(this).removeClass('icon-checkboxoutline');
        cookieflag = true;
    }
});

$('#button').bind('click',function(){
    var data;
    if(serializeF("login_form")){
        data = serializeF("login_form");
    }
    console.log(data);
    // 验证信息
    var erroMsg = validateForm(data,loginvalidaterule);
    if(erroMsg){
        $("#tip").html(erroMsg);
    }else{
        // 请求后台
        // 身份验证成功则跳转到首页
        // 否则返回错误信息提示
        $("#tip").html("登陆失败，手机或密码错误");
    }
    
})
// login js 结束

// register js 开始

var loginflag = false;
var counter = 60;
// 短信验证码请求发送标识
var counterflag = true;

// 注册验证格式
var registervalidaterule = [
    {   
        
        name:'username',
        regular:[
            {   
                itemname:'用户名不能为空',
                regularitem:/\S/,
                message:'用户名不能为空'
            },
            {   
                itemname:'手机格式验证',
                regularitem:/^1[34578]\d{9}$/,
                message:'手机号格式不正确'
            }
        ]
    },
    {   
        
        name:'phone',
        regular:[
            {   
                itemname:'手机号不能为空',
                regularitem:/\S/,
                message:'手机号不能为空'
            },
            {   
                itemname:'手机格式验证',
                regularitem:/^1[34578]\d{9}$/,
                message:'手机号格式不正确'
            }
        ]
    },
    {
        name:'code',
        regular:[
            {
                itemname:'验证不能为空',
                regularitem:/\S/,
                message:'验证不能为空'
            }
        ]
    },

];

function getCode(){
    if(!reg(/\S/,$("#register_password_input").val())){
        $("#tip").html("手机不能为空");
        return ;
    }
    if(!reg(/^1[34578]\d{9}$/,$("#register_password_input").val())){
        $("#tip").html("手机号格式不正确");
        return ;    
    }
    $("#tip").html("");
    var _this  = $("#getCodeButton");
    if(counterflag){
        // _this.unbind('click',getCode());
        counterflag = false;
        _this.css({"cursor":"default"});
        // 请求验证码
        console.log(1);
        var cal = setInterval(function(){
            _this.html(counter + "s重新获取");
            counter = counter - 1;
            if(counter < 0){
                counterflag = true;
                counter = 60;
                _this.css({"cursor":"pointer"});
                _this.html("获取验证码");
                clearInterval(cal);
            }
        },1000);
    }else{
        
    }
}

$("#getCodeButton").bind('click',function(){
    if(counterflag){
        getCode(); 
    }else{
        $(this).unbind('click',getCode());
    }  
});

$("#registerbutton").bind('click',function(){
    // $('#register_form').submit();
});


// register js 结束

