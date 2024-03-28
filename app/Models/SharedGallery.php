<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class SharedGallery extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shared_galleries';

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
    protected $fillable = ['name', 'user_id', 'tagline', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
