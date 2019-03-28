@extends('layouts.parent')
@section('styleCss')
	@parent
@endsection

@section('title','测试页')

@section('siderbar')
	@parent
@endsection

@section('modal')
	@parent
@endsection

@section('content')
	<div class="share">
            <div style='background: rgba(242,242,242,.2);padding-right: 2px'>
                <h2 class='share_word_topic'>浏览·分享·学习</h2>
                <h4 class='share_word share_word0'>捕捉视网膜所有物种的范围和种类。搜索您感兴趣的特定条件，或浏览此广泛的集合以了解新的内容。</h4>
                <h4 class='share_word share_word1'>开始分享您自己的图片。</h4>
                <button class='share_button index_uploadPicture_button'>快快分享</button>
            </div>
        </div>
        <div class="pic">
            <div style='display: inline-block;width: 100%'>
            <div class='pic_nav_type'>
                <ul>
                    <!-- 图片导航a标签href渲染 开始 -->
                    <li class='pic_nav_type_first pic_nav_type_li_active'><a href="javascript:void(0);">最新</a> </li>
                    <li class='pic_nav_type_li'><a href="javascript:void(0);">热门</a></li>
                    <li class='pic_nav_type_li'><a href="javascript:void(0);">浏览</a></li>
                    <li class='pic_nav_type_li'><a href="javascript:void(0);"><i class='iconfont icon-shuaxin' style="font-size:20px"></i></a></li>
                    <!-- 图片导航a标签href渲染 结束 -->
                </ul>
            </div>
            <div class='pic_nav_search'>
                <i class="iconfont icon-sousuo index_search_button" style="float:left;position: absolute;color:rgb(209,209,209);margin-left:9px;cursor: pointer;z-index: 98;"></i>
                <input type="text" style='position: absolute;float:left'>
                  <i class="iconfont icon-zuqibing icon-qiejutang_roupianzuqibing showtype"></i>
                </div>
            </div>
            <div class='pic_content pic_content_detail' style="display:none;position: relative;">
                <div class='pic_content_mask'>
                  <img src="picture/loading.gif" alt="">
                </div>
                <!-- 详细信息循环样例 开始 -->      
                <div class='pic_content_detail_content'>
                    <div class="pic_content_detail_pic" style="position: relative;">
                    <div  class="pic_content_detail_pic_big">
                        <img src="picture/pic (5).png" height="680" width="480"  alt="480">
                    </div>
                    <div class="pic_content_detail_pic_small">
                        <img src="picture/pic (5).png"  alt="">
                    </div>
                  </div>
                  <div class="pic_content_detail_introduction">
                    <h2>黄斑变性与重要的玻璃疣</h2>
                    <span class="pic_content_detail_author">Karen Panzegrau</span><span class="pic_content_detail_date">2018-2-15</span><br>
                    <h4>一名27岁男性患者的超宽视野视频图像，患者视力丧失约6-8周。以前看过脉络膜痣。建议年度监测。自2014年10月以来没有考试。讨论了近距离放射治疗与去核。近距离放射治疗被确定为治疗。正在进行完全转移性检查。
                    <br>摄影师：Karen Panzegrau
                    <br>成像设备：Optos
                    </h4>
                    <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                    <ul>
                      <a href="javascript:void(0);"><li> 脉络膜黑色素瘤 </li></a>
                      <li>渗出性视网膜</li>
                      <li>脱离性恶性肿瘤</li>
                      <li>眼部直视眼全视野成像</li>                       
                    </ul>       
                  </div>
                </div>
                <!-- 详细信息循环样例 结束 -->
                <div class='pic_content_detail_content'>
                    <div class="pic_content_detail_pic" style="position: relative;">
                        <div  class="pic_content_detail_pic_big">
                          <img src="picture/pic (6).png" height="680" width="480"  alt="480">
                        </div>
                    <div class="pic_content_detail_pic_small">
                        <img src="picture/pic (6).png"  alt="">
                    </div>
                    </div>
                    <div class="pic_content_detail_introduction">
                        <h2>黄斑变性与重要的玻璃疣</h2>
                        <span class="pic_content_detail_author">Karen Panzegrau</span><span class="pic_content_detail_date">2018-2-15</span><br>
                        <h4>一名27岁男性患者的超宽视野视频图像，患者视力丧失约6-8周。以前看过脉络膜痣。建议年度监测。自2014年10月以来没有考试。讨论了近距离放射治疗与去核。近距离放射治疗被确定为治疗。正在进行完全转移性检查。
                        <br>摄影师：Karen Panzegrau
                        <br>成像设备：Optos
                        </h4>
                        <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                        <ul>
                          <li>脉络膜黑色素瘤</li>
                          <li>渗出性视网膜</li>
                          <li>脱离性恶性肿瘤</li>
                          <li>眼部直视眼全视野成像</li>                       
                        </ul>       
                    </div>
                </div>

                <div class='pic_content_detail_content'>
                    <div class="pic_content_detail_pic" style="position: relative;">
                        <div  class="pic_content_detail_pic_big">
                          <img src="picture/pic (7).png" height="680" width="480"  alt="480">
                        </div>
                    <div class="pic_content_detail_pic_small">
                        <img src="picture/pic (7).png"  alt="">
                    </div>
                  </div>
                  <div class="pic_content_detail_introduction">
                            <h2>黄斑变性与重要的玻璃疣</h2>
                            <span class="pic_content_detail_author">Karen Panzegrau</span><span class="pic_content_detail_date">2018-2-15</span><br>
                            <h4>一名27岁男性患者的超宽视野视频图像，患者视力丧失约6-8周。以前看过脉络膜痣。建议年度监测。自2014年10月以来没有考试。讨论了近距离放射治疗与去核。近距离放射治疗被确定为治疗。正在进行完全转移性检查。
                                    <br>摄影师：Karen Panzegrau
                                    <br>成像设备：Optos
                                    
    
    
                            </h4>
                            <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                             <ul>
                                 <li>脉络膜黑色素瘤</li>
                                 <li>渗出性视网膜</li>
                                 <li>脱离性恶性肿瘤</li>
                                 <li>眼部直视眼全视野成像</li>                       
                             </ul>       
    
                                    
                        </div>
                </div>
                <div class='pic_content_detail_content'>
                    <div class="pic_content_detail_pic" style="position: relative;">
                        <div  class="pic_content_detail_pic_big">
                            <img src="picture/pic (8).png" height="680" width="480"  alt="480">
                        </div>
                        <div class="pic_content_detail_pic_small">
                            <img src="picture/pic (8).png"  alt="">
                        </div>
                    </div>
                    <div class="pic_content_detail_introduction">
                        <h2>黄斑变性与重要的玻璃疣</h2>
                        <span class="pic_content_detail_author">Karen Panzegrau</span><span class="pic_content_detail_date">2018-2-15</span><br>
                        <h4>一名27岁男性患者的超宽视野视频图像，患者视力丧失约6-8周。以前看过脉络膜痣。建议年度监测。自2014年10月以来没有考试。讨论了近距离放射治疗与去核。近距离放射治疗被确定为治疗。正在进行完全转移性检查。
                                <br>摄影师：Karen Panzegrau
                                <br>成像设备：Optos
                        </h4>
                        <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                        <ul>
                            <li>脉络膜黑色素瘤</li>
                            <li>渗出性视网膜</li>
                            <li>脱离性恶性肿瘤</li>
                            <li>眼部直视眼全视野成像</li>                       
                        </ul>
                    </div>
                </div>
                <div class='pic_content_detail_content'>
                    <div class="pic_content_detail_pic" style="position: relative;">
                        <div  class="pic_content_detail_pic_big">
                            <img src="picture/pic (9).png" height="680" width="480"  alt="480">
                        </div>
                        <div class="pic_content_detail_pic_small">
                            <img src="picture/pic (9).png"  alt="">
                        </div>
                    </div>
                        <div class="pic_content_detail_introduction">
                            <h2>黄斑变性与重要的玻璃疣</h2>
                            <span class="pic_content_detail_author">Karen Panzegrau</span><span class="pic_content_detail_date">2018-2-15</span><br>
                            <h4>一名27岁男性患者的超宽视野视频图像，患者视力丧失约6-8周。以前看过脉络膜痣。建议年度监测。自2014年10月以来没有考试。讨论了近距离放射治疗与去核。近距离放射治疗被确定为治疗。正在进行完全转移性检查。
                                    <br>摄影师：Karen Panzegrau
                                    <br>成像设备：Optos
                            </h4>
                            <h4 style="margin-top:20px;margin-bottom:5px">条件/关键词：</h4>
                            <ul>
                                <li>脉络膜黑色素瘤</li>
                                <li>渗出性视网膜</li>
                                <li>脱离性恶性肿瘤</li>
                                <li>眼部直视眼全视野成像</li>
                            </ul>
                        </div>
                </div>
            </div>
             
            <div class='pic_content pic_content_normal' style="position: relative;">
                <div class='pic_content_mask'>
                    <img src="picture/loading.gif" alt="">
                </div>
                <div class='grid-wrapper' >
                    <div class='grid-item'>
                        <img src='picture/pic (2).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- 简略图片循环样例 开始 -->
                    <div class='grid-item'>                        
                        <img src='picture/pic (8).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- 简略图片循环样例 结束 -->
                    <div class='grid-item'>                        
                        <img src='picture/pic (3).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class='grid-item'>
                        <img src='picture/pic (4).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class='grid-item'>                        
                        <img src='picture/pic (5).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                  </h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class='grid-item'>
                        <img src='picture/pic (6).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
        
                    <div class='grid-item'>                        
                        <img src='picture/pic (7).png'>
                        <a href="./caseDetail.html">
                            <div class="index_img_mask">
                                <div class="index_imgdetail">
                                    <h5 class="index_imgdetail_title">Mud-Splatter of Posterior …</h5>
                                    <h6 class="index_imgdetail_author">Karen Panzegrau </h6>
                                    <h6 class="index_imgdetail_date">2018-2-15</h6>
                                    <h6 class="index_imgdetail_rate">
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy active_rate"></i>
                                        <i class="iconfont icon-tuanjianrongcopy normal_rate"></i>
                                    </h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
	@parent
