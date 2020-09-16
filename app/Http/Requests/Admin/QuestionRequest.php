<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'exam_id' => ['required', 'numeric'],
            'valid_option' => ['required', 'string', 'max:1'],
            'valid_mark' => ['required', 'numeric'],
            'wrong_mark' => ['required', 'numeric'],
            // 'option_title[]' => ['required', 'max:4']
        ];
    }
}
