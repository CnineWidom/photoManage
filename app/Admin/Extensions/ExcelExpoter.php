<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid;
use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;
use illuminate\support\facades\route;

class ExcelExpoter extends AbstractExporter
{
    protected $head = [];
    protected $body = [];//设置导出列，默认全部
    protected $filename;
    protected $myfilter = [];//转换数据(key=>['formate'=>'','data'=>[val_key => value])
    public function setAttr($fieldArr, $myfilter = [], $filename = ''){
        $this->head = array_values($fieldArr);
        $this->body = array_keys($fieldArr);
        if(!$filename){
            $route_name = Route::currentRouteName();
            $routeArr = explode('.', $route_name);
            $route = $routeArr[0];
        }
        $this->filename = $filename ? $filename : date('YmdHis').$route;

        $this->myfilter = $myfilter;

    }

    public function export()
    {
        Excel::create($this->filename, function($excel) {
            $excel->sheet('Sheetname', function($sheet) {
                // 这段逻辑是从表格数据中取出需要导出的字段
                $head = $this->head;
                $body = $this->body;
                $myfilter = $this->myfilter;
                $bodyRows = collect($this->getData())->map(function ($item)use($body, $myfilter) {
                    dd($item);
                    foreach ($body as $keyName){
                        if($myfilter[$keyName]){
                            $arr[] = self::transformation($keyName, $item);
                        }
                        elseif($keyName == 'photos'){
                            $arr[] = implode(',', array_get($item, 'users'));
                        }else{
                            $arr[] = array_get($item, $keyName);
                        }
                    }
                    return $arr;
                });
                $rows = collect([$head])->merge($bodyRows);
                $sheet->rows($rows);
            });
        })->export('csv');//.xls .csv ...
    }

    protected function transformation($keyName, $item){
        $myfilter = $this->myfilter;
        if(empty($myfilter[$keyName])) return array_get($item, $keyName);

        $formate = $myfilter[$keyName]['formate'];
        $data = $myfilter[$keyName]['data'];
        if($formate){
            switch ($formate) {
                case 'dateTime' :
                    $value = date('Y-m-d H:i:s', array_get($item, $keyName));
                    break;
                case 'day' :
                    $value = date('Y-m-d', array_get($item, $keyName));
                    break;
                default:
                    $value = array_get($item, $keyName);
                    break;
            }
        }elseif($data){
            $val_key = array_get($item, $keyName);
            $value = $data[$val_key];
        }else{
            $value = array_get($item, $keyName);
        }

        return $value;
    }
}