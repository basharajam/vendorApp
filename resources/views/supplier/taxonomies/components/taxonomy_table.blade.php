<div class="kt-portlet" id="Productype" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @switch($type)
                @case('product_cat')
                    {{__("الاصناف / الفئات")}}
                    @break
                @case('product_tag')
                     {{__("التاغات")}}
                    @break
                @case('attributes')
                    {{__("السمات")}}
                   @break
                @default

            @endswitch
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="table-responsive">
            <table id="GridTaxnomies" class="table table-bordered" style="">
                <thead class="thead-light">
                    <tr>
                        @if($type=='product_cat')
                        <th>{{__("الصورة")}}</th>
                        @endif
                        <th>{{__("الاسم")}}</th>
                        @if($type=='product_cat')
                        <th>{{__("تابع لصنف")}}</th>
                        @endif
                        <th>{{__("الوصف")}}</th>
                        <th>{{__("العدد")}}</th>
                        <th>..</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($data as $taxonomy)
                        <tr id="{{ $taxonomy->term_taxonomy_id }}">
                            @if($type=='product_cat')
                            <td class="datatable-cell">
                                <span style="width: 250px;">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div style="padding-left:10px;" class="symbol symbol-50 symbol-sm symbol-light-danger text-center">
                                            @if($taxonomy->image)
                                            <span class="symbol-label font-size-p" style="background-color:transparent; background-image:url({{\General::IMAGE_URL_UPLOADS.$taxonomy->image->post_name ?? 0 }})"></span>
                                            @else
                                            <span class="symbol-label font-size-p" style=""></span>
                                            @endif
                                        </div>
                                    </div>
                                </span>
                            </td>
                            @endif
                            <td class="datatable-cell-sorted datatable-cell">
                                <span>
                                    <div class="font-weight-bolder font-size-lg mb-0">
                                        {{ $taxonomy->term->name }}
                                    </div>
                                </span>
                            </td>
                            @if($type=='product_cat')
                            <td class="datatable-cell-sorted datatable-cell">
                                <span>
                                    <div class="font-weight-bolder font-size-lg mb-0">
                                        {{ $taxonomy->parent_category->term->name }}
                                    </div>
                                </span>
                            </td>
                            @endif
                            <td class="datatable-cell-sorted datatable-cell">
                                <span>
                                    <div class="font-weight-bolder font-size-lg mb-0">
                                        {{ $taxonomy->description  ?? '--'}}
                                    </div>
                                </span>
                            </td>
                            <td class="datatable-cell-sorted datatable-cell">
                                <span>
                                    <div class="font-weight-bolder font-size-lg mb-0">
                                        {{ count($taxonomy->posts) }}
                                    </div>
                                </span>
                            </td>
                            <td class="datatable-cell-sorted datatable-cell" style="min-width:100px;">
                                <a id="{{ $taxonomy->term_taxonomy_id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier.taxonomies.delete',$taxonomy->term_taxonomy_id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                                <a class="kt-nav__link edit_taxonomy" data-type="{{ $type }}" id="{{ $taxonomy->term_taxonomy_id }}" data-action-name="{{ route('supplier.taxonomies.edit') }}" href="#"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
    $('#GridTaxnomies').DataTable({
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
                                   
                                },
                            });
                        });
        })
    </script>
@endpush
