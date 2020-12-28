<?php

namespace App\Http\Requests;

use App\Rules\CheckAttributeUniqueRule;
use App\Rules\CheckCategoryRule;
use App\Rules\CheckTagUniqueRule;
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
        else if(request('type')=='product_tag'){
            return [
                'name'=>['required',new CheckTagUniqueRule()],
            ];
        }
        else{
            return [
                //attribute or term
                'name'=>['required',new CheckAttributeUniqueRule()]
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
