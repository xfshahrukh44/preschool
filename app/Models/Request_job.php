<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request_job extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'request_jobs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'contact', 'job_id', 'requester_id','job_creator_id','job_title', 'job_type', 'location', 'expected_salary', 'education', 'skills', 'apply_date', 'about', 'resume'];

    
}
