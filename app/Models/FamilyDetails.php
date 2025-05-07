<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'father_full_name',
        'father_status',
        'father_contact',
        'father_address',
        'father_occupation',
        'mother_full_name',
        'mother_address',
        'mother_contact',
        'mother_status',
        'mother_occupation',
        'guardian_name',
        'relation_to_applicant',
        'guardian_address',
        'guardian_occupation',
        'guardian_phone_number'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
