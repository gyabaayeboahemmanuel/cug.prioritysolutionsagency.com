<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        
        // First academic details
        'name_of_shs',
        'course_offered',
        'start_date',
        'completion_date',
        'exams_type',
        'index_number',
        'exams_year',
    
        // Second academic details
        'name_of_shs2',
        'course_offered2',
        'start_date2',
        'completion_date2',
        'exams_type2',
        'index_number2',
        'exams_year2',
    
        // Third academic details
        'name_of_shs3',
        'course_offered3',
        'start_date3',
        'completion_date3',
        'exams_type3',
        'index_number3',
        'exams_year3',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
