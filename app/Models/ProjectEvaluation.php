<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'score',
        'risk_level',
        'quality',
        'decision',
        'manager_notes',
        'evaluation_date'
    ];
}