<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasePhoto extends Model
{
    protected $table = 'p_case_photo';

    public function cases()
    {
        return $this->belongsTo(Cases::class, 'cid');
    }

    public function setImgAttribute($img)
    {
        if (is_array($img)) {
            $this->attributes['img'] = json_encode($img);
        }
    }

    public function comment()
    {
        return $this->hasMany(CaseComment::class, 'pid');
    }
    public function star()
    {
        return $this->hasMany(CaseStar::class, 'pid');
    }
}
