<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostgraduateDocuments extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id',
        'document_type',
        'upload_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'app_id', 'app_id');
    }
}
