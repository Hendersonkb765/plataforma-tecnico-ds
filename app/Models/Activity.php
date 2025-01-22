<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Activity extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'expiration_date',
        'max_grade',
        'max_score',
        'link',
        'discipline_id',
        'teacher_id'
    ];
}
