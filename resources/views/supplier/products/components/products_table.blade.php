
<div class="table-responsive">
    <table id="ProductsTable" class="table table-bordered" style="direction:rtl;text-align:right">
        <thead class="thead-light">
            <tr>
                <th class="">
                    <span>المنتج</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Product </div>
                </th>
                <th class="">
                    <span>فئات المنتج</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Product Categories</div>
                </th>
                <th class="">
                    <span>السعر</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Price</div>
                </th>
                <th class="">
                    <span>الحجم</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Size</div>
                </th>
                 <th class="">
                    <span>الوزن</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Weight</div>
                </th>
                  <th class="">
                    <span>CBM</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">CBM</div>
                </th>
                <th>.</th>
            </tr>
        </thead>
        <tbody style="direction:rtl;text-align:right">
                @foreach($products as $product)
                @php
                    $meta = $product->meta;
                @endphp
                <tr id="{{ $product->ID }}">
                    <td class="datatable-cell">
                        <span style="width: 250px;">
                            <div class="d-flex align-items-center">
                                <div style="padding-left:10px;" class="symbol symbol-50   symbol-sm symbol-light-danger">
                                    <a class="image-link" href="{{ $product->product_image }}">
                                        <span class="symbol-label font-size-p" style="background-image:url({{ $product->product_image }})"></span>
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                           {{$product->post_title}}
                                    </div>
                                    <span  class="text-muted font-weight-bold text-hover-primary ">
                                        @if($meta && count($meta)>0 && array_key_exists('supplier_name',$meta))
                                        {{ $meta['supplier_name'] }}
                                     @endif
                                    </span>
                                </div>
                            </div>
                        </span>
                    </td>

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
                                @if($meta && count($meta)>0 && array_key_exists('size',$meta))
                                {{ $meta['size'] }}
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
                                @if($meta && count($meta)>0 && array_key_exists('cbm_single',$meta))
                                {{ $meta['cbm_single'] }}
                             @endif
                            </div>
                        </span>
                    </td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <a id="{{ $product->ID }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier.products.delete',$product->ID) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                        <a class="kt-nav__link"  href="{{ route('supplier.products.create',$product->ID) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                    </td>

                </tr>
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
    $(document).ready(function() {
     $('.image-link').magnificPopup({type:'image'});
        // $('#ProductsTable').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
    $('#ProductsTable').DataTable({
        scrollCollapse: true,
        language:{
            "emptyTable": "ليست هناك بيانات متاحة في الجدول",
            "loadingRecords": "جارٍ التحميل...",
            "processing": "جارٍ التحميل...",
            "lengthMenu": "أظهر _MENU_ مدخلات",
            "zeroRecords": "لم يعثر على أية سجلات",
            "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
            "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "search": "ابحث:",
            "paginate": {
                "first": "الأول",
                "previous": "السابق",
                "next": "التالي",
                "last": "الأخير"
            },
            "aria": {
                "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
            },
            "select": {
                "rows": {
                    "_": "%d قيمة محددة",
                    "0": "",
                    "1": "1 قيمة محددة"
                }
            },
            "buttons": {
                "print": "طباعة",
                "colvis": "الأعمدة الظاهرة",
                "copy": "نسخ إلى الحافظة",
                "copyTitle": "نسخ",
                "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                "copySuccess": {
                    "_": "%d قيمة نسخت",
                    "1": "1 قيمة نسخت"
                },
                "pageLength": {
                    "-1": "اظهار الكل",
                    "_": "إظهار %d أسطر"
                }
            }
        }

    });
} );
</script>
@endpush
