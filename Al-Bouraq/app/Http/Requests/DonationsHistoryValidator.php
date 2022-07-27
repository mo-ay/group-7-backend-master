<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationsHistoryValidator extends FormRequest
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
            'family_id' => 'required',
            'donation_id' => 'required',
            'bouraq_donation_value' => 'required_without_all:h_donation_value,r_donation_value',
            'h_donation_value' =>'required_without_all:bouraq_donation_value,r_donation_value',
            'r_donation_value' => 'required_without_all:bouraq_donation_value,h_donation_value'
        
        ];
    }
}
