#laravel-admin 基础版;
目录结构：参考laravel,laravel-admin
后台引用文件存放目录：app/Libraries/
后台配置：.env
数据库文件：app/Libraries/photoManege.sql
提高laravel框架报错等级：
	1、降低此命令的报错：
	app/Console/Commands/Test.php 方法@__construct()或@handle()
	添加一行 error_reporting(E_ALL^E_WARNING^E_NOTICE);

	2、降低此app所有报错级别：
	app/Providers/AppServiceProvider.php@boot() 
	添加一行 error_reporting(E_ALL^E_WARNING^E_NOTICE);


后台数据导出扩展:
首先安装好它：
composer require maatwebsite/excel:~2.1.0
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"

然后新建导出控制器：
use App\Exceptions\ExcelExpoter.php;

最后，在需要的地方使用即可：
$excel = new ExcelExpoter();
$excel->setAttr(['id', '名字','年龄','性别','创建时间','修改时间'],
    ['id', 'name','age','sex','created_at','updated_at']);
$grid->exporter($excel);


###对laravel-admin代码的修改
1、（密码字段默认空，提交为空不修改密码） 
	用户列表（1）、文件use Encore\Admin\Form;       
		function update 538行 ： 新增 if(!$data['password']) unset($data['password']);
		function setFieldValue($id) 1088 行：if($data['password']) $data['password'] = '';

	后台账户（2）、use Encore\Admin\Controllers\AuthController
		protected function settingForm()，121行 屏蔽：/*$form->password('password_confirmation'...
		
		文件 Encore\Admin\Controllers\UserController@create
		151 行，去掉->rules('required|confirmed’);
		public function form()，152行：屏蔽/*$form->password('password_confirmation',

#### 对数据库的修改
修改了p_case_comment 加了索引 id 
修改 p_case_star 加了索引 id
修改了 p_case_list 加了 uid 发布的用户id

#### 图片
规定：对于图片路径的存储到 upload层 "upload\\images\\user\\e9287986045f8d1eb848d987a50d0838.png" 
数组的形式 加上json 第一张为 首页大图  如果没有图片 或者图片为空 则使用默认图片 public_path('upload/images/').'default.png'

### 发布评论规则
暂时 做成只能评论一次的


