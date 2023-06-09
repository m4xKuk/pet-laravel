<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'preview_image' => 'nullable|file',
            // 'main_image' => 'nullable|file',
            'user_id' => 'required|integer|exists:users,id',
            'categoryIds' => 'nullable|array',
            'categoryIds.*' => 'nullable|integer|exists:categories,id',
        ];
    }
}