@endsection

@section('script')
	@parent
	<script>
		(function() {
		    $('.pic_content_mask').show();
		    var picwidth = $(".pic").width()-75;
		        var eachwidth = picwidth/4;
		        console.log(eachwidth);
		        $.stackgrid.config.column_width = eachwidth;
		        $.stackgrid.config.is_fluid = false;
		        $.stackgrid.config.gutter = 15;
		    var t, n, o, i, c, e, r;
		    n = $(window), t = $(document), 
		    e = {
		        wrapper: $(".grid-wrapper"),
		        item: $(".grid-item")
		    }, 
		    e.wrapper.hide(),
		        c = $(".control-button"),
		        i = {
		            one: $(".control-button.one"),
		            two: $(".control-button.two"),
		            three: $(".control-button.three"),
		            four: $(".control-button.four"),
		            five: $(".control-button.five"),
		            six: $(".control-button.six"),
		            seven: $(".control-button.seven"),
		            eight: $(".control-button.eight"),
		            nine: $(".control-button.nine"),
		            ten: $(".control-button.ten"),
		            eleven: $(".control-button.eleven"),
		            twelve: $(".control-button.twelve"),
		            bottom_one: $(".control-button.bottom-one")
		        },
		        r = {
		            one: $(".control-input.one")
		        },
		        o = function(t) {
		        var n, o;
		        n = $('<div class="grid-item"><img src="' + t + '"></div>'), o = e.wrapper, $.imgload(t, function() {
		            return n.appendTo(e.wrapper), $.stackgrid.append(n)
		        })
		        },
		        n.on("load", function() {
		        return e.wrapper.show().fadeIn(), $.stackgrid(".grid-wrapper", ".grid-item", {
		            move: function(t, n, o, i) {
		                t.stop().velocity({
		                    left: n,
		                    top: o
		                }, 500, function() {
		                    return i()
		                })
		            },
		            scale: function(t, n, o, i) {
		                t.stop().velocity({
		                    height: n,
		                    width: o
		                }, function() {
		                    return i()
		                })
		            }
		        }), t.on("click", ".grid-item", function() {
		            // var t;
		            // t = $(this), t.remove(), $.stackgrid.restack()
		        }), i.bottom_one.on("click", function() {
		            var t;
		            t = r.one.val(), o(t), r.one.val("")
		        }), c.on("click", function(t) {
		            t.preventDefault()
		        }), i.one.on("click", function() {
		            var t;
		            t = "img/small.png", o(t)
		        }), i.two.on("click", function() {
		            var t;
		            t = "img/medium.png", o(t)
		        }), i.three.on("click", function() {
		            var t;
		            t = "img/large.png", o(t)
		        }), i.four.on("click", function() {
		            $.stackgrid.config.gutter = 20, $.stackgrid.restack()
		        }), i.five.on("click", function() {
		            $.stackgrid.config.gutter = 0, $.stackgrid.restack()
		        }), i.six.on("click", function() {
		            $.stackgrid.config.is_optimized = !0, $.stackgrid.restack()
		        }), i.seven.on("click", function() {
		            $.stackgrid.config.is_optimized = !1, $.stackgrid.restack()
		        }), i.eight.on("click", function() {
		            $.stackgrid.config.is_fluid = !0, $.stackgrid.restack()
		        }), i.nine.on("click", function() {
		            $.stackgrid.config.is_fluid = !1, $.stackgrid.restack()
		        }), i.ten.on("click", function() {
		            $(".grid-item").remove(), $.stackgrid.reset(), $.stackgrid.restack()
		        }), i.eleven.on("click", function() {
		            $.stackgrid.config.column_width = 320, $.stackgrid.reset(), $.stackgrid.restack()
		        }), i.twelve.on("click", function() {
		            $.stackgrid.config.column_width = 200, $.stackgrid.reset(), $.stackgrid.restack()
		        })
		        })
		        setTimeout(function(){
		            $('.pic_content_mask').hide();
		        },1000)
		        // $(".grid-item img").lazyload({effect: "fadeIn",threshold :10});
		}).call(this);
	</script>
@endsection

