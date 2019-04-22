<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\ExcelExpoter;
use App\Models\Users;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UsersController extends Controller
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
            ->header('用户列表')
            ->description('用户详细信息')
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
             ->header('用户')
             ->description('用户详细信息')
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
            ->description('编辑用户信息')
            ->body($this->form('edit')->edit($id));
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
            ->description('新增激活用户')
            ->body($this->form('create'));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Users);

        $grid->id('ID');
        $grid->user_name('账号');
        $grid->nick_name('昵称');
        $grid->phone_number('手机号');
        $grid->email('邮箱');
        $grid->is_forbid('封号?')->display(function ($is_forbid) {
            return $is_forbid ? '是' : '否';
        });
        $grid->is_activate('激活?')->display(function ($is_activate) {
            return $is_activate ? '是' : '否';
        });
        
        //$grid->remember_token('Remember token');
        //$grid->password('密码');
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间');

        //导出
        $fieldArr = [
            'id' => 'ID', 
            'user_name' => '账号',
            'nick_name' => '昵称',
            'phone_number' => '手机号',
            'email' => '邮箱',
            'is_forbid' => '封号',
            'is_activate' => '激活',
            'created_at' => '创建时间',
            'updated_at' => '修改时间'
        ];
        $filterArr = [
            'is_forbid'=>[
                'data'=>[0=>'否', 1=>'已封号']
            ],
            'is_activate'=>[
                'data'=>[0=>'否',1=>'已激活']
            ],
        ];
        $excel = new ExcelExpoter();
        $excel->setAttr($fieldArr, $filterArr);
        $grid->exporter($excel);

        //筛选控制
        $grid->filter(function ($query) {     
            // 去掉默认的id过滤器
            //$query->disableIdFilter();
            $query->like('user_name', '账号')->placeholder('支持模糊查询');
            $query->like('nick_name', '昵称')->placeholder('支持模糊查询');
            $query->equal('phone_number', '手机号')->mobile();

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
        $show = new Show(Users::findOrFail($id));

        $show->id('ID');
        $show->user_name('账号');
        $show->nick_name('昵称');
        $show->phone_number('手机号');
        $show->email('邮箱');
        $show->is_forbid('封号?')->display(function ($is_forbid) {
            return $is_forbid ? '是' : '否';
        });
        $show->is_activate('激活?')->display(function ($is_activate) {
            return $is_activate ? '是' : '否';
        });
        
        //$grid->remember_token('Remember token');
        //$grid->password('密码');
        $show->created_at('创建时间');
        $show->updated_at('修改时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($type = '')
    {
        $form = new Form(new Users);

        $form->display('id', 'ID');
        $form->text('user_name', '账号')->rules('required');
        if($type == 'edit'){
            $form->password('password', '密码')->placeholder('密码空即不修改');
        }else{
            $form->password('password', '密码')->rules('required');
        }
        $form->text('nick_name', '昵称');
        $form->text('phone_number', '手机号')->rules('required|regex:/^\d+$/|min:11', [
            'regex' => '号码必须全部为数字',
            'min'   => '号码不能少于11个字符',
        ]);
        $form->email('email','邮箱')->rules('required');

        if($type != 'create')
            $form->switch('is_forbid', '封号？');

        $form->switch('is_activate', '激活？');

        // 两个时间显示
        $form->display('created_at', '创建时间');
        $form->display('updated_at', '修改时间');

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
            //$footer->disableReset();
            // 去掉`提交`按钮
            //$footer->disableSubmit();
            // 去掉`查看`checkbox
            $footer->disableViewCheck();
            // 去掉`继续编辑`checkbox
            //$footer->disableEditingCheck();
            // 去掉`继续创建`checkbox
            //$footer->disableCreatingCheck();
        });

        return $form;
    }
}
