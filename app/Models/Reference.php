<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'references';

    // Define the fields that are mass assignable
    protected $fillable = [
        'app_id', 'ref1_name', 'ref1_organisation', 'ref1_position', 'ref1_phone', 'ref1_email',
        'ref2_name', 'ref2_organisation', 'ref2_position', 'ref2_phone', 'ref2_email'
    ];

    // Add any necessary relationships
    // public function applicant()
    // {
    //     return $this->belongsTo(Applicant::class, 'app_id');
    // }
}
