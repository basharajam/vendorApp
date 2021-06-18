<div class="kt-portlet__head-label">
    <h3 class="kt-portlet__head-title font-weight-bolder font-size-h1" style="text-align: right">
            {{__("الخصائص")}}
    </h3>
</div>
<div class="PropsContainer accordion accordion-solid accordion-panel accordion-svg-toggle" id="accordionExample8">
    

    @foreach ($Props as $prop)
        
        <div class="card mb-10 mt-10" id="prop{{ $prop['id'] }}">
            <div class="card-header" id="headingOne8" data-toggle="collapse" data-target="#collapseOne{{ $prop['id'] }}" aria-expanded="false">
                <div class="card-title" >
                    <div class="card-label">
                        <h3 class="font-weight-bolder font-size-h3">
                        <span> {{ str_replace('pa_','',$prop['PropName']) }} ( {{ $prop['Category']['name'] }} ) </span>
                        </h3>
                    </div>
                    <a href="#"  title="تعديل" class="btn btn-icon btn-primary btn-xs edit_property ml-3" id="{{ $prop['id'] }}" data-action-name="{{ route('EditProp') }}">
                        <i class="flaticon-edit-1  font-weigh-bolder"></i>
                    </a>
                    <a href="javascript:;"  data-type="property" data-remove="#prop{{ $prop['id'] }}"  data-action-name="{{ route('DelProp',$prop['id']) }}" title="{{__('حذف')}}" class="btn btn-icon btn-danger btn-xs delete ml-3">
                        <i class="flaticon2-trash font-weigh-bolder"></i>
                    </a>
                   
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
            <div id="collapseOne{{ $prop['id'] }}" class="collapse w-100"  style="">
                <div class="card-body w-100">
                    <div class="row w-100">
                        <div class="col-12">

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

            //By Blaxk
            $(function(){

                $(document).on('click','.edit_property',function(event){
                            event.preventDefault();
                            let url = $(this).attr("data-action-name");
                            let id =$(this).attr('id');
                            let  csrf_token = $('meta[name="csrf-token"]').attr('content');
                            let property_data ={
                                "property_id":id
                            }
                            $.ajax(url,{
                                type:"POST",
                                async:true,
                                headers: {
                                'X-CSRF-Token': csrf_token
                                },
                                data:property_data,
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
