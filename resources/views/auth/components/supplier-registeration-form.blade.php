<form class="form" class="w-100" method="POST" action="{{ route('supplier_registeration') }}" id="supplier_registeration_form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
    <!--begin::Title-->
    <div class="text-center pb-8">
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">إنشاء حساب جديد</h2>
        <p class="text-muted font-weight-bold font-size-h4">الر جاء ادخال المعلومات التالية لإنشاء حساب جديد</p>
    </div>
    <!--end::Title-->
    <div class="row" >
        <div class="col-md-12">
            <!--begin::Form group Company Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>اسم الشركة</span>
                </label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('company_name') is-invalid @enderror" type="text" placeholder="اسم الشركة" name="company_name" value="{{ old('company_name') }}" required autofocus />
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
                                    />
                            <span></span>
                            صيني
                        </label>
                        <label class="radio radio-success">
                            <input  value="not_chinese"
                                    type="radio"
                                    name="nationality"
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror" type="text" placeholder="الاسم" name="first_name" value="{{ old('first_name') }}" required autofocus />
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
               <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('last_name') is-invalid @enderror" type="text" placeholder="الكنية" name="last_name" value="{{ old('last_name') }}" required autofocus />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text" placeholder="اسم المستخدم" name="name" value="{{ old('name') }}" required autofocus />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="البريد الالكتروني" placeholder="Email" name="email" required value="{{ old('email') }}" autocomplete="off" />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="كلمة المرور" name="password" required autocomplete="off" />
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
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>تأكيد كلمة المرور</span>
            </label>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required autocomplete="new-password" />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="عنوان المحل" name="shop_address" value="{{ old('shop_address') }}" required autocomplete="national_number" />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="اسم البنك" name="bank_name" value="{{ old('bank_name') }}" required autocomplete="national_number" />
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
                <input id="bank_account_number" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم حساب البنك " name="bank_account_number" value="{{ old('bank_account_number') }}" required autocomplete="bank_account_number" />
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
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="اسم صاحب الحساب" name="bank_account_owner_name" value="{{ old('bank_account_owner_name') }}" required autocomplete="national_number" />
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
                    <span></span>لقد قرأت ووافقت على الشرو و الأحكام</label>

                </div>
            </div>
            <!--end::Form group Bank Account Owner Name-->
        </div>
        <div class="col-md-12">
             <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit" id="" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit"> إنشاء حساب</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</button>
            </div>
            <!--end::Form group-->
        </div>

    </div>
</form>

@push('scripts')
<script>
    $(function(){
        let chinese_properties = `{!! view('auth.components.chinese_properties') !!}`;
        let not_chinese_properties = `{!! view('auth.components.not_chinese_properties') !!}`;
        let bank_account_number_Id = document.getElementById('bank_account_number');
        Inputmask({ mask: "62289999999999" }).mask(bank_account_number_Id);

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
                    url:   '{{ route('supplier.storeNationalImage') }}',
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
                    init: function() {
                        //for edit supplier page
                        @if(isset($supplier) && $supplier->national_id_image)
                                var files =
                                {!! json_encode($supplier->national_id_image) !!}
                                for (var i in files) {
                                var file = files[i]
                                this.options.addedfile.call(this, file)
                                file.previewElement.classList.add('dz-complete')
                                $('#supplier_registeration_form').append('<input type="hidden" name="national_id_image" value="' + file.file_name + '">')
                                }
                            @endif
                        // this.on("addedfile", function(file) {
                        // //

                        // //
                        // });
                        // this.on("maxfilesexceeded", function(file) {
                        //     //alert('max files exceeded');
                        //     // handle max+1 file.
                        // });
                        // this.on('sending', function (data, xhr, formData) {
                        //       console.log('data',data.dataURL);
                        //       console.log('formData',formData);
                        // });
                        // this.on('complete',function(file){
                        //         console.log('file on complete',file.url);
                        //         // console.log($('#national_id_image .dz-image img')[0].src)
                        //         $('#nationalImage').value = $('#national_id_image .dz-image img')[0].src;
                        // });
                    }
                    });

                break;
                case "not_chinese":
                    $('#chinese_or_not_div').append(not_chinese_properties);
                    $("#not_chinese_properties").show();
                    let passport_number_id = document.getElementById('passport_number_id');
                    Inputmask({ regex: "^[a-zA-Z0-9]+$" }).mask(passport_number_id);
                  break;

            }
        });
    });
</script>
@endpush
