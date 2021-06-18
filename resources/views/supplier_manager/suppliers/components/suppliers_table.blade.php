<div class="table-responsive">
    <table id="SuppliersTable" class="table" style="direction:rtl;text-align:right">
        <thead class="thead-light">
            <tr>
                <th class="">
                    <span>{{__('اسم المورد')}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Supplier Name</div>
                </th>
                <th class="">
                    <span>{{__('اسم الشركة')}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Supplier Company</div>
                </th>
                <th class="">
                    <span>{{__('البريد الالكتروني')}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Email</div>
                </th>
                <th class="">
                    <span>{{__('اسم المحل')}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Shop Address</div>
                </th>
                <th class="">
                    <span>{{__('الجنسية')}}</span>
                    <span class="fas icon fa-arrow-up"></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Nationality</div>
                </th>

                <th class="">
                    <span>{{__('تاريخ الاضافة')}}</span>
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
                            {{__('صيني')}}
                            @else
                            {{__("لست صيني")}}
                           @endif
                        </span>
                    </td>
                    <td>
                        <span>{{ date('Y-m-d',strtotime($supplier->created_at)) }}</span>
                    </td>

                    <td class="datatable-cell-sorted datatable-cell">
                            <a id="{{ $supplier->id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier_manager.suppliers.delete',$supplier->id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash text-danger "></i></a>
                            <a class="kt-nav__link"  href="{{ route('supplier_manager.suppliers.edit',$supplier->id) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 text-primary "></i></a>
                            <a class="kt-nav__link ml-5"  href="{{ route('supplier_manager.suppliers.products',$supplier->id) }}"  title="عرض المنتجات"><i class="kt-nav__link-icon color-primary flaticon2-open-box text-warning"></i></a>
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
