@php
if($product){
    $meta = $product->meta;
}
@endphp
<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>اسم المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_name') is-invalid @enderror" type="text" placeholder="" name="product_name" value="{{ $product->post_title ??  old('product_name') }}" required  />
            @error('product_name')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم المنتج</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_number') is-invalid @enderror" type="text" placeholder="" name="product_number" value="{{  $meta['product_number'] ??  old('product_number') }}" required  />
            @error('product_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>علامات المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_features') is-invalid @enderror" type="text" placeholder="" name="product_features" value="{{$meta['product_features'] ??  old('product_features') }}" required  />
            @error('product_features')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                <span>فئة المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <div class="kt-input-icon">
                <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                        id="product_category"
                        name="product_category" required>
                        <option></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->term_taxonomy_id }}" @if($product && $product->category && $product->category->term_taxonomy_id==$category->term_taxonomy_id) selected @endif>{{ $category->term->name }}</option>
                        @endforeach
                </select>
            </div>
            @error('product_category')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <!--begin::Form group National ID Picture-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>صورة المنتج الرئيسية</span>
            </label>
            <div id="product_main_image" class="dropzone dropzone-default dropzone-primary dz-clickable" >
                <div class="dropzone-msg dz-message needsclick">
                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                    <span class="dropzone-msg-desc">Upload up to 10 files</span>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-12">
        <!--begin::Form group National ID Picture-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>إضافة صور إضافية أو فيديو</span>
            </label>
            <div id="product_other_files" class="dropzone dropzone-default dropzone-primary dz-clickable" >
                <div class="dropzone-msg dz-message needsclick">
                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                    <span class="dropzone-msg-desc">Upload up to 10 files</span>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder has-two-lines">
            <span>عام</span>
        </h3>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                <span>وصف المنتج</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <textarea id="editor" class="form-control @error('data') is-invalid @enderror" name="product_description">
                {{ $product->post_content  ?? ''}}
            </textarea>
            @error('product_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>السعر</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_price') is-invalid @enderror" type="text" placeholder="" name="product_price" value="{{ $meta['product_price'] ?? old('product_price') }}" required  />
            @error('product_price')
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
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_price_after_discount') is-invalid @enderror" type="text" placeholder="" name="product_price_after_discount" value="{{$meta['product_price_after_discount'] ?? old('product_price_after_discount') }}" required  />
            @error('product_price_after_discount')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>نوع المنتج</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('type') is-invalid @enderror" type="text" placeholder="" name="type" value="{{$meta['type'] ?? old('type') }}"   />
            @error('type')
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
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_thikness') is-invalid @enderror" type="text" placeholder="" name="product_thikness" value="{{$meta['product_thikness'] ??  old('product_thikness') }}"   />
            @error('product_thikness')
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
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_print') is-invalid @enderror" type="text" placeholder="" name="product_print" value="{{ $meta['product_print'] ??  old('product_print') }}"   />
            @error('product_print')
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
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_size') is-invalid @enderror" type="text" placeholder="" name="product_size" value="{{ $meta['product_size'] ??   old('product_size') }}" required  />
            @error('product_size')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div id="extra_fields_container"></div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="button" class="btn btn-success" id="extra_fields_button">
                    إضافة حقل جديد
                </button>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder has-two-lines">
            <span>المخزون</span>
        </h3>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الحد الادنى للطلب(عدد الكراتيين)</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_min_order_number') is-invalid @enderror" type="text" placeholder="" name="product_min_order_number" value="{{ $meta['product_min_order_number'] ??   old('product_min_order_number') }}"  required />
            @error('product_min_order_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الحد الاقصى للطلب(عدد الكراتيين)</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_max_order_number') is-invalid @enderror" type="text" placeholder="" name="product_max_order_number" value="{{ $meta['product_max_order_number'] ??  old('product_max_order_number') }}"   />
            @error('product_max_order_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                <span>السعر ل</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <div class="kt-input-icon">
                <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                        id="product_unit_price"
                        name="product_unit_price" required>
                    <option >صندوق</option>
                </select>
            </div>
            @error('product_category')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>عدد المنتجات في الكرتونة الواحدة</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_count_per_unit') is-invalid @enderror" type="text" placeholder="" name="product_count_per_unit" value="{{$meta['product_count_per_unit'] ??  old('product_count_per_unit') }}"  required />
            @error('product_count_per_unit')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>عدد الموديلات في الكرتونة الواحدة</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_model_count_per_unit') is-invalid @enderror" type="text" placeholder="" name="product_model_count_per_unit" value="{{ $meta['product_model_count_per_unit'] ??  old('product_model_count_per_unit') }}"  required />
            @error('product_model_count_per_unit')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder has-two-lines">
            <span>الشحن</span>
        </h3>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الوزن</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('weight') is-invalid @enderror" type="text" placeholder="" name="weight" value="{{$meta['weight'] ??  old('weight') }}" required  />
            @error('weight')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>CMB</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('cbm') is-invalid @enderror" type="text" placeholder="" name="cbm" value="{{$meta['cbm'] ?? old('cbm') }}" required  />
            @error('cbm')
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
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('delivery_dates_count') is-invalid @enderror" type="text" placeholder="" name="delivery_dates_count" value="{{$meta['delivery_dates_count'] ?? old('delivery_dates_count') }}" required  />
            @error('delivery_dates_count')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>