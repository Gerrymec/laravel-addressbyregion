<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'region_name', 'province_name', 'city_name', 'barangay_name',
    ];
}
