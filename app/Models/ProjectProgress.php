<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'stage',
        'progress_percent',
        'status',
        'description',
        'update_date'
    ];
}