<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = false;
    protected $fillable=[
        'title',
        'section_id',
    ];
}
