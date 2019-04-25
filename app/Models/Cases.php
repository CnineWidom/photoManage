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

    protected $fillable = [
        'title','keywords','content','author','device','issue'
    ];
    public function users()
    {
        return $this->belongsTo(Users::class,'uid')->withDefault([
            'user_name' => '后台',
        ]);
    }
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
