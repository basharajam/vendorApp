@extends('layouts.app')

@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
         <!--Begin:: App Aside Mobile Toggle-->
         <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
            <i class="la la-close"></i>
        </button>
        <!--End:: App Aside Mobile Toggle-->

        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
            <div class="kt-portlet kt-portlet--height-fluid-">
                @include('supplier.attributes.components.add_attribute_card',['taxonomy'=>null])
            </div>
        </div>
        <!--End:: App Aside-->

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                    @include('supplier.attributes.components.attributes_table')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('modals')
@endpush
@push('styles')

@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(function(){
        $(document).on('change','#taxonomy_name_input',function(ev){
            let value = $(this).val();
            $("#taxonomy_slug_input").val(value.replace(' ','-'));

            })
    })
</script>


<!-- By Blaxk -->
<script>

    //validate inputs 
    $(document).ready(function(){

    var maxLengthVal = 120 ;

    $( "#AtrributeForm" ).validate({
        rules: {
            name:{
                required:true,
                maxlength:maxLengthVal
            },
            description:{
                required:true,
                maxlength:maxLengthVal
            }
        },messages:{

            "name":{
                maxlength:function(){
                toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
            }
            },
            "description":{
                maxlength:function(){
                toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
                }
            }


        }

    })


})

</script>
@endpush
