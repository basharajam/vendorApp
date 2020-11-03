<form class="form" method="POST" action="{{ route('login') }}" id="kt_login_signin_form">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">تسجيل دخول</h2>
        <span class="text-muted font-weight-bold font-size-h4">أو
        <a href="" class="text-primary font-weight-bolder" id="kt_login_signup">إنشاء حساب جديد</a></span>
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">البردي الالكتروني</label>
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid  @enderror"
               type="text"
               name="email"
               value="{{ old('email') }}"
               required
               autocomplete="off" />
        @error('email')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{ $message }}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <div class="d-flex justify-content-between mt-n5">
            <label class="font-size-h6 font-weight-bolder text-dark pt-5">كلمة المرور</label>
            <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">نسيت كلمة المرور ?</a>
        </div>
        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" required autocomplete="off" />
    </div>
    <!--end::Form group-->
    <!--begin::Action-->
    <div class="text-center pt-2">
        <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">تسجيل الدخول</button>
    </div>
    <!--end::Action-->
</form>
