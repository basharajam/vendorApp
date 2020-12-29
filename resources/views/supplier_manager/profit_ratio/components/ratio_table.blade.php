
<div class="table-responsive">
    <table id="RatioTable" class="table table-bordered" style="direction:rtl;text-align:right">
        <thead class="thead-light">
            <tr>
                <th class="">
                    <span>الفئة</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Category</div>
                </th>
                <th class="">
                    <span>النسبة</span>
                    <span class="fas icon fa-arrow-up "></span>
                    <span class="fas icon fa-arrow-down"></span>
                    <div class="font-weight-bold text-muted">Profit Ratio</div>
                </th>
                <th>...</th>
                <th></th>

            </tr>
        </thead>
        <tbody style="direction:rtl;text-align:right">
            @foreach($categories as $key=>$category)
            <tr id="{{$category->term_taxonomy_id}}" style="text-align: right;font-size:16px;">
                <td>
                    {{ $category->term->name }}
                </td>
                <td>
                    <input
                    data-inputmask="'regex': '^[0-9]+.[0-9]+$'"
                        type="text"
                        class="form-control remotelyUpdate"
                        placeholder="ادخل نسبة الربح"
                        data-loader="#loader{{$category->term_taxonomy_id}}"
                        data-manager="{{ \Auth::user()->userable->id }}"
                        data-category="{{$category->term_taxonomy_id}}"
                        value="{{ $ratios->where('term_taxonomy_id',$category->term_taxonomy_id)->first()->ratio ?? '' }}"
                        >
                </td>
                    <td class="datatable-cell-sorted datatable-cell" style="min-width:100px;">
                        <a id="{{ $category->term_taxonomy_id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier_manager.taxonomies.delete',$category->term_taxonomy_id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                        <a class="kt-nav__link edit_taxonomy" data-type="{{ $type }}" id="{{ $category->term_taxonomy_id }}" data-action-name="{{ route('supplier_manager.taxonomies.edit') }}" href="#"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                    </td>
                <td >
                    <div id="loader{{$category->term_taxonomy_id}}" class="spinner spinner-warning spinner-md" style="display:none"></div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@push('styles')

@endpush
@push('scripts')
<script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>

<script>
    $(function(){
        Inputmask().mask(document.querySelectorAll("input"));
        $(document).on('change','.remotelyUpdate',function(){
            let ratio = $(this).val();
            let loader = $(this).attr('data-loader');
            let term_taxonomy_id = $(this).attr('data-category');
            let manager_id = $(this).attr('data-manager');

            $(loader).show();
                let UpdateLink = "{{route('supplier_manager.profit.store')}}";
                UpdateForm = {
                    "_token":"{{csrf_token()}}",
                    "term_taxonomy_id":term_taxonomy_id,
                    "manager_id":manager_id,
                    "ratio":ratio
                }
                $.ajax({
                    url:UpdateLink,
                    type:"POST",
                    data:UpdateForm,
                    success:function(response){
                        toastr.success('تم التعديل بنجاح');

                    },
                    error:function(){
                        toastr.error('لقد حدث خطأ ما الرجاء المحاولة لاحقاً');
                    },
                    complete:function(){
                        $(loader).hide();

                    }
                });

        })
    });
</script>
<script>
    $(document).ready(function() {
    $('#RatioTable').DataTable({
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
<script>
    $(function(){
        $(".edit_taxonomy").click(function(event){
                        event.preventDefault();
                        let url = $(this).attr("data-action-name");
                        let id =$(this).attr('id');
                        let taxonomy_type =$(this).attr('data-type');
                        let  csrf_token = $('meta[name="csrf-token"]').attr('content');

                        let taxonomy_data ={

                            "type":taxonomy_type,
                            "term_taxonomy_id":id
                        }
                        $.ajax(url,{
                            type:"POST",
                            async:true,
                            headers: {
                            'X-CSRF-Token': csrf_token
                            },
                            data:taxonomy_data,
                            success:function(response){
                                if(response)
                                {
                                    $('body').prepend(response);
                                    $('#EditModal').modal('show');
                                }
                            },
                            error:function(error){
                                console.log(error);
                            },
                        });
                    });
    })
</script>
@endpush
