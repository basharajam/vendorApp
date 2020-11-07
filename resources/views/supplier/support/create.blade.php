@extends('layouts.app')

@section('content')
<div class="d-flex flex-column-fluid">
    <div class="container-fluid">

        <div class="card card-custom gutter-b d-flex">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center pt-15 w-100">
                        <h1 class="h2 font-weight-bolder text-dark mb-6">هل أنت بحاجة إلى مساعدة؟</h1>
                        <div class="h4 text-dark-50 font-weight-normal">ارسل طلب المساعدةالخاص بك إلى أحد الخبراء</div>
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
                    @include('supplier.support.components.support_form',['type'=>"App\Models\Supplier"])
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
