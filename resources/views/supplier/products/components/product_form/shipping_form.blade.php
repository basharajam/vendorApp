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
                <span>الوزن (كيلوغرام)</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_weight') is-invalid @enderror" type="text" placeholder="0" name="_weight" value="{{ array_key_exists('_weight',$meta ) ? $meta['_weight']  :  old('_weight')}}"   />
            @error('_weight')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الأبعاد (سم)</span>
            </label>
           <div class="kt-input-icon">
               <div class="row">
                   <div class="col-4">
                        <input id="product_length" placeholder="الطول" class="form-control form-control-solid " size="6" type="text" name="_length" value="{{ array_key_exists('_length',$meta ) ? $meta['_length']  :  old('_length') }}">
                   </div>
                   <div class="col-4">
                        <input id="product_width" placeholder="عرض" class="form-control form-control-solid " size="6" type="text" name="_width" value="{{ array_key_exists('_width',$meta ) ? $meta['_width']  :  old('_width') }}">
                    </div>
                    <div class="col-4">
                            <input id="product_height" placeholder="ارتفاع" class="form-control form-control-solid " size="6" type="text" name="_height" value="{{ array_key_exists('_height',$meta ) ? $meta['_height']  :  old('_height') }}">
                    </div>
               </div>
           </div>

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>CBM</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل Cbm لكل كارتون."></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('cbm_single') is-invalid @enderror" type="text" placeholder="0" name="cbm_single" value="{{array_key_exists('cbm_single',$meta ) ? $meta['cbm_single']  :  old('cbm_single')}}"   />
            @error('cbm_single')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>عدد أيام التسليم</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل عدد أيام التصنيع (إذا كان المنتج متوفرًا ، أدخل 0)."></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('days_to_delivery') is-invalid @enderror" type="text" placeholder="0" name="days_to_delivery" value="{{ array_key_exists('days_to_delivery',$meta ) ? $meta['days_to_delivery']  :  old('days_to_delivery') }}" required  />
            @error('days_to_delivery')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
