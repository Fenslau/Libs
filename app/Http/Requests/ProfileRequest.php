<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Rules\isnotNumeric;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
    public function rules() {
        return [
            'login' => ['required', new isnotNumeric, Rule::unique('users')->ignore(auth()->user()->id), 'min:1', 'max:16'],
            'name' => 'required|min:2|max:16',
            'city' => 'nullable|min:2|max:16',
            'user_age' => 'nullable|integer|min:16|max:120',
            'user_height' => 'nullable|integer|min:100|max:250',
            'user_weight' => 'nullable|integer|min:30|max:300'
        ];
    }

}
