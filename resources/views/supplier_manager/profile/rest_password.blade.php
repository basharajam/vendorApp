<div class="main-card mb-3 card w-100" >
    <div class="card-body">
        <div class="kt-section">
            <div class="kt-section__content">
                <h4 class="d-flex justify-content-between">
                    {{__('لتغيير كلمة المرور الرجاء الضغط على الرابط لارسال طلب تغيير كلمة مرور الى بريدك الالكتروني')}}
                </h4>
                <form action="{{ route('RestPassPost') }}" method="post">
                    <input type="hidden" name="email" value="{{$profile->user->email}}">
                    <input type="submit"  class='d-flex btn btn-link align-items-center font-size-h3 font-weight-bold' value="{{__('أضغط هنا لارسال الطلب')}}">
                    {{ csrf_field() }}
                </form>
            </div>

        </div>
    </div>
</div>
