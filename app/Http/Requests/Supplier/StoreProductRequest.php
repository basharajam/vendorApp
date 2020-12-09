<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => ['required'],
            'product_type' => ['required'],
            'product_number' => ['required'],
            'product_features' => ['required'],
            'product_category' => ['required'],
            'product_price' => ['required'],
            'product_price_after_discount' => ['required'],
            'product_size' => ['required'],
            'product_min_order_number' => ['required'],
            'product_unit_price' => ['required'],
            'product_count_per_unit' => ['required'],
            'product_model_count_per_unit' => ['required'],
            'weight' => ['required'],
            'cbm' => ['required'],
            'delivery_dates_count' => ['required'],



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
            'product_name.required' => 'الرجاء ادخال اسم المنتج',
            'product_type.required' => 'الرجاء اختيار نوع المنتج',
            'product_number.required' => 'Please enter product number',
            'product_features.required' => 'Please enter product features',
            'product_category.required' => 'Please select product category',
            'product_price.required' => 'Please enter product price',
            'product_price_after_discount.required' => 'Please enter product price after discount',
            'product_size.required' => 'Please enter product size',
            'product_min_order_number.required' => 'Please enter the minimum order for this product',
            'product_unit_price.required' => 'Please select price per unit type',
            'product_count_per_unit.required' => 'Please enter number of products per unit ',
            'product_model_count_per_unit.required' => 'Please enter number of product models  per unit ',
            'weight.required' => 'Please enter product wegight ',
            'cbm.required' => 'Please enter product cbm ',
            'delivery_dates_count.required' => 'Please enter required delviery days ',

        ];
    }
}
