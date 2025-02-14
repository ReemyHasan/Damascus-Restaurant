<section class="space-y-6">
    <div class="card border border-primary">
        <div class="card-header bg-transparent border-primary">
            <h5 class="my-0 text-primary"><i class="fas fa-user-slash me-3"></i>
                {{ __('Delete Account') }}
            </h5>
        </div>
        <div class="card-body">
            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
            <x-forms.button type="button" id="DeleteAccountBtn" text="Delete Account" icon="mdi mdi-trash-can" class="btn btn-danger waves-effect waves-light" :extraAttributes="['data-bs-toggle' => 'modal', 'data-bs-target' => '#confirmDeleteModal']" />
            <x-forms.input-error input="delete_account_password" :messages="$errors->get('delete_account_password')" />



            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Are you sure you want to delete your account?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6 mb-3">
                                    <x-forms.input-label class="sr-only" for="delete_account_password" :value="__('delete_account_password')" />
                                    <x-forms.input-text id="delete_account_password" name="delete_account_password" type="password" placeholder="enter your password" required autofocus />
                                </div>

                                <div class="mt-6 flex justify-end text-end">
                                    <x-forms.button type="button" id="cancelBtn" :disabled="false" text="Cancel" class="btn btn-secondary waves-effect waves-light" :extraAttributes="['data-bs-dismiss' => 'modal', 'data-bs-target' => '#confirmDeleteModal']" />

                                    <x-forms.button type="submit" id="DeleteBtn" :disabled="false" class="btn btn-danger waves-effect waves-light" text="Delete Account" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
