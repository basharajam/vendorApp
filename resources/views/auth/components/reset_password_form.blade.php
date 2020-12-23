<form class="form" method="POST" action="{{ route('password.email') }}" id="kt_login_forgot_form">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
         <!--begin::Logo-->
         <a href="/" class="text-center pt-2 mb-10 d-block">
            <img src="{{ asset('images/logo.png') }}" class="max-h-150px max-w-150px" alt="" />
        </a>
        <!--end::Logo-->
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">نسيت كلمة المرور ؟</h2>
        <p class="text-muted font-weight-bold font-size-h4">الرجاء إدخال بريدك الالكتروني من أجل تهيئة كلمة المرور</p>
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 d-block text-right @error('email') is-invalid @enderror" type="email" placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
         @error('email')
         <div class="fv-plugins-message-container">
             <div  class="fv-help-block">{{ $message }}</div>
         </div>
         @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
        <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit">إرسال</button>
        <a href="{{route('login') }}" id="" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">رجوع</a>
    </div>
    <!--end::Form group-->
</form>
