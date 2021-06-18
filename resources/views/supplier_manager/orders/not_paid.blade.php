@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">{{__("الطلبات")}}
                    <span class="d-block text-muted pt-2 font-size-sm">{{__("الطلبات غير المدفوعة")}} </span></h3>
                </div>

            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        @include('supplier_manager.orders.components.orders_table')
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
