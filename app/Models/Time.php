<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $table = 'time';

    protected $fillable = [
        'start_time_enter',
        'end_time_enter',
        'start_time_leave',
        'end_time_leave'
    ];
}
