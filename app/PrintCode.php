<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintCode extends Model
{
    protected $fillable = [
        'code', 'table_id', 'used_time',
    ];
}
