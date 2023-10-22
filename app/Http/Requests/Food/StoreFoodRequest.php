<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'active' => 'required',
            'category' => 'required',
            'title' => 'required|unique:foods|max:100|min:5',
            'description' => 'required|max:100|min:5',
            'price' => 'required|numeric|digits_between:1,3|min:1',
            'image' => 'required|mimes:jpeg,png,jpg,jif|max:10000'
        ];
    }
}
