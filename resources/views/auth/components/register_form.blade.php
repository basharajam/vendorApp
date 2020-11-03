<form class="form" method="POST" action="{{ route('register') }}" id="kt_login_signup_form">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">إنشاء حساب جديد</h2>
        <p class="text-muted font-weight-bold font-size-h4">الر جاء ادخال المعلومات التالية لإنشاء حساب جديد</p>
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror" type="text" placeholder="الاسم بالكامل" name="name" value="{{ old('name') }}" required autofocus />
        @error('name')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" type="البريد الالكتروني" placeholder="Email" name="email" required value="{{ old('email') }}" autocomplete="off" />
        @error('email')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="كلمة المرور" name="password" required autocomplete="off" />
        @error('password')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required autocomplete="new-password" />
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
        <button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit">إرسال</button>
        <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">إلغاء</button>
    </div>
    <!--end::Form group-->
</form>
