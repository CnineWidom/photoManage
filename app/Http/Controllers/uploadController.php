<?php
/*图片上传*/
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\createRequest;
class uploadController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['only'=>['index']]);
	}

	public function index()
	{
		return view('web.pic.pc.uploadPicture');
	}

//	public function doupload(createRequest $request)
//	{
////		 $title = $request->get('title');
////		 $content = $request->get('content');
////		 $file = $request->file();
//		 $res = $request->all();
//		 var_dump($res);
//	}
    public function doupload(createRequest $request)
    {
//        header("Content-Type: text/html; charset=utf-8");
//		 $title = $request->get('title');
//		 $content = $request->get('content');
//		 $file = $request->file();
        $data = $request->all();
        $res = $request->file('files');
        dd($data);
    }
}
