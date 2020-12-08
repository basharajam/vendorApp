@auth
<div class="modal fade " id="ProfitRatioModel" tabindex="-1" role="dialog" aria-labelledby="editTaxonomy" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLable"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="POST" action="{{route('supplier_manager.profit.store') }}">
                @csrf
                <input type="hidden" name="id"  value="{{\Auth::user()->userable->id  ?? ''}}">
                <div class="row" style="direction: rtl">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">
                                <span> النسبة </span>
                                <span class="required">*</span>
                            </label>
                            <input  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="" name="profit_ratio" value="{{ \Auth::user()->userable->profit_ratio ?? old('profit_ratio') }}" required  />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
@endauth
