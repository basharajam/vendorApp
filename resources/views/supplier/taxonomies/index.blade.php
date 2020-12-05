@extends('layouts.app')

@section('content')
<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="kt-portlet kt-portlet--height-fluid-">
                    @include('supplier.taxonomies.components.add_card')
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-12">
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-12">
                            @include('supplier.taxonomies.components.taxonomy_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush
