<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Childcare extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'childcares';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *n
     * @var array
     */
    protected $fillable = ['physical_address', 'county', 'zip', 'name', 'city','phone', 'email_address', 'description', 'feature_image', 'other_image_one', 'other_image_two', 'program_type', 'licence_sub_type', 'state'];

}
