<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public const BRANDS = [
        'Toyota',
        'Honda',
        'Hyundai',
    ];

    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'year',
        'daily_rate',
        'last_service_at',
        'is_available',
        'notes',
        'color',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'daily_rate' => 'decimal:2',
            'last_service_at' => 'date',
            'is_available' => 'boolean',
        ];
    }
}
