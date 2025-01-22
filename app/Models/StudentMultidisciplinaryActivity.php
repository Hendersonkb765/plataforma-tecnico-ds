<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class StudentMultidisciplinaryActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'multidisciplinary_activity_id',
        'grade',
        'score',
        'attachment',
        'delivery_date'
    ];
}
