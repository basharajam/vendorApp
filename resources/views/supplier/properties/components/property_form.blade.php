@csrf

 <div class="row" style="direction: ltr">
     <div class="col-12">
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 <span> {{__("اسم الخاصية")}} </span>
                 <span class="required">*</span>
             </label>
             <input id="property_input" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="PropNameI" value="{{ $property->PropName ?? old('PropName') }}" required
             oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" @if ($where ==='Update') disabled @endif />
         </div>
     </div>
     <div class="col-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span> {{__("قيمة الخاصية")}} </span>
                <span class="required">*</span>
            </label>
            <input id="property_value" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="PropValueI" value="{{ $property->PropValue ?? old('PropValue') }}" required
            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
               oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
        </div>
    </div>
    <input type="hidden" name="PropIdI" value="{{ $property->id ?? old('id')  }}" > 
    <input type="hidden" name="PropUserI" value="{{\Auth::user()->username}}">
     <div class="col-12">
         <div class="form-group">
             <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                 <span>{{__("تابع لصنف")}}</span>
                 <span class="required">*</span>
                 <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("اجباري : اختر الصنف الاساسي لهذا الصنف")}}"></span>
             </label>
             <div class="kt-input-icon">
                 <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                         id="category_input_name"
                         name="PropCategoryIdI"
                         required
                         title="{{__('الرجاء تعبئة هذا الحقل')}}"
                         >
                     <option >Please Choose Category</option>

                     @foreach ($Categories as $Cat)
                         <option value="{{ $Cat['term_taxonomy_id'] }}" @if( $property && $property->PropCatId == $Cat['term_taxonomy_id'] ) selected @endif >{{ $Cat['term']['name'] }}</option>
                     @endforeach

                 </select>
             </div>

         </div>
     </div>

     <div class="col-12">
         <div class="form-group mb-0">
             <button type="submit" class="AddPropBtn btn btn-primary font-weight-bolder font-size-h5 " data-where="{{$where}}">
                 <span>{{__("حفظ")}}</span>
                 <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-11-19-154210/theme/html/demo12/dist/../src/media/svg/icons/General/Save.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                    </g>
                </svg><!--end::Svg Icon--></span>

             </button>
         </div>
     </div>
 </div>
