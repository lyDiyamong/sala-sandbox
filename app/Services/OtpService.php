<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserOtp;
use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class OtpService
{
    public function generate(User $user, int $length = 6, int $expireMinutes = 10)
    {
        // Invalidate any existing OTPs
        UserOtp::where('user_id', $user->id)
            ->where('used', false)
            ->update(['used' => true]);
            
        // Generate new OTP
        $otp = str_pad((string)random_int(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
        
        // Save OTP to database
        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expire_at' => Carbon::now()->addMinutes($expireMinutes),
            'used' => false
        ]);
        
        // Send OTP via Brevo email
        try {
            Mail::to($user->email)->send(new OtpMail($user, $otp));
            return true;
        } catch (\Exception $e) {
            report($e);
            return false;
        }
        
        return $otp;
    }
    
    public function validate(User $user, string $otp)
    {
        $userOtp = UserOtp::where('user_id', $user->id)
            ->where('otp', $otp)
            ->where('used', false)
            ->where('expire_at', '>', Carbon::now())
            ->first();
            
        if (!$userOtp) {
            return false;
        }
        
        // Mark as used
        $userOtp->used = true;
        $userOtp->save();
        
        return true;
    }
}