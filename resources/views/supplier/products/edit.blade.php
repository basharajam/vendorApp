@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label font-size-h1 font-weight-bolder">
                        {{ $product->post_title }}
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <form id="product_Form" action="{{ route('supplier.products.update',$product->ID) }}" method="post">
                    @csrf
                    @include('supplier.products.components.product_type_card',['product'=>$product])
                    <div id="product_type_form" class="mb-10 mt-10">
                        @if($product->product_type!=null)
                            @if($product->product_type->term->name == \ProductTypes::SIMPLE)
                                @include('supplier.products.components.simple_product',['categories'=>$categories,'product'=>$product])
                            @endif
                        @endif

                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                حفظ
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

    let add_field_component = `{!! view('supplier.products.components.add_field_component') !!}`;
    $(document).on('click','#extra_fields_button',function(){
        $("#extra_fields_container").append(add_field_component)
    });
     _init_main_image_dropzone();
    _init_product_other_files_dropzone();
    editor  =  _init_ck_editor('editor');

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
                    // init:function(){
                    //         let main_image = $('#national_id_image').val();
                    //         if(main_image){
                    //             var mockFile = { name: main_image.split('/ ').pop(), size: 12345, type: 'image/'+main_image.split('.').pop()};
                    //             console.log(mockFile);
                    //             this.emit('addedfile',mockFile);
                    //             this.options.thumbnail.call(this,mockFile,'/public'+main_image );
                    //             $('.dz-progress').remove();
                    //             var existingFileCount = 1; // The number of files already uploaded
                    //             this.options.maxFiles = this.options.maxFiles - existingFileCount;
                    //         }
                    // });
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

</script>
@endpush
