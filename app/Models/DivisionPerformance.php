<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionPerformance extends Model
{
    use HasFactory;

    protected $table = 'division_performances';

    protected $fillable = [
        'nama_divisi',
        'periode',
        'nilai_kinerja'
    ];
}