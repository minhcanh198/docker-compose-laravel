<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'name' => ['required'],
            'brand_name' => [],
            'website' => [],
            'street' => ['required'],
            'city' => ['required'],
            'zip_code' => ['required'],
            'country_id' => ['required'],
            'vat_number' => [],
        ];
    }
}
