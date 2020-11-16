<div class="kt-portlet" id="Productype" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                    السمات (Attributes)
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <table id="GridTaxnomies" class="table" style="direction:rtl;text-align:right">
            <thead class="thead-light">
                <tr>

                    <th>الاسم</th>
                    <th>slug</th>
                    <th>Terms</th>
                    <th>Count</th>
                    <th>..</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $taxonomy)
                    <tr id="{{ $taxonomy->term_taxonomy_id }}">
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                    {{ str_replace('pa_','',$taxonomy->taxonomy) }}
                                </div>
                            </span>
                        </td>

                        <td class="datatable-cell-sorted datatable-cell ">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                     {{ $taxonomy->term->slug }}
                                </div>
                            </span>
                        </td>
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0" style="max-width:300px;word-wrap:break-word ">
                                    @foreach($taxonomy->terms as $term)
                                        <span class="label font-weight-bold label-lg label-light-default label-inline">
                                            <a href="#" class="edit_taxonomy" data-type="{{ $type }}" id="{{ $term->term_taxonomy_id }}" data-action-name="{{ route('supplier.taxonomies.edit') }}">
                                                {{ $term->term->name }}
                                            </a>
                                             <span id="{{ $term->term_taxonomy_id }}" class="delete" data-action-name="{{ route('supplier.taxonomies.delete',$term->term_taxonomy_id) }}" href="javascript:;"  ><i class="kt-nav__link-icon fas fa-times "></i></span>
                                        </span>
                                    @endforeach
                                    <a href="#" class="add_term" data-type="{{ $taxonomy->taxonomy }}" data-action-name="{{ route('supplier.attributes.addTerm') }}">Add Term</a>
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
                        <td class="datatable-cell-sorted datatable-cell">
                            @if($taxonomy->taxonomy== "pa_color" || $taxonomy->taxonomy=="pa_size" || $taxonomy->taxonomy=="pa_language" || $taxonomy->taxonomy=="pa_packing")
                            <span>-</span>
                            @else
                                <a id="{{ $taxonomy->term_taxonomy_id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier.taxonomies.delete',$taxonomy->term_taxonomy_id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                                <a class="kt-nav__link edit_attribute" data-type="{{ $type }}" id="{{ $taxonomy->term_taxonomy_id }}" data-action-name="{{ route('supplier.attributes.edit') }}" href="#"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
} );
</script>
    <script>
        $(function(){

            function callModal(action,modal_data,modal_id){
                let  csrf_token = $('meta[name="csrf-token"]').attr('content');
                $.ajax(action,{
                                type:"POST",
                                async:true,
                                headers: {
                                'X-CSRF-Token': csrf_token
                                },
                                data:modal_data,
                                success:function(response){
                                    if(response)
                                    {
                                        $('body').prepend(response);
                                        switch(modal_id){
                                            case "EditModal":
                                                console.log('edit modal')
                                                $("#EditModal").modal('show');
                                                break;
                                            case "EditAttributeModal":
                                                console.log('edit attribute modal')
                                                $("#EditAttributeModal").modal('show');
                                                break;
                                            case "AddTermModal":
                                                $("#AddTermModal").modal('show');
                                                break;

                                        }
                                    }
                                },
                                error:function(error){
                                    console.log(error);
                                },
                            });
            }

            $(".edit_taxonomy").click(function(event){
                            event.preventDefault();
                            let url = $(this).attr("data-action-name");
                            let id =$(this).attr('id');
                            let taxonomy_type =$(this).attr('data-type');
                            let taxonomy_data ={

                                "type":taxonomy_type,
                                "term_taxonomy_id":id
                            }
                        callModal(url,taxonomy_data,'EditModal')

            });
            $('.edit_attribute').click(function(event){
                console.log('edit attribu');
                event.preventDefault();
                            let url = $(this).attr("data-action-name");
                            let id =$(this).attr('id');
                            let taxonomy_type =$(this).attr('data-type');
                            let taxonomy_data ={

                                "type":taxonomy_type,
                                "term_taxonomy_id":id
                            }
                            callModal(url,taxonomy_data,'EditAttributeModal')
            });
            $('.add_term').click(function(event){
                event.preventDefault();
                            let url = $(this).attr("data-action-name");
                            let id =$(this).attr('id');
                            let taxonomy_type =$(this).attr('data-type');
                            let taxonomy_data ={
                                "type":taxonomy_type,
                                "term_taxonomy_id":id
                            }
                            callModal(url,taxonomy_data,'AddTermModal')
            });

        });
    </script>
@endpush
