<section>

    <div class="card border border-primary">
        <div class="card-header bg-transparent border-primary">
            <h5 class="my-0 text-primary"><i class="fas fa-user-lock me-3"></i>{{ __('Update Password') }}</h5>
        </div>
        <div class="card-body">
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
            <form id="passwordUpdateForm" method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <div class="mb-3">
                    <x-forms.input-label for="update_password_current_password" :value="__('Current Password')" />
                    <x-forms.input-text id="update_password_current_password" name="current_password" type="password"
                        placeholder="current password" required autofocus autocomplete="current-password" />


                        <span class="invalid-feedback d-block current_password_error" role="alert">
                        </span>

                </div>

                <div class="mb-3">
                    <x-forms.input-label for="update_password_password" :value="__('New Password')" />
                    <x-forms.input-text id="update_password_password" name="password" type="password"
                        placeholder="enter new password" required autofocus autocomplete="new-password" />


                        <span class="invalid-feedback d-block password_error" role="alert">
                        </span>
                </div>

                <div class="mb-3">
                    <x-forms.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                    <x-forms.input-text id="update_password_password_confirmation" name="password_confirmation"
                        type="password" placeholder="confirm password" required autofocus autocomplete="new-password" />


                        <span class="invalid-feedback d-block password_confirmation_error" role="alert">
                        </span>
                </div>

                <div class="flex items-center gap-4">
                    <div class="mt-3 text-end">
                        <button type="submit" id="updatePasswordBtn" class="btn btn-primary">
                            <span class="spinner-border spinner-border-sm d-none" id="passwordSpinner"></span>
                            Save
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
