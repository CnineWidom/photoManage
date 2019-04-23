<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Tools\BatchAction;

class FilterPost extends BatchAction
{
    protected $action;

    public function __construct($action = 1)
    {
        $this->action = $action;
    }

    public function script()
    {
        return <<<EOT

$('{$this->getElementClass()}').on('click', function() {
    if(!confirm("确认批量操作么？")) return false; 
    $.ajax({
        method: 'post',
        url: 'filter',
        data: {
            _token:LA.token,
            ids: selectedRows(),
            action: {$this->action}
        },
        success: function (rs) {
            if(rs == 1){
                $.pjax.reload('#pjax-container');
                toastr.success('操作成功');
            }
        }
    });
});

EOT;

    }
}