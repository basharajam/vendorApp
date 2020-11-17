@php
$meta = [];
if($product){
    $meta = $product->meta;
}
@endphp
<div class="kt-portlet" id="InventoryInfo" style="diaplay:none" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">معلومات المحزن</h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <form action="{{ route('supplier.products.store.inventory') }}" method="post">
            @csrf
            <input type="hidden" name="supplier_name" value="{{ \Auth::user()->name }}">
            <input type="hidden" name="post_id"  value="{{ $product->ID ?? 0 }}">
            <input type="hidden" name="post_author"  value="{{ \Auth::user()->wordpress_user->ID ?? 0 }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="يشير SKU إلى وحدة حفظ المخزون ، وهو معرف فريد لكل منتج وخدمة مميزة يمكن شراؤها"></span>
                            <span class="required">*</span>
                            <span>SKU</span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_sku') is-invalid @enderror" type="text" placeholder="" name="_sku" value="{{ array_key_exists('_sku',$meta ) ? $meta['_sku']  :  old('_sku') }}" required  />
                        @error('_sku')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                            <span>حالة المنتج</span>
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title='يتحكم في ما إذا كان المنتج مدرجًا على أنه "متوفر" أو "غير متوفر".'></span>
                        </label>
                        <div class="kt-input-icon">
                            <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="_stock_status"
                                    name="_stock_status" required>
                                <option value="instock" @if(array_key_exists('_stock_status',$meta)  && $meta['_stock_status']=='instock') selected @endif>متوفر</option>
                                <option value="outofstock" @if(array_key_exists('_stock_status',$meta)  && $meta['_stock_status']=='outofstock') selected @endif>غير متوفر</option>
                                <option value="onbackorder" @if(array_key_exists('_stock_status',$meta)  && $meta['_stock_status']=='onbackorder') selected @endif>تحت الطلب</option>
                            </select>
                        </div>
                        @error('_stock_status')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>تباع بشكل فردي</span>
                        </label>
                        <div class="checkbox-inline">
                            <label class="checkbox">
                            <input type="checkbox"  name="_sold_individually" id="_sold_individually" value="yes" @if(array_key_exists('_sold_individually',$meta) && $meta['_sold_individually']=="yes") checked="checked" @endif>
                            <span></span>قم بتمكين هذا للسماح بشراء عنصر واحد فقط من هذا العنصر بترتيب واحد</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>الحد الأدنى من الكمية</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اختياري. قم بتعيين حد أدنى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر."></span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_wc_min_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_min_qty_product" value="{{ array_key_exists('_wc_min_qty_product',$meta) ?  $meta['_wc_min_qty_product'] :  old('_wc_min_qty_product') }}"   />
                        @error('_wc_min_qty_product')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>الحد الاقصى من الكمية</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اختياري. قم بتعيين الحد الأقصى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر"></span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('_wc_max_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_max_qty_product" value="{{ array_key_exists('_wc_max_qty_product',$meta) ? $meta['_wc_max_qty_product'] : old('_wc_max_qty_product') }}"   />
                        @error('_wc_max_qty_product')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>كمية بالكرتونة الواحدة</span>
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل كمية كل كارتون"></span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('cartoon_qty') is-invalid @enderror" type="text" placeholder="" name="cartoon_qty" value="{{ array_key_exists('cartoon_qty',$meta) ?  $meta['cartoon_qty'] : old('cartoon_qty') }}"  required />
                        @error('cartoon_qty')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>السعر مقابل</span>
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل كمية كل كارتون"></span>
                        </label>
                        <div class="kt-input-icon">
                            <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                    id="price_for"
                                    name="price_for" required>
                                    <option value="box" @if( array_key_exists('price_for',$meta)  && $meta['price_for']=="box") selected @endif>علبة</option>
                                    <option value="Pcs" @if(array_key_exists('price_for',$meta)  && $meta['price_for']=="Pcs") selected @endif>قطعة</option>
                                    <option value="opp" @if(array_key_exists('price_for',$meta)  && $meta['price_for']=="opp") selected @endif>opp</option>
                                    <option value="bag" @if(array_key_exists('price_for',$meta)  && $meta['price_for']=="bag") selected @endif>كيس</option>
                                    <option value="cartoon" @if(array_key_exists('price_for',$meta) && $meta['price_for']=="cartoon") selected @endif>كرتونة</option>
                                    <option value="set" @if(array_key_exists('price_for',$meta)  && $meta['price_for']=="set") selected @endif>مجموعة</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>الكمية للحزمة</span>
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل كمية الحزمة المختارة."></span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('price_for_input') is-invalid @enderror" type="text" placeholder="" name="price_for_input" value="{{$meta['price_for_input'] ??  old('price_for_input') }}"   />
                        @error('price_for_input')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

                    </div>

                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">
                            <span>النماذج بالحزمة</span>
                            <span class="required">*</span>
                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل عدد النماذج المختلطة في العبوة."></span>
                        </label>
                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 @error('mix_of_package') is-invalid @enderror" type="text" placeholder="" name="mix_of_package" value="{{$meta['mix_of_package'] ?? old('mix_of_package') }}"   />
                        @error('mix_of_package')
                        <div class="fv-plugins-message-container">
                            <div  class="fv-help-block">{{ $message }}</div>
                        </div>
                        @enderror

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
        </div>

        </form>
    </div>
</div>
