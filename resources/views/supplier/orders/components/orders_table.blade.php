
<div class="table-responsive">
    <table id="OrdersTable" class="table table-bordered" style="direction:rtl;text-align:right">
        <thead class="thead-bold">
            <tr>
                <th class="">
                    <span>
                            <span class="ml-2">رقم الطلب</span>
                            <span class="fas icon fa-arrow-up"></span>
                            <span class="fas icon fa-arrow-down"></span>

                    </div>
                    <div class="font-weight-bold text-muted">Order</div>
                </th>
                <th class="">
                    <span class="ml-2">تاريخ الطلب</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Date</div>
                </th>
                <th class="">
                    <span class="ml-2">حالة الطلب</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Order Status</div>
                </th>
                <th class="">
                    <span class="ml-2">المنتجات</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Products Count</div>
                </th>
                <th class="">
                    <span class="ml-2">المجموع</span>
                    <span class="fas icon fa-arrow-up"></span>
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
