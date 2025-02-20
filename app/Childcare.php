<?php

namespace App;

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
     *
     * @var array
     */

    protected $fillable = ['name', 'county', 'program_type', 'licence_sub_type', 'email_address', 'physical_address', 'city', 'state', 'zip', 'phone', 'is_vpk', 'services', 'description', 'feature_image', 'other_image_one', 'other_image_two', 'claim_status', 'claimed_by_id', 'timings', 'location_iframe', 'age_accepted', 'position', 'food_served', 'costing', 'language', 'meal_offered', 'tansportation', 'family_discount_offered', 'family_discount', 'military_child_care_discount', 'military_child_discount', 'application_registration', 'diapers', 'early_drop_off', 'extended_stay', 'late_payment', 'waitingList_registration', 'late_pick_up', 'meals_snacks', 'returned_check', 'credit_card_declined', 'supplies_materials', 'other'];


}
