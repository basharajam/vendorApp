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
                      @switch($type)
                          @case('product_cat')
                              (category)  إضافة صنف جديد
                              @break
                          @case('product_tag')
                               (tag) إضافة تاغ
                              @break
                          @case('attributes')
                              (Attribute) إضافة سمة جديدة
                             @break
                          @default

                      @endswitch
                    </h2>
                </div>
            </div>
        </div>
        <div class="kt-widget__body">
           <form action="{{ route('supplier.taxonomies.store') }}" method="POST" enctype="multipart/form-data">
                @include('supplier.taxonomies.components.taxonomy_form')
           </form>
        </div>
    </div>
</div>
@push('scripts')
<script>

</script>
@endpush
