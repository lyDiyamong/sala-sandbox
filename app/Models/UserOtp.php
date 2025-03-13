<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'otp', 'expire_at', 'used'];
    
    protected $casts = [
        'expire_at' => 'datetime',
        'used' => 'boolean',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function isValid()
    {
        return !$this->used && $this->expire_at->isFuture();
    }
}
