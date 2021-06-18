{{-- "al_added ": "dddddddddddddd"
al_carton_qty: "5"
al_cbm: "5"
al_color: "dddddddddddddd"
al_days_to_delivery: "5"
al_material: "dddddddddddd"
al_mix_of_package: "5"
"al_more_info ": "ddddddddddddd"
al_price_for: "box"
al_price_for_desc: "5"
al_printing: "ddddddddddddd"
al_size: "ddddddddddd"
al_thickness: "dddddddddd"
attribute_pa_Color: "red"
_regular_price: "15"
_sale_price: "15"
_sku: "dddddddddddddddddd"
_stock_status: "instock"
_wc_max_qty_product: "5"
_wc_min_qty_product: "5"
_weight: "5" --}}

@foreach ($Variation as $variation)

<div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
    <div class="card mb-10 mt-10 card{{$variation['ID']}}">
        <div class="card-header" id="headingOne8" data-toggle="collapse" data-target="#collapseOne{{$variation['ID']}}" aria-expanded="false">
            <div class="card-title" >
                <div class="card-label">
                    <h3 class="font-weight-bolder font-size-h3">
                        <span> 
                            {{ ($pos=strpos($variation['post_name'],"---"))?substr($variation['post_name'],$pos+3):$variation['post_name'] }}
                            
                        </span>
                    </h3>
                </div>
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </div>
        </div>
        <div id="collapseOne{{$variation['ID']}}" class="collapse w-100"  style="">
            <div class="card-body w-100">
                <div class="row">
                    <div class="col-12">
                        {{-- @include('supplier.products.components.product_form.variable_product_form') --}}
                        <form method="POST" action="{{ route("supplier.products.variation.storeMeta") }}" id='ProductFormVarAttr' class="general_row">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$variation['ID']}}">
                            <input type="hidden" name="post_parent" value="{{$variation['post_parent']}}">
                            <input type="hidden" name="post_author" value="{{$variation['post_author']}}">
                            {{-- @include('supplier.products.components.product_form.general_info_form',['product'=>$variation]) --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("السعر")}}</span>
                                            <span class="required">*</span>
                            
                                        </label>
                                        <input data-inputmask="'regex': '^[0-9]+.[0-9]+$'"
                                        id="_regular_price" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_regular_price') is-invalid @enderror" type="text" placeholder="" name="_regular_price" 
                                        @if (array_key_exists('_regular_price',$variation['meta']))
                                            value='{{$variation['meta']['_regular_price']}}'  
                                        @endif  required
                                        oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                                            oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"/>
                                        @error('_regular_price')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("السعر بعد الحسم")}}</span>
                                        </label>
                                        <input  data-inputmask="'regex': '^[0-9]+.[0-9]+$'"
                                            id="_sale_price" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 _sale_price @error('_sale_price') is-invalid @enderror" type="text" placeholder="" name="_sale_price" 
                                            @if (array_key_exists('_sale_price',$variation['meta']))
                                                value="{{ $variation['meta']['_sale_price'] }}"
                                            @endif
                                            
                                            title="الرجاء تعبئة هذا الحقل"  />
                                        <div class="fv-plugins-message-container">
                                            <div id="_sale_price_help" class="fv-help-block"></div>
                                        </div>
                                        @error('_sale_price')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("المواد المستخدمة في المنتج")}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('أدخل مادة المنتج')}}"></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_material') is-invalid @enderror" type="text" placeholder="" name="al_material"
                                            @if (array_key_exists('al_material',$variation['meta']))
                                                value="{{ $variation['meta']['al_material'] }}"
                                            @endif

                                          required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__("الرجاء تعبئة هذا الحقل")}}" />
                                        @error('al_material')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("سماكة المنتج")}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('أدخل سمك المنتج')}}"></span>
                            
                                        </label>
                                        <input
                                         class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_thickness') is-invalid @enderror" type="text" placeholder="" name="al_thickness" 
                                         @if (array_key_exists('al_thickness',$variation['meta']))
                                             value="{{ $variation['meta']['al_thickness'] }}"
                                         @endif
                                         
                                         title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                                        @error('al_thickness')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("الطباعة")}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('أدخل ألوان الطباعة')}}"></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_printing') is-invalid @enderror" type="text" placeholder="" name="al_printing" 
                                        @if (array_key_exists('al_printing',$variation['meta']))
                                            
                                            value="{{ $variation['meta']['al_printing'] }}" 
                                        @endif
                                          />
                                        @error('al_printing')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__('المقاس')}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل حجم كل منتج"></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_size') is-invalid @enderror" type="text" placeholder="" name="al_size" 
                                        @if (array_key_exists('al_size',$variation['meta']))
                                            value="{{ $variation['meta']['al_size'] }}" 
                                        
                                        @endif
                                        required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                                        @error('al_size')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("الاضافات")}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"></span>
                                        </label>
  
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_added') is-invalid @enderror" type="text" placeholder="" name="al_added" 
                                        @if (array_key_exists('al_added ',$variation['meta']))
                                        
                                            value="{{ $variation['meta']['al_added '] }}"
                                        @endif
                                        
                                        title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("المزيد من المعلومات")}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  ></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_more_info') is-invalid @enderror" type="text" placeholder="" name="al_more_info" 
                                        @if (array_key_exists('al_more_info ',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['al_more_info '] }}"
                                        @endif
                                        
                                        title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                            
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__('اللون')}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark" ></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_color') is-invalid @enderror" type="text" placeholder="" name="al_color" 
                                        @if (array_key_exists('al_color',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['al_color'] }}" 
                                        @endif
                                          title="{{__("الرجاء تعبئة هذا الحقل")}}" />
                            
                                    </div>
                                </div>
                            </div>
                            
                            {{-- @include('supplier.products.components.product_form.inventory_form',['product'=>$variation]) --}}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('يشير SKU إلى وحدة حفظ المخزون ، وهو معرف فريد لكل منتج وخدمة مميزة يمكن شراؤها')}}"></span>
                                            <span class="required">*</span>
                                            <span>{{__('رقم الصنف')}}</span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_sku') is-invalid @enderror" type="text" placeholder="" name="_sku"
                                         @if (array_key_exists('_sku',$variation['meta']))
                                             
                                         value="{{ $variation['meta']['_sku'] }}"
                                         @endif
                                          required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                                        @error('_sku')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
                                            <span>{{__('حالة المنتج')}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title='{{__("يتحكم في ما إذا كان المنتج مدرجًا على أنه متوفر أو غير متوفر")}}".'></span>
                                        </label>
                                        <div class="kt-input-icon">
                                            <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6"
                                                    id="_stock_status"
                                                    name="_stock_status" required
                                                    oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                                    oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"  >
                                                <option value="instock"  @if( array_key_exists('_stock_status',$variation['meta'])  && $variation['meta']['_stock_status']=="instock") selected @endif >{{__("متوفر")}}</option>
                                                <option value="onbackorder"   @if( array_key_exists('_stock_status',$variation['meta']) && $variation['meta']['_stock_status']=="onbackorder") selected @endif >{{__("تحت الطلب")}}</option>
                                            </select>
                                        </div>
                                        @error('_stock_status')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("الحد الادنى للطلب (عدد الكراتين)")}} </span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__('اختياري. قم بتعيين حد أدنى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر')}}"></span>
                                        </label>
                                        <input data-inputmask="'regex': '^[0-9]+$'"
                                        id="_wc_min_qty_product" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_wc_min_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_min_qty_product" 
                                        @if (array_key_exists('_wc_min_qty_product',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['_wc_min_qty_product'] }}"
                                        @endif
                                         title="{{__('الرجاء تعبئة هذا الحقل')}}"  />
                                        @error('_wc_min_qty_product')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("الحد الاقصى للطلب (عدد الكراتين)")}}</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="اختياري. قم بتعيين الحد الأقصى للكمية المسموح بها لكل طلب. أدخل رقمًا ، 1 أو أكبر"></span>
                                        </label>
                                        <input data-inputmask="'regex': '^[0-9]+$'"
                                        id="_wc_max_qty_product" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 _wc_max_qty_product @error('_wc_max_qty_product') is-invalid @enderror" type="text" placeholder="" name="_wc_max_qty_product" 
                                        @if (array_key_exists('_wc_max_qty_product',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['_wc_max_qty_product'] }}"
                                        @endif
                                          title="{{__('الرجاء تعبئة هذا الحقل')}}" />

                                        <div class="fv-plugins-message-container">
                                            <div  id="_wc_max_qty_product_help" class="fv-help-block"></div>
                                        </div>
                                        @error('_wc_max_qty_product')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("كمية بالكرتونة الواحدة")}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("مثال: كمية الحزم داخل الكرتونة أو كمية البطاقات داخل الحزمة الواحدة")}}"></span>
                                        </label>
                                        <input id="al_carton_qty" data-inputmask="'regex': '^[0-9]+$'"
                                        class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_carton_qty') is-invalid @enderror" type="text" placeholder="" name="al_carton_qty" 
                                        @if (array_key_exists('al_carton_qty',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['al_carton_qty'] }}" 
                                        @endif
                                         required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                                        @error('al_carton_qty')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("السعر مقابل")}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("أدخل كمية كل كارتون")}}"></span>
                                        </label>
                                        <div class="kt-input-icon">
                                            <select  class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="{{__('الرجاء تعبئة هذا الحقل')}}"
                                                    id="price_for"
                                                    name="al_price_for" required>
                                                    <option value="box" @if( array_key_exists('al_price_for',$variation['meta']) && $variation['meta']['al_price_for']=="box") selected @endif >{{__("علبة")}}</option>
                                                    <option value="Pcs" @if( array_key_exists('al_price_for',$variation['meta']) && $variation['meta']['al_price_for']=="Pcs") selected @endif  >{{__("قطعة")}}</option>
                                                    <option value="opp" @if( array_key_exists('al_price_for',$variation['meta']) && $variation['meta']['al_price_for']=="opp") selected @endif >opp</option>
                                                    <option value="bag" @if( array_key_exists('al_price_for',$variation['meta']) && $variation['meta']['al_price_for']=="bag") selected @endif  >{{__("كيس")}}</option>
                                                    <option value="cartoon" @if(  array_key_exists('al_price_for',$variation['meta']) &&  $variation['meta']['al_price_for']=="cartoon") selected @endif  >{{__("كرتونة")}}</option>
                                                    <option value="set"  @if( array_key_exists('al_price_for',$variation['meta']) &&  $variation['meta']['al_price_for']=="set") selected @endif  >{{__("مجموعة")}}</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("الكمية للحزمة")}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="{{__("أدخل كمية الحزمة المختارة")}}."></span>
                                        </label>
                                        <input data-inputmask="'regex': '^[0-9]+$'" id="al_price_for_desc" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_price_for_desc') is-invalid @enderror" type="text" placeholder="" name="al_price_for_desc"
                                         @if (array_key_exists('al_price_for_desc',$variation['meta']))
                                             
                                            value="{{ $variation['meta']['al_price_for_desc'] }}"
                                         @endif
                                           required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                                        @error('al_price_for_desc')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="font-size-h6 font-weight-bolder text-dark">
                                            <span>{{__("التوزيع ضمن الكرتونة")}}</span>
                                            <span class="required">*</span>
                                            <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل عدد النماذج المختلطة في العبوة."></span>
                                        </label>
                                        <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_mix_of_package') is-invalid @enderror" type="text" placeholder="" name="al_mix_of_package" 
                                        @if (array_key_exists('al_mix_of_package',$variation['meta']))
                                            
                                        value="{{ $variation['meta']['al_mix_of_package'] }}"
                                        @endif
                                         required
                                        oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                            oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                                        @error('al_mix_of_package')
                                        <div class="fv-plugins-message-container">
                                            <div  class="fv-help-block">{{__($message)}}</div>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                            </div>


                            {{-- @include('supplier.products.components.product_form.shipping_form',['product'=>$variation]) --}}
                            <div class="kt-portlet" id="ShippingInfo" style="" >
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">{{__("معلومات الشحن")}}</h3>
                                    </div>
                                </div>
                                <div class="kt-portlet__body">
                                        {{-- @include('supplier.products.components.product_form.shipping_form',['product'=>$product]) --}}
                                        
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                <span>{{__("الوزن ( كيلو غرام)")}}</span>
                                            </label>
                                            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('_weight') is-invalid @enderror" type="text" placeholder="0" name="_weight" 
                                            @if (array_key_exists('_weight',$variation['meta']))
                                                
                                            value="{{ $variation['meta']['_weight'] }}"  
                                            @endif
                                             title="{{__('الرجاء تعبئة هذا الحقل')}}"/>
                                            @error('_weight')
                                            <div class="fv-plugins-message-container">
                                                <div  class="fv-help-block">{{__($message)}}</div>
                                            </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                <span>{{__("حجم الكرتون")}}</span>
                                                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل Cbm لكل كارتون."></span>

                                            </label>
                                            <input class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_cbm') is-invalid @enderror" type="text" placeholder="0" name="al_cbm" 
                                            @if (array_key_exists('al_cbm',$variation['meta']))
                                                
                                            value="{{ $variation['meta']['al_cbm'] }}"
                                            @endif
                                             title="{{__('الرجاء تعبئة هذا الحقل')}}"   />
                                            @error('al_cbm')
                                            <div class="fv-plugins-message-container">
                                                <div  class="fv-help-block">{{__($message)}}</div>
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="font-size-h6 font-weight-bolder text-dark">
                                                <span>{{__("عدد أيام التسليم")}}</span>
                                                <span class="required">*</span>
                                                <span class="flaticon2-information" data-toggle="tooltip" data-theme="dark"  title="أدخل عدد أيام التصنيع (إذا كان المنتج متوفرًا ، أدخل 0)."></span>

                                            </label>
                                            <input data-inputmask="'regex': '^[0-9]+$'" id="days_to_delivery" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 @error('al_days_to_delivery') is-invalid @enderror" type="text" placeholder="0" name="al_days_to_delivery" 
                                            @if (array_key_exists('al_days_to_delivery',$variation['meta']))
                                              value="{{ $variation['meta']['al_days_to_delivery'] }}"
                                            @endif
                                             required
                                            oninvalid="this.setCustomValidity('{{__('الرجاء تعبئة هذا الحقل')}}')"
                                                oninput="setCustomValidity('')"   title="{{__('الرجاء تعبئة هذا الحقل')}}" />
                                            @error('al_days_to_delivery')
                                            <div class="fv-plugins-message-container">
                                                <div  class="fv-help-block">{{__($message)}}</div>
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group row mt-10 mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary ">
                                        {{__('حفظ')}}
                                        <span class="spinner spinner-white spinner-md mr-10 saving" style="display:none"></span>
                                    </button>
                                    <a id="{{ $variation['post_parent'] }}" data-type='variation' data-varid='{{ $variation['ID'] }}' data-remove="#row{{ $variation['ID'] }}" class="btn btn-danger  delete" data-action-name="{{ route('supplier.products.delete',$variation['ID']) }}" href="javascript:;"  >Delete</a>
                                </div>
                            </div>
                        </form>
                        
                        

                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endforeach

