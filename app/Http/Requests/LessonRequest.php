<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
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
            'name' => 'required|max:100',
            'images' => 'required|array',
            'images.0' => 'required',
            'description' => 'required|max:5000',
            'mst_language_id' => 'required',
            'mst_category_ids' => 'required',
            'coin_amount' => 'required|int|min:1',
            'movies' => 'array',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('message.lesson name')
        ];
    }
}
