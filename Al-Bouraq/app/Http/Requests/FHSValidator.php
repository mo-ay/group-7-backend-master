<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FHSValidator extends FormRequest
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
            'family_id' => 'required',
            'husband_status_id' => 'required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    public function messages(): array
    {
        return [
            'family_id.required' => 'required',
            'husband_status_id.required' => 'this field is required',
        ];
    }
}
