<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProgramRequest extends FormRequest
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
            'title' => ['required'],
            'country_id' => ['required'],
            'category_id' => ['required'],
            'focus_id' => ['required'],
            'age' => ['required'],
            'duration' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'accommodation' => ['required'],
            'location' => ['required'],
            'provider_id' => ['required'],
        ];
    }
}
