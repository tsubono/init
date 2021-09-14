<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdviserUserTeachRequest extends FormRequest
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
            'mst_language_ids' => 'required',
            'mst_category_ids' => 'required',
            'qualification_text' => 'max:5000',
            'pr_text' => 'max:5000',
            'movies' => 'array',
            'reason_text' => 'required|max:5000',
            'passion_text' => 'required|max:5000',
        ];
    }
}
