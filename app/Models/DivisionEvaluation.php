<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionEvaluation extends Model
{
    use HasFactory;

    protected $table = 'division_evaluations';

    protected $fillable = [
        'nama_divisi',
        'periode',
        'kedisiplinan',
        'kerjasama',
        'produktivitas',
        'kualitas'
    ];
}