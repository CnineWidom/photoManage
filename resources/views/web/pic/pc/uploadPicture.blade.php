<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_dwgss5vfofm.css">
    <link rel="stylesheet" href="{{ URL::asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}">
    <link href="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
    <title>上传图片</title>
</head>
<body>
    <div class='layout' style="clear: both;">
        <div class="header" style="width:100%;height:28px;">
            <!-- <img src="" class='index_logo' alt="" > -->
            <div class="index_logo"><img src="assest/logoblue.png" alt=""></div>
            <div class="index_nav">
                <ul>
                    <li><a href="home">首页</a></li>
                    <li><a href="uploadPicture">上传</a></li>
                    <li><a href="normalProblem.html">常见问题</a></li>
                    <li><a href="aboutUs.html">关于我们</a></li>
                </ul>
            </div>
            @if (Auth::user()->user_name)
            <div class='index_user'><a href="javascript:void(0);" style="font-weight:bold">{{Auth::user()->user_name}}</a>
                <a href="" id ='logout' style="
                  opacity: 0.5;color: rgba(42, 42, 42, 1);cursor: pointer;">[退出]</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                </form>
            </div>
            @else if
                <a href="#">登录</a>/<a href="#">注册</a>
            @endif
        </div>
    </div>

    <div class="layout">
        <div class="caseDetail_main">
            <div class="caseDetail_main_nav">
                <a href="{{ url()->previous() }}"> 
                    <i style="float: left;font-size:20px" class="iconfont icon-fanhui"></i>
                    <span>返回</span>
                </a>
            </div>
            <div class="caseDetail_main_content" style="margin-top:10px;">
                <div class="caseDetail_main_content_pic uploadPicture_main_content_pic" style="margin-top:20px;">
                    <div class="uploadPicture_main_content_pic_preview">
                        <ul>
                            <!-- <li> <img src="+imgBase+" width='100%' height='100%'> <div></div></li> -->
                        </ul>
                    </div>
                    <div class="uploadPicture_main_content_pic_button">选择图片</div>
                    <!-- <button class='share_button uploadPicture_main_content_pic_button' type="button" style="width:100%;background:rgb(187,187,187)">添加图片 -->
                  
                    <span class="progress"></span>
                    <!-- <button class='share_button uploadPicture_main_content_pic_button' type="button" style="width:48%;margin-left: 2%;">确认上传
                        </button> -->
                    <!-- <input type="file" name="file" accept="image/*" multiple="multiple" class='uploadPicture_main_content_pic_input' /> --> 
                </div>  
                <form action="uploadPicture/doupload" class="uploadPicture_main_content_form" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="caseDetail_main_content_detail">
                        <div class="pic_content_detail_introduction" style="width: 100%;border:none;padding-top: 0px">
                            <h2 style="float:none;margin-bottom: 30px">填写图片信息</h2>
                            <h3 class='uploadpicture_main_title'>标题 &nbsp;&nbsp;&nbsp;
                                <span>示例：中央视网膜动脉阻塞</span>
                            </h3> 
                            <input type="text" name="title" style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);
                                ">
                            @if ($errors->has('title'))
                                <p class="error_p">{{$errors->first('title')}}</p>
                            @endif
                            <h3 class='uploadpicture_main_title'>
                                条件及关键词 &nbsp;&nbsp;&nbsp;<span>写入关键词，会对您进行相应的推荐(多个关键词用'||'分割)</span>
                            </h3> 
                            <input type="text" name ='keyword' style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);
                            ">
                            @if ($errors->has('keyword'))
                                <p class="error_p">{{$errors->first('keyword')}}</p>
                            @endif
                            <h3 class='uploadpicture_main_title'>
                                描述 &nbsp;&nbsp;&nbsp;
                                <span>示例：随着时间的推移观察生长的具有黄斑黑色素痣的82岁女性的眼底照片。</span>
                            </h3> 
                            <textarea type="text" name ="content" style="width:100%;margin-top:10px;height:75px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);resize: none
                                ">
                            </textarea>
                            @if ($errors->has('content'))
                                <p class="error_p">{{$errors->first('content')}}</p>
                            @endif
                            <h3 class='uploadpicture_main_title'>
                                合作者 &nbsp;&nbsp;&nbsp;
                                <span>示例：John Smith, University of Minnesota, Delaware Street Clinic
                                </span>
                            </h3> 
                            <input type="text" name="author" style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);
                                ">
                            @if ($errors->has('author'))
                                <p class="error_p">{{$errors->first('author')}}</p>
                            @endif
                            <h3 class='uploadpicture_main_title'>
                                摄影师 &nbsp;&nbsp;&nbsp;
                                <span>示例：John Smith, University of Minnesota, Delaware Street Clinic
                                </span>
                            </h3> 
                            <input type="text" name="photographer" style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);
                                ">

                            <h3 class='uploadpicture_main_title'>
                                成像设备 &nbsp;&nbsp;&nbsp;
                                <span>示例：Heidelberg Spectralis 或 Zeiss FF4</span>
                            </h3> 
                            <input type="text" name="device" style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;
                                border: 1px solid rgba(0, 0, 0, .3);
                                ">
                                <!-- <h3 class='uploadpicture_main_title'>上传图片展示 &nbsp;&nbsp;&nbsp;<span>请在左侧预览并上传</span></h3>  -->
                            <input type="text" type="hidden" value="" name='files' class="uploadPicture_main_content_pic_input">
                            <!-- <a href="./uploadPictureSuccess.html"> 
                                <button class="share_button" type="button" style="margin-top:30px;">上传案例</button>
                            </a> -->
                            <input type="submit" class="share_button" style="margin-top:30px;" value="上传案例">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<form action="uploadPicture/doupload" method="post" enctype="multipart/form-data">--}}
        {{--{{csrf_field()}}--}}
        {{--<input type="file" name="files" id="">--}}
        {{--<input type="submit" value="提交">--}}
    {{--</form>--}}
    
    <div class="footer">
        <div class="footer_detail">
                <div class='footer_detail_content footer_detail_content1'>
                        <div class='footer_title'>导航</div>
                        <div class='footer_nav'>
                            <ul>
                                <li> <a href="home">主页</a> </li>
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
            <img src="assest/logoblue.png" alt="" style='float: left;'>
            <h5 style="font-size:16px;float: left;">版权归 © 2019  中山大学眼科中心 所有</h5>
            <h5 style="font-size:16px;float: right;margin-left: 5px;">粤ICP备11021180号</h5>
            <img src="assest/Bitmap.png" alt="" style='float: right;margin-top: 20px;' width="20">
        </div>
    </div>
