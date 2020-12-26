
<div class="kt-portlet" id="Productype" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">المعلومات الاساسية</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>اسم المنتج</span>
                            <span class="required">*</span>
                        </label>
                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('post_title') is-invalid @enderror" type="text" placeholder="" name="post_title" value="{{ $product->post_title  ?? old('post_title') }}"  required
                        oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"/>
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
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="hi"></span>
                        </label>
                        <textarea id="editor" class="form-control @error('post_content') is-invalid @enderror" name="post_content" required
                        oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                        oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                    >   @if($product){{ $product->post_content}}@endif</textarea>
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
                       <input id="thumbnail" type="file" name="thumbnail" class="form-control" >

                    </div>
                </div>
                @if($product==null)
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>معرض الصور</span>
                        </label>
                       <input type="file" name="gallery[]" class="form-control" multiple>
                    </div>
                </div>
                @endif
            </div>
    </div>
</div>
