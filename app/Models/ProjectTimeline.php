<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'start_date',
        'end_date',
        'status',
        'notes'
    ];
}