<div class="row" id="chinese_properties" style="display:none">
    <div class="col-md-12">
        <!--begin::Form group National Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم البطاقة الشخصية</span>
            </label>
            <input id="national_number" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم البطاقة الشخصية" name="national_number" value="{{ old('national_number') }}" required autocomplete="national_number" />
            @error('national_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group National Number-->
    </div>
    <div class="col-md-12">
    <!--begin::Form group National ID Picture-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            <span class="required">*</span>
            <span>صورة عن البطاقة الشخصية</span>
        </label>
        <div id="national_id_image" class="dropzone dropzone-default dropzone-primary dz-clickable" >
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">قم بإسقاط الملفات هنا أو انقر للتحميل</h3>
                <span class="dropzone-msg-desc">قم برفع 1 ملف واحد كحد اقصى</span>
            </div>
        </div>

    </div>
    <!--end::Form group National ID Picture-->
    </div>

</div>


