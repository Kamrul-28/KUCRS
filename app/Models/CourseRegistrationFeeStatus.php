<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistrationFeeStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'term',
        'year',
        'session',
        'authorized_by',
        'payment_status',
        'registration_status',
        'student_id',
        'registration_id',
        'fee_id',
    ];
}
