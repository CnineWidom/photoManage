// 公共函数开始
// 缩放屏幕
var phoneWidth = parseInt(window.screen.width);
var phoneHeight = parseInt(window.screen.height);
var phoneScale = phoneWidth / 1100;//除以的值按手机的物理分辨率
var ua = navigator.userAgent;
if (/Android (\d+\.\d+)/.test(ua)) {
    var version = parseFloat(RegExp.$1);
    // andriod 2.3
    if (version > 2.3) {
        document.write('<meta name="viewport" content="width=device-width,initial-scale=' + phoneScale + ',minimum-scale=' + phoneScale + ',maximum-scale=' + phoneScale + ',user-scalable=yes">');
        // andriod 2.3以上
    } else {
        document.write('<meta name="viewport" content="width=device-width,user-scalable=yes">');
    }
    // 其他系统
} else {
    document.write('<meta name="viewport" content="width=device-width, initial-scale=' + phoneScale + ',minimum-scale=' + phoneScale + ',maximum-scale =' + phoneScale + ',user-scalable=yes">');
}
// 后台地址
var ajaxUrl = "";
// 异步ajax


function ajaxF(url, data) {
    $.ajax({
        url: url,
        type: "post",
        data: data,
        async: false,
        dataType: 'json',
        success: function (obj) {
            console.log(obj);
        },
        error: function (e) {
            console.log("传输错误：" + e);
        }
    })
}

// cookie方法
// 获取 cookie
function getCookie(key) {
    var val = Cookies.get(key);
    if (val == undefined) {
        return "";
    }
    return val;
}
// 添加 cookie
function addToCookie(key, value) {
    document.cookie = key + "=" + getCookie(key) + "&" + value;
}
//删除cookie
function delCookie(key) {
    Cookies.remove(key);
}
// 移除 cookie记录值
function removeFormCookie(key, value) {
    document.cookie = key + "=" + getCookie(key).replace("&" + value, "");
}


//   表单验证方法
//   参数实例
function validateForm(obj, rule) {
    var rulelength = rule.length;
    //  循环获取需要验证的数据的key值
    for (var item in obj) {
        //循环验证规则
        for (var i = 0; i < rulelength; i++) {
            //匹配数据与验证规则
            if (item == rule[i].name) {
                var ruleitemlength = rule[i].regular.length;
                //循环匹配验证规则的项目
                for (var j = 0; j < ruleitemlength; j++) {
                    if (reg(rule[i].regular[j].regularitem, obj[item])) {
                    } else {
                        return rule[i].regular[j].message;
                    }
                }
            }
        }
    }
    return false;
}
// 正则验证方法
function reg(regular, str) {
    var re = new RegExp(regular);
    return re.test(str);
}

// 获取表单序列化文件
function serializeF(obj) {
    var params = $("#" + obj).serializeArray();
    console.log(params);
    var values = {};
    if (params) {
        for (x in params) {
            values[params[x].name] = params[x].value;
        }
        return values;
    } else {
        return false;
    }
}
// 公共函数结束
// login js 开始


// 登陆验证格式
var loginvalidaterule = [
    {
        name: 'phone',
        regular: [
            {
                itemname: '手机号不能为空',
                regularitem: /\S/,
                message: '手机号不能为空'
            },
            {
                itemname: '手机格式验证',
                regularitem: /^1[34578]\d{9}$/,
                message: '手机号格式不正确'
            }
        ]
    },
    {
        name: 'password',
        regular: [
            {
                itemname: '密码不能为空',
                regularitem: /\S/,
                message: '密码不能为空'
            }
        ]
    }
];
function loginFormHide(){
    $(".index_login_form input").val("");
    $(".mask").fadeOut('fast');
    $(".index_login_form").fadeOut('fast');
}
//input焦点事件
if($(".index_login_form").length>0){
    $(".login_input").bind('focus', function () {
        $(this).parent('.form_item').find('i').css({ "color": "rgb(48,79,146)" });
    })
    $(".login_input").bind('blur', function () {
        $(this).parent('.form_item').find('i').css({ "color": "rgba(48,79,146,0.79)" });
    })

    $(".mask").click(function(){
        loginFormHide();
    })
    $(".index_login_form_close").click(function(){
        loginFormHide();
    })
}

