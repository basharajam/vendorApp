<div class="kt-portlet" id="GeneralInfo" style="diaplay:none" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">معلومات المنتج العامة</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store') }}" method="post">
            @csrf
            <input type="hidden" name="supplier_name" value="{{ \Auth::user()->name }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>السعر</span>
                            <span class="required">*</span>

                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_regular_price') is-invalid @enderror" type="text" placeholder="" name="_regular_price" value="{{ old('_regular_price') }}" required  />
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
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_sale_price') is-invalid @enderror" type="text" placeholder="" name="_sale_price" value="{{old('_sale_price') }}" required  />
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
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('material') is-invalid @enderror" type="text" placeholder="" name="material" value="{{old('material') }}" required  />
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
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('thickness') is-invalid @enderror" type="text" placeholder="" name="thickness" value="{{ old('thickness') }}"   />
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
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('printing_single') is-invalid @enderror" type="text" placeholder="" name="printing_single" value="{{  old('printing_single') }}"   />
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
                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('size') is-invalid @enderror" type="text" placeholder="" name="size" value="{{ old('size') }}" required  />
                    @error('size')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror

                </div>
            </div>
            <div class="form-group row mt-10 mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary ">
                        حفظ
                        <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
                    </button>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
