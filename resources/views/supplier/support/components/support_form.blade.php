 <!--begin::Form-->
 <form class="form" action="{{ route('supplier.send_request') }}" method="POST">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Input-->
                <input type="hidden" name="requestable_id" value="{{ \Auth::user()->id }}">
                <input type="hidden" name="requestable_type" value="{{ $type }}">
                <div class="form-group">
                    <label for="name" class="font-size-h6 font-weight-bolder text-dark">
                        <span>الاسم</span>
                        <span class="required">*</span>
                    </label>
                    <input id="name"  name="name" type="text" class="form-control form-control-solid form-control-lg" placeholder="الاسم الكامل" required>
                    @error('name')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror
                </div>
                <!--end::Input-->
                <!--begin::Input-->
                <div class="form-group">
                    <label for="phone" class="font-size-h6 font-weight-bolder text-dark">
                        <span>الهاتف</span>
                        <span class="required">*</span>
                    </label>
                    <input id="phone" name="phone" type="text" class="form-control form-control-solid form-control-lg" placeholder="رقم الهاتف" required>
                    @error('phone')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror
                </div>
                <!--end::Input-->
                <!--begin::Input-->
                <div class="form-group">
                    <label for="email" class="font-size-h6 font-weight-bolder text-dark">
                        <span>البريد الالكتروني</span>
                        <span class="required">*</span>
                    </label>
                    <input id="email" type="email" name="email" class="form-control form-control-solid form-control-lg" placeholder="البرديد الالكتروني" required>
                    @error('email')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror
                </div>
                <!--end::Input-->
                <!--begin::Input-->
                <div class="form-group">
                    @error('message')
                    <div class="fv-plugins-message-container">
                        <div  class="fv-help-block">{{ $message }}</div>
                    </div>
                    @enderror
                    <label for="exampleTextarea" class="font-size-h6 font-weight-bolder text-dark">
                        <span>الرسالة\الاستفسار</span>
                        <span class="required">*</span>
                    </label>
                    <textarea class="form-control form-control-solid form-control-lg" id="exampleTextarea" rows="3" name="message" required></textarea>
                    <span class="form-text text-muted"> تنويه: لن نقوم بنشر معلوماتك بأي مكان</span>
                </div>
                <!--end::Input-->
            </div>
        </div>
    </div>
    <!--begin::Actions-->
    <div class="card-footer">
        <div class="row">
            <div class="col-xl-3"></div>
            <div class="col-xl-6">
                <button type="submit" class="btn btn-success font-weight-bold mr-2">إرسال</button>
                <button type="reset" class="btn btn-clean btn-danger font-weight-bold">إلغاء</button>
            </div>
            <div class="col-xl-3"></div>
        </div>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->
