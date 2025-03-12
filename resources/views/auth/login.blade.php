<x-guest-layout>
    <section class="max-w-md mx-auto mt-10">

        <div class="mb-4 w-full flex justify-center ">
            <h2 class="text-xl font-extrabold">Let's get you in to Sala Sandbox</h2>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form class="auth-shadow" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input id="email"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    type="email" name="email" placeholder="Please input your email address"
                    value="{{ old('email') }}" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input id="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        type="password" name="password" placeholder="Please input your password" required
                        autocomplete="current-password" />
                    <button type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 cursor-pointer"
                        onclick="togglePasswordVisibility()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <div class="flex items-center">
                    <label
                        class="relative inline-block w-14 h-8 cursor-pointer rounded-full bg-gray-300 transition has-[:checked]:bg-primary">
                        <input id="remember_me" type="checkbox" class="peer sr-only" />
                        <span
                            class="absolute top-1 left-1 h-6 w-6 rounded-full bg-white transition-all peer-checked:translate-x-6"></span>
                    </label>
                    <label for="remember_me" class="ml-2 block text-md text-light-gray">
                        Remember me
                    </label>
                </div>
            </div>

            <div class="mb-4 flex justify-end">
                <button type="submit" class="btn-primary">
                    Sign in
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="text-center mb-4">
                <p class="text-sm text-gray-600">
                    New to Sala Sandbox? <a href="{{ route('register') }}"
                        class="text-blue-600 hover:text-blue-800">Create
                        an account</a>
                </p>
            </div>

            <div class="mt-4 text-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
        </form>

        <div class="mt-6 text-center text-xs text-gray-500">
            <p>By selecting 'Sign in' you'll sign in to an <a href="#" class="text-blue-600">sala sandbox</a>
                agree to
                our <a href="#" class="text-blue-600">Term</a> and acknowledge our <a href="#"
                    class="text-blue-600">Privacy Statement</a></p>
        </div>
    </section>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</x-guest-layout>
