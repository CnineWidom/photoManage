<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Redirect;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;


class AuthBySelf extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        //登录状态
        if(!empty($user)){
            // $user = json_decode($token);
            return $next($request);
            // Redirect::action("HomeController@index", [0]);
            // return Redirect::to('user/login')->with('message', 'Login Failed');
        }else{
            return Redirect::to('index')->with('warn', $this->backArr(0));
        }
    }

    public function backArr($code,$flag = 1)
    {
        if($flag)
        {
            $arr = [
                '0'=>['code'=>-1,'message'=>'请先登录'],
            ];
        }
        return $arr[$code];
    }
}
