
<div class="table-responsive">
    <table id="OrdersTable" class="table table-bordered" style="direction:rtl;text-align:right">
        <thead class="thead-bold">
            <tr>
                <th class="">
                    <span>
                            <span class="ml-2">{{__("رقم الطلب")}}</span>
                            <span class="fas icon fa-arrow-up"></span>
                            <span class="fas icon fa-arrow-down"></span>

                    </div>
                    <div class="font-weight-bold text-muted">Order</div>
                </th>
                <th class="">
                    <span class="ml-2">{{__("تاريخ الطلب")}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Date</div>
                </th>
                <th class="">
                    <span class="ml-2">{{__("حالة الطلب")}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Status</div>
                </th>
                <th class="">
                    <span class="ml-2">{{__("المنتجات")}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Products Count</div>
                </th>
                <th class="">
                    <span class="ml-2">{{__("المجموع")}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Total</div>
                </th>
                <th></th>

            </tr>
        </thead>
        <tbody style="direction:rtl;text-align:right">
            @foreach($orders as $order)

            <tr>
                <td>
                    @if($order->post)
                    <span>{{ str_replace('wc_order_','',$order->post->meta['_order_key']) }}</span>
                    @endif
                </td>
                <td>
                    @if($order->post)
                    <span>{{ date('Y-m-d',strtotime($order->post->post_date)) }}</span>
                    @endif
                </td>
                <td>
                    @if($order->post)
                     @switch($order->post->post_status)
                      @case("wc-cancelled")
                      <span class="m-2 label font-weight-bold label-lg label-light-danger label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                      @break
                      @case("wc-completed")
                      <span class="m-2 label font-weight-bold label-lg label-light-success label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                      @break
                      @case("wc-processing")
                      <span class="m-2 label font-weight-bold label-lg label-light-primary label-inline">{{ str_replace("wc-","",$order->post->post_status) }}</span>
                      @break
                     @endswitch
                    @endif
                </td>
                <td>
                   <span>{{ $order->order_details()->count() }}</span>
                </td>
                <td>
                    @if($order->order_meta)
                        <span>{{ $order->order_meta()->pluck('meta_value','meta_key')->toArray()['_line_total']}}</span>
                        <span>¥</span>
                    @endif
                </td>
                <td>
                    <a class="kt-nav__link"  href="{{ route('supplier.orders.view',$order->order_item_id) }}"  >
                        <i class="kt-nav__link-icon color-primary flaticon-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('styles')

@endpush
@push('scripts')
<script>
    $(document).ready(function() {
    $('#OrdersTable').DataTable({
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
