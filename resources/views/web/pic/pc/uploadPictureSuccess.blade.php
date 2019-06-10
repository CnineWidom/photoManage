@extends('layouts.parent')
@section('styleCss')
    @parent
@endsection
@section('title','上传成功')
@section('siderbar')
    @parent
@endsection

@section('modal')
    @parent
@endsection

@section('content')
    <div style="margin-top:50px;text-align: center">
        <!-- <img src="assest/success.jpg" alt="" width="200px">
        <img src="assest/progress.png" alt=""> -->
        <img src="assest/verify.png" alt="" width="300px;">
        <p style="font-size:20px;">案例上传成功，请等待管理员审核...</p>
        <button class="share_button" style="background:rgb(239,239,239);color:rgb(48,79,146);font-weight: bold"> 案例管理 </button>
        <a href="./uploadPicture"><button class="share_button" style="margin-left: 20px;" > 继续上传 </button></a>
    </div>
@endsection
@section('footer')
    @parent
@endsection

@section('script')
    @parent
    <script>
        $('.share_button').click(function(){
            window.location.href = '/mine';
        })
    </script>
@endsection