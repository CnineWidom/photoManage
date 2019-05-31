@extends('layouts.parent')
@section('styleCss')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.spzoom.css') }}">
@endsection

@section('title','案例详情')
@section('siderbar')
    @parent
@endsection
@section('modal')
    @parent
@endsection

@section('content')
    <div class="caseDetail_main">
        <div class="caseDetail_main_nav">
            <a href="{{ url()->previous() }}"> <i style="float: left;font-size:20px" class="iconfont icon-fanhui"></i>
                <span>返回</span>
            </a>
        </div>
        <div class="caseDetail_main_content">
            <div class="caseDetail_main_content_pic">
                <div class='caseDetail_main_content_pic_big'>
                    <div>
                        <!-- <img  src="picture/pic (2).png" alt="" height="376.2"> -->
                        <img  src="{{$result->photosTmp[0]}}" alt="" height="376.2">
                    </div>
                </div>
                <div class="picture_content_left" style="position:absolute;left: -20px;height: 100px;width: 20px;bottom:20px;line-height: 100px;text-align: center;cursor: pointer;display: none">
                    <i class="iconfont icon-zuojiantou" style="font-size:20px;"></i>
                </div>
                <div class="picture_content_right" style="position:absolute;right: -20px;height: 100px;width: 20px;bottom:20px;line-height: 100px;text-align: center;cursor: pointer;">
                    <i class="iconfont icon-youjiantou" style="font-size:20px;"></i>
                </div>
                <div class="caseDetail_main_content_pic_small">
                    <ul>
                        @foreach ($result->photosTmp as $value)
                            <li><img src="{{$value}}" alt=""></li>
                        @endforeach
                    </ul>
                    <div><i></i></div>
                </div>
                <p>共{{$result->photoCount}}张</p>
            </div>  
            <div class="caseDetail_main_content_detail">
                <div class="pic_content_detail_introduction" style="width: 100%;border:none;padding-top: 10px">
                    <h2>{{$result->title}}</h2> 
                    <button class='share_button caseDetail_main_content_detail_download_button' style="float:right;position: absolute;top: 0px;right:0px;margin-top:10px">
                        <a href="./picture/downPicture.zip" style="position:absolute;width:100%;height:100%;left: 0px;top:0px;">
                        </a> 下载图片
                    </button>
                    <span class="pic_content_detail_author">{{$result->author}}</span>
                    <span class="pic_content_detail_date">{{$result->createDate}}</span><br>
                    <h4>{{$result->content}}<br>摄影师：{{$result->photographer}}<br>成像设备：{{$result->device}}
                            </h4>
                    <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                    <ul>
                        @foreach ($result->keyWordTmp as $val)
                            <li> <a href="javascript:void(0);"> {{$val}} </a></li>
                        @endforeach
                    </ul>
                    <h4 style="margin-top:20px;margin-bottom:5px">评分等级：</h4>
                    <h6 class="index_imgdetail_rate" style="float:left">
                        @foreach ($result->starArr as $v)
                            @if($v) <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                            @else <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                            @endif
                        @endforeach
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div style="width:100%;background:rgb(250,250,250);display:inline-block;">
        <div class="layout">
            <div class="caseDetail_main_conment">
                <form action="/detail/{{$result->baseId}}" method="post" style="position:relative">
                    {{ csrf_field() }}
                    <h3>评论：</h3>
                    <input type="hidden" value="0" name="starCount" class='ratenum'/>
                    <textarea name="content" id=""  placeholder="写下你的想法吧..."></textarea>
                    <h6 class="index_imgdetail_rate caseDetail_main_conment_rate" style="position: absolute;right: 10px;top:135px">
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                    </h6>
                    <input type="submit" class='share_button' style="float:right" value="发表评论">
                </form>
            </div>
            @include('flash::message')

            @if( count($result->comment) == 0)
                <div class="caseDetail_main_conment_content">
                    <p style="text-align:center;">暂无评论</p>
                </div>
            @else
                @foreach($result->comment as $value)
                <div class="caseDetail_main_conment_content">
                    <div class="caseDetail_main_conment_content_word">
                        <h3 class="caseDetail_main_conment_content_word_username">{{ $value->userMess }}</h3>
                        <span style="float:left;margin-left:49px">{{ $value->timeInter }}</span><br>
                        <h5> {{ $value->content }}</h5>
                    </div>
                </div>
                @endforeach
            @endif
            <div class="caseDetail_main_similar_pic">
                <h3 class="caseDetail_main_conment_content_word_username" style="float:none;margin-top:50px;">类似案例及图片</h3>
                <ul style="margin-top:20px;">
                    @foreach($sameList as $val)

                        <a href="{{route('detail')}}/{{$val->baseId }}">
                            <li>
                                <img src="{{$val->photosTmp}}" alt="">
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection

@section('script')
<script>
    $(function(){
        $('#flash-overlay-modal').modal();
    })
    
</script>
@endsection