if($(".register_form").length>0 || $(".login_form").length>0){
    $(".input").bind('focus', function () {
        $(this).parent('.form_item').find('i').css({ "color": "white" });
    })
    
    $(".input").bind('blur', function () {
        $(this).parent('.form_item').find('i').css({ "color": "rgba(229,229,229,0.8)" });
    })
}


if ($('#loginflag').length > 0) {

    if ($('#loginflag').val() == 'true') {
        $("#cookie").removeClass('icon-check-box-outline-bl');
        $("#cookie").addClass('icon-checkboxoutline');
    } else {

        $("#cookie").addClass('icon-check-box-outline-bl');
        $("#cookie").removeClass('icon-checkboxoutline');
    }
}
//checkbox 记住密码点击事件
$("#cookie").bind('click', function () {
    if ($('#loginflag').val() == "false") {
        $(this).removeClass('icon-check-box-outline-bl');
        $(this).addClass('icon-checkboxoutline');
        $('#loginflag').val("true");
    } else {
        $(this).addClass('icon-check-box-outline-bl');
        $(this).removeClass('icon-checkboxoutline');
        $('#loginflag').val("false");
    }
});

$('#submitbutton').bind('click', function () {
    var data;
    if (serializeF("login_form")) {
        data = serializeF("login_form");
    }

    // 验证信息
    var erroMsg = validateForm(data, loginvalidaterule);
    if (erroMsg) {
        $("#tip").html(erroMsg);
        return false;
    } else {
        // 请求后台
        window.location.href = './index.html';
        // $('#login_form').submit();
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

        name: 'username',
        regular: [
            {
                itemname: '用户名不能为空',
                regularitem: /\S/,
                message: '用户名不能为空'
            }
        ]
    },
    {

        name: 'phone',
        regular: [
            {
                itemname: '手机号不能为空',
                regularitem: /\S/,
                message: '手机号不能为空'
            },
            {
                itemname: '手机格式验证',
                regularitem: /^1[34578]\d{9}$/,
                message: '手机号格式不正确'
            }
        ]
    },
    {
        name: 'code',
        regular: [
            {
                itemname: '验证不能为空',
                regularitem: /\S/,
                message: '验证不能为空'
            }
        ]
    },
    {
        name: 'mail',
        regular: [
            {
                itemname: '邮箱不能为空',
                regularitem: /\S/,
                message: '邮箱不能为空'
            },
            {
                itemname: '邮箱格式错误',
                regularitem: /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/,
                message: '邮箱格式错误'
            }
        ]
    },
    {
        name: 'hosipital',
        regular: [
            {
                itemname: '医院不能为空',
                regularitem: /\S/,
                message: '医院不能为空'
            }
        ]
    },
    {
        name: 'position',
        regular: [
            {
                itemname: '职称不能为空',
                regularitem: /\S/,
                message: '职称不能为空'
            }
        ]
    },
    {
        name: 'key1',
        regular: [
            {
                itemname: '密码不能为空',
                regularitem: /\S/,
                message: '密码不能为空'
            }
        ]
    },
    {
        name: 'key2',
        regular: [
            {
                itemname: '请再次输入密码',
                regularitem: /\S/,
                message: '请再次输入密码'
            }
        ]
    }
];

function getCode() {
    if (!reg(/\S/, $("#register_password_input").val())) {
        $("#tip").html("手机不能为空");
        return;
    }
    if (!reg(/^1[34578]\d{9}$/, $("#register_password_input").val())) {
        $("#tip").html("手机号格式不正确");
        return;
    }
    $("#tip").html("");
    var _this = $("#getCodeButton");
    if (counterflag) {
        // _this.unbind('click',getCode());
        counterflag = false;
        _this.css({ "cursor": "default" });
        // 请求验证码

        var cal = setInterval(function () {
            _this.html(counter + "s重新获取");
            counter = counter - 1;
            if (counter < 0) {
                counterflag = true;
                counter = 60;
                _this.css({ "cursor": "pointer" });
                _this.html("获取验证码");
                clearInterval(cal);
            }
        }, 1000);
    } else {

    }
}

$("#getCodeButton").bind('click', function () {
    if (counterflag) {
        getCode();
    } else {
        $(this).unbind('click', getCode());
    }
});

$("#registerbutton").bind('click', function () {

    var data;
    if (serializeF("register_form")) {
        data = serializeF("register_form");
    }

    // 验证信息
    var erroMsg = validateForm(data, registervalidaterule);
    if (erroMsg) {
        $("#tip").html(erroMsg);
        return false;

    } else {
        if ($('#key1').val() == $('#key2').val()) {
            // $('#register_form').submit();
            if ($('#loginflag').val() == 'true') {

            } else {
                window.location.href = './login.html';
            }
        } else {
            $('#tip').html('两次输入的密码不一致');
            return false;
        }

    }
});




if ($('#registerflag')) {

    if ($('#registerflag').val() == 'true') {
        $("#registerCheck").removeClass('icon-check-box-outline-bl');
        $("#registerCheck").addClass('icon-checkboxoutline');
    } else {

        $("#registerCheck").addClass('icon-check-box-outline-bl');
        $("#registerCheck").removeClass('icon-checkboxoutline');
    }
}
//checkbox 记住密码点击事件
$("#registerCheck").bind('click', function () {
    if ($('#registerflag').val() == "false") {
        $(this).removeClass('icon-check-box-outline-bl');
        $(this).addClass('icon-checkboxoutline');
        $('#registerflag').val("true");
    } else {
        $(this).addClass('icon-check-box-outline-bl');
        $(this).removeClass('icon-checkboxoutline');
        $('#registerflag').val("false");
    }
});

// register js 结束

// index js 开始
var loadingflag = false;
$('.icon-zuqibing').bind('click', function () {
    $(this).toggleClass('icon-qiejutang_roupianzuqibing');
    if ($(this).hasClass('icon-qiejutang_roupianzuqibing')) {
        $(".pic_content_detail").find('.pic_content_mask').show();
        setTimeout(function () {

            $(".pic_content_detail").hide();
            $(".pic_content_normal").show();
            $(".pic_content_detail").find('.pic_content_mask').hide();
        }, 1500);

    } else {

        $(".pic_content_normal").find('.pic_content_mask').show();
        setTimeout(function () {
            $(".pic_content_normal").hide();
            $(".pic_content_detail").show();
            $(".pic_content_normal").find('.pic_content_mask').hide();
        }, 1500);
    }

});
$('.index_login_span').click(function(){
    $('.mask').fadeIn('fast');
    $('.index_login_form').fadeIn('fast');
})
$('.index_user .index_loginout').bind('click', function () {
    window.location.href = './login.html'
})
$('.index_user a').bind('click', function () {
    window.location.href = './caseManager.html'
})
$('.index_logo').bind('click', function () {
    window.location.href = './index.html';
})
$('.index_search_button').bind('click', function () {

})
$('.caseDetail_main_nav span').bind('click', function () {
    window.history.back(-1);
})
$('.index_uploadPicture_button').bind('click', function () {
    window.location.href = "./uploadPictureTip.html";
});
resetPictureSize('pic_content_detail_pic_small img', 'pic_content_detail_pic_big', 280, 260, 1.07, 360);
function resetPictureSize(smallobj, bigobj, width, height, objvs, bigPictureSize) {
    $('.' + smallobj).each(function () {
        var img = $(this);
        var realWidth;//原始宽度
        var realHeight;//原始高度
        var vs;//图片宽高比

        realWidth = this.width;
        realHeight = this.height;
        vs = realWidth / realHeight;

        //缩略图比例230:142(约等于1.62) 280/260
        if (vs >= objvs) {//横图则固定高度
            $(img).css("width", "auto").css("height", height + 'px').css("marginLeft", (width / 2) - ((height / 2) * realWidth / realHeight) + "px");
        }
        else {//竖图则固定宽度
            $(img).css("width", width + "px").css("height", "auto").css("marginTop", (width / 2) - ((height / 2) * realHeight / realWidth) + "px");
        }

        if (vs >= 1) {//横图或正方形

            $('.' + bigobj).find('img').height(bigPictureSize);
            $('.' + bigobj).find('img').width('auto');
            $('.' + bigobj).css({
                //此处需结合实际情况计算 左偏移：.original实际宽度的二分之一
                marginLeft: function () {
                    return -((bigPictureSize / 2) * realWidth / realHeight);
                },
                left: '50%'
            })
        } else {//竖图
            $('.' + bigobj).find('img').width(bigPictureSize);
            $('.' + bigobj).find('img').height('auto');
            $('.' + bigobj).css({
                //此处需结合实际情况计算 上偏移：.original实际高度的二分之一
                marginTop: function () {
                    return -((bigPictureSize / 2) * realHeight / realWidth);
                },
                top: '50%'
            });
        }
    });
}

$('.pic_content_detail_pic_small').each(function () {
    $(this).hover(function () {

        $(this).parent().find('.pic_content_detail_pic_big').show();
        $(this).parent().find('.pic_content_detail_pic_big').hover(function () {
        }, function () {
            $(this).hide();
        })
    })
})


// 案例详情 开始
if ($('.caseDetail_main_content_pic_small'.length > 0)) {
    $('.caseDetail_main_content_pic_small li').each(function (j) {


        var src = $(this).css("backgroundImage");
        src = src.split("(\"")[1].split("\")")[0];

        // src = 
        // console.log(src);

        $(this).bind('mouseenter', function () {

            $(this).parent().find('li').css('border', '1px solid rgb(229,229,229)');
            $(this).css('border', '1px solid red');
            if ($(".caseDetail_main_content_pic_big img").attr('src') == src) {
                return;
            }

            $(".caseDetail_main_content_pic_big img").fadeOut('fast');
            $(".caseDetail_main_content_pic_big img").attr('src', src);
            var height = $(".caseDetail_main_content_pic_big img").height();
            var width = $(".caseDetail_main_content_pic_big img").width();
            console.log(height, width);
            if (height > width) {
                $(".caseDetail_main_content_pic_big img").height('372.2');
                $(".caseDetail_main_content_pic_big img").css('width', 'auto');
            } else {
                $(".caseDetail_main_content_pic_big img").height('auto');
                $(".caseDetail_main_content_pic_big img").css('width', '100%');
            }
            $(".caseDetail_main_content_pic_big img").fadeIn('fast');


        })

    })
}
if ($('.caseDetail_main_conment_rate').length > 0) {
    $('.caseDetail_main_conment_rate i').each(function (index) {
        // console.log(index);

        $(this).bind('click', function () {
            for (var i = 0; i <= index; i++) {
                $('.caseDetail_main_conment_rate i').eq(i).removeClass('normal_rate');
                $('.caseDetail_main_conment_rate i').eq(i).addClass('active_rate');

            }

            for (var i = 4; i > index; i--) {
                $('.caseDetail_main_conment_rate i').eq(i).removeClass('active_rate');
                $('.caseDetail_main_conment_rate i').eq(i).addClass('normal_rate');
            }

        })

    })
}



var picContentPages = 0;
var picContentTatal = 8;
$('.picture_content_left').bind('click', function () {
    if (picContentPages == 0) {
        return false;
    }
    // if((picContentTatal-picContentPages*4) <= 4){
    //     return false;
    // }
    var left_offest = ((picContentPages - 1) * 364);
    $('.caseDetail_main_content_pic_small ul').css('left', left_offest + 'px');
    picContentPages--;
    if (picContentPages == 0) {
        $(this).fadeOut();
    }
    if ((picContentTatal - picContentPages * 4) > 4) {
        $('.picture_content_right').fadeIn();
    }
});

$('.picture_content_right').bind('click', function () {
    // if(picContentPages == 4){
    //     return false;
    // }
    if ((picContentTatal - picContentPages * 4) <= 4) {
        return false;
    }
    var left_offest = -((picContentPages + 1) * 364);
    $('.caseDetail_main_content_pic_small ul').css('left', left_offest + 'px');
    picContentPages++;
    if (picContentPages != 0) {
        $('.picture_content_left').fadeIn();
    }
    if ((picContentTatal - picContentPages * 4) <= 4) {
        $(this).fadeOut();
    }

});
function navActive(obj) {

}
if ($('.caseDetail_main_similar_pic').length > 0) {
    var width = $('.caseDetail_main_similar_pic li').width();
    $('.caseDetail_main_similar_pic li').height(width);

    // resetPictureSize('caseDetail_content_detail_pic_small img','caseDetail_content_detail_pic_big',width,height,width/height,width*2);
}

// 案例详情 结束
// $('.grid-item').each(function(){

// })

// 上传图片 开始
// 初始化Web Uploader
// var uploaddata;

// var uploaddata = {
//     title:'',//题目
//     key:[],//关键词数组
//     content:'',//内容
//     partners:'',//合作者
//     photograper:'',//摄影师
//     equipment:''//设备
// };
if ($('.uploadPicture_main_content_form').length > 0) {
    var uploader = WebUploader.create({

        // 选完文件后，是否自动上传。
        auto: false,
        // swf文件路径
        swf: 'https://cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',

        // 文件接收服务端。
        server: 'http://localhost/CI/index.php/Yzf/getPars',

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '.uploadPicture_main_content_pic_button',
        threads: 1,
        dupliacate: true,
        resize: false,
        fileVal: "file",
        formdata: {
            
        },
        // crop: true,
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'jpg,jpeg,png,gif',
            mimeTypes: '.jpg,.jpeg,.png,.gif'
        },
        fileNumLimit: 12, //限制上传个数
        fileSingleSizeLimit: 20480000 //限制单个上传图片的大小
    });
    uploader.on('beforeFileQueued', function (file) {

        if (file.ext == "") {
            return false;
        } else {
            var state = uploader.getStats();
            
            if (state.queueNum > 8) {
                alert('仅支持上传9张图片');
                return false;
            }
        }
    })
    //添加表单验证
    uploader.on('uploadBeforeSend', function (file, data, headers) {
        if (serializeF('uploadform')) { 
            var uploaddata = serializeF('uploadform');
            //参数
            var state = uploader.getStats();
            var num = state.queueNum;
            data.num = num;
            data.token = "SDFSD23FDSG4AK";
            data.title = uploaddata.title;
            data.content = uploaddata.content;
            data.partners = uploaddata.partners;
            data.photograper = uploaddata.photograper;
            data.equipment = uploaddata.equipment;
            data.key = JSON.stringify(uploadkey);
        }
            
        
    })
    uploader.on('fileQueued', function (file) {





        // console.log(state.successNum)
        // console.log();
        // console.log(file);
        var $li = $(
            '<li id="' + file.id + '" class="file-item thumbn   ail">' +
            '<div class="progress previewprogress"><span></span></div>' +
            '<div class="preview_delete"><i class="iconfont icon-jiaocha uploadPicture_icon-jiaocha"></i></div>' +
            '<img>' +
            '<div class="preview_info" style="color:white;position:absolute;bottom:0px;left:0px;width:178.6px;height:auto;line-height:12px;font-size:12px;text-align:center">' + file.name + '</div>' +
            '<span class="preview_tip" style=""></span>' +
            '</li>'
        ),

            $img = $li.find('img');


        // $list为容器jQuery实例
        $('.uploadPicture_main_content_pic_preview ul').append($li);

        // 创建缩略图
        // 如果为非图片文件，可以不用调用此方法。
        // thumbnailWidth x thumbnailHeight 为 100 x 100

        uploader.makeThumb(file, function (error, src) {
            if (error) {
                $img.replaceWith('<span>不能预览</span>');
                return false;
            }

            $img.attr('src', src);
        }, 178.6, 178.6);


    });





    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');

        // 避免重复创建
        // if ( !$percent.length ) {
        //     $percent = $('<p class="progress"><span></span></p>')
        //             .appendTo( $li )
        //             .find('span');
        // }
        console.log(percentage);
        $percent.css('width', percentage * 100 + '%');
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, response) {
        // console.log(response);

        $('#' + file.id + ' .preview_tip').removeClass('preview_tip_error');
        $('#' + file.id + ' .preview_tip').addClass('preview_tip_success');
        var state = uploader.getStats();
        var num = state.queueNum;
        if(num != "0"){
            $('.upload_pic_num').text("(还有"+(num)+"张)");
        }else{
            $('.upload_pic_num').text("");
            $('.upload_pic_tip_word').html("上传成功<br/>正在跳转");
            
        }
        
    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file, erroMsg) {
        // var $li = $( '#'+file.id ),
        //     $error = $li.find('div.error');
        alert(erroMsg);
        $('#' + file.id + ' .preview_tip').removeClass('preview_tip_success');
        $('#' + file.id + ' .preview_tip').addClass('preview_tip_error');

        // // 避免重复创建
        // if ( !$error.length ) {
        //     $error = $('<div class="error"></div>').appendTo( $li );
        // }

        // $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {
        // $( '#'+file.id ).find('.progress').remove();
    });
}
if ($('.uploadbtn').length > 0) {
    // uploader
    $('.uploadbtn').click(function () {
        var state = uploader.getStats();
        // if(state.queueNum == 0){
        //     alert('请上传图片');
        // }

        // if (serializeF('uploadform')) { 
        //     var uploaddata = serializeF('uploadform');
        //     //非空验证
        //     if(uploaddata.title == ""){
        //         alert("题目不能为空");
        //         return false;
        //     }
        //     if(uploaddata.content == ""){
        //         alert("描述不能为空");
        //         return false;
        //     }
            
        //     if(uploadkey.length == 0){
        //          alert("关键词不能为空");
        //          return false;
        //     }   
      
        // }
        // $(".mask").css("display","block")
        uploader.upload();
    })
}
$('.uploadPicture_main_content_pic_preview ul').on('click', '.file-item .preview_delete', function () {
    if (confirm('是否删除选定图片？')) {
        $(this).parent().remove();
    }
})
var keywords = [
    {
        id: 1,
        keyword: '脉络膜黑色素瘤',
    },
    {
        id: 2,
        keyword: '渗出性视网膜'
    },
    {
        id: 3,
        keyword: '脱离性恶性肿瘤'
    },
    {
        id: 4,
        keyword: '眼部直视眼全视野成像'
    },
    {
        id: 5,
        keyword: 'keyword1'
    },
    {
        id: 6,
        keyword: 'keyword2'
    },
    {
        id: 7,
        keyword: 'keyword3'
    }
];
var uploadkey = [];
if ($('.keywordInput').length > 0) {
    $('.keywordInput').bind('input', function () {
        var _this = $(this);
        $('.keywordInput').show();
        if ($(this).val().length > 0) {
            $('.KeyWordTip').show('fast');

            $('.KeyWordTip_input').text('添加：' + $(this).val());
            $('.KeyWordTip .KeyWordTip_input').siblings().remove();
            keywords.forEach(function (item) {

                if (item.keyword.indexOf(_this.val()) != -1) {
                    if (item.keyword == _this.val()) {
                        $('.keywordInput').hide();
                    }
                    // var str = _this.val();
                    str = new RegExp(_this.val(), "g");


                    var formatitem = item.keyword.replace(str, '<span style="color:red">' + _this.val() + '</span>');
                    var linum = $('.uploadpicture_main_keywords ul li').length + 1;
                    $('.KeyWordTip .KeyWordTip_input').before('<div class="KeyWordTip_input_normal" >' + formatitem + '<input type="hidden" name="key' + linum + '" value=' + item.id + '></div>');
                }

            })
        } else {
            $('.KeyWordTip').hide('fast');
        }

    })
}
if ($('.KeyWordTip').length > 0) {
    $('.uploadpicture_main_keywords ul').on('click', '.uploadKeyword_icon-jiaocha', function () {
        var index1 = $(".uploadKeyword_icon-jiaocha").index(this);
        console.log(index1)
        uploadkey.splice(index1,1);
        console.log(uploadkey)  
        $(this).parent().remove();
        //移除数组
        
    });

    $('.KeyWordTip').on('click', '.KeyWordTip_input_normal', function () {
        var _this = $(this);
        if (_this.hasClass('KeyWordTip_input')) {
            if(uploadkey){
                if(uploadkey.length > 4){
                    alert("关键词不能超过5个");
                    $('.keywordInput').val('');
                    $('.KeyWordTip').hide('fast');
                    return ;
                }
                
                    for(var i = 0 ; i < uploadkey.length ; i++){
                        if(((_this.text()).split('：'))[1] == uploadkey[i].keyword){
                            alert("你已经有次关键词");
                            $('.KeyWordTip').hide('fast');
                            return ;
                        }
                    }
          
                
            }

            $('.uploadpicture_main_keywords ul').append(function () {
                var li = '<li>' + ((_this.text()).split('：'))[1] + '&nbsp;<i class="iconfont icon-jiaocha  uploadKeyword_icon-jiaocha" style="font-size:12px;cursor:pointer"></i></li>';
                return li;
            });
            

            var inputdata = {
                id: '',
                keyword: ((_this.text()).split('：'))[1]
            }
            
            uploadkey.push(inputdata);
            
            
        } else {
            if(uploadkey){
                if(uploadkey.length > 4){
                    alert("关键词不能超过5个");
                    $('.keywordInput').val('');
                    $('.KeyWordTip').hide('fast');
                    return ;
                }
                
                    for(var i = 0 ; i < uploadkey.length ; i++){
                        if(_this.text() == uploadkey[i].keyword){
                            alert("你已经有次关键词");
                            $('.KeyWordTip').hide('fast');
                            return ;
                        }
                    }
              
            }
            $('.uploadpicture_main_keywords ul').append(function () {
                var li = '<li>' + _this.text() + _this.find('input').prop('outerHTML') + '&nbsp;<i class="iconfont icon-jiaocha  uploadKeyword_icon-jiaocha" style="font-size:12px;cursor:pointer"></i></li>';
                return li;
            });
            var inputdata = {
                id: _this.find('input').val(),
                keyword: _this.text()   
            }

            uploadkey.push(inputdata);
            
        }

        $('.keywordInput').val('');
        $('.KeyWordTip').hide('fast');
    })
}

if($('#upload_pic_tip_icon').length > 0){
    $('#upload_pic_tip_icon').click(function(){
        if($('#upload_pic_tip_icon').hasClass('icon-check-box-outline-bl')){
            $("#upload_pic_tip_icon").removeClass('icon-check-box-outline-bl');
            $("#upload_pic_tip_icon").addClass('icon-checkboxoutline');
        }else{
            $("#upload_pic_tip_icon").removeClass('icon-checkboxoutline');
            $("#upload_pic_tip_icon").addClass('icon-check-box-outline-bl');
        }
        
    })
    $('.uploadPictureTip_upload_button').bind('click', function () {
        if($('#upload_pic_tip_icon').hasClass('icon-check-box-outline-bl')){
            alert('请先阅读使用条款并勾选后再上传');
        }else{
            window.location.href = "./uploadPicture.html";
        }
       
        
    })
}


// 上传图片 结束
// index js 结束

