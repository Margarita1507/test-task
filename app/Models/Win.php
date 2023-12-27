<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Win extends Model
{
    use HasFactory;

    protected $table = 'wins';
    protected $guarded = false;

    protected $attributes = [
        'win_amount' => '0',
        'win_history' => '0,0,0',
        'last_random_value' => '0',
    ];

}
