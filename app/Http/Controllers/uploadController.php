<?php
/*图片上传*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
	public function index()
	{
//	    echo 456;
		return view('web.pic.pc.uploadPicture');
	}
}
