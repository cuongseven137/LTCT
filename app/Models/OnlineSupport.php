<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineSupport extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'detail',
    ];

    protected $table = "online_support";
}
