<div class="modal fade " id="AddTermModal" tabindex="-1" role="dialog" aria-labelledby="editTaxonomy" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLable"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <form method="POST" action="{{ route('supplier.terms.store') }}">
                <input type="hidden" name="taxonomy" id="taxonomy_type" value="{{ $taxonomy_type  ?? ''}}">
                @include('supplier.taxonomies.components.taxonomy_form',['taxonomy'=>null])
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("إلغاء")}}</button>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>

