<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_completed',
        'enrolled_credit',
        'enrollment_year',
        'enrollment_session',
        'enrollment_term',
        'student_id',
        'remarks',
        'status',
    ];
}
