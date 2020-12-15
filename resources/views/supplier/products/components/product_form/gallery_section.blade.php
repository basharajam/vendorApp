
@push('styles')
<style>
    .img-container {
        position: relative;
        margin-bottom: 15px;
        border:1px solid #aaa;
        /*Desired Aspect Ratio*/
    }

    .img-container:before {
        display: block;
        content: "";
        width: 100%;
        padding-top: 56.25%;
    }

    .img-container>.content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }


.img-container img   {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
    }

    .img-container>.content .delete-item-container {
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        opacity: 0;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out -moz-transition:all 0.4s ease-in-out -ms-transition:all 0.4s ease-in-out -o-transition:all 0.4s ease-in-out cursor:pointer;
    }

    .img-container>.content:hover .delete-item-container {
        opacity: 1;
    }

    .img-container>.content .delete-item-container a {
        opacity: 1;
        transition: all 0.4s ease-in-out;
        -webkit-transition: all 0.4s ease-in-out -moz-transition:all 0.4s ease-in-out -ms-transition:all 0.4s ease-in-out -o-transition:all 0.4s ease-in-out
    }
    .img-container>.content .delete-item-container a{
        padding:4px;
        font-size:10px;
    }

</style>
@endpush
@php
$gallery = [];
if($product){
    $gallery = $product->gallery;
}
@endphp
<form  enctype="multipart/form-data" action="{{route('supplier.products.store')}}" method="post">
    <div class="w-100" style="max-height: 400px; overflow-y:scroll">
        @csrf
        <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
        <input type="hidden" name="supplier_name" value="{{ \Auth::user()->name }}">
        <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
        <div class="col-12">
            <div class="form-group">
                <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                    <span>اضافة صور</span>
                </label>
               <input type="file" name="gallery[]" class="form-control" multiple>
            </div>
        </div>
    </div>

    <div class="form-group row mt-10 mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary ">
                حفظ
                <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
            </button>
        </div>
    </div>
</form>

<div class="row mt-5">
    @foreach($gallery as $item)
    <div class="col-md-4" id="galleryItem{{ $item->ID }}">
        <div class="img-container">
            <div class="content">
                <img src="{{\General::IMAGE_URL_UPLOADS.$item->post_name}}">
                <div class="delete-item-container">
                    <a class="flaticon2-trash btn btn-danger btn-sm delete" data-remove="#galleryItem{{ $item->ID }}" data-action-name="{{ route('gallery.delete',$item->ID) }}"></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