</body>
</html>

<script src='{{URL::asset("js/jquery.min.js")}}'></script>
<script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.min.js"></script>
<script>
    if($('.uploadPicture_main_content_pic_input').length > 0){
        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: false,

            // swf文件路径
            swf: 'https://cdn.bootcss.com/webuploader/0.1.1/Uploader.swf',
            formData: {
                _token:"{{csrf_token()}}",

            },
            // 文件接收服务端。
            // server: 'http://localhost:8080/CI/index.php/BasicInfo/getpic',
            server: 'uploadPicture/doupload',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '.uploadPicture_main_content_pic_button',
            threads:1,
            dupliacate:true,
            resize: false,
            // crop: true,
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'jpg,jpeg,png,gif',
                mimeTypes: '.jpg,.jpeg,.png,.gif'
            },
            fileNumLimit: 8, //限制上传个数
            fileSingleSizeLimit: 2048000 //限制单个上传图片的大小
        });
        uploader.on( 'beforeFileQueued' ,function(file){

            if(file.ext == ""){
                return false;
            }else{
                var state = uploader.getStats();
                if(state.successNum > 7){
                    alert('单个案例上传上限为8个');
                    return false;
                }
            }
        })

        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                '<li id="' + file.id + '" class="file-item thumbn   ail">' +
                '<div class="progress previewprogress"><span></span></div>'+
                '<img>' +
                '<div class="preview_info" style="color:white;position:absolute;bottom:0px;left:0px;width:178.6px;height:auto;line-height:12px;font-size:12px;text-align:center">' + file.name + '</div>' +
                '<span class="preview_tip" style=""></span>' +
                '</li>'
                ),

                $img = $li.find('img');


            // $list为容器jQuery实例
            $('.uploadPicture_main_content_pic_preview ul').append( $li );

            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100

            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return false;
                }

                $img.attr( 'src', src );
            }, 178.6, 178.6 );


        });





        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress span');

            // 避免重复创建
            // if ( !$percent.length ) {
            //     $percent = $('<p class="progress"><span></span></p>')
            //             .appendTo( $li )
            //             .find('span');
            // }
            console.log(percentage);
            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file , response) {
            console.log(response);
            $( '#'+file.id+' .preview_tip').removeClass('preview_tip_error');
            $( '#'+file.id+' .preview_tip').addClass('preview_tip_success');

        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ,erroMsg) {
            // var $li = $( '#'+file.id ),
            //     $error = $li.find('div.error');
            console.log(erroMsg);
            $( '#'+file.id+' .preview_tip').removeClass('preview_tip_success');
            $( '#'+file.id+' .preview_tip').addClass('preview_tip_error');

            // // 避免重复创建
            // if ( !$error.length ) {
            //     $error = $('<div class="error"></div>').appendTo( $li );
            // }

            // $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            // $( '#'+file.id ).find('.progress').remove();
        });
    }

</script>
<script src='{{URL::asset("js/index.js?4554")}}'></script>
