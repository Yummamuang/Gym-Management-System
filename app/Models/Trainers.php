<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainers extends Model
{
    use HasFactory;
    protected $fillable = [
        'memberid',
        'mfname',
        'mlname',
        'birthday',
        'age',
        'sex',
        'weight',
        'height',
        'address',
        'phone',
        'experience',
        'email',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
