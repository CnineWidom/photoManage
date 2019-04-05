<?php
/*图片上传*/
namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\createRequest;
class uploadController extends Controller
{

	public function __construct()
	{
		$this->middleware('myAuth',['only'=>['index']]);
	}

	public function index()
	{
		return view('web.pic.pc.uploadPicture');
	}

	public function doupload(createRequest $request)
	{
		 // $title = $request->get('title');
		 // $content = $request->get('content');
		 $file = $request->all();
		 dd($file);
	}

}
