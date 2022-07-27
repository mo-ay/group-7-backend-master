<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildrenInfoValidator extends FormRequest
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
            'child_name',
            'family_name',
            'child_gender',
            'child_date_of_birth',
            'child_status',
            'child_profession',
            'child_education_level',
            'child_income',
            'school_name',
            'school_fees',
            'educational_aid',
            'child_comment',
            
        ];
    }
}
