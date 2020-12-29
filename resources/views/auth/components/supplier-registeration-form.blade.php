@push('styles')
<style>

    /* The message box is shown when the user clicks on the password field */
#strong_container {
  display:block;
  background: transparent;
  color: #000;
  position: relative;
  margin-top: 10px;

}

#strong_container h3{
    font-size:14px;
    font-weight: bold;
}
#strong_container p {
  padding: 10px 10px;
  font-size: 16px;
  margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  direction: ltr;
}

.valid:before {
  position: relative;
  content: "✔";
  left: -3px;
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    direction: ltr;

}

.invalid:before {
  position: relative;
  content: "✖";
  left: -3px;
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
.field-icon {
    position: absolute;
    margin-right: 15px;
    color:#aaa;
    z-index: 2;
    float: right
}

</style>

@endpush

<div class="row" style="">
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
                                    @if(($supplier && $supplier->ischinese==true) || old('ischinese')==1) checked="checked" @endif
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="0"
                                    type="radio"
                                    name="ischinese"
                                    title="الرجاء تعبئة هذا الحقل"
                                    @if(($supplier && $supplier->ischinese==false) || old('ischinese')=='0') checked="checked" @endif
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
              <div class="w-100 d-flex align-items-center" style="position: relative">
                <span toggle="#password_input" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <input id="password_input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="يجب أن تحتوي كلمة المرور على رقم واحد على الأقل وحرف واحد كبير وصغير و 8 أحرف على الأقل أو أكثر" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password" @if($supplier==null) required  @endif autocomplete="off" style="direction:ltr"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"
               />
              </div>
                <div  class="fv-plugins-message-container" id="">
                    <div id="strong_password_message" class="fv-help-block"></div>
                    <div id="strong_container">
                        <h3>يجب أن تحتوي كلمة المرور على ما يلي:</h3>
                        <div class="d-flex justify-content-between">
                              <span id="letter"  class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">حرف صغير</span>
                              <span id="capital" class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">حرف كبير</span>
                              <span id="number"  class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">رقم</span>
                              <span id="length" class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">الحد الادنى 8  احرف</span>
                        </div>
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
            <div class="w-100 d-flex align-items-center" style="position: relative">
                <span toggle="#password_conf" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <input id="password_conf" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password_confirmation" @if($supplier==null) required @endif autocomplete="new-password" style="direction:ltr"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                />
            </div>
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
                    <select id="day_birthdate" name="day" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل"  >
                        <option >اليوم</option>
                        <option value="01" @if(date('d',strtotime(old('brithdate')))==1) selected @endif>1</option>
                        <option value="02" @if(date('d',strtotime(old('brithdate')))==2) selected @endif>2</option>
                        <option value="03" @if(date('d',strtotime(old('brithdate')))==3) selected @endif>3</option>
                        <option value="04" @if(date('d',strtotime(old('brithdate')))==4) selected @endif>4</option>
                        <option value="05" @if(date('d',strtotime(old('brithdate')))==5) selected @endif>5</option>
                        <option value="06" @if(date('d',strtotime(old('brithdate')))==6) selected @endif>6</option>
                        <option value="07" @if(date('d',strtotime(old('brithdate')))==7) selected @endif>7</option>
                        <option value="08" @if(date('d',strtotime(old('brithdate')))==8) selected @endif>8</option>
                        <option value="09" @if(date('d',strtotime(old('brithdate')))==9) selected @endif>9</option>
                        <option value="10" @if(date('d',strtotime(old('brithdate')))==10) selected @endif>10</option>
                        <option value="11" @if(date('d',strtotime(old('brithdate')))==11) selected @endif>11</option>
                        <option value="12" @if(date('d',strtotime(old('brithdate')))==12) selected @endif>12</option>
                        <option value="13" @if(date('d',strtotime(old('brithdate')))==13) selected @endif>13</option>
                        <option value="14" @if(date('d',strtotime(old('brithdate')))==14) selected @endif>14</option>
                        <option value="15" @if(date('d',strtotime(old('brithdate')))==15) selected @endif>15</option>
                        <option value="16" @if(date('d',strtotime(old('brithdate')))==16) selected @endif>16</option>
                        <option value="17" @if(date('d',strtotime(old('brithdate')))==17) selected @endif>17</option>
                        <option value="18" @if(date('d',strtotime(old('brithdate')))==18) selected @endif>18</option>
                        <option value="19" @if(date('d',strtotime(old('brithdate')))==19) selected @endif>19</option>
                        <option value="20" @if(date('d',strtotime(old('brithdate')))==20) selected @endif>20</option>
                        <option value="21" @if(date('d',strtotime(old('brithdate')))==21) selected @endif>21</option>
                        <option value="22" @if(date('d',strtotime(old('brithdate')))==22) selected @endif>22</option>
                        <option value="23" @if(date('d',strtotime(old('brithdate')))==23) selected @endif>23</option>
                        <option value="24" @if(date('d',strtotime(old('brithdate')))==24) selected @endif>24</option>
                        <option value="25" @if(date('d',strtotime(old('brithdate')))==25) selected @endif>25</option>
                        <option value="26" @if(date('d',strtotime(old('brithdate')))==26) selected @endif>26</option>
                        <option value="27" @if(date('d',strtotime(old('brithdate')))==27) selected @endif>27</option>
                        <option value="28" @if(date('d',strtotime(old('brithdate')))==28) selected @endif>28</option>
                        <option value="29" @if(date('d',strtotime(old('brithdate')))==29) selected @endif>29</option>
                        <option value="30" @if(date('d',strtotime(old('brithdate')))==30) selected @endif>30</option>
                        <option value="31" @if(date('d',strtotime(old('brithdate')))==31) selected @endif>31</option>
                    </select>
                </div>

               <div class="col ">
                <select id="month_birthdate" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل" >
                    <option value="">الشهر</option>
                    <option value="01" @if(date('m',strtotime(old('brithdate')))==1) selected @endif>كانون الثاني</option>
                    <option value="02" @if(date('m',strtotime(old('brithdate')))==2) selected @endif>شباط</option>
                    <option value="03" @if(date('m',strtotime(old('brithdate')))==3) selected @endif>آذار</option>
                    <option value="04" @if(date('m',strtotime(old('brithdate')))==4) selected @endif>نيسان</option>
                    <option value="05" @if(date('m',strtotime(old('brithdate')))==5) selected @endif>آيار</option>
                    <option value="06" @if(date('m',strtotime(old('brithdate')))==6) selected @endif>حزيران</option>
                    <option value="07" @if(date('m',strtotime(old('brithdate')))==7) selected @endif>تموز</option>
                    <option value="08" @if(date('m',strtotime(old('brithdate')))==8) selected @endif>آب</option>
                    <option value="09" @if(date('m',strtotime(old('brithdate')))==9) selected @endif>ايلول</option>
                    <option value="10" @if(date('m',strtotime(old('brithdate')))==10) selected @endif>تشرين الأول</option>
                    <option value="11" @if(date('m',strtotime(old('brithdate')))==11) selected @endif>تشرين الثاني</option>
                    <option value="12" @if(date('m',strtotime(old('brithdate')))==12) selected @endif>كانون الأول</option>
                </select>
               </div>
               <div class="col ">
                <select id="year_birthdate" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل">
                    <option value="2011">السنة</option>
                    @for($year=1900;$year<=date("Y");$year++)
                    <option value="{{ $year }}" @if(date('Y',strtotime(old('brithdate')))==$year) selected @endif>{{ $year }}</option>
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
                            @if(($supplier && $supplier->gender=="male") || old('gender')=='male') checked="checked" @endif
                            title="الرجاء تعبئة هذا الحقل"
                            />
                    <span></span>
                    ذكر
                </label>
                <label class="radio radio-success">
                    <input  value="female"
                            type="radio"
                            name="gender"
                            @if(($supplier && $supplier->gender=="female") || old('gender')=='female') checked="checked" @endif
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
        <input type="hidden" value="{{ old('country_code') }}" name="country_code" id="country_code">
        @error('mobile_number')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block"     >{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group User Name-->
</div>

        <div class="col-md-12" id="companyDetails">
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
                            <option value="01" @if(date('d',strtotime(old('company_created_at')))==1) selected @endif>1</option>
                            <option value="02" @if(date('d',strtotime(old('company_created_at')))==2) selected @endif>2</option>
                            <option value="03" @if(date('d',strtotime(old('company_created_at')))==3) selected @endif>3</option>
                            <option value="04" @if(date('d',strtotime(old('company_created_at')))==4) selected @endif>4</option>
                            <option value="05" @if(date('d',strtotime(old('company_created_at')))==5) selected @endif>5</option>
                            <option value="06" @if(date('d',strtotime(old('company_created_at')))==6) selected @endif>6</option>
                            <option value="07" @if(date('d',strtotime(old('company_created_at')))==7) selected @endif>7</option>
                            <option value="08" @if(date('d',strtotime(old('company_created_at')))==8) selected @endif>8</option>
                            <option value="09" @if(date('d',strtotime(old('company_created_at')))==9) selected @endif>9</option>
                            <option value="10" @if(date('d',strtotime(old('company_created_at')))==10) selected @endif>10</option>
                            <option value="11" @if(date('d',strtotime(old('company_created_at')))==11) selected @endif>11</option>
                            <option value="12" @if(date('d',strtotime(old('company_created_at')))==12) selected @endif>12</option>
                            <option value="13" @if(date('d',strtotime(old('company_created_at')))==13) selected @endif>13</option>
                            <option value="14" @if(date('d',strtotime(old('company_created_at')))==14) selected @endif>14</option>
                            <option value="15" @if(date('d',strtotime(old('company_created_at')))==15) selected @endif>15</option>
                            <option value="16" @if(date('d',strtotime(old('company_created_at')))==16) selected @endif>16</option>
                            <option value="17" @if(date('d',strtotime(old('company_created_at')))==17) selected @endif>17</option>
                            <option value="18" @if(date('d',strtotime(old('company_created_at')))==18) selected @endif>18</option>
                            <option value="19" @if(date('d',strtotime(old('company_created_at')))==19) selected @endif>19</option>
                            <option value="20" @if(date('d',strtotime(old('company_created_at')))==20) selected @endif>20</option>
                            <option value="21" @if(date('d',strtotime(old('company_created_at')))==21) selected @endif>21</option>
                            <option value="22" @if(date('d',strtotime(old('company_created_at')))==22) selected @endif>22</option>
                            <option value="23" @if(date('d',strtotime(old('company_created_at')))==23) selected @endif>23</option>
                            <option value="24" @if(date('d',strtotime(old('company_created_at')))==24) selected @endif>24</option>
                            <option value="25" @if(date('d',strtotime(old('company_created_at')))==25) selected @endif>25</option>
                            <option value="26" @if(date('d',strtotime(old('company_created_at')))==26) selected @endif>26</option>
                            <option value="27" @if(date('d',strtotime(old('company_created_at')))==27) selected @endif>27</option>
                            <option value="28" @if(date('d',strtotime(old('company_created_at')))==28) selected @endif>28</option>
                            <option value="29" @if(date('d',strtotime(old('company_created_at')))==29) selected @endif>29</option>
                            <option value="30" @if(date('d',strtotime(old('company_created_at')))==30) selected @endif>30</option>
                            <option value="31" @if(date('d',strtotime(old('company_created_at')))==31) selected @endif>31</option>
                        </select>
                    </div>

                   <div class="col ">
                    <select id="month_company" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 "  title="الرجاء تعبئة هذا الحقل">
                        <option value="">الشهر</option>
                        <option value="01" @if(date('m',strtotime(old('company_created_at')))==1) selected @endif>كانون الثاني</option>
                        <option value="02" @if(date('m',strtotime(old('company_created_at')))==2) selected @endif>شباط</option>
                        <option value="03" @if(date('m',strtotime(old('company_created_at')))==3) selected @endif>آذار</option>
                        <option value="04" @if(date('m',strtotime(old('company_created_at')))==4) selected @endif>نيسان</option>
                        <option value="05" @if(date('m',strtotime(old('company_created_at')))==5) selected @endif>آيار</option>
                        <option value="06" @if(date('m',strtotime(old('company_created_at')))==6) selected @endif>حزيران</option>
                        <option value="07" @if(date('m',strtotime(old('company_created_at')))==7) selected @endif>تموز</option>
                        <option value="08" @if(date('m',strtotime(old('company_created_at')))==8) selected @endif>آب</option>
                        <option value="09" @if(date('m',strtotime(old('company_created_at')))==9) selected @endif>ايلول</option>
                        <option value="10" @if(date('m',strtotime(old('company_created_at')))==10) selected @endif>تشرين الأول</option>
                        <option value="11" @if(date('m',strtotime(old('company_created_at')))==11) selected @endif>تشرين الثاني</option>
                        <option value="12" @if(date('m',strtotime(old('company_created_at')))==12) selected @endif>كانون الأول</option>
                    </select>
                   </div>
                   <div class="col ">
                    <select id="year_company" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل">
                        <option value="">السنة</option>
                        @for($year=1900;$year<=date("Y");$year++)
                        <option value="{{ $year }}" @if(date('Y',strtotime(old('company_created_at')))==$year) selected @endif>{{ $year }}</option>
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
                        <option value="{{ $province->id }}" @if(( $supplier && $supplier->company_address_sector==$province->id)||old('company_address_sector')==$province->id) selected @endif>{{ $province->name }}</option>
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
                        <h3 class="dropzone-msg-title"> قم بإسقاط الصور هنا او انقر للتحميل</h3>
                        <span class="dropzone-msg-desc"> قم برفع صورة واحدة فقط</span>
                    </div>
                </div>
                <input id="commercial_license_image_value" type="hidden" name="commercial_license_image" value="{{ old('commercial_license_image') }}">

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
                        <h3 class="dropzone-msg-title"> قم بإسقاط الصور هنا او انقر للتحميل</h3>
                        <span class="dropzone-msg-desc"> قم برفع صورة واحدة فقط</span>
                    </div>
                </div>
                <input id="company_logo_value" type="hidden" name="company_logo" value="{{ old('company_logo') }}">

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
                            <option value="{{ $category->term_taxonomy_id }}" @if(old('categories') &&  in_array($category->term_taxonomy_id,old('categories'))) selected @endif>{{ $category->term->name }}</option>
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
                        <option @if(($supplier && $supplier->company_countries && in_array('تركيا',explode(',',$supplier->company_countries)))||(old('company_countries') && in_array('تركيا',old('company_countries')))) selected @endif >تركيا</option>
                        <option @if(($supplier && $supplier->company_countries && in_array('الكويت',explode(',',$supplier->company_countries)))|| (old('company_countries') && in_array('الكويت',old('company_countries')))) selected @endif>الكويت</option>
                        <option @if(($supplier && $supplier->company_countries && in_array('إمارات',explode(',',$supplier->company_countries)))|| (old('company_countries') && in_array('إمارات',old('company_countries')))) selected @endif>إمارات</option>
                        <option @if(($supplier && $supplier->company_countries && in_array('قطر',explode(',',$supplier->company_countries))) || (old('company_countries') && in_array('قطر',old('company_countries')))) selected @endif>قطر </option>
                        <option @if(($supplier && $supplier->company_countries && in_array('عمان',explode(',',$supplier->company_countries)))|| (old('company_countries') && in_array('عمان',old('company_countries'))))  selected @endif>عمان</option>
                        <option @if(($supplier && $supplier->company_countries && in_array('سوريا',explode(',',$supplier->company_countries)))|| (old('company_countries') && in_array('سوريا',old('company_countries')))) selected @endif>سوريا</option>
                        <option @if(($supplier && $supplier->company_countries && in_array('لبنان',explode(',',$supplier->company_countries))) || (old('company_countries') && in_array('لبنان',old('company_countries')))) selected @endif>لبنان</option>
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
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('تركيا',explode(',',$supplier->countries_which_company_doesnot_work_with)))||(old('countries_which_company_doesnot_work_with') && in_array('تركيا',old('countries_which_company_doesnot_work_with')))) selected @endif >تركيا</option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('الكويت',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('الكويت',old('countries_which_company_doesnot_work_with')))) selected @endif>الكويت</option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('إمارات',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('إمارات',old('countries_which_company_doesnot_work_with')))) selected @endif>إمارات</option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('قطر',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('قطر',old('countries_which_company_doesnot_work_with')))) selected @endif>قطر </option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('عمان',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('عمان',old('countries_which_company_doesnot_work_with')))) selected @endif>عمان</option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('سوريا',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('سوريا',old('countries_which_company_doesnot_work_with')))) selected @endif>سوريا</option>
                        <option @if(($supplier && $supplier->countries_which_company_doesnot_work_with && in_array('لبنان',explode(',',$supplier->countries_which_company_doesnot_work_with)))|| (old('countries_which_company_doesnot_work_with') && in_array('لبنان',old('countries_which_company_doesnot_work_with')))) selected @endif>لبنان</option>
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
                        <h3 class="dropzone-msg-title"> قم بإسقاط الصور هنا او انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 10 صور  كحد اقصى</span>

                    </div>
                </div>
                @if(old('license_images'))
                    @foreach(old('license_images') as $key=>$value)
                        <input type="hidden" id="license_images_value" name="license_images[]" value="{{ $value }}">
                    @endforeach
                @endif

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
                @auth
                    <a href="{{ route('supplier_manager.suppliers.index') }}" id="kt_login_signup_cancel" class="btn btn-light-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</a>
                @else
                    <a href="{{ route('register') }}" id="kt_login_signup_cancel" class="btn btn-light-dark font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</a>
                @endauth
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
    let old_mobile_number = {{ old('mobile_number') }}
    $(function(){
        validMsg = document.querySelector("#valid-msg");
        let old_country_code = $('#country_code').val();

        const input = document.getElementById("phone");
        var iti = window.intlTelInput(input, {
            separateDialCode: false,
            autoPlaceholder:'aggressive',
            onlyCountries: ['cn'],
            hiddenInput:'mobile_number',
            formatOnDisplay:true,
            utilsScript: "{{ asset('/plugins/telinput/js/utils.js') }}"

        });
        Inputmask({ mask: "99999999999" }).mask(input);
        console.log('ld mobile',old_country_code);

        if(supplier){
            if(supplier.mobile_number.indexOf('+86')!==-1){
                iti.setCountry('cn');
                $('#country_code').val('cn')
            }
            else if(supplier.mobile_number.indexOf('+971')!==-1){
                iti.setCountry('ae');
                $('#country_code').val('ae')

            }

        }
        else if(old_country_code) {
            console.log('ld mobile',old_country_code);
            if(old_country_code=="cn"){
                iti.setCountry('cn');
            }
            else if(old_country_code=='ae'){
                iti.setCountry('ae');

            }
        }
        input.addEventListener("countrychange", function() {
        // do something with iti.getSelectedCountryData()
            if(iti.getSelectedCountryData().iso2=='ae'){
                Inputmask({ mask: "999999999" }).mask(input);
                $('#country_code').val('ae');
            }
            else{
                Inputmask({ mask: "99999999999" }).mask(input);
                $('#country_code').val('cn');
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
        letter.classList.remove("label-light-danger");
        letter.classList.add("valid");
        letter.classList.add("label-light-success");
      } else {
        letter.classList.remove("valid");
        letter.classList.remove("label-light-success");
        letter.classList.add("invalid");
        letter.classList.add("label-light-danger");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.remove("label-light-danger");
        capital.classList.add("valid");
        capital.classList.add("label-light-success");

      } else {
        capital.classList.remove("valid");
        capital.classList.remove("label-light-success");
        capital.classList.add("invalid");
        capital.classList.add("label-light-danger");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.remove("label-light-danger");
        number.classList.add("valid");
        number.classList.add("label-light-success");
      } else {
        number.classList.remove("valid");
        number.classList.remove("label-light-success");
        number.classList.add("invalid");
        number.classList.add("label-light-danger");
      }

      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.remove("label-light-danger");
        length.classList.add("valid");
        length.classList.add("label-light-success");
      } else {
        length.classList.remove("valid");
        length.classList.remove("label-light-success");
        length.classList.add("invalid");
        length.classList.add("label-light-danger");
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
        if($("input[name='ischinese']:checked").val()=="1"){
            init_chinese();
        }
        else if($("input[name='ischinese']:checked").val()=="0"){
            init_not_chinese();
        }
        function init_chinese(){
            $('#chinese_or_not_div').append(chinese_properties);
                    $("#chinese_properties").show();
                    let national_number_id = document.getElementById('national_number');
                    Inputmask({ mask: "999999999999999999" }).mask(national_number_id);
                    let national_id_image = document.getElementById('national_id_image');
                    $dropzone_national_image =new Dropzone('#national_id_image',{
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
                    dictCancelUpload:"إلغاء التحميل",
                    init: function() {
                        this.on("maxfilesexceeded", function(file){
                           toastr.error('لا يمكنك تحميل المزيد من الصور')
                            this.removeFile(file);
                        });
                        let national_image_value = $('#national_image_value').val();
                            if(national_image_value){
                                var mockFile = { name: national_image_value.split('/ ').pop(),size:12345,  type: 'image/'+national_image_value.split('.').pop()};
                                console.log(mockFile);
                                 this.emit('addedfile',mockFile);
                                this.files.push(mockFile);

                                this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+national_image_value );
                                $('.dz-progress').remove();
                                var existingFileCount = 1; // The number of files already uploaded
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            }
                            this.on("addedfile", function (file) {

                            if (this.files.length > this.options.maxFiles) {
                               // this.removeFile(this.files[0]);
                            }

                            });
                    },
                    success: function (file, response) {

                        uploadedDocumentMap[file.name] = response.name
                        $("#national_image_value").val(response.name);

                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        this.options.maxFiles = this.options.maxFiles +1;
                        $('#supplier_registeration_form').find('input[name="national_id_image"][value="' + name + '"]').val('')
                    },

                    });

        }
        function init_not_chinese(){
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

                     $dropzone_passport_image =new Dropzone('#passport_image',{
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
                        dictCancelUpload:"إلغاء التحميل",
                        init: function() {
                            let old_passprot_image = $('#passport_image_value').val();
                            if(old_passprot_image){
                                var mockFile = { name: old_passprot_image.split('/ ').pop(),size:12345,  type: 'image/'+old_passprot_image.split('.').pop()};
                                console.log(mockFile);
                                 this.emit('addedfile',mockFile);
                                 this.files.push(mockFile);
                                this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+old_passprot_image );
                                $('.dz-progress').remove();
                                var existingFileCount = 1; // The number of files already uploaded
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            }


                            this.on("maxfilesexceeded", function(file){
                            toastr.error('لا يمكنك تحميل المزيد من الصور')
                                this.removeFile(file);
                            });
                        },
                        success: function (file, response) {

                            uploadedDocumentMap[file.name] = response.name
                            console.log('response',response);
                            console.log('file',file);
                            $("#passport_image_value").val(response.name);
                        },
                        removedfile: function (file) {
                            file.previewElement.remove()
                            var name = ''
                            if (typeof file.file_name !== 'undefined') {
                                name = file.file_name
                            } else {
                                name = uploadedDocumentMap[file.name]
                            }
                            this.options.maxFiles = this.options.maxFiles +1;
                            $('#supplier_registeration_form').find('input[name="passport_image"][value="' + name + '"]').val('')
                        },

                    });
                     $dropzone_visa_image =new Dropzone('#visa_image',{
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
                        dictCancelUpload:"إلغاء التحميل",
                        init: function() {
                            this.on("maxfilesexceeded", function(file){
                            toastr.error('لا يمكنك تحميل المزيد من الصور')
                                this.removeFile(file);
                            });
                            let old_visa_image = $('#visa_image_value').val();
                            if(old_visa_image){
                                var mockFile = { name: old_visa_image.split('/ ').pop(),size:12345,  type: 'image/'+old_visa_image.split('.').pop()};

                                this.emit('addedfile',mockFile);
                                this.files.push(mockFile);
                                this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+old_visa_image );

                                $('.dz-progress').remove();
                                var existingFileCount = 1; // The number of files already uploaded
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            }
                        },
                        success: function (file, response) {

                            uploadedDocumentMap[file.name] = response.name
                            $("#visa_image_value").val(response.name);
                        },
                        removedfile: function (file) {
                            file.previewElement.remove()
                            var name = ''
                            if (typeof file.file_name !== 'undefined') {
                                name = file.file_name
                            } else {
                                name = uploadedDocumentMap[file.name]
                            }
                            this.options.maxFiles = this.options.maxFiles +1;
                            $('#supplier_registeration_form').find('input[name="visa_image"][value="' + name + '"]').val('')
                        },

                    });
        }

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
        var $CommercialDropzone =new Dropzone('#commercial_license_image',{
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
                    dictCancelUpload:"إلغاء التحميل",
                    init: function() {
                        var dropzone = this;
                        this.on("maxfilesexceeded", function(file){
                           toastr.error('لا يمكنك تحميل المزيد من الصور')
                            this.removeFile(file);
                        });
                        let commercial_license_image = $('#commercial_license_image_value').val();
                            if(commercial_license_image){
                                var mockFile = { name: commercial_license_image.split('/ ').pop(),size:12345,  type: 'image/'+commercial_license_image.split('.').pop()};

                                this.files.push(mockFile);
                                this.emit('addedfile',mockFile);
                                this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+commercial_license_image );
                                $('.dz-progress').remove();
                                var existingFileCount = 1; // The number of files already uploaded
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            }

                    },
                    success: function (file, response) {
                        $("#commercial_license_image_value").val(response.name);
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
                        this.options.maxFiles = this.options.maxFiles + 1;
                        $('#supplier_registeration_form').find('input[name="commercial_license_image"][value="' + name + '"]').val('')
                    },

        });
        var $CompanyDropzone =new Dropzone('#company_logo',{
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
                    dictCancelUpload:"إلغاء التحميل",
                    init: function() {
                        this.on("maxfilesexceeded", function(file){
                           toastr.error('لا يمكنك تحميل المزيد من الصور')
                            this.removeFile(file);
                        });
                        let company_logo_value = $('#company_logo_value').val();
                            if(company_logo_value){
                                var mockFile = { name: company_logo_value.split('/ ').pop(),size:12345,  type: 'image/'+company_logo_value.split('.').pop()};
                                console.log(mockFile);
                                this.emit('addedfile',mockFile);
                                this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+company_logo_value );
                                $('.dz-progress').remove();
                                this.files.push(mockFile);
                                var existingFileCount = 1; // The number of files already uploaded
                                this.options.maxFiles = this.options.maxFiles - existingFileCount;
                            }
                    },
                    success: function (file, response) {
                        uploadedDocumentMap[file.name] = response.name
                        $("#company_logo_value").val(response.name);
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        this.options.maxFiles = this.options.maxFiles +1;
                        $('#supplier_registeration_form').find('input[name="company_logo"][value="' + name + '"]').val()
                    },

        });
        let uploadLicenseImages=[];
        var $CompanyLisenceImages  =new Dropzone('#license_images',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 10,
                    dictRemoveFile :"احذف الصورة",
                    dictMaxFilesExceeded :"لا يمكنك تحميل المزيد من الصور",
                    dictCancelUpload:"إلغاء التحميل",
                    init: function() {
                        this.on("maxfilesexceeded", function(file){
                           toastr.error('لا يمكنك تحميل المزيد من الصور')
                            this.removeFile(file);
                        });
                        //let license_images_value = $('#license_images_value').val();
                        let license_images_value = $("input[name='license_images[]']");
                        console.log('license images ',license_images_value);
                            if(license_images_value.length>0){
                                for(let i=0;i<license_images_value.length;i++)
                                {
                                    uploadLicenseImages.push(license_images_value[i].value);
                                    var mockFile = { name: license_images_value[i].value.split('/ ').pop(),size:12345,  type: 'image/'+license_images_value[i].value.split('.').pop()};
                                    this.emit('addedfile',mockFile);
                                    this.files.push(mockFile);
                                    this.options.thumbnail.call(this,mockFile,'/storage/tmp/uploads/'+license_images_value[i].value );
                                    $('.dz-progress').remove();
                                    this.options.maxFiles = this.options.maxFiles - 1;
                                }
                            }


                    },
                    success: function (file, response) {
                    $('#supplier_registeration_form').append('<input type="hidden" name="license_images[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                        uploadLicenseImages.push(response.name);
                        // console.log('uploadLicenseImages after add',uploadLicenseImages);
                        // $("#license_images_value").val(uploadLicenseImages);
                        // console.log('input value',$("#license_images_value").val());

                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        uploadLicenseImages = uploadLicenseImages.filter((item)=>{
                            return item !=name;
                        });
                        console.log('uploadLicenseImages after remove',uploadLicenseImages);
                        this.options.maxFiles = this.options.maxFiles +1;
                        $('#supplier_registeration_form').find('input[name="license_images"][value="' + name + '"]').remove()
                    },

        });
        var $dropzone_national_image;
        var $dropzone_visa_image;
        var $dropzone_passport_image;
        $( "input[name='ischinese']" ).on('change',function(){
            let selected_value = $(this).val();
            $('#chinese_or_not_div').empty();
            let uploadedDocumentMap = {};
            switch(selected_value){
                case "1":
                init_chinese();
                break;
                case "0":
                init_not_chinese();
                break;

            }
        });
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
            $([document.documentElement, document.body]).animate({
                    scrollTop: $("#companyDetails").offset().top
                }, 2000);
            return false;
        }
        else if($CommercialDropzone.files.length==0){
            e.preventDefault();
            toastr.error("الرجاء رفع صورة الرخصة التجارية");
            $([document.documentElement, document.body]).animate({
                    scrollTop: $("#provinceSelector").offset().top
                }, 2000);
        }
        else if($CompanyDropzone.files.length==0){
            e.preventDefault();
            toastr.error("الرجاء رفع صورة العلامة التجاربة الخاصة بالشركة");
            $([document.documentElement, document.body]).animate({
                    scrollTop: $("#commercial_license_image").offset().top
                }, 2000);
        }
        else if($("input[name='ischinese']:checked").val()=="1" && $dropzone_national_image && $dropzone_national_image.files.length==0){
            e.preventDefault();
            toastr.error("الرجاء رفع صورة عن البطاقة الشخصية");
            $([document.documentElement, document.body]).animate({
                    scrollTop: $("#national_number").offset().top
                }, 2000);
        }
        else if($("input[name='ischinese']:checked").val()=="0" && $dropzone_passport_image && $dropzone_passport_image.files.length==0){
                e.preventDefault();
                toastr.error("الرجاء رفع صورة عن جواز السفر ");
                $([document.documentElement, document.body]).animate({
                        scrollTop: $("#passport_number_id").offset().top
                    }, 2000);

        }
        else if($("input[name='ischinese']:checked").val()=="0" && $dropzone_visa_image && $dropzone_visa_image.files.length==0){
                e.preventDefault();
                toastr.error("الرجاء رفع صورة عن بطاقة التأشيرة الصينية ");
                $([document.documentElement, document.body]).animate({
                        scrollTop: $("#passport_number_id").offset().top
                    }, 2000);
            }
        else{
             return true;
        }
    })
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
$(function(){
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
        input.attr("type", "text");
        } else {
        input.attr("type", "password");
        }
        });
});
</script>
@endpush
