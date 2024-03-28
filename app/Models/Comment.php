<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

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
    protected $fillable = ['comment', 'post_id', 'user_id', 'post_image', 'user_image', 'reply_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
