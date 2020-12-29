@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid h-100 pb-10">
    <div class="container-fluid h-100">

        <div class="card card-custom gutter-b  h-100 d-flex align-items-center">
            <div class="row h-100 d-flex align-items-center" >
                <div class="col-md-5">
                    <div class="text-center pt-15 w-100">
                        <h1 class="h2 font-weight-bolder text-dark mb-6">هل أنت بحاجة إلى مساعدة؟</h1>
                        <div class="h4 text-dark-50 font-weight-normal">ارسل طلب المساعدة الخاص بك إلى أحد الخبراء</div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12">
                                <span class="svg-icon svg-icon-full">
                                   @include('supplier.support.components.support_svg')
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    @include('supplier_manager.support.components.support_form',['type'=>"App\Models\SupplierManager"])
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
