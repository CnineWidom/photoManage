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

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->password = md5Pwd($model->password);//方便扩展，也可以直接使用框架自带bcrypt($request->password);
        });
    }

    //方法名称应与被转换字段名称相同
    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = is_int($value) ? $value : strtotime($value);
    }
 
    public function getCreatedAtAttribute()
    {
        return $this->attributes['created_at'] ? date('Y-m-d H:i:s', $this->attributes['created_at']) : '';
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = is_int($value) ? $value : strtotime($value);
    }
 
    public function getUpdatedAtAttribute()
    {
        return $this->attributes['updated_at'] ? date('Y-m-d H:i:s', $this->attributes['updated_at']) : '';
    }

}
