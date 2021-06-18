<form class="form" method="POST" action="{{ route('RestPassPost') }}" id="kt_login_forgot_form">
    @csrf
    <!--begin::Title-->
    <div class="text-center pb-8">
         <!--begin::Logo-->
         <a href="/" class="text-center pt-2 mb-10 d-block">
            <img src="{{ asset('images/logo.png') }}" class="max-h-150px max-w-150px" alt="" />
        </a>
        <!--end::Logo-->
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__("نسيت كلمة المرور ؟")}}</h2>
        <p class="text-muted font-weight-bold font-size-h4">{{__("Please enter your email to configure password")}}</p>
    </div>
    <!--end::Title-->
    <!--begin::Form group-->
    <div class="form-group">
        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 d-block text-right "
        type="email" placeholder="{{__('البريد الالكتروني')}}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
        oninvalid="this.setCustomValidity('{{__('الرجاء ادخال البريد الالكتروني')}}')"
        oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
      
         <div class="fv-plugins-message-container">
              
                @if (session('status') == "passwords.sent" )
                <div  class="fv-help-block " style="color: #28a745"> 
                 <strong>Password Sent</strong>
                </div>
                @endif
                @if (session('status') == "passwords.throttled" )
                <div  class="fv-help-block"> 
                 <strong>Plesae wait</strong>
                </div>
               @endif
             </div>
               {{-- @error('email')
               <div class="fv-help-block">
                   {{$message}} 
               </div>
               @enderror --}}
                             
            
         </div>
         
    </div>
    <!--end::Form group-->
    <!--begin::Form group-->
    <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
        <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" type="submit">{{__("إرسال")}}</button>
        <a href="{{route('login') }}" id="" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">{{__("رجوع")}}</a>
    </div>
    <!--end::Form group-->
</form>





{{-- <script>

let s = document.getElementsByName("email");
s[0].onkeypress = function(){
    var arabicCharUnicodeRange = /[\u0600-\u06FF]/;
                    var key = event.which;
                var str = String.fromCharCode(key);
                if ( arabicCharUnicodeRange.test(str) )
                {
                  return false;
                }
                return true;
}
</script>
 --}}
