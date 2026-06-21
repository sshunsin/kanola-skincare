<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionEmployeeCount extends Model
{
    use HasFactory;

    protected $table = 'division_employee_counts';

    protected $fillable = [
        'nama_divisi',
        'jumlah_karyawan'
    ];
}