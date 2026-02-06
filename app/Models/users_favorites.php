<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users_favorites extends Model
{
    protected $fillable = [
        'restaurant_id',
        'user_id',
        'statut',
    ];
}
