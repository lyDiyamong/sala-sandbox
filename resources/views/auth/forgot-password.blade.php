<x-guest-layout>

    <section class="max-w-md mx-auto mt-10">

        <div class="mb-4 w-full flex flex-col gap-2 items-center justify-center ">
            <a href="/login">
                <button
                    class="cursor-pointer duration-200 hover:scale-110 hover:bg-gray-200 rounded-md px-2 py-1 active:scale-100 flex gap-2 justify-center items-center"
                    title="Go Back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24"
                        class="stroke-gray-900">
                        <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5"
                            d="M11 6L5 12M5 12L11 18M5 12H19"></path>
                    </svg>
                    <span>Back</span>
                </button>
            </a>
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
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <span class="text-sm text-light-gray">We will check your account, we’ll send a code to quickly verify
                    it’s
                    you.</span>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <button class="w-full btn-primary">
                    {{ __('Continue') }}
                </button>
            </div>
            <div class="mt-5 flex w-full justify-center">

                <p class="text-sm">New to Sala Sandbox? <a href="/register"><span
                            class="text-blue-600 hover:text-blue-800">Create an Account</span></a>
                </p>
            </div>

        </form>
    </section>
</x-guest-layout>
