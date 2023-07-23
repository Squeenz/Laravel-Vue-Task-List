<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'not_completed_tasks',
        'completed_tasks',
        'total_tasks'
    ];
}
