<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
        'parent',
        'level',
        'main_function',
        'scope',
        'status',
        'manager',
        'staff',
        'budget',
        'target_kpi',
        'achievement',
        'risk',
        'system_role',
        'access_rights',
        'shift',
        'operational_hour',
        'location',
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

    public function employees(){
        return $this->hasMany(Employee::class, 'division_id');
    }
    
    public $timestamps = false;
}