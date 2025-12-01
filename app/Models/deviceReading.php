<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class deviceReading extends Model
{
    protected $table = 'deviceReadings';
    
    protected $fillable = [
        'volume',
        'inletTemp',
        'vatTemp',
        'stirrerValue',
        'device_id',
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(device::class, 'device_id', 'device_id');
    }
}
