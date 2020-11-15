<div class="kt-portlet" id="Productype" style="" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                @switch($type)
                @case('product_cat')
                    الاصناف (Categories)
                    @break
                @case('product_tag')
                     Tags
                    @break
                @case('attributes')
                    السمات (Attributes)
                   @break
                @default

            @endswitch
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <table id="GridTaxnomies" class="table" style="direction:rtl;text-align:right">
            <thead class="thead-light">
                <tr>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
