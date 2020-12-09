<div class="row " style="">
        <div class="col-md-12">
             <!--begin::Form group Nationality-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>الجنسية</span>
                </label>
                <div class="col-12 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-success">
                            <input  value="true"
                                    type="radio"
                                    name="nationality"
                                    @if($supplier && $supplier->ischinese==true) checked="checked" @endif
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="false"
                                    type="radio"
                                    name="nationality"
                                    @if($supplier && $supplier->ischinese==false) checked="checked" @endif
                                    />
                            <span></span>
                            لست صيني
                        </label>
                    </div>
                    @error('nationality')
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
                    <span class="required">*</span>
                    <span>الاسم الكامل لصاحب الشركة المسجلة داخل الرخصة التجارية</span>
                </label>
            </div>

        </div>
        <div class="col-md-6">
             <!--begin::Form group First Name-->
             <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror" type="text" placeholder="الاسم" name="first_name" value="{{$supplier->first_name ??  old('first_name') }}" required autofocus />
                @error('first_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group First Name-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group Last Name-->
            <div class="form-group">
               <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('last_name') is-invalid @enderror" type="text" placeholder="الكنية" name="last_name" value="{{ $supplier->last_name ?? old('last_name') }}" required autofocus />
               @error('last_name')
               <div class="fv-plugins-message-container">
                   <div  class="fv-help-block">{{ $message }}</div>
               </div>
               @enderror
           </div>
           <!--end::Form group Last Name-->
       </div>
       <div class="col-md-6">
        <!--begin::Form group User Name-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span>العمر</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('age') is-invalid @enderror" type="text" placeholder="العمر" name="age" value="{{$supplier->age ?? old('age') }}"   />
            @error('age')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group User Name-->
   </div>
   <div class="col-md-6">
        <!--begin::Form group Nationality-->
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
    <!--end::Form group Nationality-->
    </div>
<div class="col-md-12">
    <!--begin::Form group User Name-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            <span class="required">*</span>
            <span>رقم الموبايل</span>
        </label>
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('mobile_number') is-invalid @enderror" type="text" placeholder="" name="mobile_number" value="{{$supplier->mobile_number ?? old('mobile_number') }}" required  />
        @error('mobile_number')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group User Name-->
</div>
       <div class="col-md-6">
            <!--begin::Form group User Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>اسم المستخدم</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text" placeholder="اسم المستخدم" name="name" value="{{$supplier->user->name ?? old('name') }}" required autofocus />
                @error('name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group User Name-->
       </div>
       <div class="col-md-6">
             <!--begin::Form group Email-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>البريد الالكتروني</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="البريد الالكتروني" placeholder="Email" name="email" required value="{{ $supplier->email ?? old('email') }}" autocomplete="off" />
                @error('email')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Email-->
       </div>
       <div class="col-md-6">
            <!--begin::Form group Password-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>كلمة المرور</span>
                </label>
                <input id="password_input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="كلمة المرور" name="password" @if($supplier==null) required  @endif autocomplete="off" />
                <div  class="fv-plugins-message-container" id="">
                    <div id="strong_password_message" class="fv-help-block"></div>
                    <div id="strong_container">
                        <h3>يجب أن تحتوي كلمة المرور على ما يلي:</h3>
                        <p id="letter" class="invalid">صغير حرف</p>
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
            <label class="font-size-h6 font-weight-bolder text-dark text-right d-block">
                <span class="required">*</span>
                <span>تأكيد كلمة المرور</span>
            </label>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" @if($supplier==null) required @endif autocomplete="new-password" />
                @error('password_confirmation')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Password Confirmation-->
       </div>
       <!--CHines or not-->
       <div class="col-12" id="chinese_or_not_div">

        </div>

        <div class="col-md-12">
            <!--begin::Form group Company Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>اسم الشركة</span>
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
                    <span class="required">*</span>
                    <span> مقر الشركة (محل, مكتب, مستودع, مصنع)</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المحل" name="shop_address" value="{{$supplier->shop_address ?? old('shop_address') }}" required autocomplete="national_number" />
                @error('shop_address')
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
                    <span> عمل الشركة (عدد السنوات)</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="comany_since" value="{{$supplier->comany_since ?? old('comany_since') }}" />
                @error('comany_since')
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
                <select class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="company_address_sector" value="{{$supplier->company_address_sector ?? old('company_address_sector') }}">
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
                    <span>المدبنة التي تتبع لها الشركة</span>
                </label>
                <select class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="company_address_city" value="{{$supplier->company_address_city ?? old('company_address_city') }}">
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
            {{-- <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>صورة الرخصة التجارية</span>
                </label>
                <div id="commercial_license_image" class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_10">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 ملف واحد كحد اقصى</span>
                    </div>
                </div>

            </div> --}}
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
                <select id="CountriesSelector" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" multiple type="text" placeholder="" name="countries[]" value="">
                    <option value="">تركيا</option>
                    <option value="">الكويت </option>
                    <option value="">إمارات  </option>
                    <option value="">قطر </option>
                    <option value="">عمان</option>
                    <option value="">سوريا</option>
                    <option value="">لبنان</option>
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
            {{-- <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>صورة الرخصة التجارية</span>
                </label>
                <div id="commercial_license_image" class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_10">
                    <div class="dropzone-msg dz-message needsclick">
                        <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                        <span class="dropzone-msg-desc">قم برفع 1 ملف واحد كحد اقصى</span>
                    </div>
                </div>

            </div> --}}
            <!--end::Form group National ID Picture-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group Bank Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>اسم البنك</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="اسم البنك" name="bank_name" value="{{ $supplier->bank_name ?? old('bank_name') }}" required autocomplete="national_number" />
                @error('bank_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ $message }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Bank Name-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group Bank Account Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>رقم حساب البنك
                    </span>
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
                    <span class="required">*</span>
                    <span>اسم صاحب الحساب
                    </span>
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
        <div class="col-md-12">
            <!--begin::Form group Terms And Conditions-->
            @include('auth.components.terms_and_conditions')
            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox">
                    <input type="checkbox">
                    <span></span>لقد قرأت ووافقت على الشروط و الأحكام</label>

                </div>
            </div>
            <!--end::Form group Bank Account Owner Name-->
        </div>
        <div class="col-md-12">
             <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit"> حفظ</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</button>
            </div>
            <!--end::Form group-->
        </div>

    </div>

@push('styles')

</style>
@endpush
@push('scripts')
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

{{-- <script>
    function CheckPassword(inputtxt)
    {
        var passw=  /^[A-Za-z]\w{7,14}$/;
        if(inputtxt.match(passw))
        {
            $("#strong_password_message").text('كلمة مرور قوية');
            $("#strong_password_message").css('color','green');

            return true;
        }
        else
        {
            $("#strong_password_message").text('الرجاء ادخال كلمة مرور من 7 الى 15 حرفاً تحتوي على احرف وارقام و رموز و تبدأ بحرف')
            return false;
        }
    }
    $(function(){
        $("#password_input").on('change',function(){
            let value = $(this).val();
            CheckPassword(value);
        })
    })
</script> --}}

<script>
    $(function(){
        let chinese_properties = `{!! view('auth.components.chinese_properties') !!}`;
        let not_chinese_properties = `{!! view('auth.components.not_chinese_properties') !!}`;
        let bank_account_number_Id = document.getElementById('bank_account_number');
        Inputmask({ mask: "6228999999999" }).mask(bank_account_number_Id);
        let commercial_license_image = document.getElementById('commercial_license_image');
        $( "input[name='nationality']" ).on('change',function(){
            let selected_value = $(this).val();
            $('#chinese_or_not_div').empty();
            let uploadedDocumentMap = {};
            switch(selected_value){
                case "true":
                    $('#chinese_or_not_div').append(chinese_properties);
                    $("#chinese_properties").show();
                    let national_number_id = document.getElementById('national_number');
                    Inputmask({ regex: "^[a-zA-Z0-9]+$" }).mask(national_number_id);
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
                case "false":
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
@endpush
