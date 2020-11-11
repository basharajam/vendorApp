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
                <form id="product_Form" action="{{ route('supplier.products.store') }}" method="post">
                    @csrf
                    @include('supplier.products.components.product_type_card')
                    <div id="product_type_form" class="mb-10">

                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                إضافة منتج
                            </button>
                        </div>
                    </div>
                </form>

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
<script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();

    });
    </script>
<script>

    let simple_product_form = `{!! view('supplier.products.components.simple_product',['categories'=>$categories]) !!}`;
    let variable_product_form = `{!! view('supplier.products.components.variable_product') !!}`;
    let add_field_component = `{!! view('supplier.products.components.add_field_component') !!}`;

    function _init_main_image_dropzone(){
        let product_main_image = document.getElementById('product_main_image');
                    let $dropzone =new Dropzone('#product_main_image',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    method:'POST',
                    maxFiles: 1,
                    success: function (file, response) {
                    $('#product_Form').append('<input type="hidden" name="national_id_image" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#product_Form').find('input[name="national_id_image"][value="' + name + '"]').remove()
                    },

                    });
    }

    function _init_product_other_files_dropzone(){
        let product_other_files = document.getElementById('product_other_files');
                    let $dropzone =new Dropzone('#product_other_files',{
                    url:   '{{ route('supplier.storeImage') }}',
                    addRemoveLinks: true,
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg,.mp4",
                    method:'POST',
                    maxFiles: 10,
                    success: function (file, response) {
                    $('#product_Form').append('<input type="hidden" name="national_id_image" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('#product_Form').find('input[name="national_id_image"][value="' + name + '"]').remove()
                    },

                    });
    }
    function _init_ck_editor(element){
        return    CKEDITOR.replace( element );
    }

    function _append_to_form(container,content){
        $('#'+container).append(content);
    }
    $( "input[name='product_type']" ).on('change',function(){
        $('#product_type_form').empty();
        let selected_value = $(this).val();
        switch(selected_value){
            case "simple":
                _append_to_form('product_type_form',simple_product_form);

                $(document).on('click','#extra_fields_button',function(){
                    $("#extra_fields_container").append(add_field_component)
                 });

                _init_main_image_dropzone();
                _init_product_other_files_dropzone();
                editor  =  _init_ck_editor('editor');

            break;
            case "variable":
                _append_to_form('product_type_form',variable_product_form);
                //$("#chinese_properties").show();
            break;
        }
    });
</script>
@endpush
