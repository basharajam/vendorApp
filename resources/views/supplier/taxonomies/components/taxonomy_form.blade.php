@csrf
<input type="hidden" name="type" value="{{ $type }}">
<input type="hidden" name="description" value="-">

 <div class="row">
     <div class="col-12">
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 <span>Name / الاسم </span>
                 <span class="required">*</span>
             </label>
             <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="name" value="{{ $taxonomy->term->name ?? '' }}" required  />
         </div>
     </div>
     <div class="col-12">
         <div class="form-group">
             <label class="font-size-h6 font-weight-bolder text-dark">
                 <span>Slug </span>
                 <span class="required">*</span>
             </label>
             <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="slug" value="{{$taxonomy->term->slug ?? '' }}" required  />
         </div>
     </div>
     @if($type=="product_cat")
     <div class="col-12">
         <div class="form-group">
             <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                 <span>تابع لصنف</span>
                 <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اختياري : اختر الصنف الاساسي لهذا الصنف"></span>
             </label>
             <div class="kt-input-icon">
                 <select  class="form-control form-control-solid py-7 px-6  font-size-h6"
                         id="parent"
                         name="parent"
                         >
                     <option ></option>
                     @foreach($categories  as $category)
                         <option value="{{ $category->term_taxonomy_id }}" @if($taxonomy->parent ?? old('parent') == $category->term_taxonomy_id ) selected @endif>{{ $category->term->name }}</option>
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
             <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="file" placeholder="" name="image" value=""   />
         </div>
     </div>
     @endif
     <div class="col-12">
         <div class="form-group mb-0">
             <button type="submit" class="btn btn-primary">
                 حفظ
             </button>
         </div>
     </div>
 </div>
