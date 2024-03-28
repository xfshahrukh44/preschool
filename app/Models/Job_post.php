<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_posts';

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
    protected $fillable = ['job_title', 'job_description', 'company_name', 'company_description', 'location', 'job_type', 'salary_range', 'required_education', 'skills', 'instruction', 'post_date', 'due_date', 'creator_name'];

    
}
