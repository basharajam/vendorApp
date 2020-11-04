<div class="row" id="not_chinese_properties" style="display:none">
    <div class="col-md-6">
        <!--begin::Form group Passport Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم جواز السفر</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم جواز السفر" name="passport_number" value="{{ old('passport_number') }}" required autocomplete="national_number" />
            @error('passport_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group Passport Number-->
    </div>
    <div class="col-md-6">
        <!--begin::Form group Passport Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>تاريخ انتهاء جواز السفر</span>
            </label>
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="date" placeholder="تاريخ انتهاء جواز السفر" name="passport_end_date" value="{{ old('passport_end_date') }}" required autocomplete="national_number" />
            @error('passport_end_date')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group Passport Number-->
    </div>
    <div class="col-md-12">
    <!--begin::Form group Passport ID Picture-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            <span class="required">*</span>
            <span>صورة عن جواز السفر الشخصية</span>
        </label>
        <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_2">
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                <span class="dropzone-msg-desc">Upload up to 10 files</span>
            </div>
        </div>
    </div>
    <!--end::Form group Passport ID Picture-->
    </div>

    <div class="col-md-12">
        <!--begin::Form group Passport ID Picture-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>صورة عن بطاقة التأشيرة الصينية</span>
            </label>
            <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_2">
                <div class="dropzone-msg dz-message needsclick">
                    <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                    <span class="dropzone-msg-desc">Upload up to 10 files</span>
                </div>
            </div>
        </div>
        <!--end::Form group Passport ID Picture-->
        </div>

</div>
