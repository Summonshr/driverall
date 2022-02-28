<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OTP extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['otp','for'];

    protected $dispatchesEvents = [
        'retrieved' => \App\Events\OTPRetrieved::class,
    ];

    public function scopeNotExpired($query)
    {
        return $query;
    }
    
}
