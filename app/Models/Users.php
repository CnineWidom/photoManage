<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'p_users';
    //指定id
    protected $primaryKey = 'id';

    //允许批量赋值的字段
    protected $fillable = [];

    //不允许批量赋值的字段
    protected $guarded = [];

    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if($model->password)
                $model->password = photoMPwd($model->password);//方便扩展，也可以直接使用框架自带bcrypt($request->password);
        });
    }

    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }

    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['updated_at']) : '';
    }

}
