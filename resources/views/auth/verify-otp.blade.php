<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Please enter the verification code we sent to your email.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('auth.otp.verify') }}">
            @csrf

            <div>
                <x-label for="otp" :value="__('Verification Code')" />

                <x-input id="otp" class="block mt-1 w-full" type="text" name="otp" :value="old('otp')" required autofocus />
            </div>

            <div class="flex items-center justify-between mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('auth.otp.resend') }}">
                    {{ __('Resend Code') }}
                </a>
                
                <x-button class="ml-3">
                    {{ __('Verify') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>