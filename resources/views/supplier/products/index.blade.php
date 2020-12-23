@extends('layouts.app')



@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">المنتجات
                        @if(\Auth::user()->hasRole(\UserRoles::SUPPLIERMANAGER))
                            @if(Route::currentRouteName()  == 'supplier_manager.suppliers.all_products')
                            <span class="d-block text-muted pt-2 font-size-sm">المنتجات الخاصة بالموردين لديك</span></h3>
                            @elseif(Route::currentRouteName()=='supplier_manager.suppliers.products')
                            <span class="d-block text-muted pt-2 font-size-sm">المنتجات الخاصة ب {{ $supplier->fullname }}</span></h3>
                            @endif
                        @else
                        <span class="d-block text-muted pt-2 font-size-sm">المنتجات الخاصة بك</span></h3>
                        @endif
                </div>
                <div class="card-toolbar">

                    <!--begin::Button-->
                    <a href="{{ route('supplier.products.create') }}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        إضافة منتج جديد
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <circle fill="#000000" cx="9" cy="15" r="6"></circle>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span></a>
                    {{-- <div>
                        <form action="{{ route('supplier.products.import') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" style="width:200px">
                            <button type="submit">save</button>
                        </form>
                    </div> --}}
                    <!--end::Button-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        @include('supplier.products.components.products_table')
                    </div>

                </div>
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>

@endsection


@push('scripts')

@endpush
