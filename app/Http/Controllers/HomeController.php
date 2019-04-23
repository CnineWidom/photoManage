<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Cases;
use App\Models\CasePhoto;
use Encore\Admin\Grid\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\createRequest;


class HomeController extends Controller
{
    public $loginType = 1;
    public $msg = '';

    protected $pageCount = 15;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(createRequest $request)
    {
        $this->getAuthLogin($request);
        $sql = "select * from p_case_list";
        $where = ' where `issue` = 1 ';
        if($request->get('search'))
        {
            $search = $request->get('search');
            $where .=" AND keywords like '%".$search."%' ";
        }
        $requestType = (int)$request->route('id');//注意这个参数 和get的参数是不一样的
        switch ($requestType) {
            //最新
            case 0:
                $where .= ' group by id  order by created_at desc ';
                break;
            case 1:
                $where .= ' group by id  order by views desc';
                break;
            case 2:
                $where .= ' group by id  order by created_at desc';
                break;
        }
        $sql .= $where;
        $listMess = DB::select($sql);
        foreach ($listMess as $key => &$value) {
            $value->baseId = base64_encode($value->id);
            $value->keywordsTmp = explode("||",$value->keywords);
            $value->createdTmp = Date('Y-m-d',$value->created_at);
            $value->photographer = empty($value->photographer) ? $value->author : $value->photographer;
            // 获取星数 取平均值 公式 sum(star)/count(uid);
            $getStartAvg = " select AVG(`stars`)as starAvg from `p_case_star` where `cid` =".$value->id;
            $starAvg = DB::select($getStartAvg)[0];
            $starAvg = ceil($starAvg->starAvg);
            $starArr = array_fill(0, 5, 0);
            for($i = 0 ; $i < $starAvg; $i++){
                if($i< 5 ){
                    $starArr[$i] = 1;
                }
            }
            $value ->starArr =  $starArr;
        }
        unset($value);
        $data = [
            'listMess' => $listMess,
            'id' => $requestType,
            'loginType' => $this->loginType,
            'msg' => $this->msg
        ];
        return view('web.pic.pc.index',$data);
    }

    public function getAuthLogin($request)
    {
        $session =$request->session()->all();
        if(!empty($session['warn'])) {
            $this ->loginType = $session['warn']['code'];
            $this ->msg = $session['warn']['message'];
            flash($this ->msg)->error()->important();
        }
    }

    public function normalproblem()
    {
        $data=[
            'loginType' => $this->loginType
        ];
        return view('web.pic.pc.normalProblem',$data);
    }

    public function aboutUs()
    {
        $data=[
            'loginType' => $this->loginType
        ];
        return view('web.pic.pc.aboutUs',$data);
    }

    public function showDetail(createRequest $request)
    {
        $photoId = $request->route('photoId');
        dd($request->session());
        // if(Auth::check());
        dd(Auth::check());
        if($photoId){

        }
        else{

        }
    }
}
