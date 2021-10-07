<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdviserUserBasicRequest extends FormRequest
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
            'middle_name' => 'nullable|max:100',
            'first_name' => 'required|max:100',
            'family_name_kana' => 'required|max:100|regex:/^[a-zA-Z]+$/',
            'middle_name_kana' => 'nullable|max:100|regex:/^[a-zA-Z]+$/',
            'first_name_kana' => 'required|max:100|regex:/^[a-zA-Z]+$/',
            'birthday_y' => 'required',
            'birthday_m' => 'required',
            'birthday_d' => 'required',
            'tel' => 'required|max:15|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'zipcode' => 'required',
            'address' => 'required',
            'email' => ['required', 'email', Rule::unique('adviser_users','email')->ignore($this->id)],
            'skype_name' => 'required|max:100',
            'skype_id' => 'required|max:100',
            'from_country_id' => 'required',
            'residence_country_id' => 'required',
        ];
    }
}
