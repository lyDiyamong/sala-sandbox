<x-guest-layout>
    <div class="flex flex-col items-center justify-center">
        <!-- Logo -->
        <div class="mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Sala Sandbox" class="h-12">
        </div>

        <!-- Back Button -->
        <div class="w-full mb-6">
            <a href="{{ route('login') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </a>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Verify Email Address</h2>

        <p class="mb-8 text-gray-600 text-center">
            Enter the code, we send to this email address {{ $email }} for complete verify.<br>
            Please check and fill it
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('verify.otp.submit') }}" class="w-full">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">

            <!-- OTP Input Fields -->
            <div class="flex justify-center gap-2 mb-6">
                @for ($i = 1; $i <= 6; $i++)
                    <input type="text" name="otp[]" maxlength="1"
                        class="w-12 h-12 text-center text-xl border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('otp') border-red-500 @enderror"
                        oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length===1) this.nextElementSibling?.focus()"
                        required>
                @endfor
            </div>

            @error('otp')
                <p class="text-red-500 text-sm text-center mb-4">{{ $message }}</p>
            @enderror

            <!-- Timer -->
            <div class="text-center mb-6">
                <span id="timer" class="text-gray-600">12s</span>
            </div>

            <!-- Resend Link -->
            <div class="text-center mb-6">
                <span class="text-gray-600">don't receive the digit code</span>
                <button type="button" id="resendButton" onclick="resendOtp()"
                    class="text-blue-600 hover:text-blue-800 disabled:text-gray-400" disabled>
                    Resend code
                </button>
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col gap-3">
                <button type="submit" class="btn-primary">
                    Verify
                </button>

                <button type="button" onclick="window.history.back()"
                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Close
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            let timeLeft = 12;
            const timerElement = document.getElementById('timer');
            const resendButton = document.getElementById('resendButton');

            const timer = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    timerElement.textContent = '0s';
                    resendButton.disabled = false;
                } else {
                    timerElement.textContent = `${timeLeft}s`;
                    timeLeft--;
                }
            }, 1000);

            // Auto-focus first input on page load
            document.querySelector('input[name="otp[]"]').focus();

            function resendOtp() {
                fetch('{{ route('resend.otp') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            email: '{{ $email }}'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            timeLeft = 12;
                            resendButton.disabled = true;
                            // Reset timer
                            timer = setInterval(() => {
                                if (timeLeft <= 0) {
                                    clearInterval(timer);
                                    timerElement.textContent = '0s';
                                    resendButton.disabled = false;
                                } else {
                                    timerElement.textContent = `${timeLeft}s`;
                                    timeLeft--;
                                }
                            }, 1000);
                        }
                    });
            }
        </script>
    @endpush
</x-guest-layout>
