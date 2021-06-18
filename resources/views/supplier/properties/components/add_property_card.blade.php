<div class="kt-portlet__body">
    <div class="kt-widget kt-widget--user-profile-4">
        <div class="kt-widget__head">
            <div class="kt-widget__media">
                <!--Product Image-->
                <h3></h3>
            </div>
            <div class="kt-widget__content">
                <div class="kt-widget__section">
                    <h2 class="kt-widget__username font-weight-bolder" id="product_name">
                         {{__("إضافة سمة جديدة")}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="kt-widget__body">
           <form action="{{ route('supplier.attributes.store') }}" method="POST" id="AtrributeForm" enctype="multipart/form-data">
                @include('supplier.properties.components.property_form',['where'=>'Add'])
           </form>
        </div>
    </div>
</div>
@push('scripts')
<script>

</script>
@endpush


@push('scripts')

@endpush
