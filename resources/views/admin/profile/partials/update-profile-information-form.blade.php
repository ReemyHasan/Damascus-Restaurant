<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <div class="card border border-primary">
        <div class="card-header bg-transparent border-primary">
            <h5 class="my-0 text-primary"><i class="fas fa-user-edit me-3"></i>{{ __('Profile Information') }}</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <x-forms.input-label for="email" :value="__('Email')" />
                    <x-forms.input-text id="email" name="email" type="email"
                        value="{{ old('email', auth()->user()->email) }}" placeholder="Enter your email"
                        autofocus autocomplete="username" />
                    <x-forms.input-error input="email" :messages="$errors->get('email')" />
                </div>


                <div>
                    <div>
                        <x-forms.input-label for="name" :value="__('name')" />
                        <x-forms.input-text id="name" name="name" type="name"
                            value="{{ old('name', auth()->user()->name) }}" placeholder="Enter your name" required
                            autofocus autocomplete="username" />
                        <x-forms.input-error input="name" :messages="$errors->get('name')" />
                    </div>


                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <div class="mt-3 text-end">
                        <x-forms.button type="submit" id="submitBtn" :disabled="false" text="Save" />
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>
