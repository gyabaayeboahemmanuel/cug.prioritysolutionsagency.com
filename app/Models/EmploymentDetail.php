<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDetail extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'employment_details';

    // Define the fields that are mass assignable
    protected $fillable = [
        'app_id', 'employer_name', 'employer_phone', 'employer_address', 'employer_email',
        'employment_from', 'employment_to', 'current_position', 'responsibilities',
        'prev_employer_name', 'prev_employer_phone', 'prev_employer_address',
        'prev_employer_email', 'prev_employment_from_month', 'prev_employment_from_year',
        'prev_employment_to_month', 'prev_employment_to_year', 'prev_position', 'prev_responsibilities'
    ];

    // You can add relationships if you have any foreign key associations with the applicants
    // public function applicant()
    // {
    //     return $this->belongsTo(Applicant::class, 'app_id');
    // }
}
