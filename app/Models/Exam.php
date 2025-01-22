<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'exame_date',
        'max_grade',
        'max_score',
        'link',
        'discipline_id'
    ];
}
