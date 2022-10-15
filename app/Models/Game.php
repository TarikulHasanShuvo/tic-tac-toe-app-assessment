<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_player_name',
        'second_player_name',
        'board_length',
        'token',
        'winner',
    ];
}
