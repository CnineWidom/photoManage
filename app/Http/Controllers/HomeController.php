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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sql = "select * from p_case_list c left join p_case_photo as u on c.id=u.cid group by c.id ";
        $createRequest=new createRequest;
        $id = 1;
        $tiem = $createRequest ->route('id');
        echo $time;
        switch ($id) {
            //最新
            case 1:
                $where = 'order by created_at desc';
                break;
            case 2:
                $where = 'order by u.views desc';
                break;
            default:
                $where = 'order by u.views desc';
                break;
        }
        $sql .= $where;
        $listMess = DB::select($sql);

        // var_dump($search);
        $data = [
            'listMess' => $listMess,

        ];
        return view('web.pic.pc.index', $data);
    }
    public function search(createRequest $request)
    {
       $data =$request ->input('search');

    }
}
