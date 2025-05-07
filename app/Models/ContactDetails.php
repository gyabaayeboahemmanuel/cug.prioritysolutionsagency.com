<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'phone_number',
        'online_number',
        'email_address',
        'postal_address',
        'city_of_post_office_box',
        'residential_address'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
