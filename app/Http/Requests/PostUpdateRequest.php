<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'blog_id' => ['required', 'exists:blogs,id'],
            'authror_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'max:255'],
            'body' => ['required', 'max:255'],
        ];
    }
}
