@extends('layouts.app')



@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        {{ $supplier->full_name }}
                        <span class="d-block text-muted pt-2 font-size-sm"></span>
                    </h3>
                </div>

            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <form class="form" class="w-100" method="POST" action="{{ route('supplier_manager.suppliers.update') }}" id="supplier_registeration_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
                                    <input type="hidden" name="manager_id" value="{{ \Auth::user()->userable_id }}">
                                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                                       <!--begin::Title-->
                                        <div class="text-center pb-8">
                                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('تعديل حساب مورد')}}</h2>
                                        </div>
                                        <!--end::Title-->
                                    @include('auth.components.supplier-registeration-form',['supplier'=>$supplier])
                                </form>
                            </div>

                        </div>
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
