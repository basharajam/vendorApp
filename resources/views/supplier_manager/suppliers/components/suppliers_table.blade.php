<div class="table-responsive">
    <table id="SuppliersTable" class="table" style="direction:rtl;text-align:right">
        <thead class="thead-light">
            <tr>
                <th class="">
                    <span>اسم المورد</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Supplier Name</div>
                </th>
                <th class="">
                    <span>اسم الشركة</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Supplier Company</div>
                </th>
                <th class="">
                    <span>البريد الالكتروني</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Email</div>
                </th>
                <th class="">
                    <span>اسم المحل</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Shop Address</div>
                </th>
                <th class="">
                    <span>الجنسية</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Nationality</div>
                </th>

                <th class="">
                    <span>تاريخ الاضافة</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
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
                        <span>{{ $supplier->email }}</span>
                    </td>
                    <td>
                        <span>{{ $supplier->company_shop_address  ?? $supplier->company_office_address ?? $supplier->company_warehouse_address ?? $supplier->company_factory_address}}</span>
                    </td>
                    <td>

                        <span>
                           @if($supplier->ischinese)
                            صيني
                            @else
                            ليس صيني
                           @endif
                        </span>
                    </td>
                    <td>
                        <span>{{ date('Y-m-d',strtotime($supplier->created_at)) }}</span>
                    </td>

                    <td class="datatable-cell-sorted datatable-cell">
                            <a id="{{ $supplier->id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier_manager.suppliers.delete',$supplier->id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                            <a class="kt-nav__link"  href="{{ route('supplier_manager.suppliers.edit',$supplier->id) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                            <a class="kt-nav__link"  href="{{ route('supplier_manager.suppliers.products',$supplier->id) }}"  title="عرض المنتجات"><i class="kt-nav__link-icon color-primary flaticon-open-box"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#SuppliersTable').DataTable({
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
