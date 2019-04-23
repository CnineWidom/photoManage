<?php
/**
 * User: zengxianmao
 * Date: 2019/4/15
 * Time: 17:53
 */

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseComment;
use App\Models\Cases;
use Illuminate\Http\Request;

class CommonActionController extends Controller
{
    private $action = 0;
    private $idArr = [];
    private $rs = 0;

    public function __construct(Request $request)
    {
        if(empty($request->get('ids'))) return;
        $this->action = $request->get('action');
        $this->idArr = $request->get('ids');
    }

    public function release()//文章批量下线
    {
        foreach (Cases::find($this->idArr) as $post) {
            if($post->issue == $this->action)
                continue;
            $post->issue = $this->action;
            $post->save();
            $this->rs = 1;
        }
        echo $this->rs;
    }

    public function filter()//评论批量过滤
    {
        foreach (CaseComment::find($this->idArr) as $comment) {
            if($comment->is_filter == $this->action)
                continue;
            $comment->is_filter = $this->action;
            $comment->save();
            $this->rs = 1;
        }
        echo $this->rs;
    }

}