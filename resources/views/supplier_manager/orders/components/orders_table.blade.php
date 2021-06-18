
<div class="table-responsive">
    <table id="OrdersTable" class="table table-bordered" style="direction:rtl;text-align:right">
        <thead class="thead-light">
            <tr>
                <th class="">
                    <span>{{__('رقم الطلب')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order</div>
                </th>
                <th class="">
                    <span>{{__('المورد')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Supplier</div>
                </th>
                <th class="">
                    <span>{{__('الزبون')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Customer</div>
                </th>
                <th class="">
                    <span>{{__('تاريخ الطلب')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Date</div>
                </th>
                <th class="">
                    <span>{{__('حالة الطلب')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Status</div>
                </th>
                <th class="">
                    <span>{{__('المنتجات')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Products Count</div>
                </th>
                <th class="">
                    <span>{{__('المجموع')}}</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Total</div>
                </th>

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
                <td></td>

                <td>
                    @if($order->customer)
                    <span>{{ $order->customer->display_name ?? $order->customer->user_login }}</span>
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
                    0
                </td>
                <td>
                    @if($order->order_meta)
                        <span>{{ $order->order_meta()->pluck('meta_value','meta_key')->toArray()['_line_total']}}</span>
                        <span>¥</span>
                    @endif
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
