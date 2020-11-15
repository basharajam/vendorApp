<div class="kt-portlet__body">
    <div class="kt-widget kt-widget--user-profile-4">
        <div class="kt-widget__head">
            <div class="kt-widget__media">
                <!--Product Image-->
                <h3></h3>
            </div>
            <div class="kt-widget__content">
                <div class="kt-widget__section">
                    <h2 class="kt-widget__username font-weight-bolder" id="product_name">
                      @switch($type)
                          @case('product_cat')
                              (category)  إضافة صنف جديد
                              @break
                          @case('product_tag')
                               (tag) إضافة تاغ
                              @break
                          @case('attributes')
                              (Attribute) إضافة سمة جديدة
                             @break
                          @default

                      @endswitch
                    </h2>
                </div>
            </div>
        </div>
        <div class="kt-widget__body">
           <form action="{{ route('supplier.taxonomies.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="name" value="" required  />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">
                                <span>Slug </span>
                                <span class="required">*</span>
                            </label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="slug" value="" required  />
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
                                        name="parent" required>
                                    <option ></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->term_taxonomy_id }}">{{ $category->term->name }}</option>
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
                                إضافة
                            </button>
                        </div>
                    </div>
                </div>
           </form>
        </div>
    </div>
</div>
@push('scripts')
<script>

</script>
@endpush
