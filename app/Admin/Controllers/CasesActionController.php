<?php

namespace App\Admin\Controllers;

use App\Models\Cases;
use App\Models\Photo;
use App\Models\star;
use App\Http\Controllers\Controller;
//本控制器扩展用
class CasesActionController extends Controller
{
    /**
     * 
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

}
