<div class="row " style="">
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
             <!--begin::Form group Nationality-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>الجنسبة</span>
                </label>
                <div class="col-12 col-form-label">
                    <div class="radio-inline">
                        <label class="radio radio-success">
                            <input  value="chinese"
                                    type="radio"
                                    name="nationality"
                                    @if($supplier && $supplier->nationality=="chinese") checked="checked" @endif
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="not_chinese"
                                    type="radio"
                                    name="nationality"
                                    @if($supplier && $supplier->nationality=="not_chinese") checked="checked" @endif
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
        <div class="col-md-6">
             <!--begin::Form group First Name-->
             <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>الاسم</span>
                </label>
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
               <label class="font-size-h6 font-weight-bolder text-dark">
                   <span class="required">*</span>
                   <span>الكنية</span>
               </label>
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="كلمة المرور" name="password" @if($supplier==null) required  @endif autocomplete="off" />
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
            <!--begin::Form group National Number-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>عنوان المحل</span>
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


@push('scripts')
<script>
    $(function(){
        let chinese_properties = `{!! view('auth.components.chinese_properties') !!}`;
        let not_chinese_properties = `{!! view('auth.components.not_chinese_properties') !!}`;
        let bank_account_number_Id = document.getElementById('bank_account_number');
        Inputmask({ mask: "6228999999999" }).mask(bank_account_number_Id);

        $( "input[name='nationality']" ).on('change',function(){
            let selected_value = $(this).val();
            $('#chinese_or_not_div').empty();
            let uploadedDocumentMap = {};
            switch(selected_value){
                case "chinese":
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
                case "not_chinese":
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
