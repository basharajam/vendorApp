<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
         
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username'=>['required','unique:users']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

            'username.required' => 'حقل اسم المستخدم مطلوب',
            'username.unique'=>'اسم المستخدم موجود مسبقا',
            'email.required' => 'الرجاء ادخال البريدالالكتروني',
            'email.unique' => 'البريد الإلكتروني موجود مسبقا',
            'password.required' => 'الرجاء ادخال كلمة المرور',
            'password.min' => 'الرجاء اداخال كلمة مرور اكثر من 6 احرف',
            'password.confirmed' => 'كلمة المرور وتأكيدها غير متطابقتين',
        ];
    }
}
