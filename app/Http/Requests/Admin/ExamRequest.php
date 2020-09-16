<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'exam_date' => ['required', 'date'],
            'exam_duration' => ['required', 'date_format:H:i'],
            'total_question' => ['required', 'numeric'],
            'qualifying_mark' => ['nullable', 'numeric']
        ];
    }
}
