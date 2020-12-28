@csrf
<input type="hidden" name="type" value="{{ $type }}">
<input type="hidden" name="description" value="-">

 <div class="row" style="direction: ltr">
     <div class="col-12">
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 <span> الاسم </span>
                 <span class="required">*</span>
             </label>
             <input id="taxonomy_name_input" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="name" value="{{ $taxonomy->term->name ?? old('name') }}" required
             oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"/>
         </div>
     </div>
     <input id="taxonomy_slug_input" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" readonly type="hidden" placeholder="" name="slug" value="{{$taxonomy->term->slug ?? '' }}" required
     oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"/>
     @if($type=="product_cat")
     <div class="col-12">
         <div class="form-group">
             <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                 <span>تابع لصنف</span>
                 <span class="required">*</span>
                 <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اجباري : اختر الصنف الاساسي لهذا الصنف"></span>
             </label>
             <div class="kt-input-icon">
                 <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                         id="parent"
                         name="parent"
                         required
                         title="الرجاء تعبئة هذا الحقل"
                         >
                     <option ></option>
                     @foreach($categories  as $category)
                         <option value="{{ $category->term_taxonomy_id }}" @if( $taxonomy && $taxonomy->parent == $category->term_taxonomy_id ) selected @endif>{{ $category->term->name }}</option>
                     @endforeach
                 </select>
             </div>

         </div>
     </div>
     <div class="col-12">
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 <span>اختر صورة </span>
             </label>
             <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="file" placeholder="" name="image" value=""  title="الرجاء تعبئة هذا الحقل" />
         </div>
     </div>
     @elseif($type="product_tag")
     <div class="col-12">
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span> الوصف </span>
            </label>
            <textarea id="taxonomy_name_description" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="description"
                title="الرجاء تعبئة هذا الحقل">{{ $taxonomy->description ?? old('description') }}</textarea>
        </div>
    </div>
     @endif
     <div class="col-12">
         <div class="form-group mb-0">
             <button type="submit" class="btn btn-primary font-weight-bolder font-size-h5">
                 <span>حفظ</span>
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
