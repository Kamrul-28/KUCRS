<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'sec_b_syllabus',
        'sec_a_syllabus',
        'term',
        'year',
        'description',
        'course_credit',
        'course_code',
        'discipline_id',
        'course_title',
        'is_active',
    ];
}
