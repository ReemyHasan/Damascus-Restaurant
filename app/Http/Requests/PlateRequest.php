<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          

            'title' => ['required','string','max:255', Rule::unique('plates')->ignore($this->plate, 'title')],
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,svg,webp,jpeg|max:2048'

        ];
    }
}
