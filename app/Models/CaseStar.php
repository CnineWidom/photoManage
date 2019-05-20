<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStar extends Model
{
    protected $table = 'p_case_star';
    public $timestamps = false;

    //指定id
    public  $fillable = ['cid','uid','stars'];
    protected $primaryKey = 'id';
}
