<x-breadcrumb model="service" action="global.edit">
    <div class="add-element p-3">
        <form method="POST" action="{{ route('admin.services.update',$service) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <x-translatable-area :fields="[
    ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'placeholder' => __('Enter title') ,'autofocus','required'],
    ['name' => 'description', 'label' => 'Description', 'type' => 'editor',
     'placeholder' => __('Enter description')],
     ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'placeholder' => __('Enter slug') ],]" :model="$service"/>
            <div class="mb-3 row">
                <div class="col-12">
                    <x-forms.input-label for="image" :value="__('image')" class="col-md-2 col-form-label"/>

                    <div class="filepond-container">
                        <x-forms.file-uploader name="image" :uploadUrl="route('admin.file.upload')"
                                               :revertUrl="route('admin.file.revert')"
                                               acceptedTypes="image/*" id="image"
                                               :existingFile="$service?->image?->url ?? null"
                                               :maxFileSize="5242880"/>
                    </div>
                    <x-forms.input-error input="image" :messages="$errors->get('image')"/>

                </div>

            </div>
            <div class="d-flex flex-wrap gap-3 mt-3">
                <x-forms.button icon="uil uil-arrow-right ms-2" type="submit" id="submitBtn"
                                :disabled="false" text="global.submit"/>
                <x-forms.button type="reset" id="resetBtn"
                                class="btn btn-outline-danger waves-effect waves-light w-md" :disabled="false"
                                text="global.reset"/>
            </div>
        </form>
    </div>
</x-breadcrumb>
