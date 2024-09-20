<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angel extends Model
{
    protected $table = "angel_list";

    public function job()
    {
        return $this->belongsTo('App\Models\Job_post', 'job_id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }
}
