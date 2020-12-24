<form class="form" method="POST" action="{{ route('login') }}" id="kt_login_signin_form text-right">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
         <!--begin::Logo-->
         <a href="/" class="text-center pt-2 mb-5 d-block">
            <img src="{{ asset('images/logo.png') }}" class="max-h-150px max-w-150px" alt="" />
        </a>
        <!--end::Logo-->
        <h2 class="font-weight-bolder text-dark font-size-h1 font-size-h1-lg mb-10 system-color ">نظام الموردين</h2>
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h2-lg">تسجيل دخول</h2>
        <span class="text-muted font-weight-bold font-size-h5 d-block">أو</span>
        <span class="text-muted font-weight-bold font-size-h5"><a href="{{ route('register') }}" class="text-primary font-weight-bolder" >إنشاء حساب جديد</a></span>
        {{-- <a href="{{ route('supplier_registeration_view') }}" class="text-primary font-weight-bolder" >إنشاء حساب جديد</a></span> --}}
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark text-right d-block">البريد الالكتروني</label>
        <input class="form-control  h-auto py-7 px-6 rounded-lg text-right d-block @error('email') is-invalid  @enderror"
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
            <label class="font-size-h6 font-weight-bolder text-dark pt-5 text-right d-flex w-100 justify-content-between align-items-center">
                <span>كلمة المرور</span>
                <a href="{{ route('reset-password-page') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary  text-right d-block" id="kt_login_forgot"> نسيت كلمة المرور ؟</a>
            </label>
        </div>
        <input class="form-control  h-auto py-7 px-6 rounded-lg text-right d-block" type="password" name="password" required autocomplete="off" />
    </div>
    <!--end::Form group-->
    <!--begin::Action-->
    <div class="text-center pt-2">
        <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">تسجيل الدخول</button>
    </div>
    <!--end::Action-->
</form>
