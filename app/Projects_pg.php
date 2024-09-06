<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects_pg extends Model
{
    protected $fillable = [
        'title',
        'photos',
        'description'
    ];
}
