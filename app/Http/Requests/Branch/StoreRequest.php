<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'section_id' => 'required|integer|exists:sections,id',
            'parent_id' => 'integer|nullable|exists:branches,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'The title field must be filled in.',
            'title.string'=>'The title must be a string.',
            'section_id.required'=>'The section field must be filled in.',
            'section_id.integer'=>'The section must be an integer.',
            'section_id.exists'=>'The section does not exist.',
            'parent_id.required'=>'The parent field must be filled in.',
            'parent_id.integer'=>'The parent must be an integer.',
            'parent_id.exists'=>'The parent does not exist.',
        ];
    }
}
