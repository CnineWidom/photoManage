<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Release;
use App\Admin\Extensions\ReleasePost;
use App\Models\Cases;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Models\Users;
use App\Models\CaseStar;

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
            ->header('详情')
            ->description('案例详情')
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
            ->description('编辑案例')
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
        $data = request()->input();
        if (array_key_exists('created_at', $data)) {
            $data['created_at']['start'] = $data['created_at']['start']
                ? strtotime($data['created_at']['start']) : time();
            $data['created_at']['end'] = $data['created_at']['end'] ? strtotime($data['created_at']['end']) : time();

            request()->replace($data);
        }

        $grid = new Grid(new Cases);

        if (in_array(\Request::get('issue'), ['no', 'yes'])) {
            $issue = \Request::get('issue') == 'no' ? 0 : 1;
            $grid->model()->where('issue', $issue)->orderBy('created_at', 'desc');//按创建时间倒叙
        }else{
            $grid->model()->orderBy('created_at', 'desc');//按创建时间倒叙
        }

        $grid->id('ID');
        $grid->column('title', '标题');
        $grid->keywords('关键词');
        //$grid->content('说明');
        $grid->content('说明')->display(function ($content) {
            $con_str = str_limit($content, 10, '...');
            return "<span title='{$content}'>{$con_str}</span>";
        });
        
        $grid->author('作者');
        $grid->device('成像设备');
        $grid->issue('发布')->display(function ($issue) {
            return $issue ? '是' : '否';
        });
        $grid->created_at('创建时间')->sortable();
        //$grid->updated_at('修改时间');
        $grid->views('浏览数')->sortable();
        $grid->stars('星数')->display(function () {
            $star = CaseStar::where('cid','=',$this->id)->avg('stars');
            $star = round($star, 1);
            return "<span class='label label-warning'>{$star}</span>";
        });

        $grid->comments('评论数')->display(function ($comments) {
            return $count = count($comments);
        })->expand(function ($model) {

            $comments = $model->comments()->where('is_filter', '=', 0)->orderBy('created_at', 'desc')->take(10)->get()->map(function ($comment) {
                return $comment->only(['id', 'uid','content', 'created_at']);
            });
            $data = [];
            if($comments->toArray()){
                foreach ($comments->toArray() as $key => $value) {
                    $data[$key] = $value;
                    $uinfo = Users::find($value['uid']);
                    $data[$key]['uid'] = $uinfo['user_name'].':'.$uinfo['nick_name'];
                }
            }
            //new Table()
            return new Table(['ID','用户', '内容', '发布时间'], $data);
        });

        $grid->photos('影像')->display(function ($photos) {
            return $count = count($photos);
        })->modal('影像列表', function($case) {
            if($case['photos']){
                $str = '';
                foreach ($case['photos'] as $key => $value) {
                    $str .=  " <img src='/upload/{$value}' width='100%' height='100%' alt='影像'\> ";
                }
            }else{
                $str = "没有影像";
            }
            return $str;
        });

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            //$filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('title', '标题')->placeholder('支持模糊查询');
            $filter->equal('author', '作者');
            $filter->like('keywords', '关键词')->placeholder('支持模糊查询');
            $filter->between('created_at', '发布时间')->datetime();

        });

        $grid->tools(function ($tools) {
            $tools->append(new Release());
            $tools->batch(function ($batch) {
                $batch->disableDelete();
                $batch->add('发布', new ReleasePost(1));
                $batch->add('下线', new ReleasePost(0));
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

        $form->multipleImage('photos','影像资料')->rules('mimes:png,bmp,jpg,tif,gif')->help("打开图片文件夹，按住Shift键可多选上传");

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

        return $form;
    }

}
