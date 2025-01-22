<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class StudentExam extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'grade',
        'score',
        'attachment'
    ];
    
}
