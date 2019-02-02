<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasePhoto extends Model
{
    protected $table = 'p_case_photo';

    public function cases()
    {
        return $this->belongsTo(Cases::class);
    }
}
