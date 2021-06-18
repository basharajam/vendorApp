@push('styles')
<style>

    /* The message box is shown when the user clicks on the password field */
#strong_container {
  display:block;
  background: transparent;
  color: #000;
  position: relative;
  margin-top: 10px;

}

#strong_container h3{
    font-size:14px;
    font-weight: bold;
}
#strong_container p {
  padding: 10px 10px;
  font-size: 16px;
  margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  direction: ltr;
}

.valid:before {
  position: relative;
  content: "✔";
  left: -3px;
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    direction: ltr;

}

.invalid:before {
  position: relative;
  content: "✖";
  left: -3px;
}
#error-msg {
  color: red;
}
#valid-msg {
  color: #00C900;
}
input.error {
  border: 1px solid #FF7C7C;
}
.hide {
  display: none;
}
.field-icon {
    position: absolute;
    margin-right: 15px;
    color:#aaa;
    z-index: 2;
    float: right
}
</style>
@endpush
<form class="form" class="w-100" method="POST" action="{{ route('supplier_manager_registeration') }}" id="supplier_registeration_form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIERMANAGER }}">
    <!--begin::Title-->
    <div class="text-center pb-8">
        <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('إنشاء حساب جديد')}}</h2>
        <p class="text-muted font-weight-bold font-size-h4">{{__('الرجاء ادخال المعلومات التالية لانشاء جساب جديد')}}</p>
    </div>
    <!--end::Title-->
    <div class="row" >
        <div class="col-md-6">
             <!--begin::Form group First Name-->
             <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span class="required">*</span>
                    <span>{{__("الاسم")}}</span>
                </label>
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror"
                type="text" placeholder="{{__('الاسم')}}" name="first_name" value="{{ old('first_name') }}" required autofocus
                oninvalid="this.setCustomValidity('{{__('الرجاء ادخال الاسم')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                @error('first_name')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ __($message) }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group First Name-->
        </div>
        <div class="col-md-6">
            <!--begin::Form group Last Name-->
            <div class="form-group">
               <label class="font-size-h6 font-weight-bolder text-dark">
                   <span>{{__('الكنية')}}</span>
                   <span class="required">*</span>
               </label>
               <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('last_name') is-invalid @enderror" type="text" placeholder="{{__('الكنية')}}"
               name="last_name" value="{{ old('last_name') }}" required autofocus
               oninvalid="this.setCustomValidity('{{ __('الرجاء ادخال الكنية') }}')"
               oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
               @error('last_name')
               <div class="fv-plugins-message-container">
                   <div  class="fv-help-block">{{ __($message) }}</div>
               </div>
               @enderror
           </div>
           <!--end::Form group Last Name-->
       </div>
       <div class="col-md-6">
            <!--begin::Form group User Name-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>{{__('اسم المستخدم')}}</span>
                    <span class="required">*</span>
                </label>
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('username') is-invalid @enderror" type="text"
                 placeholder="e.g. muhammad" name="username" value="{{ old('uername') }}" required autofocus
                 oninvalid="this.setCustomValidity('{{__('الرجاء ادخال اسم المستخدم')}}')"
                 oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                @error('username')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ __($message) }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group User Name-->
       </div>
       <div class="col-md-6">
             <!--begin::Form group Email-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>{{__('البريد الالكتروني')}}</span>
                    <span class="required">*</span>
                </label>
                <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror"  placeholder="example@gmail.com"
                name="email" required value="{{ old('email') }}" autocomplete="off"
                oninvalid="this.setCustomValidity('{{__('الرجاء ادخال البريد الالكتروني')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                @error('email')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ __($message) }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Email-->
       </div>
       <div class="col-md-6">
            <!--begin::Form group Password-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">
                    <span>{{__('كلمة المرور')}}</span>
                    <span class="required">*</span>
                </label>
                <div class="w-100 d-flex align-items-center" style="position: relative">
                    <span toggle="#password_input" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <input id="password_input"  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password"  name="password" required
                    autocomplete="off"
                    oninvalid="this.setCustomValidity('{{__('الرجاء ادخال كلمة المرور')}}')"
                    oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                  </div>
                  <div  class="fv-plugins-message-container" id="">
                    <div id="strong_password_message" class="fv-help-block"></div>
                    <div id="strong_container">
                        <h3>{{__('يجب أن تحتوي كلمة المرور على ما يلي:')}}</h3>
                        <div class="d-flex justify-content-between">
                              <span id="letter"  class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">{{__('حرف صغير')}}</span>
                              <span id="capital" class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">{{__('حرف كبير')}}</span>
                              <span id="number"  class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">{{__('رقم')}}</span>
                              <span id="length" class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">{{__('الحد الادنى 8 احرف')}}</span>
                        </div>
                      </div>
                </div>
                @error('password')
                <div class="fv-plugins-message-container">
                    <div  class="fv-help-block">{{ __($message) }}</div>
                </div>
                @enderror
            </div>
            <!--end::Form group Password-->
       </div>
       <div class="col-md-6">
            <!--begin::Form group Password Confirmation-->
            <div class="form-group">
                 <label class="font-size-h6 font-weight-bolder text-dark">
                <span>{{__('تأكيد كلمة المرور')}}</span>
                <span class="required">*</span>
            </label>

            <div class="w-100 d-flex align-items-center" style="position: relative">
                <span toggle="#password_conf" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                <input id="password_conf" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="{{__('تأكيد كلمة المرور')}}" name="password_confirmation"
                required autocomplete="new-password"
                oninvalid="this.setCustomValidity('الرجاء ادخال قيمة هذه الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل" />
            </div>
            </div>
            <!--end::Form group Password Confirmation-->
       </div> <div class="form-group">
        <div class="col-md-12">
            <!--begin::Form group Terms And Conditions-->
            @include('auth.components.terms_and_conditions')

                <div class="checkbox-inline">
                    <label class="checkbox">
                    <input type="checkbox" name="terms_and_conditions">
                    <span></span>{{__('لقد قرأت ووافقت على الشروط والأحكام')}}</label>

                </div>
            </div>
            <!--end::Form group Bank Account Owner Name-->
        </div>
        <div class="col-md-12">
             <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="submit"  class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4" id="create_account" disabled type="submit"> {{__('إنشاء حساب')}}</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">{{__('إلغاء')}}</button>
            </div>
            <!--end::Form group-->
        </div>

    </div>
