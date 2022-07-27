<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FMIRvalidatior extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //this validation MUST be in all validators
        // basic use for now

        //get the current user from sent token
//        if($user = $this->user()) {
//
//            if ($user->role_id == 0) {
//                return true;
//            } else {
//                //get method type  GET,POST..
//                $method_type = $this->method();
//                //example to allow only get request
//                if ($method_type == "GET"){
//                    return true;
//                }else
//                    return false;
//            }
//        }
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
            'interviewer'=> 'nullable',
            'family_name'=> 'nullable',
            'survey_date'=> 'nullable',
            'phone_number'=> 'nullable',
            'area'=> 'nullable',
            'husband_name'=> 'nullable',
            'husband_nationality'=> 'nullable',
            'husband_idimage'=> 'nullable',
            'husband_date_of_birth'=> 'nullable',
            'wife_nationality'=> 'nullable',
            'wife_marital_status'=> 'nullable',
            'wife_date_of_birth'=> 'nullable',
            'wife_profession'=> 'nullable',
            'wife_income'=> 'nullable',
            'family_full_address'=> 'nullable',
            'number_of_residents'=> 'nullable',
            'living_with'=> 'nullable',
            'existing_medical_conditions'=> 'nullable',
            'medical_condition_name'=> 'nullable',
            'health_risk_persons'=> 'nullable',
            'doctor_name'=> 'nullable',
            'medication_name'=> 'nullable',
            'medication_price'=> 'nullable',
            'code'=> 'nullable',
            //'parent_id'=> 'nullable',
            //'recent' => 'nullable',
            'wife_name'=> 'nullable',
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
            'child_name'=> 'nullable',
            'child_gender'=> 'nullable',
            'child_date_of_birth'=> 'nullable',
            'child_status'=> 'nullable',
            'child_profession'=> 'nullable',
            'child_education_level'=> 'nullable',
            'child_income'=> 'nullable',
            'school_name'=> 'nullable',
            'school_fees'=> 'nullable',
            'educational_aid'=> 'nullable',
            'child_comment'=> 'nullable',
            'wife_father_name'=> 'nullable',
            'wife_sur_name'=> 'nullable',
            'children_number'=> 'nullable',
            'husband_profession'=> 'nullable',
            'husband_income'=> 'nullable',
            'other_aid'=> 'nullable',
            'other_aid_description'=> 'nullable',
            'house_need_name'=> 'nullable',
            //'house_need_id'=>'required',
            'family_id'=> 'nullable',
            'ngo_id'=> 'nullable',
            'child_aid_amount'=> 'nullable',
            'total_aid_amount'=> 'nullable',
            'ramadan_additional_aid'=> 'nullable',
            'monthly_warranty'=> 'nullable',
            'husband_assets'=> 'nullable',
            'husband_debt'=> 'nullable',
            'husband_debt_amount'=> 'nullable',
            'husband_debt_desc'=> 'nullable',
            'husband_shoe_size'=> 'nullable',
            'wife_gold_assets'=> 'nullable',
            'wife_gold_quantity'=> 'nullable',
            'wife_gold_assets_desc'=> 'nullable',
           'gold_retain_desc'=>'nullable' ,
           'wife_other_assets'=> 'nullable',
           'wife_other_assets_value'=> 'nullable',
           'existing_car'=> 'nullable',
           'car_desc'=> 'nullable',
           'car_owner'=> 'nullable',
           'ngo_name'=> 'nullable',

        ];
    }
    public function messages()
    {
        return [
            'wife_name.required'=> 'اسم الزوجة مطلوب أو أدخل" لا "بدلاً من ذلك',
            'wife_clothes_size.numeric' => 'حجم الملابس يجب أن يكون رقماً',
            'wife_shoe_size.numeric' => 'يجب أن يكون حجم الحذاء رقمًا',
            'house_value.numeric' => 'يجب أن تكون قيمة المنزل رقمًا',
            'electricity_bill.numeric' => 'يجب أن تكون فاتورة الكهرباء رقماً',
            'water_bill.numeric' => 'يجب أن تكون فاتورة المياه رقمًا',
            'internet_bill.numeric' => 'يجب أن يكون فاتورة الإنترنت رقمًا',
            'generator_bill.numeric' => 'يجب أن تكون فاتورة المولد رقمًا',
            'pending_bills.numeric' => 'يجب أن يكون المدخنون رقمًا',
            'smokers_in_house.numeric' => 'يجب أن يكون المدخنون رقمًا',
            'medication_sponsor_amount.numeric' => 'يجب أن يكون مبلغ الكفيل عددًا',
            'house_need_name.required'=>'مطلوب منزل أو أدخل "لا" بدلاً من ذلك',
            //'family_id.required'=>'مطلوب معرف العائلة',
            //'house_need_id.required',
            'house_need_name.required',
            //'family_id.required',
            //'ngo_id.required',
            'child_aid_amount.required'=>'مطلوب مبلغ إعانة الطفل أو أدخل "لا" بدلاً من ذلك',
            'total_aid_amount.required'=>'إجمالي مبلغ المساعدة المطلوب أو أدخل "لا" بدلاً من ذلك',
            'ramadan_additional_aid.required'=>'مطلوب مساعدة إضافية لشهر رمضان ، أو أدخل "لا" بدلاً من ذلك',
            'monthly_warranty.required'=>'مطلوب ضمان شهري ، أو أدخل "لا" بدلاً من ذلك',

        ];
    }
}
