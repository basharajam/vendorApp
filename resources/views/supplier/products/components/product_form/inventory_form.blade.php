@php
$meta = [];
if($product){
    $meta = $product->meta;
}
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('يشير SKU إلى وحدة حفظ المخزون ، وهو معرف فريد لكل منتج وخدمة مميزة يمكن شراؤها')}}"></span>
                <span class="required">*</span>
                <span>{{__('رقم الصنف')}}</span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_sku') is-invalid @enderror" type="text" placeholder="" name="_sku" value="{{ array_key_exists('_sku',$meta ) ? $meta['_sku']  :  old('_sku') }}" required
            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
            @error('_sku')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                <span>{{__('حالة المنتج')}}</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title='{{__("يتحكم في ما إذا كان المنتج مدرجًا على أنه متوفر أو غير متوفر")}}".'></span>
            </label>
            <div class="kt-input-icon">
                <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                        id="_stock_status"
                        name="_stock_status" required
                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                        oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"  >
                    <option value="instock" @if(array_key_exists('_stock_status',$meta)  && $meta['_stock_status']=='instock') selected @endif>{{__("متوفر")}}</option>
                    <option value="onbackorder" @if(array_key_exists('_stock_status',$meta)  && $meta['_stock_status']=='onbackorder') selected @endif>{{__("تحت الطلب")}}</option>
                </select>
            </div>
            @error('_stock_status')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("الحد الادنى للطلب (عدد الكراتين)")}} </span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('اختياري. قم بتعيين حد أدنى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر')}}"></span>
            </label>
            <input data-inputmask="'regex': '^[0-9]+$'"
            id="_wc_min_qty_product" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_wc_min_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_min_qty_product" value="{{ array_key_exists('_wc_min_qty_product',$meta) ?  $meta['_wc_min_qty_product'] :  old('_wc_min_qty_product') }}" title="{{__('الرجاء تعبئة هذا الحقل')}}"  />
            @error('_wc_min_qty_product')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("الحد الاقصى للطلب (عدد الكراتين)")}}</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اختياري. قم بتعيين الحد الأقصى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر"></span>
            </label>
            <input data-inputmask="'regex': '^[0-9]+$'"
            id="_wc_max_qty_product" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 _wc_max_qty_product @error('_wc_max_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_max_qty_product" value="{{ array_key_exists('_wc_max_qty_product',$meta) ? $meta['_wc_max_qty_product'] : old('_wc_max_qty_product') }}"  title="{{__('الرجاء تعبئة هذا الحقل')}}" />

            <div class="fv-plugins-message-container">
                <div  id="_wc_max_qty_product_help" class="fv-help-block"></div>
            </div>
            @error('_wc_max_qty_product')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("كمية بالكرتونة الواحدة")}}</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("مثال: كمية الحزم داخل الكرتونة أو كمية البطاقات داخل الحزمة الواحدة")}}"></span>
            </label>
            <input id="al_carton_qty" data-inputmask="'regex': '^[0-9]+$'"
            class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_carton_qty') is-invalid @enderror" type="text" placeholder="" name="al_carton_qty" value="{{ array_key_exists('al_carton_qty',$meta) ?  $meta['al_carton_qty'] : old('al_carton_qty') }}"  required
            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
            @error('al_carton_qty')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("السعر مقابل")}}</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("أدخل كمية كل كارتون")}}"></span>
            </label>
            <div class="kt-input-icon">
                <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="{{__('الرجاء تعبئة هذا الحقل')}}"
                        id="price_for"
                        name="al_price_for" required>
                        <option value="box" @if( array_key_exists('al_price_for',$meta)  && $meta['al_price_for']=="box") selected @endif>{{__("علبة")}}</option>
                        <option value="Pcs" @if(array_key_exists('al_price_for',$meta)  && $meta['al_price_for']=="Pcs") selected @endif>{{__("قطعة")}}</option>
                        <option value="opp" @if(array_key_exists('al_price_for',$meta)  && $meta['al_price_for']=="opp") selected @endif>opp</option>
                        <option value="bag" @if(array_key_exists('al_price_for',$meta)  && $meta['al_price_for']=="bag") selected @endif>{{__("كيس")}}</option>
                        <option value="cartoon" @if(array_key_exists('al_price_for',$meta) && $meta['al_price_for']=="cartoon") selected @endif>{{__("كرتونة")}}</option>
                        <option value="set" @if(array_key_exists('al_price_for',$meta)  && $meta['al_price_for']=="set") selected @endif>{{__("مجموعة")}}</option>
                </select>
            </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("الكمية للحزمة")}}</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("أدخل كمية الحزمة المختارة")}}."></span>
            </label>
            <input data-inputmask="'regex': '^[0-9]+$'" id="al_price_for_desc" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_price_for_desc') is-invalid @enderror" type="text" placeholder="" name="al_price_for_desc" value="{{$meta['al_price_for_desc'] ??  old('al_price_for_desc') }}"  required
            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
            @error('al_price_for_desc')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>

    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__("التوزيع ضمن الكرتونة")}}</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل عدد النماذج المختلطة في العبوة."></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_mix_of_package') is-invalid @enderror" type="text" placeholder="" name="al_mix_of_package" value="{{$meta['al_mix_of_package'] ?? old('al_mix_of_package') }}" required
            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
            @error('al_mix_of_package')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{__($message)}}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
