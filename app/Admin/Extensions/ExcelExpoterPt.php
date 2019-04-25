<?php
namespace App\Admin\Extensions;
use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Worksheet_Drawing;

class ExcelExpoterPt extends AbstractExporter
{
    protected $head = [];
    protected $body = [];
    public function setAttr($head, $body){
        $this->head = $head;
        $this->body = $body;
    }

    public function export()
    {
        //定义文件名称为日期拼上uniqid()
        $fileName = date('YmdHis') . '-' . uniqid();

        Excel::create($fileName, function($excel) {
            $excel->sheet('sheet1', function($sheet) {
                // 这段逻辑是从表格数据中取出需要导出的字段
                $head = $this->head;
                $body = $this->body;
                //init列
                $title_array = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q',
                    'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH'];

                $rows = collect([$head]); //写入标题
                $sheet->rows($rows);
                collect( $this->getData() )->map( function ($item,$k)use($body,$sheet,$title_array ) {
                    //dd($item);
                    foreach ($body as $i=>$keyName){
                        if($keyName == 'photos' && array_get($item, $keyName)) { //判断图片列，如果是则放图片
                            $imgs = array_get($item, $keyName);
                            $im = 0;
                            $c = count($imgs);
                            foreach ($imgs as $ik => $img) {
                                $v = public_path('/upload/'). $img; //拼接图片地址
                                if(!file_exists($v)) continue;
                                
                                $objDrawing[$ik] = new PHPExcel_Worksheet_Drawing;
                                $objDrawing[$ik]->setPath( $v );
                                $sp = $title_array[$i];
                                $objDrawing[$ik]->setCoordinates( $sp . ($k+2) );
                                $img_info = getimagesize(public_path('/upload/').$img);
                                $im_v = 100;
                                if($img_info[0] > 100 || $img_info[1] > 100){
                                    $objDrawing[$ik]->setWidth(100);//设置宽
                                    $objDrawing[$ik]->setHeight(100);
                                    $im_v = 160;
                                }
                                $sheet->setHeight($k+2, 100); //设置高度
                                $sheet->setWidth(array( $sp =>20 * $c));  //设置宽度
                                $imx = $im * $im_v;
                                $objDrawing[$ik]->setOffsetX($imx);//设置偏移量
                                $objDrawing[$ik]->setOffsetY(20);
                                $objDrawing[$ik]->setWorksheet($sheet);
                                $im ++;
                            }

                        } else { //否则放置文字数据
                            $v = array_get($item, $keyName);
                            if(is_array($v)) $v = implode(',', $v);
                            $sheet->cell($title_array[$i] . ($k+2), function ($cell) use ($v) {
                                $cell->setValue($v);
                            });
                            if($keyName == 'created_at' || $keyName == 'updated_at' || $keyName == 'content')
                            $sheet->setWidth(array( $title_array[$i] =>18));  //设置宽度
                        }
                    }
                });
            });
        })->export('xls');
    }
}