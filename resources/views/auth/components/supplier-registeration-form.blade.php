@push('styles')
<style>

    /* The message box is shown when the user clicks on the password field */
#strong_container {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  margin-top: 10px;

}

#strong_container p {
  padding: 10px 10px;
  font-size: 16px;
  margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:after {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:after {
  position: relative;
  left: -35px;
  content: "✖";
}
#error-msg {
  color: red;
}
#valid-msg {
  color: #00C900;
}
input.error {
  border: 1px solid #FF7C7C;
}
.hide {
  display: none;
}
</style>
@endpush

<div class="row " style="">
        <div class="col-md-12">
             <!--begin::Form group Nationality-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>الجنسية</span>
                    <span class="required">*</span>
                </label>
                <div class="col-12 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-success">
                            <input  value="1"
                                    type="radio"
                                    name="ischinese"
                                    @if($supplier && $supplier->ischinese==true) checked="checked" @endif
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="0"
                                    type="radio"
                                    name="ischinese"
                                    @if($supplier && $supplier->ischinese==false) checked="checked" @endif
                                    />
                            <span></span>
                            لست صيني
                        </label>
                    </div>
                    @error('ischinese')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror

                </div>
            </div>
            <!--end::Form group Nationality-->
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>الاسم الكامل لصاحب الشركة المسجلة داخل الرخصة التجارية</span>
                    <span class="required">*</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror" type="text" placeholder="الاسم" name="first_name" value="{{$supplier->first_name ??  old('first_name') }}" required autofocus />
                @error('first_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <input type="hidden" name="last_name" value="-">
        </div>
        <div class="col-12" id="chinese_or_not_div">

        </div>


       <div class="col-md-12">
            <!--begin::Form group User Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>اسم المستخدم</span>
                    <span class="required">*</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text"  name="name" value="{{$supplier->user->name ?? old('name') }}" required autofocus style="direction:ltr"/>
                @error('name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group User Name-->
       </div>

       <div class="col-md-6">
            <!--begin::Form group Password-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>كلمة المرور</span>
                    <span class="required">*</span>
                </label>
                <input id="password_input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password" @if($supplier==null) required  @endif autocomplete="off" style="direction:ltr"/>
                <div  class="fv-plugins-message-container" id="">
                    <div id="strong_password_message" class="fv-help-block"></div>
                    <div id="strong_container">
                        <h3>يجب أن تحتوي كلمة المرور على ما يلي:</h3>
                        <p id="letter" class="invalid"> حرف صغير</p>
                        <p id="capital" class="invalid">حرف  كبير</p>
                        <p id="number" class="invalid">رقم</p>
                        <p id="length" class="invalid">الحد الادنى 8 احرف</p>
                      </div>
                </div>
                @error('password')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Password-->
       </div>
       <div class="col-md-6">
            <!--begin::Form group Password Confirmation-->
            <div class="form-group">
                 <label class="font-size-h6 font-weight-bolder text-dark text-right d-block">
                <span>تأكيد كلمة المرور</span>
                <span class="required">*</span>
            </label>

                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password_confirmation" @if($supplier==null) required @endif autocomplete="new-password" style="direction:ltr" />
                @error('password_confirmation')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Password Confirmation-->
       </div>
       <div class="col-md-6">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>تاريخ الولادة</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('brithdate') is-invalid @enderror" type="date" placeholder="" name="brithdate" value="{{$supplier->brithdate ?? old('brithdate') }}"   />
            @error('brithdate')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
    </div>
<div class="col-md-6">
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            <span>الجنس</span>
        </label>
        <div class="col-12 col-form-label">
            <div class="radio-inline">
                <label class="radio radio-success">
                    <input  value="male"
                            type="radio"
                            name="gender"
                            @if($supplier && $supplier->gender=="male") checked="checked" @endif
                            />
                    <span></span>
                    ذكر
                </label>
                <label class="radio radio-success">
                    <input  value="female"
                            type="radio"
                            name="gender"
                            @if($supplier && $supplier->gender=="female") checked="checked" @endif
                            />
                    <span></span>
                    انثى
                    </label>
            </div>
            @error('nationality')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror

        </div>
    </div>
</div>
       <div class="col-md-12">
        <!--begin::Form group Email-->
       <div class="form-group">
           <label class="font-size-h6 font-weight-bolder text-dark">
               <span>البريد الالكتروني</span>
               <span class="required">*</span>
           </label>
           <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="البريد الالكتروني" placeholder="" name="email" required value="{{ $supplier->email ?? old('email') }}" autocomplete="off" style="direction:ltr"/>
           @error('email')
           <div class="fv-plugins-message-container">
               <div  class="fv-help-block">{{ $message }}</div>
           </div>
           @enderror
       </div>
       <!--end::Form group Email-->
  </div>
  <div class="col-md-12">
    <!--begin::Form group User Name-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark" style="display: block">
            <span class="required">*</span>
            <span>رقم الموبايل</span>
        </label>
        <input data-inputmask="'regex': '^[0-9]+$'"
            id="phone"
            required
            class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6
            @error('mobile_number') is-invalid @enderror"
            type="text"
            placeholder=""
            name="mobile_number_without_code"

            @if($supplier && strpos($supplier->mobile_number,'+86')==0)
            value = "{{ str_replace('+86','',$supplier->mobile_number) }}"
            @elseif($supplier &&  strpos($supplier->mobile_number,'+971')==0)
            value = "{{ str_replace('+971','',$supplier->mobile_number) }}"
            @else value="{{ old('mobile_number_without_code') }}"
            @endif
              />

        @error('mobile_number')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block"     >{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group User Name-->
</div>

        <div class="col-md-12">
            <!--begin::Form group Company Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>اسم الشركة</span>
                    <span class="required">*</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('company_name') is-invalid @enderror" type="text" placeholder="اسم الشركة" name="company_name" value="{{$supplier->company_name ??  old('company_name') }}" required autofocus />
                @error('company_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Company Name-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span> مقر الشركة (محل, مكتب, مستودع, مصنع)</span>
                    <span class="required">*</span>
                </label>
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المحل</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المحل" name="company_shop_address" value="{{$supplier->company_shop_address ?? old('company_shop_address') }}"  autocomplete="national_number" />
                @error('company_shop_address')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>

        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المكتب</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المكتب" name="company_office_address" value="{{$supplier->company_office_address ?? old('company_office_address') }}"  />
                @error('company_office_address')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المستودع</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المستودع" name="company_warehouse_address" value="{{$supplier->company_warehouse_address ?? old('company_warehouse_address') }}"  />
                @error('company_warehouse_address')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المصنع</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المصنع" name="company_factory_address" value="{{$supplier->company_factory_address ?? old('company_factory_address') }}"  />
                @error('company_factory_address')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>تاريخ انشاء الشركة</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="date" placeholder="" name="company_created_at" value="{{$supplier->company_created_at ?? old('company_created_at') }}" />
                @error('company_created_at')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المقاطعة التي تتبع لها الشركة</span>
                </label>
                <select id="provinceSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="company_address_sector" value="{{$supplier->company_address_sector ?? old('company_address_sector') }}">
                    <option></option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('company_address_sector')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المدينة التي تتبع لها الشركة</span>
                </label>
                <select id="cititesSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="city_id" >
                    <option></option>
                    @foreach($cities as $city)
                        <option @if(($supplier && $supplier->city_id == $city->id )|| old('city_id')==$city->id ) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National ID Picture-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>صورة الرخصة التجارية</span>
                </label>
                <div id="commercial_license_image" class="dropzone dropzone-default dropzone-primary dz-clickable" >
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 ملف واحد كحد اقصى</span>
                    </div>
                </div>

            </div>
            <!--end::Form group National ID Picture-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National ID Picture-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>صورة العلامة التجارية الخاصة بالشركة</span>
                </label>
                <div id="company_logo" class="dropzone dropzone-default dropzone-primary dz-clickable" id="">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 ملف واحد كحد اقصى</span>
                    </div>
                </div>

            </div>
            <!--end::Form group National ID Picture-->
        </div>


        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>المنتجات التي تعمل بها الشركة</span>
                </label>
                <select id="cateogiresSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="categories[]" value="">
                    @foreach($categories  as $category)
                        <option value="{{ $category->term_taxonomy_id }}">{{ $category->term->name }}</option>
                    @endforeach
                </select>
                @error('company_address_city')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>اهم الدول التي تعمل بها الشركة</span>
                </label>
                <select id="CountriesSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="company_countries[]" value="">
                    <option @if($supplier && $supplier->company_countries && in_array('تركيا',explode(',',$supplier->company_countries))) selected @endif >تركيا</option>
                    <option @if($supplier && $supplier->company_countries && in_array('الكويت',explode(',',$supplier->company_countries))) selected @endif>الكويت </option>
                    <option @if($supplier && $supplier->company_countries && in_array('إمارات',explode(',',$supplier->company_countries))) selected @endif>إمارات  </option>
                    <option @if($supplier && $supplier->company_countries && in_array('قطر',explode(',',$supplier->company_countries))) selected @endif>قطر </option>
                    <option @if($supplier && $supplier->company_countries && in_array('عمان',explode(',',$supplier->company_countries))) selected @endif>عمان</option>
                    <option  @if($supplier && $supplier->company_countries && in_array('سوريا',explode(',',$supplier->company_countries))) selected @endif>سوريا</option>
                    <option @if($supplier && $supplier->company_countries && in_array('لبنان',explode(',',$supplier->company_countries))) selected @endif>لبنان</option>
                </select>
                @error('company_address_city')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>الدول التي لا يمكن بيع المنتجات لها</span>
                </label>
                <select id="ReCountriesSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="countries_which_company_doesnot_work_with[]" value="">
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('تركيا',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif >تركيا</option>
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('الكويت',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>الكويت </option>
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('إمارات',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>إمارات  </option>
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('قطر',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>قطر </option>
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('عمان',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>عمان</option>
                    <option  @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('سوريا',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>سوريا</option>
                    <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('لبنان',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>لبنان</option>
                </select>
                @error('company_address_city')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group National Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National ID Picture-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>صورة الشهادات لدى الشركة</span>
                </label>
                <div id="license_images" class="dropzone dropzone-default dropzone-primary dz-clickable" id="">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 10 ملفات  كحد اقصى</span>
                    </div>
                </div>

            </div>
            <!--end::Form group National ID Picture-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group Bank Account Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>رقم الحساب في البنك الزراعي
                    </span>
                    <span class="required">*</span>
                </label>
                <input id="bank_account_number" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم حساب البنك " name="bank_account_number" value="{{$supplier->bank_account_number ??  old('bank_account_number') }}" required autocomplete="bank_account_number" />
                @error('bank_account_number')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Bank Account Number-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group Bank Account Owner Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>اسم صاحب الحساب
                    </span>
                    <span class="required">*</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="اسم صاحب الحساب" name="bank_account_owner_name" value="{{$supplier->bank_account_owner_name  ??  old('bank_account_owner_name') }}" required autocomplete="national_number" />
                @error('bank_account_owner_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Bank Account Owner Name-->
        </div>
        @if(Route::currentRouteName() != 'supplier.profile' && Route::currentRouteName()!='supplier_manager.suppliers.create' && Route::currentRouteName()!="supplier_manager.suppliers.edit")
        <div class="col-md-12">
            <!--begin::Form group Terms And Conditions-->
            @include('auth.components.terms_and_conditions')
            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox">
                    <input type="checkbox" name="terms_and_conditions">
                    <span></span>لقد قرأت ووافقت على الشروط و الأحكام</label>

                </div>
            </div>
            <!--end::Form group Bank Account Owner Name-->
        </div>
        @endif

        <div class="col-md-12">
             <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="create_account"  @if(Route::currentRouteName() != 'supplier.profile' && Route::currentRouteName()!='supplier_manager.suppliers.create' && Route::currentRouteName()!="supplier_manager.suppliers.edit") disabled  @endif class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit"> حفظ</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</button>
            </div>
            <!--end::Form group-->
        </div>

    </div>

@push('styles')

@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('/plugins/telinput/js/intlTelInput.js') }}"></script>
{{-- <script src="{{ asset('/plugins/telinput/js/utils.js') }}"></script> --}}

<script>
    let cities = {!! json_encode($cities) !!};
    let supplier = {!!  json_encode($supplier)  !!};
    console.log(supplier.mobile_number);
    $(function(){
        validMsg = document.querySelector("#valid-msg");


        const input = document.getElementById("phone");
        var iti = window.intlTelInput(input, {
            separateDialCode: false,
            autoPlaceholder:'aggressive',
            onlyCountries: ['ae','cn'],
            hiddenInput:'mobile_number',
            formatOnDisplay:true,
            utilsScript: "{{ asset('/plugins/telinput/js/utils.js') }}"
        });
        Inputmask({ mask: "99999999999" }).mask(input);
        if(supplier){
            if(supplier.mobile_number.indexOf('+86')!==-1){
                iti.setCountry('cn');
            }
            else if(supplier.mobile_number.indexOf('+971')!==-1){
                iti.setCountry('ae');
            }

        }
        input.addEventListener("countrychange", function() {
        // do something with iti.getSelectedCountryData()
            if(iti.getSelectedCountryData().iso2=='ae'){
                Inputmask({ mask: "999999999" }).mask(input);
            }
            else{
                Inputmask({ mask: "99999999999" }).mask(input);

            }
        });
        $("#cateogiresSelector").select2({
            dir: "rtl",
        });
        $("#CountriesSelector").select2({
            dir: "rtl",
        });
        $("#ReCountriesSelector").select2({
            dir: "rtl",
        });
        $("#cititesSelector").select2({
            dir: "rtl",
        });
        $("#provinceSelector").select2({
            dir: "rtl",
        });
        $("#provinceSelector").on('change',function(){
            $("#cititesSelector").empty();
            let province_id = $(this).val();
            let citiesselector = document.getElementById('cititesSelector');
            let filtered_cities = cities.filter((item)=>{
                return item.province_id = province_id
            });
                let emptyOption = new Option('','');
                citiesselector.add(emptyOption,undefined);
            filtered_cities.forEach((item)=>{
                let newOption = new Option(item.name,item.id);
                citiesselector.add(newOption,undefined);

            })
        })
    })
</script>
<script>
    var myInput = document.getElementById("password_input");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("strong_container").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("strong_container").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
    </script>

<script>
    Dropzone.autoDiscover = false;
    $(function(){
        let chinese_properties = `{!! view('auth.components.chinese_properties') !!}`;
        let not_chinese_properties = `{!! view('auth.components.not_chinese_properties') !!}`;
        let bank_account_number_Id = document.getElementById('bank_account_number');
        Inputmask({ mask: "6228999999999999999" }).mask(bank_account_number_Id);
       // Inputmask().mask(document.querySelectorAll("input"));

        let uploadedDocumentMap = {};
        let $CommercialDropzone =new Dropzone('#commercial_license_image',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 1,
                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="commercial_license_image" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#supplier_registeration_form').find('input[name="commercial_license_image"][value="' + name + '"]').remove()
                    },

        });
        let $CompanyDropzone =new Dropzone('#company_logo',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 1,
                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="company_logo" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#supplier_registeration_form').find('input[name="company_logo"][value="' + name + '"]').remove()
                    },

        });
        let $LicensesDropzone =new Dropzone('#license_images',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 10,
                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="license_images" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#supplier_registeration_form').find('input[name="license_images"][value="' + name + '"]').remove()
                    },

        });
        $( "input[name='ischinese']" ).on('change',function(){
            let selected_value = $(this).val();
            $('#chinese_or_not_div').empty();
            console.log('selected chinese or not',selected_value);
            let uploadedDocumentMap = {};
            switch(selected_value){
                case "1":
                    $('#chinese_or_not_div').append(chinese_properties);
                    $("#chinese_properties").show();
                    let national_number_id = document.getElementById('national_number');
                    Inputmask({ mask: "999999999999999999" }).mask(national_number_id);
                    let national_id_image = document.getElementById('national_id_image');
                    let $dropzone =new Dropzone('#national_id_image',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 1,
                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="national_id_image" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#supplier_registeration_form').find('input[name="national_id_image"][value="' + name + '"]').remove()
                    },

                    });

                break;
                case "0":
                    $('#chinese_or_not_div').append(not_chinese_properties);
                    $("#not_chinese_properties").show();
                    let passport_number_id = document.getElementById('passport_number_id');
                    Inputmask({ regex: "^[a-zA-Z0-9]+$" }).mask(passport_number_id);
                    let passport_image = document.getElementById('passport_image');
                    let visa_image = document.getElementById('visa_image');
                    let $dropzone_passport_image =new Dropzone('#passport_image',{
                        url:   '{{ route('supplier.storeImage') }}',
                        addRemoveLinks: true,
                        headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                        method:'POST',
                        maxFiles: 1,
                        success: function (file, response) {
                        $('#supplier_registeration_form').append('<input type="hidden" name="passport_image" value="' + response.name + '">')
                            uploadedDocumentMap[file.name] = response.name
                        },
                        removedfile: function (file) {
                            file.previewElement.remove()
                            var name = ''
                            if (typeof file.file_name !== 'undefined') {
                                name = file.file_name
                            } else {
                                name = uploadedDocumentMap[file.name]
                            }
                            $('#supplier_registeration_form').find('input[name="passport_image"][value="' + name + '"]').remove()
                        },

                    });
                    let $dropzone_visa_image =new Dropzone('#visa_image',{
                        url:   '{{ route('supplier.storeImage') }}',
                        addRemoveLinks: true,
                        headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                        method:'POST',
                        maxFiles: 1,
                        success: function (file, response) {
                        $('#supplier_registeration_form').append('<input type="hidden" name="visa_image" value="' + response.name + '">')
                            uploadedDocumentMap[file.name] = response.name
                        },
                        removedfile: function (file) {
                            file.previewElement.remove()
                            var name = ''
                            if (typeof file.file_name !== 'undefined') {
                                name = file.file_name
                            } else {
                                name = uploadedDocumentMap[file.name]
                            }
                            $('#supplier_registeration_form').find('input[name="visa_image"][value="' + name + '"]').remove()
                        },

                    });
                  break;

            }
        });
    });
</script>
<script>
    $(function(){
        $(function(){
        $("input[name='terms_and_conditions']").on('change',function(){
            if($(this).is(':checked')){
                document.getElementById('create_account').disabled = false;
            }
            else{
                document.getElementById('create_account').disabled = true;
            }
        });
    });
    });
</script>
<script>
    $("#supplier_registeration_form").on('submit',function(e){
        var company_shop_address = document.getElementsByName('company_shop_address')[0].value;
        var company_office_address = document.getElementsByName('company_office_address')[0].value;
        var company_warehouse_address = document.getElementsByName('company_warehouse_address')[0].value;
        var company_factory_address = document.getElementsByName('company_factory_address')[0].value;
        console.log(company_shop_address.length)
        if (
            (company_shop_address.length==0)
            &&
            (company_office_address.length==0)
            &&
            (company_warehouse_address.length==0)
            &&
            (company_factory_address.length==0)
            ) {
            e.preventDefault();
            toastr.error("الرجاء ادخال احد عنواين الشركة");
            return false;
        }
        else{
            return true;
        }
    })
</script>
@endpush
