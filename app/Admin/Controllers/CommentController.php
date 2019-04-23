<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\FilterPost;
use App\Models\CaseComment;
use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Users;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CommentController extends Controller
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
            ->header('评论')
            ->description('评论列表')
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
            ->header('编辑')
            ->description('编辑评论')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new CaseComment);

        $grid->model()->orderBy('created_at', 'desc');//按创建时间倒叙

        $grid->id('ID');
        $grid->cases()->title('所属案例');
        $grid->cid('案例')->display(function ($cid) {
            $case = Cases::find($cid);
            $title = $case->title;
            return '<a title="案例id:'.$cid.'" href="/admin/cases?id='.$cid.'">'.$title.'</a>';
        });
        $grid->uid('用户')->display(function ($uid) {
            $user = Users::find($uid);
            $name = $user->user_name;
            return '<a href="/admin/users?id='.$uid.'">'.$name.'</a>';
        });
        $grid->content('评论内容');
        $grid->created_at('评论时间');
        $grid->is_filter('过滤')->display(function ($isfilter) {
            return $isfilter ? '是' : '否';
        });

        $grid->disableCreateButton();//禁用新增

        $grid->actions(function ($actions) {
            $comment = $actions->row;
            $cid = $comment['cid'];
            $actions->disableView();
            // append一个操作
            $actions->append('<a href="/admin/cases?id='.$cid.'"><i class="fa fa-photo"></i></a>');

        });

        $grid->filter(function ($filter) {

            $filter->equal('cid', '案例ID');
            $filter->like('content', '评论')->placeholder('支持模糊查询');

        });

        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
                $batch->add('过滤', new FilterPost(1));
                $batch->add('显示', new FilterPost(0));
            });
        });

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
        $show = new Show(CaseComment::findOrFail($id));

        $show->id('Id');
        $show->cid('Cid');
        $show->uid('Uid');
        $show->content('Content');
        $show->created_at('Created at');
        $show->is_filter('Is filter');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CaseComment);

        $form->display('cid', '案例ID');
        $form->display('uid', '用户ID');
        $form->display('content', '评论内容');
        $form->switch('is_filter', '是否过滤');

        //表单按钮控制
        $form->tools(function (Form\Tools $tools) {
            // 去掉`列表`按钮
            //$tools->disableList();
            // 去掉`删除`按钮
            //$tools->disableDelete();
            // 去掉`查看`按钮
            $tools->disableView();
        });
        $form->footer(function ($footer) {
            // 去掉`重置`按钮
            $footer->disableReset();
            // 去掉`提交`按钮
            //$footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();
        });

        return $form;
    }
}
