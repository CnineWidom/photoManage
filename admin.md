#laravel-admin 基础版;
目录结构：参考laravel,laravel-admin
后台引用文件存放目录：app/Libraries/
后台配置：.env
数据库文件：app/Libraries/photoManege.sql


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
