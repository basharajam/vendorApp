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
            <label class="checkbox checkbox-lg checkbox-primary flex-shrink-0 m-0 mr-4">
                <input type="checkbox" name="product_tags[]" value="{{ $tag->term_taxonomy_id}}" @if(in_array($tag->term_taxonomy_id,$product_tags)) checked @endif>
                <span></span>
            </label>
            <!--end::Checkbox-->
            <!--begin::Text-->
            <div class="d-flex flex-column flex-grow-1 py-2" style="text-align: right" >
                <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1 mr-10">
                    {{ $tag->term->name }}
                </a>
            </div>
            <!--end::Text-->
        </div>
        <!--end::Item-->

        @endforeach

    </div>


