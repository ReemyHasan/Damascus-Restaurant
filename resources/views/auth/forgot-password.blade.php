<x-auth-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-forms.auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text id="email" name="email" type="email" value="{{ old('email') }}"
                placeholder="Enter your email" required autofocus autocomplete="username" />
            <x-forms.input-error input="email" :messages="$errors->get('email')" />
        </div>

        <div class="mt-3 text-end">
            <x-forms.button type="submit" id="submitBtn"
           :disabled="false" text="Email Password Reset Link" />
        </div>
        <div class="mt-4 text-center">
            <p class="mb-0">Remember It ? <a href="{{route('login')}}"
                    class="fw-medium text-primary"> Signin </a></p>
        </div>
    </form>
</x-auth-layout>
