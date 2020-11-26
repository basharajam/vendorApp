<table id="SuppliersTable" class="table" style="direction:rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th class="">
                <span>اسم المورد</span>
                <div class="font-weight-bold text-muted">Supplier Name</div>
            </th>
            <th class="">
                <span>اسم الشركة</span>
                <div class="font-weight-bold text-muted">Supplier Company</div>
            </th>
            <th class="">
                <span>البريد الالكتروني</span>
                <div class="font-weight-bold text-muted">Email</div>
            </th>
            <th class="">
                <span>اسم المحل</span>
                <div class="font-weight-bold text-muted">Shop Address</div>
            </th>
            <th class="">
                <span>الجنسية</span>
                <div class="font-weight-bold text-muted">Nationality</div>
            </th>

            <th class="">
                <span>تاريخ الاضافة</span>
                <div class="font-weight-bold text-muted">Created At</div>
            </th>
            <th>
                ..
            </th>

        </tr>
    </thead>
    <tbody style="direction:rtl;text-align:right">
        @foreach($suppliers as $supplier)
            <tr id="{{ $supplier->id }}">
                <td>
                    <span>{{ $supplier->full_name }}</span>
                </td>
                <td>
                    <span>{{ $supplier->company_name }}</span>
                </td>
                <td>
                    <span>{{ $supplier->eamil }}</span>
                </td>
                <td>
                    <span>{{ $supplier->shop_address }}</span>
                </td>
                <td>
                    <span>{{ $supplier->nationality }}</span>
                </td>
                <td>
                    <span>{{ date('Y-m-d',strtotime($supplier->created_at)) }}</span>
                </td>
                <td>
                    <td class="datatable-cell-sorted datatable-cell">
                        <a id="{{ $supplier->id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier_manager.suppliers.delete',$supplier->id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                        <a class="kt-nav__link"  href="{{ route('supplier_manager.suppliers.edit',$supplier->id) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                    </td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
<script>
    $(document).ready(function() {
} );
</script>
@endpush
