@extends('layouts.parent')
@section('styleCss')
    @parent
    <link href="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
@endsection
@section('title','上传图片')

@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
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
                    </ul>
                </div>
                <div class="uploadPicture_main_content_pic_button">选择图片</div>
                <span class="progress"></span>
            </div>  
            <form action="" id = 'uploadform' class="uploadPicture_main_content_form" >

                <div class="caseDetail_main_content_detail">
                    <div class="pic_content_detail_introduction"  style="width: 100%;border:none;padding-top: 0px">
                        <h2 style="float:none;margin-bottom: 30px">填写图片信息</h2>
                        <h3 class='uploadpicture_main_title'>标题 &nbsp;&nbsp;&nbsp;<span>示例：中央视网膜动脉阻塞</span></h3>
                        <input type="text" name='title' style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;border: 1px solid rgba(0, 0, 0, .3);">

                        <h3 class='uploadpicture_main_title'>条件及关键词
                            &nbsp;&nbsp;&nbsp;<span>写入关键词，会对您进行相应的推荐如：keyword,脉络膜黑色素瘤,渗出性视网膜,眼部直视眼全视野成像</span>
                        </h3>
                        <div class="uploadpicture_main_keywords"style="margin-top:10px;line-height: 20px;min-height:45px">
                            <p style="color:rgb(150,150,150)">关键词：(不能超过5个)</p>
                            <ul></ul>
                        </div>
                        <div class='uploadpicture_main_keyword_input'
                            style="box-sizing:border-box;width:100%;min-height:25px;border: 1px solid rgba(0, 0, 0, .3)">
                            <input type="text" class="keywordInput" name='keyword' style='width: 100%;height: 25px;padding-left: 5px;box-sizing: border-box'>
                            <div class='KeyWordTip' style="display:none">
                                <div class="KeyWordTip_input KeyWordTip_input_normal" style="background:rgb(242,242,242)">
                                </div>
                            </div>
                        </div>

                        <h3 class='uploadpicture_main_title'>描述
                            &nbsp;&nbsp;&nbsp;<span>示例：随着时间的推移观察生长的具有黄斑黑色素痣的82岁女性的眼底照片。</span></h3>
                        <textarea placeholder-class="uploadPicture_textarea" name='content' type="text"placeholder="提供可增强上传文件的教育性质的详细信息。&#13;&#10;请勿在说明中包含任何患者识别信息。&#13;&#10;避免过度使用患者，其他医疗保健专业人员和媒体成员可能不太熟悉的首字母缩略词。"
                        style="width:100%;margin-top:10px;height:105px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;border: 1px solid rgba(0, 0, 0, .3);resize: none"></textarea>

                        <h3 class='uploadpicture_main_title' >作者 &nbsp;&nbsp;&nbsp;<span>示例：John Smith,
                                University of Minnesota, Delaware Street Clinic</span></h3>
                        <input type="text" name='author' style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;border: 1px solid rgba(0, 0, 0, .3);">

                        <h3 class='uploadpicture_main_title'>摄影师 &nbsp;&nbsp;&nbsp;<span>示例：John Smith,University of Minnesota, Delaware Street Clinic</span></h3>
                        <input type="text" name='photographer' style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;border: 1px solid rgba(0, 0, 0, .3);">

                        <h3 class='uploadpicture_main_title'>成像设备 &nbsp;&nbsp;&nbsp;<span>示例：HeidelbergSpectralis 或 Zeiss FF4</span></h3>
                        <input type="text" name='device' style="width:100%;margin-top:10px;height:25px;padding-left:5px;font-size:16px;color:rgb(39,39,39);padding-right:5px;box-sizing:border-box;border: 1px solid rgba(0, 0, 0, .3);">
                        <button class="uploadbtn share_button" type="button" style="margin-top:30px;">上传案例</button>
                        <!-- <input type="submit" class="uploadbtn share_button" style="margin-top:30px;" value="上传案例"> -->
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('uploadjs')
    @parent
@endsection

@section('script')
    <script>
        let token_csrf = '{{csrf_token()}}'
    </script>
    @parent
@endsection
