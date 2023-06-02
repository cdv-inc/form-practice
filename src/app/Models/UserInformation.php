<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_information';

    protected $fillable = [
        'zip_code',
        'prefecture',
        'ward',
        'street_number',
        'building_number',
        'department',
        'depth',
        'width',
        'height',
    ];

}
