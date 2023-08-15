<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'insurance_code'=>"required",
            'discount_percentage'=>"required|numeric",
            "company_rate"=>"required|numeric",
            "name"=>"required|unique:insurance_translations,name,".$this->id,
        ];
    }
    public function messages()
    {
        return[
            'insurance_code.required'=>'من فضلك ادخل كود الشركة',
            'discount_percentage.required'=>' من فضلك ادخل نسبة الخصم ',
            'discount_percentage.numeric'=>' النسبة يجب ان تكون رقم  ',
            'name.required'=>' من فضلك ادخل اسم الشركة  ',
            'name.unique'=>'  اسم الشركة موجود من قبل  ',
        ];
    }
}
