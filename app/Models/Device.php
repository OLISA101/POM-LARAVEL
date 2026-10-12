<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    protected $fillable = [
        'device_name',
        'device_type',
        'quantity',
    ];

    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescription::class);
    }
}