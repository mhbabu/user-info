<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = 'user_information';
    protected $fillable = [
        'id',
        'name',
        'email',
        'contact_number',
        'contact_number',
        'skills',
        'location',
        'current_institution',
        'status',
        'created_at',
        'updated_at'
    ];

    public static function getUserInformationList()
    {
        return UserInformation::orderBy('id', 'desc');
    }
}
