<form class="form" class="w-100" method="POST" action="{{ route('supplier_manager_registeration') }}" id="supplier_registeration_form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIERMANAGER }}">
    <!--begin::Title-->
    <div class="text-center pb-8">
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">إنشاء حساب جديد</h2>
        <p class="text-muted font-weight-bold font-size-h4">الر جاء ادخال المعلومات التالية لإنشاء حساب جديد</p>
    </div>
    <!--end::Title-->
    <div class="row" >
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

    });
</script>
@endpush