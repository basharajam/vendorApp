
<div class="table-responsive">
    <table id="ProductsTable" class="table table-bordered" style="direction:rtl;text-align:rightك">
        <thead class="thead-light">
            <tr>
                <th>
                </th>
                <th class="">
                    <span>{{__("المنتج")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Product </div>
                </th>
                <th class="">
                    <span>{{__("فئات المنتج")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Product Categories</div>
                </th>
                <th class="">
                    <span>{{__("السعر")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Price</div>
                </th>
                <th class="">
                    <span>{{__("المقاس")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Size</div>
                </th>
                 <th class="">
                    <span>{{__("الوزن")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Weight</div>
                </th>
                  <th class="">
                    <span>{{__("حجم الكرتونة")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">CBM</div>
                </th>
                @if(\Auth::user()->hasRole(\UserRoles::SUPPLIER))
                <th>.</th>
                @endif
            </tr>
        </thead>
        <tbody style="direction:rtl;text-align:right">
                @foreach($products as $key=>$product)
                @php
                    $meta = $product->meta;
                    $product_type = \ProductTypes::SIMPLE;
                    if($product->product_type && $product->product_type && $product->product_type->term)
                        $product_type =$product->product_type->term->name;
                @endphp
                <tr  id="row{{ $product->ID }}" @if($product_type == \ProductTypes::VARIABLE ) class="parent" data-id="row{{ $product->ID }}" data-arrow="#row-arrow{{ $product->ID }}"@endif >
                    <td >
                        @if($product_type== \ProductTypes::VARIABLE)
                        <div class="d-flex align-items-center justify-content-center">
                            <span id="row-arrow{{ $product->ID }}" 
                                @if (app()->getLocale() ==="ar")
                                 class="fas fa-arrow-alt-circle-left"
                                @else
                                 class="fas fa-arrow-alt-circle-right" 
                                @endif 
                                
                                style="font-size:20px;"> </span>
                        </div>
                        @else

                        @endif
                    </td>
                    <td class="datatable-cell">
                        <span style="width: 250px;">
                            <div class="d-flex align-items-center">
                                <div style="padding-left:10px;" class="symbol symbol-50   symbol-sm symbol-light-danger">
                                    @if($product->product_image)
                                    <a class="image-link" href="{{$product->product_image->guid }}">
                                        <span class="symbol-label font-size-p zoom" style="background-image:url({{$product->product_image->guid }})"></span>
                                    </a>
                                    @else
                                    <a class="image-link" href="#">
                                        <span class="symbol-label font-size-p zoom" style=""></span>
                                    </a>
                                    @endif
                                </div>
                                <div class="ml-3">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                           {{$product->post_title}}
                                    </div>
                                    <span  class="text-muted font-weight-bold text-hover-primary ">
                                        @if($meta && count($meta)>0 && array_key_exists('al_supplier_name',$meta))
                                        {{ $meta['al_supplier_name'] }}
                                     @endif
                                    </span>
                                </div>
                            </div>
                        </span>
                    </td>
                    @if($product && $product->product_type && $product->product_type->term &&  $product->product_type->term->name==\ProductTypes::VARIABLE)
                    <td colspan="5" style="">
                        <span>{{__('منتج عدة قياسات')}} </span>
                    </td>
                    @else
                    <td class="datatable-cell-sorted datatable-cell">
                        <span>
                            <div class="font-weight-bolder font-size-lg mb-0">
                                 @foreach($product->categories as $category)
                                 <span class="m-2 label font-weight-bold label-lg label-light-default label-inline">
                                    {{ $category->term->name }}
                                </span>
                                 @endforeach
                            </div>
                        </span>
                    </td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <span>
                            <div class="font-weight-bolder font-size-lg mb-0">
                                @if($meta && count($meta)>0 && array_key_exists('_regular_price',$meta))
                                {{ $meta['_regular_price'] }}
                             @endif
                            </div>
                        </span>
                    </td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <span>
                            <div class="font-weight-bolder font-size-lg mb-0">
                                @if($meta && count($meta)>0 && array_key_exists('al_size',$meta))
                                {{ $meta['al_size'] }}
                             @endif
                            </div>
                        </span>
                    </td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <span>
                            <div class="font-weight-bolder font-size-lg mb-0">
                                @if($meta && count($meta)>0 && array_key_exists('_weight',$meta))
                                {{ $meta['_weight'] }}
                             @endif
                            </div>
                        </span>
                    </td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <span>
                            <div class="font-weight-bolder font-size-lg mb-0">
                                @if($meta && count($meta)>0 && array_key_exists('al_cbm',$meta))
                                {{ $meta['al_cbm'] }}
                             @endif
                            </div>
                        </span>
                    </td>
                    @endif
                    @if(\Auth::user()->hasRole(\UserRoles::SUPPLIER))
                    <td class="datatable-cell-sorted datatable-cell">
                        <a id="{{ $product->ID }}" data-remove="#row{{ $product->ID }}" class="kt-nav__link  delete" data-action-name="{{ route('supplier.products.delete',$product->ID) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                        <a class="kt-nav__link"  href="{{ route('supplier.products.create',$product->ID) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                    </td>
                    @endif

                </tr>
                @if($product_type== \ProductTypes::VARIABLE)
                    @foreach($product->product_variations as $variation_index=>$variation)
                    @if($variation_index==0)
                    <tr class="child-row{{ $product->ID }}" style="display:none">
                        <th>
                            <strong></strong>
                        </th>
                        <th>
                            <strong>{{__("المنتج")}}</strong>
                        </th>
                        <th>
                            <strong>{{__("السعر")}}</strong>
                        </th>
                        <th>
                            <strong>{{__("السعر بعد الحسم")}}</strong>
                        </th>
                        <th>
                            <strong>{{__("المقاس")}}</strong>
                        </th>
                        <th>
                            <strong>{{__("الوزن")}}</strong>
                        </th>
                        <th>
                            <strong>CBM</strong>
                        </th>
                    @if(\Auth::user()->hasRole(\UserRoles::SUPPLIER))
                        <th></th>
                    @endif
                    </tr>
                    @endif
                    @php
                    $meta_variation = $variation->meta;

                    @endphp

                    <tr class="child-row{{ $product->ID }}" style="display:none">
                        <td></td>
                        <td>
                            <span>
                                @foreach($variation->product_attributes as $key=>$value)
                                <span>{{ $value[0]->term->name .' '}}</span>
                                @endforeach
                            </span>
                        </td>
                        <td>
                            <span>{{array_key_exists('_regular_price',$meta_variation) ?  $meta_variation['_regular_price']  :''}}</span>
                        </td>
                        <td>
                            <span>{{ array_key_exists('_sale_price',$meta_variation) ? $meta_variation['_sale_price'] :''}}</span>
                        </td>
                        <td>
                            <span>{{array_key_exists('al_size',$meta_variation) ? $meta_variation['al_size'] :''}}</span>
                        </td>
                        <td>
                            <span>{{array_key_exists('_weight',$meta_variation) ? $meta_variation['_weight'] :''}}</span>
                        </td>
                        <td>
                            <span>{{array_key_exists('al_cbm',$meta_variation) ?  $meta_variation['al_cbm']:'' }}</span>
                        </td>
                    @if(\Auth::user()->hasRole(\UserRoles::SUPPLIER))
                        <td class="datatable-cell-sorted datatable-cell">
                            <a id="{{ $variation->ID }}" data-remove="#child-row{{ $variation->ID }}" class="kt-nav__link  delete" data-action-name="{{ route('supplier.products.delete',$variation->ID) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                        </td>
                    @endif
                    </tr>
                    @endforeach
                @endif
                @endforeach

        </tbody>
    </table>
</div>
@push('styles')
<link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}">
@endpush
@push('scripts')
{{-- <script src="{{ asset('/js/plugins.bundle.js') }}"></script>
<script src="{{ asset('/js/prismjs.bundle.js') }}"></script>
<script src="{{ asset('/js/scripts.bundle.js') }}"></script> --}}
<script src="{{ asset('/js/jquery.magnific-popup.js') }}"></script>
{{-- <script src="{{ asset('/js/html-table.js') }}"></script> --}}
<script>
     function checkAll() {
        var inputs = document.querySelectorAll('.check');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = true;
        }
    }
    //create uncheckall function
    function uncheckAll() {
        var inputs = document.querySelectorAll('.check');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = false;
        }
    }
    $(document).ready(function() {
     $('.image-link').magnificPopup({type:'image'});
        // $('#ProductsTable').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
            $('tr.parent')
                .css("cursor", "pointer")
                .attr("title", "{{__('انقر لعرض المزيد')}}")
                .click(function () {
                    let arrow = $($(this).attr('data-arrow'));
                    if($(arrow).hasClass("fa-arrow-alt-circle-left")){
                        $(arrow).removeClass("fa-arrow-alt-circle-left");
                        $(arrow).addClass("fa-arrow-alt-circle-down");
                    }
                    else{
                        $(arrow).addClass("fa-arrow-alt-circle-left");
                        $(arrow).removeClass("fa-arrow-alt-circle-down")
                    }
                    $(this).siblings('.child-' + this.id).toggle();
                });
            $('tr[class^=child-]').hide().children('td');
    });

</script>
<script>
    $(document).ready(function() {
    $('#ProductsTable').DataTable({
        scrollCollapse: true,
        language:{
            "emptyTable": "{{__('ليست هناك بيانات متاحة في الجدول')}}",
            "loadingRecords": "{{__('جارٍ التحميل')}}...",
            "processing": "{{__('جارٍ التحميل')}}...",
            "lengthMenu": "{{__('أظهر')}} _MENU_ {{__('مدخلات')}}",
            "zeroRecords": "{{__('لم يعثر على أية سجلات')}}",
            "info": "{{__('أظهر')}} _START_ إلى _END_ {{__('من أصل')}} _TOTAL_ {{__('مدخل')}}",
            "infoEmpty": "{{__('عرض')}} 0 {{__('إلى')}} 0 {{__('من أصل')}} 0 {{__('سجل')}}",
            "infoFiltered": "({{__('منتقاة')}} من مجموع _MAX_ {{__('مدخل')}})",
            "search": "{{__('ابحث')}}:",
            "paginate": {
                "first": "{{('الأول')}}",
                "previous": "{{__('السابق')}}",
                "next": "{{__('التالي')}}",
                "last": "{{('الأخير')}}"
            },
            "aria": {
                "sortAscending": ": {{__('تفعيل لترتيب العمود تصاعدياً')}}",
                "sortDescending": ": {{__('تفعيل لترتيب العمود تنازلياً')}}"
            },
            "select": {
                "rows": {
                    "_": "%d قيمة محددة",
                    "0": "",
                    "1": "1 قيمة محددة"
                }
            },
            "buttons": {
                "print": "{{__('طباعة')}}",
                "colvis": "{{__('الأعمدة الظاهرة')}}",
                "copy": "{{__('نسخ إلى الحافظة')}}",
                "copyTitle": "{{__('نسخ')}}",
                "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>{{__('ليتم نسخها إلى الحافظة')}}<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                "copySuccess": {
                    "_": "%d قيمة نسخت",
                    "1": "1 قيمة نسخت"
                },
                "pageLength": {
                    "-1": "{{__('اظهار الكل')}}",
                    "_": "إظهار %d أسطر"
                }
            }
        }

    });
} );
</script>

@endpush
