<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'teacher_id',
        'student_id',
        'registration_id',
        'course_id',
        'grade_id',
        'final_mark',
        'avg_class_test_marks',
        'total_mark_in_exam',
        'sectionB',
        'sectionA',
        'total_class_test_marks',
        'ctOne',
        'ctTwo',
        'ctThree',
        'attendance',
    ];
}
