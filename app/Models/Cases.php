<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'p_case_list';

     public function photos()
    {
        return $this->hasMany(CasePhoto::class);
    }
}
