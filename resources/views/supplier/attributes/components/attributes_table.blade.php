<div class="kt-portlet__head-label">
    <h3 class="kt-portlet__head-title font-weight-bolder font-size-h1" style="text-align: right">
            السمات
    </h3>
</div>
<div class="accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
    @foreach($data as $taxonomy)
    <div class="card mb-10 mt-10">
        <div class="card-header" id="headingOne8" data-toggle="collapse" data-target="#collapseOne{{ $taxonomy->term_taxonomy_id }}" aria-expanded="false">
            <div class="card-title" >
                <div class="card-label">
                    <h3 class="font-weight-bolder font-size-h3">
                      <span> {{ str_replace('pa_','',$taxonomy->taxonomy) }}</span>
                    </h3>
                </div>
                <a href="#" data-type="{{ $taxonomy->taxonomy }}"  data-action-name="{{ route('supplier.attributes.addTerm') }}" title="اضافة مصطلح" class="btn btn-icon btn-success btn-xs add_term ml-3">
                    <i class="flaticon2-plus font-weigh-bolder"></i>
                </a>
                @if($taxonomy->taxonomy== "pa_color" || $taxonomy->taxonomy=="pa_size" || $taxonomy->taxonomy=="pa_language" || $taxonomy->taxonomy=="pa_packing")
                @else
                <a href="#"  id="{{ $taxonomy->term_taxonomy_id }}" data-type="{{ $taxonomy->taxonomy }}"  data-action-name="{{ route('supplier.attributes.edit') }}" title="تعديل" class="btn btn-icon btn-primary btn-xs edit_attribute ml-3">
                    <i class="flaticon-edit-1  font-weigh-bolder"></i>
                </a>
                <a href="javascript:;"  data-type="{{ $taxonomy->taxonomy }}"  data-action-name="{{ route('supplier.taxonomies.delete',$taxonomy->term_taxonomy_id) }}" title="حذف" class="btn btn-icon btn-danger btn-xs delete ml-3">
                    <i class="flaticon2-trash font-weigh-bolder"></i>
                </a>
                @endif
                <span class="svg-icon">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>

            </div>
        </div>
        <div id="collapseOne{{ $taxonomy->term_taxonomy_id }}" class="collapse w-100"  style="">
            <div class="card-body w-100">
                <div class="row w-100">
                    <div class="col-12">
                        <ul class="attributes_list w-100">
                        @foreach($taxonomy->terms as $term)
                        <li class="w-100 list-item ">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <div>
                                    <span class="font-weight-bolder font-size-h4">
                                        {{ $term->term->name }}
                                    </span>
                                    <div class="badge badge-info mr-5">
                                       {{ count($term->posts) }}
                                    </div>

                                </div>
                                <div class="tools">
                                    <a href="#"  id="{{ $term->term_taxonomy_id }}" data-type="{{ $type }}"  data-action-name="{{ route('supplier.taxonomies.edit') }}" title="تعديل" class="btn btn-icon btn-primary btn-xs edit_taxonomy ml-3">
                                        <i class="flaticon-edit-1  font-weigh-bolder"></i>
                                    </a>
                                    <a href="javascript:;" id="{{ $term->term_taxonomy_id }}"    data-action-name="{{ route('supplier.taxonomies.delete',$taxonomy->term_taxonomy_id) }}" title="حذف" class="btn btn-icon btn-danger btn-xs delete ml-3">
                                        <i class="flaticon2-trash font-weigh-bolder"></i>
                                    </a>
                                </div>

                            </div>



                        </li>
                        @endforeach

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
