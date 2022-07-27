<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExceptionalFvalidatior extends FormRequest
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
            'wife_name'=>'required',
           'wife_father_name'=>'required',
            'wife_sur_name'=>'required',
            'children_number'=>'required',
            'distribution_point'=>'required',

        ];
    }
}
