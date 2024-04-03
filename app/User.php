<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name','lname','role','email', 'password','gender','age','phone','address',
        'current_position','year_of_experience','age_worked_with',
        'about','hour_open','age_accepted','position_accepted','about_preschool','image','banner_image',
        'race','ethnicity','date_of_birth','do_you_currently_work','level_of_education',
        'business_name','address','city','zip','license_number','capacity','hours_of_operation','ages_accepted','types_of_care_provided','payment_method','amount','card_token','transaction_id','payer_id','paypal_token','payment_status',
        'timings', 'services'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function role(){
        return $this->hasOne(Role::class);
    }
    public function permissionsList(){
        $roles = $this->roles;
        $permissions = [];
        foreach ($roles as $role){
            $permissions[] = $role->permissions()->pluck('name')->implode(',');
        }
       return collect($permissions);
    }

    public function permissions(){
        $permissions = [];
        $role = $this->roles->first();
        $permissions = $role->permissions()->get();
        return $permissions;
    }

    public function isAdmin(){
       $is_admin =$this->roles()->where('name','admin')->first();
       if($is_admin != null){
           $is_admin = true;
       }else{
           $is_admin = false;
       }
       return $is_admin;
    }
}
