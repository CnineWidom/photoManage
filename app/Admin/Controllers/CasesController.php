<?php

namespace App\Admin\Controllers;

use App\Models\Cases;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CasesController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('案例')
            ->description('案例列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('新增')
            ->description('新增案例')
            ->body($this->form('create'));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cases);

        $grid->model()->orderBy('created_at', 'desc');//按创建时间倒叙

        $grid->id('ID');
        $grid->column('title', '标题');
        $grid->keywords('关键词');
        $grid->content('说明');
        $grid->author('作者');
        $grid->device('成像设备');
        $grid->content('说明');
        $grid->issue('发布')->display(function ($issue) {
            return $issue ? '是' : '否';
        });
        $grid->created_at('创建时间');
        //$grid->updated_at('修改时间');

        $grid->photos('影像数')->display(function ($photos) {
            $count = count($photos);
            return "<span class='label label-warning'>{$count}</span>";
        });
        //https://github.com/firstmeet/laravel-admin-blog 参考大佬的例子

        /*
        
        image

        $grid->picture()->image();

        //设置服务器和宽高
        $grid->picture()->image('http://xxx.com', 100, 100);

        // 显示多图
        $grid->pictures()->display(function ($pictures) {

            return json_decode($pictures, true);

        })->image('http://xxx.com', 100, 100);
        
        */

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Cases::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($type = '')
    {
        $form = new Form(new Cases);

        $form->display('id', 'ID');
        $form->text('title', '标题');
        $form->text('keywords', '关键词')->placeholder('多个关键词用“,”逗号隔开')->rules('required|max:20',[
            'max'   => '关键词不能超过20个字符',
        ]);
        $form->textarea('content', '说明');
        $form->text('author', '作者');
        $form->text('device', '成像设备');
        $form->switch('issue', '发布');
        $form->multipleImage('photos', '影像')->placeholder('按住ctrl可多选');


         // 两个时间显示
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');

        if($typ){
            $form->setAction('admin/caseAction/'.$type);//
        }

        return $form;
    }
}
