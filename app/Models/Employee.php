<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'id',
        'name',
        'division_id',
        'employee_code',
        'position',
        'phone',
        'status',
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

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}