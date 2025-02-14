<x-auth-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text id="email" name="email" type="email" value="{{ old('email') }}"
                placeholder="Enter your email" required autofocus autocomplete="username" />
            <x-forms.input-error input="email" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <div class="float-end">
                @if (Route::has('password.request'))
                    <a class="underline text-muted text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <x-forms.input-label for="password" :value="__('Password')" />
            <x-forms.input-text id="password" name="password" type="password" value="{{ old('password') }}"
                placeholder="Enter your password" required autofocus autocomplete="current-password" />

            <x-forms.input-error input="password" :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="d-flex align-items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-forms.button 
             icon="uil uil-arrow-right ms-2" type="submit" id="submitBtn"
            :disabled="false" text="Log in" />
    </form>
</x-auth-layout>
