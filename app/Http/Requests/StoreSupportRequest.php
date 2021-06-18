<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupportRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'username' => ['required'],
            'message' => ['required'],
            'requestable_type' => ['required'],
            'requestable_id' => ['required'],
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
            'username.required' => 'الرجاء ادخال اسم المستخدم',

            'email.required' => 'الرجاء ادخال البريدالالكتروني',
            'phone.required' => 'الرجاء ادخال رقم الهاتف',
            'message.required' => 'الرجاء ادخال الرسالة',
        ];
    }
}
