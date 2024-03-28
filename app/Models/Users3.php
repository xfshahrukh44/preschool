<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users3 extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
    protected $fillable = ['name', 'lname', 'role', 'email', 'password', 'gender', 'age', 'phone', 'address', 'current_position', 'year_of_experience', 'age_worked_with', 'about', 'hour_open', 'age_accepted', 'position_accepted', 'about_preschool', 'status'];

    
}
