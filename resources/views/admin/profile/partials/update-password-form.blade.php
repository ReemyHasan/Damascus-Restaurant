<section>

    <div class="card border border-primary">
        <div class="card-header bg-transparent border-primary">
            <h5 class="my-0 text-primary"><i class="fas fa-user-lock me-3"></i>{{ __('Update Password') }}</h5>
        </div>
        <div class="card-body">
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <x-forms.input-label for="update_password_current_password" :value="__('Current Password')" />
                    <x-forms.input-text id="update_password_current_password" name="current_password" type="password"
                        placeholder="current password" required autofocus autocomplete="current-password" />
                    <x-forms.input-error input="current_password" :messages="$errors->get('current_password')" />
                </div>

                <div class="mb-3">
                    <x-forms.input-label for="update_password_password" :value="__('New Password')" />
                    <x-forms.input-text id="update_password_password" name="password" type="password"
                        placeholder="enter new password" required autofocus autocomplete="new-password" />
                    <x-forms.input-error input="password" :messages="$errors->get('password')" />
                </div>

                <div class="mb-3">
                    <x-forms.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-forms.input-text id="update_password_password_confirmation" name="password_confirmation"
                        type="password" placeholder="confirm password" required autofocus autocomplete="new-password" />
                    <x-forms.input-error input="password_confirmation" :messages="$errors->get('password_confirmation')" />

                </div>

                <div class="flex items-center gap-4">
                    <div class="mt-3 text-end">
                    <x-forms.button type="submit" id="updatePassBtn" :disabled="false" text="Save" />

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
