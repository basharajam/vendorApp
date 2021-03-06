@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-15">
                <div class="text-center pb-8" style="margin-top:15px;">
                    <!--begin::Logo-->
                    <a href="/" class="text-center mb-5 d-block">
                       <img src="{{ asset('images/logo.png') }}" class="max-h-150px max-w-150px" alt="" />
                   </a>
                </div>
                <div class="card-header" style="padding-top:5px;padding-bottom:5px;">
                <h3>
                    {{__("تغيير كلمة المرور")}}
                </h3>
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{__("البريد الالكتروني")}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                autofocus
                                oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__($message)}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__("كلمة المرور الجديدة")}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password"
                                oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__($message)}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{__("تأكيد كلمة المرور")}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                                oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   {{__("تغيير كلمة المرور")}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 200px;width:100%;"></div>
</div>
@endsection
