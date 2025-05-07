<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachedDocuments extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'ghanacard_upload_url',
        'birthcert_upload_url',
        'signature',
        'wassce_upload_url',
        'wassce2_upload_url',
        'wassce3_upload_url',
        'tertiarycert_upload_url'
    ];

    // protected $casts = [
    //     'ghanacard_upload_url' => 'string',
    //     'birthcert_upload_url' => 'string',
    //     'signature' => 'string',
    //     'wassce_upload_url' => 'string',
    //     'wassce2_upload_url' => 'string',
    //     'wassce3_upload_url' => 'string',
    //     'tertiarycert_upload_url' => 'string',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
