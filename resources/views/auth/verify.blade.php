@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="  card card-custom gutter-b d-flex  align-items-stretch text-center" >
                <div class='h2 font-weight-bolder text-dark mb-6 '>{{__("قم بتأكيد بريدك الالكتروني")}}</div>

                <div class="card-body ">


                    <div class="h4 text-dark-50 font-weight-normal ">
                        {{ __('قبل المتابعة ، يرجى التأكد من بريدك الإلكتروني للحصول على رابط التحقق') }}
                    </div>
                 
                        <div>
                            <form class="d-inline " method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('انقر هنا لطلب آخر') }}</button>.
                            </form>
                        </div>

               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
    <style type="text/css">

        .h2 , .h4 {
            margin:35px 0 ;

        }

    </style>
@endpush

@push('scripts')
    

    <script>
        var err= "{{session('resent')}}";

        if(err){
            toastr.success('{{ __("تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني") }}');
        }

    </script>

@endpush