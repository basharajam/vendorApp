@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="kt-portlet kt-portlet--height-fluid-">
                    @include('supplier_manager.taxonomies.components.add_card')
                </div>
            </div>
            <div class="col-md-9 col-sm-6 col-12">
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card card-custom">
                                <!--begin::Header-->
                                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                    <div class="card-title">
                                        <h3 class="card-label">{{__('نسبة الربح')}}
                                        <span class="d-block text-muted pt-2 font-size-sm">{{__('نسب الربح لكل فئة')}}</span></h3>
                                    </div>
                                    <div class="card-toolbar">

                                    </div>

                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body">
                                    <div class="kt-section">
                                        <div class="kt-section__content">
                                            @include('supplier_manager.profit_ratio.components.ratio_table')
                                        </div>

                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection


@push('scripts')

@endpush
