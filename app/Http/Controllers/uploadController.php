<?php
/*图片上传*/
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\createRequest;

class uploadController extends Controller
{
	//判断是否登录状态
	public $loginType = 1;

	public function __construct()
	{
		$this->middleware('myAuth',['only'=>['index']]);
	}

	public function index()
	{
		$data = [
			'loginType' => $this->loginType,
		];
		return view('web.pic.pc.uploadPicture',$data);
	}

	public function doupload()
	{
		// $request = new createRequest;
		$res = $_POST;
		// $res = $_FILES;
		dd($res);
		echo $res['title'];
		 // $title = $request->get('title');
		 // $content = $request->get('content');
		 // $file = $request->all();
		 // dd($file);
	}
}
