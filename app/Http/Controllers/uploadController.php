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
    //缩小或者放大的倍率
    private $power = 1;
    public function __construct()
    {
        $this->middleware('myAuth',['only'=>['index']]);
    }
    public function tipIndx()
    {
        $data=[
            'loginType' => $this->loginType
        ];
        return view('web.pic.pc.uploadPictureTip',$data);
    }
    public function index()
    {
        $data = [
            'loginType' => $this->loginType,
        ];
        return view('web.pic.pc.uploadPicture',$data);
    }
    public function doupload(Request $request)
    {
        $res= $request->all();
        $file = $request->file('file');
        if(!empty($file)){
            if (!file_exists($path.$this->newFileNameByTmp)||!file_exists($path.$this->newFileName)){
                mkdir($path.$this->newFileNameByTmp,'0777',TRUE);
                mkdir($path.$newFileName,'0777',TRUE);
            }
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
        $newFileName = $this->newFileName.$name.$this->markBack;
        $newFileNameByTmp = $this->newFileNameByTmp.$name.$this->markBack;
        $img = $image->make($tmpFileName)->resize($width,$height);
        $img->save($path.$newFileName);
        if($this->useWalkMark){
            $img->text($this->markText,$width*0.2,$height*0.4,function ($font){
                $font->file('C:/Windows/Fonts/simkai.ttf');//使用本地ttf文件 使用laravel自带的话会出现中文乱码
                // $font->file(2);
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
    public function retrunSize($file)
    {
        $str=getimagesize($file)[3];
        list($width,$height) = explode(' ', str_replace('"', '', $str));
        $width = $this->power*(int)explode('=', $width)[1];
        $height = $this->power*(int)explode('=', $height)[1];
        $arr = [$width,$height];
        return $arr;
    }
}