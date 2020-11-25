<table id="OrdersTable" class="table" style="direction:rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th class="">
                <span>رقم الطلب</span>
                <div class="font-weight-bold text-muted">Order</div>
            </th>
            <th class="">
                <span>الزبون</span>
                <div class="font-weight-bold text-muted">Customer</div>
            </th>
            <th class="">
                <span>تاريخ الطلب</span>
                <div class="font-weight-bold text-muted">Order Date</div>
            </th>
            <th class="">
                <span>حالة الطلب</span>
                <div class="font-weight-bold text-muted">Order Status</div>
            </th>
            <th class="">
                <span>المنتجات</span>
                <div class="font-weight-bold text-muted">Products Count</div>
            </th>
            <th class="">
                <span>المحموع</span>
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
@push('scripts')
<script>
    $(document).ready(function() {
    $('#OrdersTable').DataTable();
} );
</script>
@endpush
