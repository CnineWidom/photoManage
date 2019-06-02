@extends('layouts.parent')
@section('styleCss')
    @parent
@endsection

@section('title','我的案例')

@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
@endsection

@section('table')
    <table class="caseManager_table" style='text-align:center;width:90%;margin-left:5%;border-spacing: 2px;border-collapse: separate;'>
        <tr class='table_title' height='30' style="background:rgb(48,79,146);line-height:30px;color: rgb(243,243,243)">
            <td width='10%'>案例题目</td>
            <td width='30%'>描述内容</td>
            <td width='9%'>合作人</td>
            <td width='9%'>摄影师</td>
            <td width='9%'>设备</td>
            <td width='9%'>上传时间</td>
            <td width='9%'>操作</td>
        </tr>
        @foreach($result as $value)
        <tr>
            <td style='text-align: center'>{{$value->title}}</td>
            <td style='text-align: center '>{{$value->content}}</td>
            <td style='text-align: center'>{{$value->author}}</td>
            <td style='text-align: center'>22</td>
            <td style='text-align: center'>{{$value->device}}</td>
            <td >{{$value->creat_at}}</td>
            <td><a href="{{ route('detail')}}/{{$value->baseId }}">查看</a> </td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    @parent
@endsection