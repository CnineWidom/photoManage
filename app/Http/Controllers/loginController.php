<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * 
 */
class LoginController extends Controller
{
	
	public function login()
	{
		return view('web.pc.login');
	}
}