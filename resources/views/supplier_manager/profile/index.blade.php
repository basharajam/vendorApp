@extends('layouts.app')
@push('styles')
<style>
  /* The message box is shown when the user clicks on the password field */
  #strong_container {
    display: block;
    background: transparent;
    color: #000;
    position: relative;
    margin-top: 10px;

  }

  #strong_container h3 {
    font-size: 14px;
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

  [dir=rtl] .field-icon {
      position: absolute;
      left: 4%;
      color: #aaa;
      z-index: 2;
    }

    [dir=ltr] .field-icon{
      position: absolute;
      left: 93%;
      color: #aaa;
      z-index: 2;
    }
</style>
@endpush

@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
  <!--Begin:: App Content-->
  <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
    <div class="row">
      <div class="col-xl-12">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <form class="form" class="w-100" method="POST" action="{{ route('supplier_manager.profile.update') }}" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIERMANAGER }}">
              <input type="hidden" name="id" value="{{ $supplier_manager->id }}" />
              <input type="hidden" name="profit_ratio" value="default" />
              <!--begin::Title-->
              <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('معلومات الحساب')}} 
                </h2>
                <!--<p class="text-muted font-weight-bold font-size-h4">الرجاء ادخال المعلومات التالية-->
                <!--  لإنشاء حساب جديد</p>-->
              </div>
              <!--end::Title-->
              <div class="row">
                <div class="col-md-6">
                  <!--begin::Form group First Name-->
                  <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">
                      <span class="required">*</span>
                      <span>{{__("الاسم")}}</span>
                    </label>
                    <input
                      class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('first_name') is-invalid @enderror"
                      type="text" placeholder="الاسم" name="first_name" value="{{ $supplier_manager->first_name }}" required
                      autofocus oninvalid="this.setCustomValidity('الرجاء ادخال الاسم')" oninput="setCustomValidity('')"
                      title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    @error('first_name')
                    <div class="fv-plugins-message-container">
                      <div class="fv-help-block">{{__($message)}}</div>
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
                    <input
                      class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('last_name') is-invalid @enderror"
                      type="text" placeholder="{{__('الكنية')}}" name="last_name" value="{{ $supplier_manager->last_name }}" required
                      autofocus oninvalid="this.setCustomValidity('{{__('الرجاء ادخال الكنية')}}')"
                      oninput="setCustomValidity('')" title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    @error('last_name')
                    <div class="fv-plugins-message-container">
                      <div class="fv-help-block">{{__($message)}}</div>
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
                    <input
                      class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('name') is-invalid @enderror"
                      type="text" placeholder="e.g. muhammad" name="name" value="{{  $supplier_manager->user->name }}" required autofocus
                      oninvalid="this.setCustomValidity('{{__('الرجاء ادخال اسم المستخدم')}}')" oninput="setCustomValidity('')"
                      title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    @error('name')
                    <div class="fv-plugins-message-container">
                      <div class="fv-help-block">{{__($message)}}</div>
                    </div>
                    @enderror
                  </div>
                  <!--end::Form group User Name-->
                </div>
                <div class="col-md-6">
                </div>
                
                <!--
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">
                      <span>البريد الالكتروني</span>
                      <span class="required">*</span>
                    </label>
                    <input
                      class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror"
                      placeholder="example@gmail.com" name="email" required value="{{ old('email') }}"
                      autocomplete="off" oninvalid="this.setCustomValidity('الرجاء ادخال البريد الالكتروني')"
                      oninput="setCustomValidity('')" title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    @error('email')
                    <div class="fv-plugins-message-container">
                      <div class="fv-help-block">{{__($message)}}</div>
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">
                      <span>كلمة المرور</span>
                      <span class="required">*</span>
                    </label>
                    <div class="w-100 d-flex align-items-center" style="position: relative">
                      <span toggle="#password_input" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      <input id="password_input" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                        type="password" name="password" required autocomplete="off"
                        oninvalid="this.setCustomValidity('الرجاء ادخال كلمة المرور')" oninput="setCustomValidity('')"
                        title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    </div>
                    <div class="fv-plugins-message-container" id="">
                      <div id="strong_password_message" class="fv-help-block"></div>
                      <div id="strong_container">
                        <h3>يجب أن تحتوي كلمة المرور على ما يلي:</h3>
                        <div class="d-flex justify-content-between">
                          <span id="letter"
                            class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">حرف
                            صغير</span>
                          <span id="capital"
                            class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">حرف
                            كبير</span>
                          <span id="number"
                            class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">رقم</span>
                          <span id="length"
                            class="m-2 label font-weight-bold label-lg label-light-danger label-inline invalid">الحد
                            الادنى 8 احرف</span>
                        </div>
                      </div>
                    </div>
                    @error('password')
                    <div class="fv-plugins-message-container">
                      <div class="fv-help-block">{{__($message)}}</div>
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-size-h6 font-weight-bolder text-dark">
                      <span>تأكيد كلمة المرور</span>
                      <span class="required">*</span>
                    </label>

                    <div class="w-100 d-flex align-items-center" style="position: relative">
                      <span toggle="#password_conf" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                      <input id="password_conf" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                        type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required
                        autocomplete="new-password" oninvalid="this.setCustomValidity('الرجاء ادخال قيمة هذه الحقل')"
                        oninput="setCustomValidity('')" title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                    </div>
                  </div>
                </div>
                -->

                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3"
                    id="create_account" type="submit"> {{__('حفظ')}} </button>

                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <!-- By Blaxk -->
        @include('supplier_manager.profile.rest_password',['profile'=>$supplier_manager])
      </div>
    </div>

  </div>
</div>


@endsection


@push('scripts')

<!-- By Blaxk -->
<!-- Fetch password Sent Error --> 
@if (session('done'))
    <script>
         toastr.success('{{__("تم ارسال الطلب بنجاح")}}')
    </script>
@endif

@endpush