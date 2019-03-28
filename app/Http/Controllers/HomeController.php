<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Cases;
use App\Models\CasePhoto;
use Carbon\Carbon;
use Encore\Admin\Grid\Model;
//use Illuminate\Http\Request;//明面上的方式
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request;
use App\Http\Requests\createRequest;
class HomeController extends Controller
{
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

        // $sql = "select * from p_case_list c left join p_case_photo as u on c.id=u.cid ";
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
        // var_dump( $listMess);


        $data = [
            'listMess' => $listMess,
            'id' => $requestType

        ];
        return view('web.pic.pc.index', $data);
    }

    public function search(createRequest $request)
    {
       $data =$request -> input('search');
    }

    public function test()
    {
        return view('web.pic.pc.test');
    }
}
