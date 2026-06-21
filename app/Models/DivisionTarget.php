<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionTarget extends Model
{
    use HasFactory;

    protected $table = 'division_targets';

    protected $fillable = [
        'nama_divisi',
        'periode',
        'target',
        'realisasi'
    ];
}