<div class="kt-portlet" id="PorpsInfo" style="cursor: pointer" >
    <input type="hidden" name="supplierU" value="{{ \Auth::user()->username }}" >
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title" id="headingOne8" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false">{{__('خصائص اضافية')}}</h3>
        </div>
    </div>
    <div id="collapseOne" class="collapse w-100" >
        <div class="kt-portlet__body">
               @include('supplier.products.components.product_form.props_form',['props'=>$props,'where'=>$where])
        </div>
    </div>
</div>


