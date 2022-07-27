<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamiliesExclusiveInfoValidator extends FormRequest
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
            'wife_name'=> 'required',
            'wife_work_need'=> 'nullable',
            'wife_work_need_desc'=> 'nullable',
            'wife_education_level'=>'nullable',
            'wife_clothes_type'=> 'nullable',
            'wife_clothes_size'=> 'numeric|nullable',
            'wife_shoe_size'=> 'numeric|nullable',
            'house_condition'=> 'nullable',
            'house_value'=> 'numeric|nullable',
            'rent_contributor'=> 'nullable',
            'electricity_bill'=> 'numeric|nullable',
            'water_bill'=> 'numeric|nullable',
            'internet_bill'=> 'numeric|nullable',
            'generator_bill'=> 'numeric|nullable',
            'pending_bills'=> 'numeric|nullable',
            'distribution_point'=> 'nullable',
            'smokers_in_house'=> 'numeric|nullable',
            'medication_sponsor'=> 'nullable',
            'medication_sponsor_amount'=> 'numeric|nullable',
            'family_comment'=> 'nullable',
        ];
    }
    public function messages()
{
    return [
        'wife_name.required'=>"Wife name is required or enter 'NO' instead",
        'wife_clothes_size.numeric' => 'Clothes size should be a number',
        'wife_shoe_size.numeric' => 'Shoe size should be a number',
        'house_value.numeric' => 'House value should be a number',
        'electricity_bill.numeric' => 'Electricity Bill should be a number',
        'water_bill.numeric' => 'Water Bill should be a number',
        'internet_bill.numeric' => 'Internet Bill should be a number',
        'generator_bill.numeric' => 'Generator Bill should be a number',
        'pending_bills.numeric' => 'Pending Bills should be a number',
        'smokers_in_house.numeric' => 'Smokers should be a number',
        'medication_sponsor_amount.numeric' => 'Medication sponsor amount should be a number',
        
        
    ];
}
}


