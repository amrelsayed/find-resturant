<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchResturants extends FormRequest
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
            'meal_name' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ];
    }
}
