@extends('layouts.app')

@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="kt-portlet kt-portlet--height-fluid-">
                    @include('supplier.taxonomies.components.add_card')
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-12">
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('supplier.taxonomies.components.taxonomy_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(function(){
        $('select').select2();
        $('#taxonomy_name_input').on('change',function(ev){
            let value = $(this).val();
            $("#taxonomy_slug_input").val(value.replace(' ','-'));
        })
    })
</script>


<!-- By Blaxk -->
<script>


//validate Cateogry Form 
$(document).ready(function(){

    var maxLengthVal = 128 ;

$( "#TaxonomyForm" ).validate({
        rules: {
            name:{
                required:true,
                maxlength:maxLengthVal
            },
            description:{
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
