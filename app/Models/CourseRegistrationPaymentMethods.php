<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistrationPaymentMethods extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'is_active',
    ];
}
