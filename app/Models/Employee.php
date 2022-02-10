<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'deparment_id',
        'system_id',
        'first_name',
        'last_name',
        'email',
        'contact',
        'address',
        'gender',
        'image',

    ];
}
