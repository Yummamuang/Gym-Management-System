<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
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
        'email',
        'experience',
        'username',
        'password'
    ];

    protected $hidden = [
        'password',
        'salary',
        'remember_token',
    ];
}
