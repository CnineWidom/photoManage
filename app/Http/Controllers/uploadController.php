<?php
/*图片上传*/
namespace App\Http\Controllers;

use App\Models\Cases;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\createRequest;
use Intervention\Image\ImageManager;


class uploadController extends Controller
{
	//水印路径
    private $newFileNameByTmp = '/upload/images/userTmp/';
    private $newFileName = '/upload/images/user/';
    private $textPath = "C:/Windows/Fonts/simkai.ttf";
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

	//缩小或者放大的倍率
	private $power = 0.5;

    //图片大小
    private $size = 2097152;

	public function __construct()
	{
		$this->middleware('myAuth',['only'=>['index','doupload']]);
	}

	public function index()
	{
		$data = [
			'loginType' => $this->loginType,
		];
		return view('web.pic.pc.uploadPicture',$data);
	}

	public function doupload(Request $request,ImageManager $image)
	{
        $uid = Auth::id();
		$res= $request->all();
		$photoFile = $request->file('file');
        dd($photoFile->getSize());
        $id = (int)$res['id'];
        $res = escapeString($res);
        $title = $res['title'];
        $photographer = $res['photographer'];
        $device = $res['device'];
        $content = $res['content'];
        $keyword = $res['keyword'];
        $author = $res['author'];
        $_token = $res['_token'];
        if($id == 0){
            $data = [
                'uid' => $uid,
                'keywords' => $keyword,
                'content' => $content,
                'author' => $author,
                'photographer' => $photographer,
                'device' => $device,
                'issue' => 0,
                'token' => $_token,
            ];
            // $this->saveImage($image,$photoFile);
        }else{

        }


		if(!empty($file)){
			
		}else{
            getReturnMsg(-6);
        }
	}

	public function saveImage(ImageManager $image,$file)
	{
		$path = public_path();
		$sizeArr = $this->retrunSize($file);
        $width = $sizeArr[0];
        $height = $sizeArr[1];
        $tmpFileName = $file->getPathname();
        $name =md5(base64_decode(time()));
        if (!file_exists($path.$this->newFileNameByTmp)||!file_exists($path.$this->newFileName)){
            mkdir($path.$this->newFileNameByTmp,'0777',TRUE);
            mkdir($path.$newFileName,'0777',TRUE);
        }
        $newFileName = $this->newFileName.$name.$this->markBack;
        $newFileNameByTmp = $this->newFileNameByTmp.$name.$this->markBack;
        $img = $image->make($tmpFileName);
        echo $img->size;
        dd($img->size);
        $img->resize($width,$height)->save($path.$newFileName);
        if($this->useWalkMark){
            $img->text($this->markText,$width*0.2,$height*0.4,function ($font){
                $font->file($this->textPath);//使用本地ttf文件 使用laravel自带的话会出现中文乱码
                // $font->file(2);
                $font->size(40);
                $font->color('#fff');
                $font->align('center');
            });
        }
        else{
            $img->insert($this->markPicPath);
        }
        //$newFileName  插入数据库 后期写
        $img->save($path.$newFileNameByTmp);
    }

    public function retrunSize($file)
    {
        $str=getimagesize($file)[3];
        list($width,$height) = explode(' ', str_replace('"', '', $str));
        $width = $this->power*(int)explode('=', $width)[1];
        $height = $this->power*(int)explode('=', $height)[1];
        $arr = [$width,$height];
        return $arr;
    }

    public function checkFile($file)
    {
        //大小限制
        $size = $img->getSize();
    }
}