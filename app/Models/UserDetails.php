<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'mobile_no',
        'designation',
        'hall',
        'hall_status',
        'father_name',
        'mother_name',
        'quata',
        'present_address',
        'permanent_address',
        'religion',
        'gender',
        'dob',
        'batch',
        'gurdian',
        'local_gurdian',
        'admitted_at',
        'nid',
        'photo',
    ];
}
