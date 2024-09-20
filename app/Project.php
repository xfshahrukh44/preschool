<?php

namespace App;

use App\User;
use App\ProjectImage;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
