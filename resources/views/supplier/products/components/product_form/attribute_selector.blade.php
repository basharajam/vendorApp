<div class="col-12">
    <div class="form-group">
        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
            <span>{{ str_replace('pa_','',$taxonomy->taxonomy) }}</span>
            <span class="required">*</span>
        </label>
        <div class="kt-input-icon">
            <select  class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                    id=""
                    name="" multiple>
                    <option></option>
                    @foreach($taxonomy->terms as $term)
                        <option value="{{ $term->term_taxonomy_id }}">{{ $term->term->name }}</option>
                    @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-success">
            Add
        </button>

    </div>
</div>
