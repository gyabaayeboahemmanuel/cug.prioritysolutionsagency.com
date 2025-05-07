<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'program',
        'program_of_choice',
        'streams'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
