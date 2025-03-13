<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\OtpService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Providers\RouteServiceProvider;

class OtpController extends Controller
{
    protected $otpService;
    
    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }
    
    public function showOtpForm()
    {
        if (!Session::has('auth_user_id')) {
            return redirect()->route('login');
        }
        
        return view('auth.verify-otp');
    }
    
    public function sendOtp()
    {
        $userId = Session::get('auth_user_id');
        
        if (!$userId) {
            return redirect()->route('login');
        }
        
        $user = User::find($userId);
        $sent = $this->otpService->generate($user);
        
        if ($sent) {
            return back()->with('status', 'OTP has been sent to your email address.');
        }
        
        return back()->withErrors(['email' => 'Failed to send OTP. Please try again.']);
    }
    
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);
        
        $userId = Session::get('auth_user_id');
        
        if (!$userId) {
            return redirect()->route('login');
        }
        
        $user = User::find($userId);
        $otp = $request->input('otp');
        
        if ($this->otpService->validate($user, $otp)) {
            // OTP is valid, log in user
            Auth::login($user);
            $request->session()->regenerate();
            Session::forget('auth_user_id');
            
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        
        return back()->withErrors(['otp' => 'The verification code is invalid or expired.']);
    }
}