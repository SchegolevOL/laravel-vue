<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;
    protected $guarded = false;
    protected $fillable=[
        'title',
        'section_id',
        'parent_id',
    ];
}
