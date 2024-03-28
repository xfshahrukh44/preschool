<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pined_post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pined_posts';

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
    protected $fillable = ['post_id', 'user_id'];

    
}
