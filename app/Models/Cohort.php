<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cohort extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'year',
    ];

    public function discipline()
    {
        return $this->belongsToMany(Discipline::class);
    }
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function student()
    {
        return $this->belongsToMany(User::class);
    }
    public function multidisciplinaryActivity()
    {
        return $this->belongsToMany(MultidisciplinaryActivity::class,'cohort_multidisciplinary_activity','cohort_id','activity_multi_id');
    }
}
