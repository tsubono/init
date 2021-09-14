<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MateUserLearnRequest extends FormRequest
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
            'pr_text' => 'max:5000',
        ];
    }
}
