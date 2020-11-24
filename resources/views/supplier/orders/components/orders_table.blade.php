<table id="OrdersTable" class="table" style="direction:rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th class="">
                <span>رقم الطلب</span>
                <div class="font-weight-bold text-muted">Order</div>
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

    </tbody>
</table>
@push('scripts')
<script>
    $(document).ready(function() {
    $('#OrdersTable').DataTable();
} );
</script>
@endpush
