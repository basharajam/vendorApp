@php
if($product){
    $meta = $product->meta;
}
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>السعر</span>
                <span class="required">*</span>

            </label>
            <input data-inputmask="'regex': '^[0-9.]+$'"
            id="_regular_price" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_regular_price') is-invalid @enderror" type="text" placeholder="" name="_regular_price" value="{{ $meta['_regular_price'] ?? old('_regular_price') }}" required  />
            @error('_regular_price')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>السعر بعد الحسم</span>
                <span class="required">*</span>
            </label>
            <input  data-inputmask="'regex': '^[0-9]+$'"
                id="_sale_price" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 _sale_price @error('_sale_price') is-invalid @enderror" type="text" placeholder="" name="_sale_price" value="{{$meta['_sale_price'] ??  old('_sale_price') }}" required  />
            <div class="fv-plugins-message-container">
                <div id="_sale_price_help" class="fv-help-block"></div>
            </div>
            @error('_sale_price')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>مادة المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل مادة المنتج"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('material_simple') is-invalid @enderror" type="text" placeholder="" name="material_simple" value="{{$meta['material_simple'] ?? old('material_simple') }}" required  />
            @error('material_simple')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>سماكة المنتج</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل سمك المنتج"></span>

            </label>
            <input
             class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('thickness_simple') is-invalid @enderror" type="text" placeholder="" name="thickness_simple" value="{{$meta['thickness_simple'] ??  old('thickness_simple') }}"   />
            @error('thickness_simple')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الطباعة</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل ألوان الطباعة"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('printing_simple') is-invalid @enderror" type="text" placeholder="" name="printing_simple" value="{{ $meta['printing_simple'] ??  old('printing_simple') }}"   />
            @error('printing_simple')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الحجم</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل حجم كل منتج"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('size_simple') is-invalid @enderror" type="text" placeholder="" name="size_simple" value="{{ $meta['size_simple'] ?? old('size_simple') }}" required  />
            @error('size_simple')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
