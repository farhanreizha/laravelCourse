<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:200', 'min:10'],
            'tag' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title harus di isi',
            'title.max' => 'Title maximal 255',
            'title.min' => 'Title minimal 5',
            'description.required' => 'Description harus di isi',
            'description.max' => 'Description maximal 200',
            'description.min' => 'Description minimal 10',
        ];
    }
}
