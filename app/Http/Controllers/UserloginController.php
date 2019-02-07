<?php 
/**
 * 
 */
namespace App\Http\Controllers;

use App\Http\Requests;

use Request;

class UserloginController extends Controller
{
	public function login()
	{
		return view('pc/login');
	}

	public function register(){
		return view('pc/register');
	}
	public function dologin()
	{
		echo 456;
		$input=Request::all();
		var_dump($input);
		echo $input['phone'];
	}
}

