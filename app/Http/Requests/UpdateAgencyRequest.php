<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgencyRequest extends FormRequest
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
            'country_id' => ['required'],
            'region_id' => ['required'],
            'name' => ['required', 'min:3', 'max:50'],
            'phone_number' => ['required', 'min:8'],
            'email' => ['required', 'email', 'max:40'],
            'website' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:50'],
            'postal_code' => ['nullable', 'max:10'],
        ];
    }
}
