<?php
namespace App\Admin\Extensions;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Request;

class Release extends AbstractTool
{
    protected function script(){
        $url = Request::fullUrlWithQuery(['issue' => '_issue_']);

        return <<<EOT
            $('input:radio.user-gender').change(function () {
                var url = "$url".replace('_issue_', $(this).val());
                $.pjax({container:'#pjax-container', url: url });
            });
EOT;

    }

    public function render(){
        Admin::script($this->script());

        $options = [
            'all' => '全部',
            'no'  => '未发布',
            'yes' => '已发布',
        ];

        return view('admin.release', compact('options'));
    }
}