</form>

@push('scripts')
<script>
    $(function(){
        $("input[name='terms_and_conditions']").on('change',function(){
            if($(this).is(':checked')){
                document.getElementById('create_account').disabled = false;
            }
            else{
                document.getElementById('create_account').disabled = true;
            }
        });
    });
</script>
<script>
    $(function(){
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });
    });
    </script>
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
            letter.classList.remove("label-light-danger");
            letter.classList.add("valid");
            letter.classList.add("label-light-success");
          } else {
            letter.classList.remove("valid");
            letter.classList.remove("label-light-success");
            letter.classList.add("invalid");
            letter.classList.add("label-light-danger");
          }

          // Validate capital letters
          var upperCaseLetters = /[A-Z]/g;
          if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.remove("label-light-danger");
            capital.classList.add("valid");
            capital.classList.add("label-light-success");

          } else {
            capital.classList.remove("valid");
            capital.classList.remove("label-light-success");
            capital.classList.add("invalid");
            capital.classList.add("label-light-danger");
          }

          // Validate numbers
          var numbers = /[0-9]/g;
          if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.remove("label-light-danger");
            number.classList.add("valid");
            number.classList.add("label-light-success");
          } else {
            number.classList.remove("valid");
            number.classList.remove("label-light-success");
            number.classList.add("invalid");
            number.classList.add("label-light-danger");
          }

          // Validate length
          if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.remove("label-light-danger");
            length.classList.add("valid");
            length.classList.add("label-light-success");
          } else {
            length.classList.remove("valid");
            length.classList.remove("label-light-success");
            length.classList.add("invalid");
            length.classList.add("label-light-danger");
          }
        }


            



        //By Blaxk
        // let passValid = false;
        let UserValid0= false;
        let MailValid0= false;
        function userValidCheck(status) {
            UserValid0 = status
            return status
        }
        function MailValidCheck(status) {
          MailValid0 = status
          return status
        }

         
        $(document).on('click','#create_account',function(e){

            e.preventDefault();

            //Check Passwords
            var password = document.getElementById("password_input").value;
            var confirmPassword = document.getElementById("password_conf").value;
            if ((confirmPassword.length==0) || (password.length==0)) 
            {
                
                toastr.error("{{__('الرجاء التأكد من إدخال كلمة المرور وتأكيدها')}}");
                
            }
            else if (confirmPassword != password) 
            {
           
                toastr.error("{{__('كلمة المرور وتأكيدها غير متطابقتين')}}");
                
            }
            else{
              passValid = true
            }
        })


        //username Unique Validation
        $(document).on('click','#create_account',function(e){

          e.preventDefault();
           //Get Input Val 
           var username= $('input[name="username"]').val();

           if(username){

            //Set url 
            var url = "{{ route('CheckUser',['username'=>':username']) }}";
            url = url.replace(':username', username);

            //Do Request 
            $.ajax({
              url:url,
              method:'get',
              success:function(res){

                if(res == 0){

                  var UserValid = true;
                  
                  // $("#supplier_registeration_form").submit();
                }
                if(res == 1 ){
                  var UserValid = false;
                  toastr.error('{{__("اسم المستخدم موجود مسبقا")}}');

                }

                userValidCheck(UserValid);
              }
            })



           }
        })


        //Email Unique Validation 
         $(document).on('click','#create_account',function(e){

              e.preventDefault();
              
              //Get Input Val 
              var email= $('input[name="email"]').val();

              if(email){

                //Set url 
                var url = "{{ route('CheckMail',['email'=>':emal']) }}";
                url = url.replace(':emal', email);

                //Do Request 
                $.ajax({
                  url:url,
                  method:'get',
                  success:function(res){

                    if(res == 0){
                      var MailValid = true;
                      
                      // $("#supplier_registeration_form").submit();
                    }
                    if(res == 1 ){
                      var MailValid = false;
                      toastr.error('{{__("البريد الإلكتروني موجود مسبقا")}}');

                    }

                    MailValidCheck(MailValid)
                  }
                })



              }
          })



          $(document).on('click','#create_account',function(e){

            e.preventDefault();
            
            if(UserValid0 && MailValid0 && passValid){
              $("#supplier_registeration_form").submit();
            }

          })



        </script>

@endpush
