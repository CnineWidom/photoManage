@extends('layouts.parent')
@section('styleCss')
    @parent
    <link href="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.css" rel="stylesheet">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1030860_dwgss5vfofm.css">
@endsection
@section('title','上传图片')
@section('body','body3')

@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
@endsection

@section('table')
    <div class="caseDetail_main uploadpicture_main">
        <div class="layout" style="padding-left:99px;padding-right:99px;box-sizing:border-box">
            <div class="pic_content_detail_introduction uploadpicture_main_introduction" style="width: 100%;border:none;padding-top: 10px">
                <h2 style="float:none">上传图片注意事项：</h2>
                <p style="margin-top:20px;opacity: 0.79;color: rgba(44, 44, 44, 1);font-size: 18px;"> 请以下列格式之一上传您的图片：.jpg或.png。<br>
                并填写图片的详细信息，其中包括：<br><br>图片组标题<br>描述<br>关键词<br>拍摄信息  <br></p>
                <button class="share_button uploadPictureTip_upload_button" style="float:none;margin-bottom: 20px">开始上传</button><br>
                <i class="iconfont icon-check-box-outline-bl" id='upload_pic_tip_icon' style="cursor:pointer;font-size:20px;color: rgb(190,190,190);position: relative;top:1.9px"></i>
                <span style="font-size: 16px;color: rgba(49,49,49,.8)">通过将图像上传到Retina Image Bank，我同意以下使用条款。</span><p style="margin-top: 20px;margin-left: 25px;color:rgba(49,49,49,.8)">

                我特此将我的照片所有权转让给美国视网膜专家协会。上传后，我将保留将我的图像用于个人，教育和非营利目的的权利，但转移到Retina Image Bank的图像不能出售，用于盈利或在其他地方发布。<br>
                我理解并同意我的图像和/或其他媒体可以在Retina Times期刊，Retina FYI时事通讯，“Retina年度回顾”地图集和ASRS教育材料中发布。<br>
                通过同意此处概述的条款，我证明我有权将图像和/或其他媒体所有权和使用权转让给ASRS。</p>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('script')
    @parent
@endsection