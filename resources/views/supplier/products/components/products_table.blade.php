<table id="GridStudents" class="table" style="direction:rtl;text-align:right">
    <thead class="thead-light">
        <tr>
            <th class="">
                <span>المنتج</span>
                <div class="font-weight-bold text-muted">Product </div>
            </th>
            <th class="">
                <span>فئة المنتج</span>
                <div class="font-weight-bold text-muted">Product Category</div>
            </th>
            <th class="">
                <span>السعر</span>
                <div class="font-weight-bold text-muted">Price</div>
            </th>
            <th class="">
                <span>السعر بعد الحسم</span>
                <div class="font-weight-bold text-muted">Price After Discount</div>
            </th>
            <th class="">
                <span>الحجم</span>
                <div class="font-weight-bold text-muted">Size</div>
            </th>
             <th class="">
                <span>الوزن</span>
                <div class="font-weight-bold text-muted">Weight</div>
            </th>
              <th class="">
                <span>CMB</span>
                <div class="font-weight-bold text-muted">CBM</div>
            </th>
            <th>.</th>
        </tr>
    </thead>
    <tbody style="direction:rtl;text-align:right">
            @foreach($products as $product)
            @php
                $meta = $product->meta;
            @endphp
            <tr id="{{ $product->ID }}">
                <td class="datatable-cell">
                    <span style="width: 250px;">
                        <div class="d-flex align-items-center">
                            <div style="padding-left:10px;" class="symbol symbol-50   symbol-sm symbol-light-danger">
                                <span class="symbol-label font-size-p" style="background-image:url(/path/to/image)"></span>
                            </div>
                            <div class="ml-3">
                                <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                       {{$product->post_title}}
                                </div>
                                <span  class="text-muted font-weight-bold text-hover-primary ">
                                    @if($meta && count($meta)>0 && array_key_exists('product_number',$meta))
                                    {{ $meta['product_number'] }}
                                 @endif
                                </span>
                            </div>
                        </div>
                    </span>
                </td>

                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                             @if($product->category)
                             {{ $product->category->term->name }}
                             @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                            @if($meta && count($meta)>0 && array_key_exists('product_price',$meta))
                            {{ $meta['product_price'] }}
                         @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                            @if($meta && count($meta)>0 && array_key_exists('product_price_after_discount',$meta))
                            {{ $meta['product_price_after_discount'] }}
                         @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                            @if($meta && count($meta)>0 && array_key_exists('product_size',$meta))
                            {{ $meta['product_size'] }}
                         @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                            @if($meta && count($meta)>0 && array_key_exists('weight',$meta))
                            {{ $meta['weight'] }}
                         @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <span>
                        <div class="font-weight-bolder font-size-lg mb-0">
                            @if($meta && count($meta)>0 && array_key_exists('cbm',$meta))
                            {{ $meta['cbm'] }}
                         @endif
                        </div>
                    </span>
                </td>
                <td class="datatable-cell-sorted datatable-cell">
                    <a id="{{ $product->ID }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier.products.delete',$product->ID) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                    <a class="kt-nav__link"  href="{{ route('supplier.products.edit',$product->ID) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
