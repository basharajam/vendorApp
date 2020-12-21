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
                <span>الوزن (كيلو غرام)</span>
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
                <span>حجم الكرتون</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل Cbm لكل كارتون."></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_cbm') is-invalid @enderror" type="text" placeholder="0" name="al_cbm" value="{{array_key_exists('al_cbm',$meta ) ? $meta['al_cbm']  :  old('al_cbm')}}"   />
            @error('al_cbm')
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
            <input data-inputmask="'regex': '^[0-9]+$'" id="days_to_delivery" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_days_to_delivery') is-invalid @enderror" type="text" placeholder="0" name="al_days_to_delivery" value="{{ array_key_exists('al_days_to_delivery',$meta ) ? $meta['al_days_to_delivery']  :  old('al_days_to_delivery') }}" required  />
            @error('al_days_to_delivery')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
