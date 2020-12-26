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
            id="_regular_price" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_regular_price') is-invalid @enderror" type="text" placeholder="" name="_regular_price" value="{{ $meta['_regular_price'] ?? old('_regular_price') }}" required
            oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"/>
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
            </label>
            <input  data-inputmask="'regex': '^[0-9.]+$'"
                id="_sale_price" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 _sale_price @error('_sale_price') is-invalid @enderror" type="text" placeholder="" name="_sale_price" value="{{$meta['_sale_price'] ??  old('_sale_price') }}" title="الرجاء تعبئة هذا الحقل"  />
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
                <span>المواد المستخدمة في المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل مادة المنتج"></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_material') is-invalid @enderror" type="text" placeholder="" name="al_material" value="{{$meta['al_material'] ?? old('al_material') }}" required
            oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل" />
            @error('al_material')
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
             class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_thickness') is-invalid @enderror" type="text" placeholder="" name="al_thickness" value="{{$meta['al_thickness'] ??  old('al_thickness') }}"   title="الرجاء تعبئة هذا الحقل" />
            @error('al_thickness')
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
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_printing') is-invalid @enderror" type="text" placeholder="" name="al_printing" value="{{ $meta['al_printing'] ??  old('al_printing') }}"   />
            @error('al_printing')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>المقاس</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل حجم كل منتج"></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_size') is-invalid @enderror" type="text" placeholder="" name="al_size" value="{{ $meta['al_size'] ?? old('al_size') }}" required
            oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل" />
            @error('al_size')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الاضاقات</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_added') is-invalid @enderror" type="text" placeholder="" name="al_added" value="{{ $meta['al_added'] ?? old('al_added') }}"   title="الرجاء تعبئة هذا الحقل" />

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>المزيد من المعلومات</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  ></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_more_info') is-invalid @enderror" type="text" placeholder="" name="al_more_info" value="{{ $meta['al_more_info'] ?? old('al_more_info') }}"   title="الرجاء تعبئة هذا الحقل"/>

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>اللون</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark" ></span>
            </label>
            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_color') is-invalid @enderror" type="text" placeholder="" name="al_color" value="{{ $meta['al_color'] ?? old('al_color') }}"   title="الرجاء تعبئة هذا الحقل" />

        </div>
    </div>
</div>
