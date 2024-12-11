<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membercard extends Model
{
    use HasFactory;
    protected $fillable = [
        'memberid',
        'checkin',
        'checkout',
        'status',
    ];

}
