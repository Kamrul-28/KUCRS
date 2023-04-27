<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'cgpa',
        'ygpa',
        'tgpa',
        'student_id',
        'course_id',
        'registration_id',
        'mark_id',
        'term',
        'year',
        'session',
    ];
}
