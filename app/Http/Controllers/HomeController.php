<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Carbon\Carbon;
use Encore\Admin\Grid\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
        echo Auth::user();
        return view('web.pic.pc.index');
    }
}
