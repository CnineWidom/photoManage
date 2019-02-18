<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Cases;
use App\Models\CasePhoto;
use Carbon\Carbon;
use Encore\Admin\Grid\Model;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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
    public function index($id=1)
    {
//        $caseList = Cases::take(2)->get();
//         $photo = new Cases;
//            $listMess =;
//            dd($listMess);
//        dd($photoCase);
//        $caseId =$photo->casePhoto();

        $sql ="select * from p_case_list c left join p_case_photo as u on c.id=u.cid group by c.id ";
        $listMess = DB::select($sql)[0];
        switch ($id) {
            //最新
            case 1:
                $where = 'order by created_at desc';
                break;
            case 2:
                $where = 'order by u.views desc';
                break
            default:
                
                break;
            $sql =
        }
        return view('web.pic.pc.index',$listMess);
    }

}
