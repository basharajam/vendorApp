<div class="row" id="chinese_properties" style="display:none">
  <div class="col-md-12">
      <!--begin::Form group National Number-->
      <div class="form-group">
          <label class="font-size-h6 font-weight-bolder text-dark">
              <span class="required">*</span>
              <span>{{__('رقم البطاقة الشخصية')}}</span>
          </label>
          <input id="national_number" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
          type="text" placeholder="{{__('رقم البطاقة الشخصية')}}" name="national_number" value="{{($supplier && $supplier->national_number)? $supplier->national_number  : old('national_number') }}"
           required autocomplete="national_number"
           oninvalid="this.setCustomValidity('الرجاء ادخال  رقم البطاقة الشخصية و التي تتكون من 18 رقم')"
           oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"
           pattern="[0-9]{18}" />
          @error('national_number')
          <div class="fv-plugins-message-container">
              <div  class="fv-help-block">{{__($message)}}</div>
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
          <span>{{__('صورة عن البطاقة الشخصية')}}</span>
      </label>
      <div id="national_id_image" class="dropzone dropzone-default dropzone-primary dz-clickable" >
          <div class="dropzone-msg dz-message needsclick">
              <h3 class="dropzone-msg-title">{{__('قم بإسقاط الصور هنا او انقر للتحميل')}}</h3>
              <span class="dropzone-msg-desc"> {{__('قم برفع صورة واحدة فقط')}}</span>
          </div>
      </div>
      <input id="national_image_value" type="hidden" name="national_id_image" value="{{ ($supplier && $supplier->national_id_image) ? $supplier->national_id_image->name.'.'.$supplier->national_id_image->extension : old('national_id_image') }}">
  </div>
  <!--end::Form group National ID Picture-->
  </div>

</div>


