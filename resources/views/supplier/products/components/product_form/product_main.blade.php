
<div class="kt-portlet" id="Productype" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">نوع المنتج</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="request_type" value="product">
            <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
            @include('supplier.products.components.product_type_card',['product'=>$product])
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>اسم المنتج</span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('post_title') is-invalid @enderror" type="text" placeholder="" name="post_title" value="{{ $product->post_title  ?? old('post_title') }}"   />
                        @error('post_title')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>وصف المنتج</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
                        </label>
                        <textarea id="editor" class="form-control @error('post_content') is-invalid @enderror" name="post_content">
                            {{ $product->post_content  ?? ''}}
                        </textarea>
                        @error('post_content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>صورة المنتج</span>
                        </label>
                       <input type="file" name="thumbnail" class="form-control" >

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
    </div>
</div>
