<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MateUserBasicRequest extends FormRequest
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
            'family_name' => 'required|max:100',
            'first_name' => 'required|max:100',
            'family_name_kana' => 'required|max:100',
            'first_name_kana' => 'required|max:100',
            'birthday_y' => 'required',
            'birthday_m' => 'required',
            'birthday_d' => 'required',
            'tel' => 'required',
            'email' => ['required', 'email', Rule::unique('mate_users','email')->ignore($this->id)],
            'skype_name' => 'required',
            'skype_id' => 'required',
            'from_country_id' => 'required',
            'residence_country_id' => 'required',
        ];
    }
}
