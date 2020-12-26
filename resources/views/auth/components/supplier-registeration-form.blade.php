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
                                    title="الرجاء تعبئة هذا الحقل"
                                    @if($supplier && $supplier->ischinese==true) checked="checked" @endif
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="0"
                                    type="radio"
                                    name="ischinese"
                                    title="الرجاء تعبئة هذا الحقل"
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror" type="text" placeholder="الاسم" name="first_name" value="{{$supplier->first_name ??  old('first_name') }}" required autofocus
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                title="الرجاء تعبئة هذا الحقل"/>
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text"  name="name" value="{{$supplier->user->name ?? old('name') }}" required autofocus style="direction:ltr"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                title="الرجاء تعبئة هذا الحقل"
                placeholder="e.g. muhammad"/>
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
                <input id="password_input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="يجب أن تحتوي كلمة المرور على رقم واحد على الأقل وحرف واحد كبير وصغير و 8 أحرف على الأقل أو أكثر" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password" @if($supplier==null) required  @endif autocomplete="off" style="direction:ltr"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"
               />
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

                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password_confirmation" @if($supplier==null) required @endif autocomplete="new-password" style="direction:ltr"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                />
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
            <div class="w-100 d-flex justify-content-between">
                <div class="col">
                    <select id="day_birthdate" name="day" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل" >
                        <option >اليوم</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>

               <div class="col ">
                <select id="month_birthdate" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل" >
                    <option value="">الشهر</option>
                    <option value="01">كانون الثاني</option>
                    <option value="02">شباط</option>
                    <option value="03">آذار</option>
                    <option value="04">نيسان</option>
                    <option value="05">آيار</option>
                    <option value="06">حزيران</option>
                    <option value="07">تموز</option>
                    <option value="08">آب</option>
                    <option value="09">ايلول</option>
                    <option value="10">تشرين الأول</option>
                    <option value="11">تشرين الثاني</option>
                    <option value="12">كانون الأول</option>
                </select>
               </div>
               <div class="col ">
                <select id="year_birthdate" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل">
                    <option value="2011">السنة</option>
                    @for($year=1900;$year<=date("Y");$year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
               </div>
                <input type="hidden" id="birthdate" name="brithdate" value="{{$supplier->brithdate ?? old('brithdate') }}"  />

            </div>
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
                            title="الرجاء تعبئة هذا الحقل"
                            />
                    <span></span>
                    ذكر
                </label>
                <label class="radio radio-success">
                    <input  value="female"
                            type="radio"
                            name="gender"
                            @if($supplier && $supplier->gender=="female") checked="checked" @endif
                            title="الرجاء تعبئة هذا الحقل"
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
           <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="البريد الالكتروني"
            name="email" required value="{{ $supplier->email ?? old('email') }}" autocomplete="off" style="direction:ltr"
            oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"
                title="الرجاء تعبئة هذا الحقل"
                placeholder="example@gmail.com"/>
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
            <span>رقم الموبايل</span>
            <span class="required">*</span>
        </label>
        <input data-inputmask="'regex': '^[0-9]+$'"
            id="phone"
            required
            class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6
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
            oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                title="الرجاء تعبئة هذا الحقل"
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('company_name') is-invalid @enderror" type="text" placeholder="اسم الشركة"
                name="company_name" value="{{$supplier->company_name ??  old('company_name') }}" required autofocus
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                />
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المحل" name="company_shop_address" value="{{$supplier->company_shop_address ?? old('company_shop_address') }}"  autocomplete="off" />
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المكتب" name="company_office_address" value="{{$supplier->company_office_address ?? old('company_office_address') }}"  />
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المستودع" name="company_warehouse_address" value="{{$supplier->company_warehouse_address ?? old('company_warehouse_address') }}"  />
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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المصنع" name="company_factory_address" value="{{$supplier->company_factory_address ?? old('company_factory_address') }}"  title="الرجاء تعبئة هذا الحقل"/>
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
                <div class="w-100 d-flex justify-content-between">
                    <div class="col">
                        <select id="day_company" name="day" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل" >
                            <option >اليوم</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>

                   <div class="col ">
                    <select id="month_company" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 "  title="الرجاء تعبئة هذا الحقل">
                        <option value="">الشهر</option>
                        <option value="01">كانون الثاني</option>
                        <option value="02">شباط</option>
                        <option value="03">آذار</option>
                        <option value="04">نيسان</option>
                        <option value="05">آيار</option>
                        <option value="06">حزيران</option>
                        <option value="07">تموز</option>
                        <option value="08">آب</option>
                        <option value="09">ايلول</option>
                        <option value="10">تشرين الأول</option>
                        <option value="11">تشرين الثاني</option>
                        <option value="12">كانون الأول</option>
                    </select>
                   </div>
                   <div class="col ">
                    <select id="year_company" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل">
                        <option value="2011">السنة</option>
                        @for($year=1900;$year<=date("Y");$year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                   </div>
                    <input type="hidden" id="company_created_at" name="company_created_at" value="{{$supplier->company_created_at ?? old('company_created_at') }}" />

                </div>
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
                <select id="provinceSelector" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="company_address_sector" value="{{$supplier->company_address_sector ?? old('company_address_sector') }}" title="الرجاء تعبئة هذا الحقل">
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
                <select id="cititesSelector" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="city_id" title="الرجاء تعبئة هذا الحقل">
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
                    <span>صورة الرخصة التجارية</span>
                    <span class="required">*</span>
                </label>
                <div id="commercial_license_image" class="dropzone dropzone-default dropzone-primary dz-clickable" title="الرجاء تعبئة هذا الحقل" >
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الصور هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 صورة واحدة كحد اقصى</span>
                    </div>
                </div>

            </div>
            <!--end::Form group National ID Picture-->
        </div>
        <div class="col-md-12">
            <!--begin::Form group National ID Picture-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>صورة العلامة التجارية الخاصة بالشركة</span>
                    <span class="required">*</span>
                </label>
                <div id="company_logo" class="dropzone dropzone-default dropzone-primary dz-clickable" id="" title="الرجاء تعبئة هذا الحقل">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الصور هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 صورة واحدة كحد اقصى</span>
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
                <div class="w-100">
                    <select id="cateogiresSelector" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="categories[]" value="" title="الرجاء تعبئة هذا الحقل">
                        @foreach($categories  as $category)
                            <option value="{{ $category->term_taxonomy_id }}">{{ $category->term->name }}</option>
                        @endforeach
                    </select>
                </div>

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
                <div class="w-100">

                    <select id="CountriesSelector" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="company_countries[]" value="" title="الرجاء تعبئة هذا الحقل">
                        <option @if($supplier && $supplier->company_countries && in_array('تركيا',explode(',',$supplier->company_countries))) selected @endif >تركيا</option>
                        <option @if($supplier && $supplier->company_countries && in_array('الكويت',explode(',',$supplier->company_countries))) selected @endif>الكويت</option>
                        <option @if($supplier && $supplier->company_countries && in_array('إمارات',explode(',',$supplier->company_countries))) selected @endif>إمارات</option>
                        <option @if($supplier && $supplier->company_countries && in_array('قطر',explode(',',$supplier->company_countries))) selected @endif>قطر </option>
                        <option @if($supplier && $supplier->company_countries && in_array('عمان',explode(',',$supplier->company_countries))) selected @endif>عمان</option>
                        <option @if($supplier && $supplier->company_countries && in_array('سوريا',explode(',',$supplier->company_countries))) selected @endif>سوريا</option>
                        <option @if($supplier && $supplier->company_countries && in_array('لبنان',explode(',',$supplier->company_countries))) selected @endif>لبنان</option>
                    </select>

                </div>
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
                <div class="w-100">
                    <select id="ReCountriesSelector" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="countries_which_company_doesnot_work_with[]" value="" title="الرجاء تعبئة هذا الحقل">
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('تركيا',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif >تركيا</option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('الكويت',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>الكويت</option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('إمارات',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>إمارات</option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('قطر',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>قطر </option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('عمان',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>عمان</option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('سوريا',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>سوريا</option>
                        <option @if($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('لبنان',explode(',',$supplier->countries_which_company_doesnot_work_with))) selected @endif>لبنان</option>
                    </select>

                </div>
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
                <div id="license_images" class="dropzone dropzone-default dropzone-primary dz-clickable" id="" title="الرجاء تعبئة هذا الحقل">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الصور هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 10 صور  كحد اقصى</span>
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
                <input id="bank_account_number" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم حساب البنك " name="bank_account_number" value="{{$supplier->bank_account_number ??  old('bank_account_number') }}" required autocomplete="bank_account_number"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                title="الرجاء تعبئة هذا الحقل"
                pattern="6228[0-9]{15}"/>

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
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="اسم صاحب الحساب" name="bank_account_owner_name" value="{{$supplier->bank_account_owner_name  ??  old('bank_account_owner_name') }}" required autocomplete="off"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل" />
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
                <button type="submit" id="create_account"  @if(Route::currentRouteName() != 'supplier.profile' && Route::currentRouteName()!='supplier_manager.suppliers.create' && Route::currentRouteName()!="supplier_manager.suppliers.edit") disabled  @endif class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit"> حفظ</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</button>
            </div>
            <!--end::Form group-->
        </div>

    </div>

@push('styles')

@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('/plugins/telinput/js/intlTelInput.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.ar.js') }}"></script>

<script>
    let cities = {!! json_encode($cities) !!};
    let supplier = {!!  json_encode($supplier)  !!};
    let countries = ["تركيا","قطر","عمان","الكويت","إمارات","سوريا","لبنان"];

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
        $("#day_birthdate").select2({
            dir:"rtl"
        });
        $("#day_company").select2({
            dir:"rtl"
        });
        $("#month_company").select2({
            dir:"rtl"
        });
        $("#year_company").select2({
            dir:"rtl"
        });

        $("#month_birthdate").select2({
            dir:"rtl"
        });
        $("#year_birthdate").select2({
            dir:"rtl"
        });
        $('#day_birthdate,#month_birthdate,#year_birthdate').change(function() {
            $('#birthdate').datepicker('setDate',
                    new Date($('#year_birthdate').val() - 0, $('#month_birthdate').val() - 1, $('#day_birthdate').val() - 0));
            console.log($("#birthdate").val());
        });
        $('#day_company,#month_compnay,#year_company').change(function() {
            $('#company_created_at').datepicker('setDate',
                    new Date($('#year_company').val() - 0, $('#month_company').val() - 1, $('#day_company').val() - 0));
            console.log($("#company_created_at").val());
        });
        $(document).on('change','#provinceSelector',function(){
            let province_id = $(this).val();
            let citiesselector = document.getElementById('cititesSelector');
            citiesselector.options.length = 0;
            let filtered_cities = cities.filter((item)=>{
                return item.province_id == province_id
            });
                let emptyOption = new Option('','');
                citiesselector.add(emptyOption,undefined);
            filtered_cities.forEach((item)=>{
                let newOption = new Option(item.name,item.id,undefined);
                citiesselector.add(newOption);

            })
        });

        $(document).on('change','#CountriesSelector',function(){
            let value = $(this).val();
            let re_countries_selector = document.getElementById("ReCountriesSelector");
                    var re_countries_selector_selected = [...re_countries_selector.options]
                                                    .filter(option => option.selected)
                                                    .map(option => option.value);
            re_countries_selector.options.length = 0;
            for(let c=0;c<countries.length;c++){
                    re_countries_selector.add(new Option(countries[c],countries[c],undefined,re_countries_selector_selected.indexOf(countries[c]) > -1 ? true:false));
            }

            for(let j=0;j<value.length;j++){
                let index = -1;
                for (var i = 0; i < re_countries_selector.length; i++) {
                    var option = re_countries_selector.options[i];
                    if (option.text == value[j]) {
                        index = i;
                        break;
                    }
                }
                re_countries_selector.remove(index);
            }
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
       let  t = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                    $("#kt_datepicker_4").datepicker({
                        rtl: true,
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: t,
                        language: 'ar',
                        endDate:'12/31/2060'

                    });
       $("#kt_datepicker_3").datepicker({
                        rtl: true,
                        todayHighlight: !0,
                        orientation: "bottom left",
                        templates: t,
                        language: 'ar',
                        endDate:'12/31/2060'

                    });
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
                    dictRemoveFile :"احذف الصورة",
                    dictMaxFilesExceeded :"لا يمكنك تحميل المزيد من الصور.",

                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="commercial_license_image" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },

                    removedfile: function (file) {
                        console.log('sdfs');
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
                    dictRemoveFile :"احذف الصورة",
                    dictMaxFilesExceeded :"لا يمكنك تحميل المزيد من الصور.",
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
                    dictRemoveFile :"احذف الصورة",
                    dictMaxFilesExceeded :"لا يمكنك تحميل المزيد من الصور.",
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
                    dictRemoveFile :"احذف الصورة",
                    dictMaxFilesExceeded :"لا يمكنك تحميل المزيد من الصور.",
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
                    Inputmask({ regex: "^[a-zA-Z0-9]{16}$" }).mask(passport_number_id);
                    let passport_image = document.getElementById('passport_image');
                    let visa_image = document.getElementById('visa_image');

                    $("#year_passport").select2({dir:"rtl"});
                    $("#day_passport").select2({dir:"rtl"});
                    $("#month_passport").select2({dir:"rtl"});
                    $('#day_passport,#month_passport,#year_passport').change(function() {
                        $('#passport_end_date').datepicker('setDate',
                                new Date($('#year_passport').val() - 0, $('#month_passport').val() - 1, $('#day_passport').val() - 0));
                        console.log($("#passport_end_date").val());
                    });

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
