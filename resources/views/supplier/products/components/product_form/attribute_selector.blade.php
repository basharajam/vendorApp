<div class="col-12">
    <div class="form-group">
        <label class="col-form-label col-12 font-size-h6 font-weight-bolder text-dark" >
            <span>{{ str_replace('pa_','',$taxonomy) }}</span>
            <span class="required">*</span>

        </label>
        <div class="kt-input-icon d-flex justify-content-center" >
            <select  id="attributesSelectorInput"   name="taxonomies_relation[]" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6 tagsinput-field" data-role="tagsinput" multiple>
                @foreach($terms as $term)
                <option value="{{ $term->term_taxonomy_id }}" @if(in_array($term->term_taxonomy_id,$selected_terms->pluck('term_taxonomy_id')->toArray())) selected @endif>{{ $term->term->name }}</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-success add_new_term" data-taxonomy-type="{{ $taxonomy }}">
                إضافة
            </button>
        </div>


    </div>
</div>

