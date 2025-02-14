<x-auth-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-forms.input-label for="email" :value="__('Email')" />
            <x-forms.input-text id="email" name="email" type="email" value="{{ old('email', $request->email) }}"
                placeholder="Enter your email" required autofocus autocomplete="username" />
            <x-forms.input-error input="email" :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.input-label for="password" :value="__('Password')" />

            <x-forms.input-text id="password" name="password" type="password" placeholder="Enter your new password"
                required autofocus autocomplete="new-password" />
            <x-forms.input-error input="password" :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input-text id="password_confirmation" name="password_confirmation" type="password"
                placeholder="confirm password" required autofocus autocomplete="new-password" />
            <x-forms.input-error input="password_confirmation" :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="mt-3 text-end">
            <x-forms.button type="submit" id="submitBtn"
            :disabled="false" text="Reset Password" />
        </div>
    </form>
</x-auth-layout>
