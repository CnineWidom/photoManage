<?php
/**
 * User: zengxianmao
 * Date: 2019/4/15
 * Time: 17:53
 */

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Http\Request;

class CommonActionController extends Controller
{
    public function release(Request $request)//文章批量下线
    {
        if(empty($request->get('ids'))) return;
        
        foreach (Cases::find($request->get('ids')) as $post) {
            $post->issue = $request->get('action');
            $post->save();
        }
    }

}