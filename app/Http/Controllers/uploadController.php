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
    //系统默认后缀
    public $markBack = '.png';

	//判断是否登录状态
	public $loginType = 1;

	//缩小或者放大的倍率 0.5缩小
	private $power = 0.5;
    private $fontSize = 20;
    private $width = 372;
    //图片大小
    private $size = 2097152;
    //允许的类型
    private $allowType=["image/jpeg","image/png","image/jpg"];

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
        // $this->deleteMess(25);
        // exit;
        $uid = Auth::id();
		$res= $request->all();
		$photoFile = $request->file('file');
        $id = (int)$res['id'];
        $res = escapeString($res);
        $title = $res['title'];
        $photographer = $res['photographer'];
        $device = $res['device'];
        $content = $res['content'];
        $keyword = stripslashes($res['keyword']);
        $author = $res['author'];
        $_token = $res['_token'];
        $time = time();
        $code = 1;

        if(empty($title) || empty($photographer) || empty($device) || empty($content) ||empty($keyword) ||empty($author) || empty($_token)){
            $code = -9;
        }
        if(empty($photoFile)){
            $code = -6;
        }
        //第一次插入
        if($id == 0 && $code ==1){
            //判断时间 十分钟才能插入一条

            $findCase = Cases::where(function($query) use($uid){
                $query->where('uid',$uid);
                $query->where('created_at','<',$time-600);
            })->get();
            if($findCase->isEmpty()){
                $data = [
                    'title' => $title,
                    'uid' => $uid,
                    'keywords' => $keyword,
                    'content' => $content,
                    'author' => $author,
                    'photographer' => $photographer,
                    'device' => $device,
                    'issue' => 0,
                    'token' => $_token,
                ];
                $result = $this->saveImage($image,$photoFile);
                $code = $result['code'];
                $filePath = [$result['msg']];
                if(!empty($filePath) && $code ==1){
                    $data['photos'] = $filePath;
                    $insertRes = Cases::create($data);
                    echo json_encode(['id'=> $insertRes->id]);
                }
            }else{
                $code = -5;
            }
        }elseif($id > 0 && $code ==1){
            try {
                $findCase = Cases::where(function($query) use($uid,$id,$_token){
                    $query->where('uid',$uid);
                    $query->where('id',$id);
                    $query->where('token',$_token);
                })->get();
                if(!$findCase->isEmpty()){
                    $filePath = $findCase[0]->photos;
                    $result = $this->saveImage($image,$photoFile);
                    $code = $result['code'];
                    $fileNewPath = $result['msg'];
                    array_push($filePath, $fileNewPath);
                    if(!empty($filePath) && $code ==1){
                        $res = Cases::find($id);
                        $res->photos = $filePath;
                        $res->save();
                    }
                }else{
                    $code = -10;
                }
            } catch (Exception $e) {
                $this->deleteMess($id);
                $code = -11;
            }
        }
        $res = [
            'code'=> $code,
            'msg' => getReturnMsg($code,0,1),
        ];
        return $res;
	}

	public function saveImage($image,$file)
	{
		$path = public_path();
        $filePath = "";
        $code = $this->checkFile($file);
        if($code == 1){
            $width = $this->width;
            $height = $this->width;
            $tmpFileName = $file->getPathname();
            $name =md5(base64_decode(time()));
            if (!file_exists($path.$this->newFileNameByTmp)||!file_exists($path.$this->newFileName)){
                mkdir($path.$this->newFileNameByTmp,'0777',TRUE);
                mkdir($path.$newFileName,'0777',TRUE);
            }
            $newFileName = $this->newFileName.$name.$this->markBack;
            $newFileNameByTmp = $this->newFileNameByTmp.$name.$this->markBack;

            $img = $image->make($tmpFileName);
            //原图原样存储
            $img->save($path.$newFileName);
            //使用文字水印
            $img->resize($width,$height);
            $arr = $this->returnSite(4,$width);
            if($this->useMarkType == 1){ 
                foreach ($arr as $key => $value) {
                    $img->text($this->markText,$value[0],$value[1],function ($font){
                        $font->file($this->textPath);//使用本地ttf文件 使用laravel自带的话会出现中文乱码
                        // $font->file(2);
                        $font->size($this->fontSize);
                        $font->color('#fff');
                        $font->align('center');
                    });
                }
            }
            //图片水印暂时不开放
            // else{
            //     $img->insert($this->markPicPath);
            // }
            //水印图固定大小 数据库存储水印路径
            $img->save($path.$newFileNameByTmp);
            $filePath = $newFileNameByTmp;
        }
        $res =[
            'code' => $code,
            'msg' => $filePath
        ];
        return $res;
    }

    /**
    *错误的时候删除整条数据 以及对应的资源文件
    */
    public function deleteMess($id)
    {
        $uid = Auth::id();
        $findCase = Cases::where(function($query) use($uid,$id){
            $query->where('uid',$uid);
            $query->where('id',$id);
        })->limit(1)->get(); 
        if(!$findCase->isEmpty()){
            $photoFile = $findCase[0]->photos;
            if(is_array($photoFile)){
                foreach ($photoFile as $key => $value) {
                    $fileName = public_path().$value;
                    $fileNameTmp = str_replace('userTmp', 'user',public_path().$value);
                    unlink($fileName);
                    unlink($fileNameTmp);
                }
            }
            //删除该条记录 删除资源
            Cases::find($id)->delete();
        }
    }

    public function checkFile($file)
    {
        $code = 1;
        $size = $file->getSize();
        $fileName = $file->getRealPath();
        $mimeType = $file->getMimeType();
        if($size > $this->size) $code = -7;
        if(!in_array($mimeType, $this->allowType)) $code = -8;
        return $code;
    }

    /**
    * @param $count 需要多少个水印
    * @param $width 宽度
    * @return 返回一x，y坐标的数组
    */
    public function returnSite($count,$width)
    {
        $prv = ceil(($width/$count));
        $size = strlen($this->markText);
        $data = array();
        for ($i=0; $i < $count; $i++) { 
            $x = $prv * $i+$size*3.4;
            $y = $prv * $i+$this->fontSize;
            if($x > $width || $y > $width)
            {
                $x = $width-$size*3.4;
                $y = $width-$this->fontSize;
            }
            array_push($data,[$x,$y]);
        }
        return $data;
    }
}