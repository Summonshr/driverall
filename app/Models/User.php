<?php

namespace App\Models;

use App\Mail\OTP;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $visible = [
        'email',
        'phone_number',
        'id',
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function sendOTP(string $for)
    {
        $otpCode = (string) random_int(1000, 9999);

        $otp = new \App\Models\OTP(['otp' => $otpCode, 'for' => $for]);

        $this->otp()->save($otp);

        Mail::to($this)->send(new OTP($for,  $otpCode));
    }

    public function otp()
    {
        return $this->hasMany(\App\Models\OTP::class);
    }

    public function offices()
    {
        return $this->hasMany(Office::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function members()
    {
        return $this->hasMany(User::class, 'parent_user_id');
    }
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
