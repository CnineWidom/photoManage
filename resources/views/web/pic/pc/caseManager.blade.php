@extends('layouts.parent')
@section('styleCss')
    @parent
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/index.css">
    <title>我的案例</title>
</head>
<body>
    <div class="layout">
            <div class="header" style="width:100%;height:28px;">
                    <!-- <img src="" class='index_logo' alt="" > -->
                    <div class="index_logo"><img src="assest/logoblue.png" alt=""></div>
                    <div class="index_nav">
                        <ul>
                            <li><a href="index.html">首页</a></li>
                            <li><a href="uploadPictureTip.html">上传</a></li>
                            <li><a href="normalProblem.html">常见问题</a></li>
                            <li><a href="aboutUs.html">关于我们</a></li>
                        </ul>
                    </div>
                    <div class='index_user'><a href="javascript:void(0);" style="font-weight:bold">joe_Tsue</a>  <span style="
                        opacity: 0.5;
                        color: rgba(42, 42, 42, 1);
                        cursor: pointer;
                        ">&nbsp;&nbsp;[退出]</span></div>
                </div>
                
    </div>

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
    
    <div class="footer">
            <div class="footer_detail">
                    <div class='footer_detail_content footer_detail_content1'>
                            <div class='footer_title'>导航</div>
                            <div class='footer_nav'>
                                <ul>
                                    <li> <a href="index.html">主页</a> </li>
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
                <div class='footer_copyright_content' >
                <img src="assest/logoblue.png" alt="" style='float: left;'>
                <h5 style="font-size:16px;float: left;">版权归 © 2019  中山大学眼科中心 所有</h5>
                <h5 style="font-size:16px;float: right;margin-left: 5px;">粤ICP备11021180号</h5>
                <img src="assest/Bitmap.png" alt="" style='float: right;margin-top: 20px;' width="20">
            </div>
            
        </div>
</body>
</html>