<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'academic_year',
        'form_type',
        'title',
        'surname',
        'first_name',
        'middle_name',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'region_of_birth',
        'hometown',
        'region_of_hometown',
        'country',
        'marital_status',
        'number_of_children',
        'religion',
        'worship_place',
        'is_employed',
        'occupation',
        'facility',
        'intend_finance_education',
        'avatar'
    ];

    /**
     * Define the relationship to the User model.
     * This assumes the foreign key in PersonalDetails is `app_id` and matches `app_id` in User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
