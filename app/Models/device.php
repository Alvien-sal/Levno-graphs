<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class device extends Model
{
    protected $primaryKey = 'device_id';
    
    public $incrementing = false;
    
    protected $keyType = 'string';
    
    public $timestamps = false;
    
    protected $fillable = [
        'device_id',
        'name',
        'user_id',
    ];

    public function readings(): HasMany
    {
        return $this->hasMany(deviceReading::class, 'device_id', 'device_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function latestReading()
    {
        return $this->hasOne(deviceReading::class, 'device_id', 'device_id')->latestOfMany();
    }
}
