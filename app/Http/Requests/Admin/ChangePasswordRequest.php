<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
{
    return [
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        'new_password_confirmation' => ['required', 'string', 'min:8'],
        'old_password' => ['required', 'string'],
    ];
}
}