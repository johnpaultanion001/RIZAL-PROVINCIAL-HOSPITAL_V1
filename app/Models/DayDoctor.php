<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'day',
    ];
}
