<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FrontendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [];

        $frontendFields = config('frontend_sections');

        foreach ($frontendFields as $key => $fields) {
            foreach ($fields as $fieldName => $fieldData) {
                if (isset($fieldData['validation'])) {
                    $rules["{$key}.{$fieldName}"] = $fieldData['validation'];
                }
            }
        }

        $rules['hero_section.image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'];

        if ($this->has('opening_hours')) {
            foreach ($this->input('opening_hours') as $index => $values) {
                $rules["opening_hours.$index.date"] = ['required', 'string', 'max:255'];
                $rules["opening_hours.$index.time"] = ['nullable', 'string', 'max:255'];
            }
        }

        return $rules;
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'hero_section.title.required' => 'The hero section title is required.',
            'hero_section.image.image' => 'The uploaded file must be an image.',
            'contact.email.email' => 'Please enter a valid email address.',
            'opening_hours.*.date.required' => 'Each opening hour entry must have a date.',
        ];
    }
}
