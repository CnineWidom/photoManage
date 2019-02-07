// 公共函数开始
// 后台地址
var ajaxUrl = "";
// 异步ajax
function ajaxF(){
    $.ajax({

    })
}

function ajaxF(url,data,asyncFlag,fn){
    $.ajax({
        url:url,
        type:"post",
        data:data,
        async:asyncFlag,
        dataType:'json',
        success:function(obj){
            console.log(obj);
        },
        error:function(e){
            console.log("传输错误："+e);
        }
    })
}

// cookie方法
// 获取 cookie
function getCookie(key){
    var val = Cookies.get(key);
    if(val == undefined){
        return "";
    }
    return val;
} 
// 添加 cookie
function addToCookie(key, value){
    document.cookie = key + "=" + getCookie(key) + "&" + value;
}
//删除cookie
function delCookie(key){  
    Cookies.remove(key);
}
// 移除 cookie记录值
function removeFormCookie(key, value){
    document.cookie = key + "=" + getCookie(key).replace("&" + value,"");
}


//   表单验证方法
//   参数实例
function validateForm(obj,rule){
     var rulelength = rule.length;
    //  循环获取需要验证的数据的key值
     for(var item in obj){
         //循环验证规则
        for(var i = 0 ; i < rulelength ; i++){
            //匹配数据与验证规则
            if(item == rule[i].name){
                var ruleitemlength = rule[i].regular.length;
                //循环匹配验证规则的项目
                for(var j = 0 ; j < ruleitemlength ; j++){
                    if(reg(rule[i].regular[j].regularitem,obj[item])){ 
                    }else{
                        return rule[i].regular[j].message;
                    }
                }
            }
        }
     }
     return false;
}
// 正则验证方法
function reg(regular,str){
    var re = new RegExp(regular);
    return re.test(str);
}

// 获取表单序列化文件
function serializeF(obj){
    var params = $("#"+obj).serializeArray();
    console.log(params);
    var values = {};
    if(params){
        for( x in params ){
            values[params[x].name] = params[x].value;
        }   
        return values;
    }else{
        return false;
    }  
}
// 公共函数结束
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

if($('#loginflag').val() == "true"){
    
    $("#cookie").removeClass('icon-check-box-outline-bl');
    $("#cookie").addClass('icon-checkboxoutline');
}else{
    
    $("#cookie").addClass('icon-check-box-outline-bl');
    $("#cookie").removeClass('icon-checkboxoutline');
}

//checkbox 记住密码点击事件
$("#cookie").bind('click',function(){
    if($('#loginflag').val() == "false"){
        $(this).removeClass('icon-check-box-outline-bl');
        $(this).addClass('icon-checkboxoutline');
        $('#loginflag').val("true");
    }else{
        $(this).addClass('icon-check-box-outline-bl');
        $(this).removeClass('icon-checkboxoutline');
        $('#loginflag').val("false");
    }
});

$('#submitbutton').bind('click',function(){
    var data;
    if(serializeF("login_form")){
        data = serializeF("login_form");
    }
   
    // 验证信息
    var erroMsg = validateForm(data,loginvalidaterule);
    if(erroMsg){
        $("#tip").html(erroMsg);
        return false;
    }else{
        // 请求后台
        $('#login_form').submit();
        // 身份验证成功则跳转到首页
        // 否则返回错误信息提示
        // $("#tip").html("登陆失败，手机或密码错误");
    }
    
})
// login js 结束

// register js 开始

// var loginflag = false;
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

});


// register js 结束

// index js 开始
var loadingflag = false;
$('.icon-zuqibing').bind('click',function(){
    $(this).toggleClass('icon-qiejutang_roupianzuqibing');
    if($(this).hasClass('icon-qiejutang_roupianzuqibing')){
        $(".pic_content_detail").find('.pic_content_mask').show();
        setTimeout(function(){

            $(".pic_content_detail").hide();
            $(".pic_content_normal").show();
            $(".pic_content_detail").find('.pic_content_mask').hide();
        },1500);
        
    }else{

        $(".pic_content_normal").find('.pic_content_mask').show();
        setTimeout(function(){
            $(".pic_content_normal").hide();
            $(".pic_content_detail").show();
            $(".pic_content_normal").find('.pic_content_mask').hide();
        },1500);
    }
    
});
$('.index_search_button').bind('click',function(){

})

$('.pic_content_detail_pic_small img').each(function(){
        var img = $(this);
        var realWidth ;//原始宽度
		var realHeight ;//原始高度
		var vs ;//图片宽高比
		
		realWidth = this.width;
		realHeight = this.height;
		vs = realWidth/realHeight;
			
		//缩略图比例230:142(约等于1.62) 280/260
		if(vs>=1.07){//横图则固定高度
			$(img).css("width","auto").css("height","260px").css("marginLeft",140-(130*realWidth/realHeight)+"px");
		}
		else{//竖图则固定宽度
			$(img).css("width","280px").css("height","auto").css("marginTop",130-(140*realHeight/realWidth)+"px");
        }
        
        if(vs>=1){//横图或正方形
			$('.pic_content_detail_pic_big').find('img').height(360);
			$('.pic_content_detail_pic_big').find('img').width('auto');
			$('.pic_content_detail_pic_big').css({
				//此处需结合实际情况计算 左偏移：.original实际宽度的二分之一
				marginLeft: function(){
					return -(180*realWidth/realHeight);
				},
				left:'50%'
			})
		}else{//竖图
			$('.pic_content_detail_pic_big').find('img').width(360);
			$('.pic_content_detail_pic_big').find('img').height('auto');
			$('.pic_content_detail_pic_big').css({
				//此处需结合实际情况计算 上偏移：.original实际高度的二分之一
				marginTop: function(){
					return -(180*realHeight/realWidth);
				},
				top:'50%'
            });
        }
});
$('.pic_content_detail_pic_small').each(function(){
    $(this).hover(function(){
        $(this).parent().find('.pic_content_detail_pic_big').show();
        $(this).parent().find('.pic_content_detail_pic_big').hover(function(){
        },function(){
            $(this).hide();
        })
    })
})


// 案例详情 开始
$('.caseDetail_main_content_pic_small li').each(function(j){
    
    var img = $(this).find('img');
    $(this).bind('click',function(){
    
    })
    
})
// 案例详情 结束
// $('.grid-item').each(function(){
    
// })
// index js 结束

