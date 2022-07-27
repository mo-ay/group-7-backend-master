<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HusbandStatusesValidator extends FormRequest
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
            'husband_status_name' =>'required|unique:husband_statuses',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'husband_status_name.required' =>'required|unique',
        ];
    }


}
