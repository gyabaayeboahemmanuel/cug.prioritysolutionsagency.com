<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TertiaryDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'institution_name',
        'start_year',
        'start_month',
        'completion_year',
        'completion_month',
        'certificate_obtained',
        'institution_name2',
        'start_year2',
        'start_month2',
        'completion_year2',
        'completion_month2',
        'certificate_obtained2',
        'institution_name3',
        'start_year3',
        'start_month3',
        'completion_year3',
        'completion_month3',
        'certificate_obtained3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
