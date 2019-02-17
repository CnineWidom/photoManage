<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'p_case_list';

    /**
     * 模型日期列的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    //外键默认为user_id
    //评论
    public function comments()
    {
        return $this->hasMany(CaseComment::class, 'cid');
    }
    //星数
    public function stars()
    {
        return $this->hasMany(CaseStar::class, 'cid');
    }
    //图片
    public function casePhoto()
    {
        return $this->hasMany('App\Models\casePhoto','cid');
    }
    
    public function setPhotosAttribute($photos)
    {
        if (is_array($photos)) {
            $this->attributes['photos'] = json_encode($photos);
        }
    }

    public function getPhotosAttribute($photos)
    {
        return json_decode($photos, true);
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
