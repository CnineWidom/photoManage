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
    <table class="caseManager_table" style='text-align:center;width:90%;margin-left:5%;'>
        <tr class='table_title' height='30' style="background:rgb(48,79,146);line-height:30px;color: rgb(243,243,243)">
            <td width='10%'> 
                案例题目
            </td>
            <td width='30%'> 
                描述内容
            </td>
            <td width='9%'>
                合作人
            </td>
            <td width='9%'>
                摄影师
            </td>
            <td width='9%'>
                设备
            </td>
            <!-- <td>
                图片内容
            </td> -->
            <td width='9%'>
                上传时间
            </td>
            <td width='9%'>
                操作
            </td>
        </tr>
        <tr style="">
            <td style='text-align: left'>黄斑变性与重要的玻璃疣</td>
            <td style='text-align: left'>我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容</td>
            <td style='text-align: left'>合作人名字合作人名字
                
            </td>
            <td style='text-align: left'>22</td>
            <td style='text-align: left'>22</td>
            <!-- <td>22</td> -->
            <td >2019-3-13</td>
            <td><a href="./caseDetail.html">查看</a> </td>
        </tr>
        <tr>
            <td style='text-align: left'>黄斑变性与重要的玻璃疣</td>
            <td style='text-align: left'>我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容</td>
            <td style='text-align: left'>合作人名字合作人名字
                
            </td>
            <td style='text-align: left'>22</td>
            <td style='text-align: left'>22</td>
            <!-- <td>22</td> -->
            <td >2019-3-13</td>
            <td><a href="./caseDetail.html">查看</a> </td>
        </tr>
        <tr>
            <td style='text-align: left'>黄斑变性与重要的玻璃疣</td>
            <td style='text-align: left'>我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容我是描述内容</td>
            <td style='text-align: left'>合作人名字合作人名字
                
            </td>
            <td style='text-align: left'>22</td>
            <td style='text-align: left'>22</td>
            <!-- <td>22</td> -->
            <td >2019-3-13</td>
            <td><a href="./caseDetail.html">查看</a> </td>
        </tr>
    </table>
@endsection

@section('footer')
    @parent
@endsection