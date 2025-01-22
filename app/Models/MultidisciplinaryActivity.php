<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultidisciplinaryActivity extends Model
{
    /** @use HasFactory<\Database\Factories\MultidisciplinaryActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'max_grade',
        'max_score'
    ];

    public function cohorts()
    {
        return $this->belongsToMany(Cohort::class);
    }
}
