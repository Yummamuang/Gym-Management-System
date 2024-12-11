<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainercard extends Model
{
    use HasFactory;

    protected $fillable = [
        'trainerid',
        'checkin',
        'checkout',
        'status',
    ];
}
