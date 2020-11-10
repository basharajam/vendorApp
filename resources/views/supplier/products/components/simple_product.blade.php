<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>اسم المنتج</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>

            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_name') is-invalid @enderror" type="text" placeholder="" name="product_name" value="{{ old('product_name') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_number') is-invalid @enderror" type="text" placeholder="" name="product_number" value="{{ old('product_name') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_features') is-invalid @enderror" type="text" placeholder="" name="product_features" value="{{ old('product_features') }}" required  />
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
                    <option >category</option>
                </select>
            </div>
            @error('product_category')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder">عام</h3>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                <span>وصف المنتج</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <textarea id="editor" class="form-control @error('data') is-invalid @enderror" name="data"></textarea>
            @error('data')
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_price') is-invalid @enderror" type="text" placeholder="" name="product_price" value="{{ old('product_price') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_price_after_discount') is-invalid @enderror" type="text" placeholder="" name="product_price_after_discount" value="{{ old('product_price_after_discount') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('type') is-invalid @enderror" type="text" placeholder="" name="type" value="{{ old('type') }}"   />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_thikness') is-invalid @enderror" type="text" placeholder="" name="product_thikness" value="{{ old('product_thikness') }}"   />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_print') is-invalid @enderror" type="text" placeholder="" name="product_print" value="{{ old('product_print') }}"   />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_size') is-invalid @enderror" type="text" placeholder="" name="product_size" value="{{ old('product_size') }}" required  />
            @error('product_size')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder">المخزون</h3>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الحد الادنى للطلب(عدد الكراتيين)</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_min_order_number') is-invalid @enderror" type="text" placeholder="" name="product_min_order_number" value="{{ old('product_min_order_number') }}"  required />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_max_order_number') is-invalid @enderror" type="text" placeholder="" name="product_min_order_number" value="{{ old('product_max_order_number') }}"   />
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
                        id="product_category"
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_count_per_unit') is-invalid @enderror" type="text" placeholder="" name="product_count_per_unit" value="{{ old('product_count_per_unit') }}"  required />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('product_model_count_per_unit') is-invalid @enderror" type="text" placeholder="" name="product_model_count_per_unit" value="{{ old('product_model_count_per_unit') }}"  required />
            @error('product_model_count_per_unit')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
    <div class="col-12">
        <h3 class="font-size-lg text-dark mb-6 text-center font-weight-bolder">الشحن</h3>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>الوزن</span>
                <span class="required">*</span>
                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('weight') is-invalid @enderror" type="text" placeholder="" name="weight" value="{{ old('weight') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('cbm') is-invalid @enderror" type="text" placeholder="" name="cbm" value="{{ old('cbm') }}" required  />
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
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('delivery_dates_count') is-invalid @enderror" type="text" placeholder="" name="delivery_dates_count" value="{{ old('delivery_dates_count') }}" required  />
            @error('delivery_dates_count')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
