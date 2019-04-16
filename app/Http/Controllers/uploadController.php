<?php
/*图片上传*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createRequest;

class uploadController extends Controller
{
	    //水印路径
    private $newFileNameByTmp = '/uploads/images/userTmp/';
    private $newFileName = '/uploads/images/user/';

    //是否用水印
    public  $useWalkMark = 1;
    //用哪种水印 1图片 2文字
    public  $useMarkType = 1;
    //默认文字水印 文字
    public $markText = '花开蝶自来';
    //默认图片水印路径
    public $markPicPath = '';
    //默认后缀
    public $markBack = '.png';

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

	public function doupload(createRequest $request)
	{
		$res= $request->all();
		$file = $request->file('file');
		dd($res);
		echo json_encode($res['title']);
		 // $title = $request->get('title');
		 // $content = $request->get('content');
		 // $file = $request->all();
		 // dd($file);
	}
}
