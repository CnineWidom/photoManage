<?php
/*图片上传*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createRequest;
use Intervention\Image\ImageManager;

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
//		$this->middleware('myAuth',['only'=>['index']]);
	}

	public function index()
	{
		$data = [
			'loginType' => $this->loginType,
		];
		return view('web.pic.pc.uploadPicture',$data);
	}

	public function doupload(createRequest $request,ImageManager $image)
	{
		$res= $request->all();
		$file = $request->file('file');
		if(!empty($file)){
			$tmpFileName = $file->getPathname();
            $path = public_path();
            $name = md5(base64_decode(time()));
            $newFileName = $this->newFileName.$name.$this->markBack;
            $newFileNameByTmp = $this->newFileNameByTmp.$name.$this->markBack;

            $dir = $path.$newFileName;
            if (!file_exists($dir)||!file_exists($path.$newFileNameByTmp)){
                mkdir($dir,'0755',TRUE);
                mkdir($newFileNameByTmp,'0755',TRUE);
	            echo 1;
	        }
            $img = $image->make($tmpFileName)->resize(300,300);
            $img->save($dir);
            if($this->useWalkMark){
                $img->text($this->markText,140,140,function ($font){
                    $font->file('C:/Windows/Fonts/STXINWEI.TTF');//使用本地ttf文件 使用laravel自带的话会出现中文乱码
//                    $font->file(2);
                    $font->size(40);
                    $font->color('#fff');
                    $font->align('center');
                });
            }
            else{
                $img->insert($this->markPicPath);
            }

            $img->save($path.$newFileNameByTmp);
		}
		// dd($res);
		// echo json_encode($res['title']);
		 // $title = $request->get('title');
		 // $content = $request->get('content');
		 // $file = $request->all();
		 // dd($file);
	}
}
