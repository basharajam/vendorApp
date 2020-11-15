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
                    @if($type=='product_cat')
                    <th>الصورة</th>
                    @endif
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>slug</th>
                    <th>العدد</th>
                    <th>..</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $taxonomy)
                    <tr id="{{ $taxonomy->term_taxonomy_id }}">
                        @if($type=='product_cat')
                        <td class="datatable-cell">
                            <span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                    <div style="padding-left:10px;" class="symbol symbol-50 symbol-sm symbol-light-danger">
                                        <span class="symbol-label font-size-p" style="background-image:url({{ $taxonomy->image ?? '' }})"></span>
                                    </div>
                                </div>
                            </span>
                        </td>
                        @endif
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                     {{ $taxonomy->term->name }}
                                </div>
                            </span>
                        </td>
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                     {{ $taxonomy->term->description  ?? '--'}}
                                </div>
                            </span>
                        </td>
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                     {{ $taxonomy->term->slug }}
                                </div>
                            </span>
                        </td>
                        <td class="datatable-cell-sorted datatable-cell">
                            <span>
                                <div class="font-weight-bolder font-size-lg mb-0">
                                     {{ count($taxonomy->posts) }}
                                </div>
                            </span>
                        </td>
                        <td class="datatable-cell-sorted datatable-cell">
                            <a id="{{ $taxonomy->term_taxonomy_id }}" class="kt-nav__link mr-5 delete" data-action-name="{{ route('supplier.taxonomies.delete',$taxonomy->term_taxonomy_id) }}" href="javascript:;"  ><i class="kt-nav__link-icon flaticon2-trash "></i></a>
                            <a class="kt-nav__link"  href="{{ route('supplier.taxonomies.edit',$taxonomy->term_taxonomy_id) }}"  ><i class="kt-nav__link-icon color-primary flaticon-edit-1 "></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
