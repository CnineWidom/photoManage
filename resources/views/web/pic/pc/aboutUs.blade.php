@extends('layouts.parent')
@section('styleCss')
    <style>
        html{
            background: url('{{ URL::asset("assest/aboutUsBg.png")}}') no-repeat center top;
            background-size: 100%;
        }
    </style>
@endsection
@section('title','about')
@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
    <div class="aboutUs_content">
        <h2 class="normalproblem_main_title">联系我们</h2>
        <h3 class="normalproblem_main_title2" style="">反馈和支持</h3>
        <p  class="normalproblem_main_content" style="margin-left:0px;">有关RentinalmageBank©网站的评论或者问题，请发送电子邮箱至imageBank@asrs.org或ASRS总部(312)578-8760。</p>
    </div>
@endsection

@section('footer')
    @parent
@endsection

@section('script')
    @parent
@endsection