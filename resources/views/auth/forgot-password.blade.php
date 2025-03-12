<x-guest-layout>

    

    <div class="mb-4 w-full flex justify-center ">
        <h2 class="text-xl font-extrabold">Forgot Password</h2>
    </div>

    

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="auth-shadow" method="POST" action="{{ route('password.email') }}">
        @csrf
        <p class="mb-4 text-md text-light-gray">
            Enter your email address and we'll find your account.
        </p>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <span class="text-sm text-light-gray">We will check your account, we’ll send a code to quickly verify it’s
                you.</span>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <button class="w-full btn-primary">
                {{ __('Continue') }}
            </button>
        </div>
        <div class="mt-5 flex w-full justify-center">

            <p class="text-sm" >New to Sala Sandbox? <a href="/register"><span
                        class="text-blue-600 hover:text-blue-800">Create an Account</span></a>
            </p>
        </div>

    </form>
</x-guest-layout>
