<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class CurrentPassword implements Rule
{
    private string $guard;
    /**
     * CurrentPassword constructor.
     * @param string $guard
     */
    public function __construct(string $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // パスワードが正しいかをチェックする
        return Hash::check($value, auth()->guard($this->guard)->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '現在のパスワードが正しくありません';
    }
}