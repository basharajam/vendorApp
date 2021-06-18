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
                @include('supplier.properties.components.add_property_card',['property'=>null])
            </div>
        </div>
        <!--End:: App Aside-->

        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content mr-10">
            <div class="row">
                <div class="col-xl-12">
                    @include('supplier.properties.components.property_table')
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



<!-- By Blaxk -->
<script>

$(document).on('click','.AddPropBtn',function(e){

    var where = $(this).data('where');


    if(where === 'Add'){


        e.preventDefault();

        //Get Value of Inputs 

        var PropName=$('input[name=PropNameI]').val();
        var PropVal=$('input[name=PropValueI]').val();
        var PropCatId=$('select[name=PropCategoryIdI]').val();

        var form = {
            PropNameI:PropName,
            PropValueI:PropVal,
            PropCatI:PropCatId,
            PropUserI:"{{ \Auth::user()->username }}",
            _token:"{{ csrf_token() }}"
        }

        //Check value !empty if name not empty tooo
        if( PropName !== undefined && PropVal !== undefined && where ==="Add"){

            //Do Request 
            $.ajax({
                url:"{{ route('SaveProp') }}",
                method:"post",
                data:form,
                success:function(resp){

                    //Empty Old Container 
                    $('.PropsContainer').empty();

                    //Set New Values
                    $(".PropsContainer").load("{{ route('PropsTable') }}",{'props':resp.props,'productID':" @if(!empty($product)) {{$product->ID}} @endif ",'_token':"{{csrf_token()}}"}); 

                    //Fetch Success Error
                    if(resp.success){
                        toastr.success('{{__("تمت العملية بنجاح")}}');
                    }

                },
                error:function(xhr){
                    //Fetch Wrong Error
                    toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
                }
            });


        }
        else{

            //Fetch Wrong Toastr
            toastr.error('{{__("لقد حدث خطأ ما , الرجاء المحاولة لاحقاً")}}');
        }

    }


    })


    //validate inputs 
//     $(document).ready(function(){

//     var maxLengthVal = 120 ;

//     $( "#AtrributeForm" ).validate({
//         rules: {
//             name:{
//                 required:true,
//                 maxlength:maxLengthVal
//             },
//             description:{
//                 required:true,
//                 maxlength:maxLengthVal
//             }
//         },messages:{

//             "name":{
//                 maxlength:function(){
//                 toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
//             }
//             },
//             "description":{
//                 maxlength:function(){
//                 toastr.error('{{ __("تجاوزت الحد الاعلى لعدد المحارف المدخلة") }}')
//                 }
//             }


//         }

//     })


// })

</script>
@endpush
