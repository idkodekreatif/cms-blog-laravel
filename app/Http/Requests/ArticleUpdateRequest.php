<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
            'categories_id'     => 'required',
            'title'             => 'required',
            'description'       => 'required',
            'status'            => 'required',
            'published'         => 'required',
            'img'               => 'nullable|image|file|mimes:png, gif, jpeg, png|max:2024',
        ];
    }
}
