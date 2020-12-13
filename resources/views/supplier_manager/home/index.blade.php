@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid mb-10">
    <div class="container-fluid">
        <div class="row m-0 statsitcs-container">
            @include('supplier_manager.home.components.products_count')
            <div class="col-sm-1"></div>
            @include('supplier_manager.home.components.orders_count')
            <div class="col-sm-1"></div>
            @include('supplier_manager.home.components.suppliers_count')

        </div>
    </div>
</div>
@endsection
