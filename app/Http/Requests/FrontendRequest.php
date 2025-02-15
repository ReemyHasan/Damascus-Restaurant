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
             // Hero Section
        'hero_section.title.required' => 'The hero section title is required.',
        'hero_section.title.string' => 'The hero section title must be a valid string.',
        'hero_section.description.string' => 'The hero section description must be a valid string.',
        'hero_section.image.required' => 'An image is required for the hero section.',
        'hero_section.image.image' => 'The uploaded file must be an image.',
        'hero_section.image.mimes' => 'Only JPEG, PNG, JPG, and WEBP formats are allowed.',
        'hero_section.image.max' => 'The hero section image size must not exceed 2MB.',

        // Contact Section
        'contact.address.required' => 'The address field is required.',
        'contact.address.string' => 'The address must be a valid string.',
        'contact.phone.string' => 'The phone number must be a valid string.',
        'contact.email.email' => 'Please enter a valid email address.',
        'contact.email.string' => 'The email must be a valid string.',
        'contact.location.string' => 'The location must be a valid string.',

        // Opening Hours
        'opening_hours.*.date.required' => 'Each opening hour entry must have a date.',
        'opening_hours.*.date.string' => 'The opening hour date must be a valid string.',
        'opening_hours.*.date.max' => 'The opening hour date must not exceed 255 characters.',
        'opening_hours.*.time.string' => 'The opening hour time must be a valid string.',
        'opening_hours.*.time.max' => 'The opening hour time must not exceed 255 characters.',

        // Footer Links
        'footer_link.title.required' => 'The footer link title is required.',
        'footer_link.title.string' => 'The footer link title must be a valid string.',
        'footer_link.title.max' => 'The footer link title must not exceed 255 characters.',
        'footer_link.link.string' => 'The footer link must be a valid string.',
        'footer_link.link.max' => 'The footer link must not exceed 255 characters.',
        'footer_link.link_target.required' => 'Please select a valid link target.',
        'footer_link.link_target.in' => 'The link target must be "_self" (same tab) or "_blank" (new tab).',

        // SEO Data
        'seo_data.title.required' => 'The SEO title is required.',
        'seo_data.title.string' => 'The SEO title must be a valid string.',
        'seo_data.description.string' => 'The SEO description must be a valid string.',
        'seo_data.keywords.string' => 'The SEO keywords must be a valid string.',
        'seo_data.image.required' => 'An image is required for the SEO section.',
        'seo_data.image.image' => 'The uploaded SEO image must be an image file.',
        'seo_data.image.mimes' => 'Only JPEG, PNG, JPG, and WEBP formats are allowed for the SEO image.',
        ];
    }
}
