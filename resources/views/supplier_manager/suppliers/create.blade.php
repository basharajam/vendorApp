@extends('layouts.app')
@push('styles')
<style>

    /* The message box is shown when the user clicks on the password field */
#strong_container {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  margin-top: 10px;

}

#strong_container p {
  padding: 10px 10px;
  font-size: 16px;
  margin-bottom: 0px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:after {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:after {
  position: relative;
  left: -35px;
  content: "✖";
}

@media (max-width: 360px){

    [dir=ltr] .iti__flag-container {
        margin: 0 230px !important;
    }
}

[dir=ltr] .iti__flag-container {
    margin: 0 960px;
}
        </style>
@endpush


@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{__('إضافة مورد جديد')}}
                    <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                </div>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <form class="form"  class="w-100" method="POST" action="{{ route('supplier_manager.suppliers.store') }}" id="supplier_registeration_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
                                    <input type="hidden" name="manager_id" value="{{ \Auth::user()->userable_id }}">
                                       <!--begin::Title-->
                                        <div class="text-center pb-8">
                                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('إنشاء حساب جديد')}}</h2>
                                            <p class="text-muted font-weight-bold font-size-h4">{{__('الرجاء ادخال المعلومات التالية لانشاء جساب جديد')}}</p>
                                        </div>
                                        <!--end::Title-->
                                    @include('auth.components.supplier-registeration-form',['supplier'=>null])
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

@endsection


@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" rel="stylesheet" />
<script>
    $(function(){
        $("#cateogiresSelector").select2({
            dir: "rtl",
        });
        $("#CountriesSelector").select2({
            dir: "rtl",
        });
    })
</script>
<!--<script>-->
<!--    function canSubmit()-->
<!--    {-->
<!--        var password = document.getElementById("password_input").value;-->
<!--        var confirmPassword = document.getElementById("password_conf").value;-->
        
<!--        if ((confirmPassword.length==0) || (password.length==0)) -->
<!--        {-->
<!--            e.preventDefault();-->
<!--            toastr.error("الرجاء التأكد من إدخال كلمة المرور وتأكيدها");-->
<!--            $([document.documentElement, document.body]).animate({-->
<!--                    scrollTop: $("#password_input").offset().top-->
<!--                }, 2000);-->
<!--            return false;-->
<!--        }-->
<!--        else if (confirmPassword == password) -->
<!--        {-->
<!--            e.preventDefault();-->
<!--            toastr.error(" كلمة المرور وتأكيدها غير متطابقتين");-->
<!--            $([document.documentElement, document.body]).animate({-->
<!--                    scrollTop: $("#password_input").offset().top-->
<!--                }, 2000);-->
<!--            return false;-->
<!--        }-->
<!--        return true;-->
<!--    }-->
    
<!--</script>-->
@endpush
