<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ImageActivity extends Model
{

    use HasFactory;

    protected $fillable = [
        'activity_id',
        'url',
        'title'
    ];
}
