<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseComment extends Model
{
    const UPDATED_AT = null;
    protected $table = 'p_case_comment';

    public function cases()
    {
        return $this->belongsTo(Cases::class,'cid');
    }

}
