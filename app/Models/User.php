<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'app_id',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personalDetails()
    {
        return $this->hasOne(PersonalDetails::class, 'app_id', 'app_id');
    }

    public function contactDetails()
    {
        return $this->hasOne(ContactDetails::class, 'app_id', 'app_id');
    }

    public function familyDetails()
    {
        return $this->hasOne(FamilyDetails::class, 'app_id', 'app_id');
    }

    public function programDetails()
    {
        return $this->hasOne(ProgramDetails::class, 'app_id', 'app_id');
    }

    public function academicDetails()
    {
        return $this->hasOne(AcademicDetails::class, 'app_id', 'app_id');
    }

    public function tertiaryDetails()
    {
        return $this->hasOne(TertiaryDetails::class, 'app_id', 'app_id');
    }

    public function attachedDocuments()
    {
        return $this->hasOne(AttachedDocuments::class, 'app_id', 'app_id');
    }

    public function hasCompletedApplication()
    {
        return $this->personalDetails &&
               $this->contactDetails &&
               $this->familyDetails &&
               $this->programDetails &&
               $this->academicDetails &&
               $this->tertiaryDetails &&
               $this->attachedDocuments;
    }
 // New relationships for EmploymentDetails and References

public function employmentdetails()
{
    return $this->hasMany(EmploymentDetail::class, 'app_id', 'app_id');
}

public function references()
{
    return $this->hasMany(Reference::class, 'app_id', 'app_id');
}

public function postgraduatedocuments()
{
    return $this->hasMany(PostgraduateDocuments::class, 'app_id', 'app_id');
}

}
