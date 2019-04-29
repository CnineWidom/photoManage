<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);

//$grid->content('内容')->width('550px');设置列最大宽度
use Encore\Admin\Grid\Column;
Column::extend('width', function ($value, $width){
	return "<p style='max-width: $width'>$value</p>";
});

use Encore\Admin\Grid;
//全局设置
Grid::init(function (Grid $grid) {

    //$grid->disableActions();//禁止行所有操作
    //$grid->disablePagination();//禁止分页
    //$grid->disableCreateButton();//禁止新增,筛选列
    //$grid->disableFilter();//禁用查询过滤器
    //$grid->disableRowSelector();//禁用行选择checkbox(全选删除)
    //$grid->disableTools();//禁用左上角操作按钮
    //$grid->disableExport();//禁用导出

    $grid->actions(function (Grid\Displayers\Actions $actions) {
        $actions->disableView();
        //$actions->disableEdit();
        //$actions->disableDelete();
    });
});

app('view')->prependNamespace('admin', resource_path('views/admin'));//将默认视图替换成自定义视图