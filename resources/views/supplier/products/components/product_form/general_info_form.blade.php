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
            <input data-inputmask="'regex': '^[0-9]+$'"
            id="_regular_price" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_price') is-invalid @enderror" type="text" placeholder="" name="_price" value="{{ $meta['_price'] ?? old('_price') }}" required  />
            @error('_price')
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('material') is-invalid @enderror" type="text" placeholder="" name="material" value="{{$meta['material'] ?? old('material') }}" required  />
            @error('material')
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
             class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('thickness') is-invalid @enderror" type="text" placeholder="" name="thickness" value="{{$meta['thickness'] ??  old('thickness') }}"   />
            @error('thickness')
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('printing_single') is-invalid @enderror" type="text" placeholder="" name="printing_single" value="{{ $meta['printing_single'] ??  old('printing_single') }}"   />
            @error('printing_single')
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('size') is-invalid @enderror" type="text" placeholder="" name="size" value="{{ $meta['size'] ?? old('size') }}" required  />
            @error('size')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
