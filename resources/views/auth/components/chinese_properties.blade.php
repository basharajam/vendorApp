<div class="row" id="chinese_properties" style="display:none">
    <div class="col-md-12">
        <!--begin::Form group National Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم البطاقة الشخصية</span>
            </label>
            <input id="national_number" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
            type="text" placeholder="رقم البطاقة الشخصية" name="national_number" value="{{ old('national_number') }}"
             required autocomplete="national_number"
             oninvalid="this.setCustomValidity('الرجاء ادخال  رقم البطاقة الشخصية و التي تتكون من 18 رقم')"
             oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
             pattern="[0-9]{18}" />
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
                <h3 class="dropzone-msg-title"> قم بإسقاط الصور هنا او انقر للتحميل</h3>
                <span class="dropzone-msg-desc"> قم برفع صورة واحدة فقط</span>
            </div>
        </div>
        <input id="national_image_value" type="hidden" name="national_id_image" value="{{ old('national_id_image') }}">
    </div>
    <!--end::Form group National ID Picture-->
    </div>

</div>


