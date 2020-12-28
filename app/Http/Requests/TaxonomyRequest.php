<?php

namespace App\Http\Requests;

use App\Rules\CheckCategoryRule;
use Illuminate\Foundation\Http\FormRequest;

class TaxonomyRequest extends FormRequest
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
        if(request('type')=='product_cat')
        {

            return [
                'name'=>['required',new CheckCategoryRule()],
                'parent'=>['required']
            ];
        }
        else{
            return [

                //
                'name'=>['unique:App\Models\WP\Term']
            ];
        }

    }
      /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.unique' => 'هذه الاسم موجود مسبقاً الرجاء ادخال اسم آخر',

        ];
    }
}
