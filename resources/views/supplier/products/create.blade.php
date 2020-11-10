@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">إضاضة منتج جديد
                    <span class="d-block text-muted pt-2 font-size-sm">الرجاء إدخال المعلومات التالية</span></h3>
                </div>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <form>
                    @include('supplier.products.components.product_type_card')
                <div id="product_type_form" class="mb-10">

                </div>
                </form>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            إضافة منتج
                        </button>
                    </div>
                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

@endsection

@push('styles')

@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

    });
    </script>
<script>

    let simple_product_form = `{!! view('supplier.products.components.simple_product') !!}`;
    let variable_product_form = `{!! view('supplier.products.components.variable_product') !!}`;
    $( "input[name='product_type']" ).on('change',function(){
        $('#product_type_form').empty();
        let selected_value = $(this).val();
        switch(selected_value){
            case "simple":
                $('#product_type_form').append(simple_product_form);
                 editor  =  CKEDITOR.replace( 'editor' );


            break;
            case "variable":
                $('#product_type_form').append(variable_product_form);
                //$("#chinese_properties").show();
            break;
        }
    });
</script>
@endpush
