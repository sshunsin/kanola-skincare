<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'id',
        'date',
        'name', 
        'check_in',
        'check_out',
        'status',
        'notes',
    ];

    public $incrementing = false;
    protected $keyType = 'int';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $maxId = static::max('id') ?? 0;
                $model->id = $maxId + 1;
            }
        });
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}