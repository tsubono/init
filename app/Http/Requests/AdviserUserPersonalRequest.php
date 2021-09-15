<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdviserUserPersonalRequest extends FormRequest
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
            'personal_images_1' => 'required|array',
            'personal_images_1.0' => 'required',
            'personal_images_2' => 'required|array',
            'personal_images_2.0' => 'required',
            'paypal_email' => 'required_if:payment_method,Paypal送金|nullable|email',
            'account_image_1' => 'required_if:payment_method,口座振替',
            'account_image_2' => 'required_if:payment_method,口座振替',
        ];
    }
}
