<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public  function index(){

        return view('web.imgload.test');
    }

    public  function kou(){
        return view('web.imgload.kou');
    }
}
