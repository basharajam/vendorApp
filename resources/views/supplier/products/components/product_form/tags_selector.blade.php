@php
$product_tags = [];
if($product){
    $product_tags = $product->tags->pluck('term_taxonomy_id')->toArray();
}
@endphp
    <div class="w-100" style="max-height: 400px; overflow-y:scroll;border:1px solid #aaa">
        @foreach($tags as $tag)
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-6">
            <!--begin::Checkbox-->
            <label class="checkbox checkbox-lg flex-shrink-0 m-0 mr-4">
                <input type="checkbox" name="product_tags[]" value="{{ $tag->term_taxonomy_id}}" @if(in_array($tag->term_taxonomy_id,$product_tags)) checked @endif>
                <span></span>
                <div class="mr-4">  {{ $tag->term->name }}</div>

            </label>
            <!--end::Checkbox-->

        </div>
        <!--end::Item-->

        @endforeach

    </div>


