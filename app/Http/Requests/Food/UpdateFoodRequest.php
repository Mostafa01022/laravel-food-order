<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:100|min:5',
            'category' => 'required',
            'active' => 'required',
            'description' => 'required|max:100|min:5',
            'price' => 'required|numeric|digits_between:1,3|min:1',
            'image' => 'mimes:jpeg,png,jpg,jif|max:10000'
        ];
    }
}
