<form class="form" method="POST" action="{{ route('login') }}" id="kt_login_signin_form text-right">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
         <!--begin::Logo-->
         <a href="/" class="text-center mb-5 d-block">
            <img src="{{ asset('images/logo.png') }}" class="max-h-150px" alt="" />
        </a>
        <!--end::Logo-->
        <h2 class="font-weight-bolder text-dark font-size-h1 font-size-h1-lg mb-10 ">{{__('نظام الموردين')}}</h2>
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h2-lg">{{__('تسجيل دخول')}}</h2>
        <span class="text-muted font-weight-bold font-size-h5 d-block">{{__('أو')}}</span>
        <span class="text-muted font-weight-bold font-size-h5"><a href="{{ route('register') }}" class="text-primary font-weight-bolder" >{{__('إنشاء حساب جديد')}}</a></span>
        {{-- <a href="{{ route('supplier_registeration_view') }}" class="text-primary font-weight-bolder" >إنشاء حساب جديد</a></span> --}}
    </div>

    @php
        $lang=app()->getLocale();
    @endphp

    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark @if($lang ==='en') text-left @else text-right @endif d-block">{{__('البريد لالكتروني او اسم المستخدم')}}</label>
        <input class="form-control  h-auto py-7 px-6 rounded-lg  d-block @error('email') is-invalid  @enderror @error('username') is-invalid  @enderror"
               type="text"
               name="cred"
               value="{{ old('cred') }}"
               required
               title="{{__('الرجاء تعبئة هذا الحقل')}}"
               autocomplete="off"
               oninvalid="this.setCustomValidity('الرجاء ادخال بريدك الالكتروني')"
                oninput="setCustomValidity('')"
               />
        @error('email')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{__($message)}}</div>
        </div>
        @enderror
        @error('username')
        <div class="fv-plugins-message-container">
            <div  class="fv-help-block">{{__($message)}}</div>
        </div>
        @enderror
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group">
        <div class="d-flex justify-content-between mt-n5">
            <label class="font-size-h6 font-weight-bolder text-dark pt-5 d-flex w-100 justify-content-between align-items-center  @if($lang ==='en') text-left @else text-right @endif">
                <span>{{__('كلمة المرور')}}</span>
                <a href="{{ route('reset-password-page') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary text-right d-block" id="kt_login_forgot">{{__('نسيت كلمة المرور')}}</a>
            </label>
        </div>
        <input class="form-control  h-auto py-7 px-6 rounded-lg text-right d-block" type="password" name="password"
        required autocomplete="off"   title="الرجاء تعبئة هذا الحقل"
        oninvalid="this.setCustomValidity('الرجاء ادخال كلمة المرور')"
        oninput="setCustomValidity('')"
        />
    </div>
    <!--end::Form group-->
    <!--begin::Action-->
    <div class="text-center pt-2">
        <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">{{__('تسجيل الدخول')}}</button>
    </div>
    <!--end::Action-->
</form>