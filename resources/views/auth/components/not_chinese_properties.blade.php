<div class="row" id="not_chinese_properties" style="display:none">
    <div class="col-md-6">
        <!--begin::Form group Passport Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم جواز السفر</span>
            </label>
            <input id="passport_number_id" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم جواز السفر" name="passport_number" value="{{ old('passport_number') }}" required autocomplete="national_number"
            oninvalid="this.setCustomValidity('الرجاء ادخال رقم جواز السفر')"
            oninput="setCustomValidity('')"
            title="الرجاء تعبئة هذا الحقل"
            />
            @error('passport_number')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group Passport Number-->
    </div>
    <div class="col-md-6">
        <!--begin::Form group Passport Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>تاريخ انتهاء جواز السفر</span>
            </label>
            <div class="w-100 d-flex justify-content-between">
                <div class="col">
                    <select id="day_passport" name="day" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل">
                        <option >اليوم</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>

               <div class="col ">
                <select id="month_passport" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل">
                    <option value="">الشهر</option>
                    <option value="01">كانون الثاني</option>
                    <option value="02">شباط</option>
                    <option value="03">آذار</option>
                    <option value="04">نيسان</option>
                    <option value="05">آيار</option>
                    <option value="06">حزيران</option>
                    <option value="07">تموز</option>
                    <option value="08">آب</option>
                    <option value="09">ايلول</option>
                    <option value="10">تشرين الأول</option>
                    <option value="11">تشرين الثاني</option>
                    <option value="12">كانون الأول</option>
                </select>
               </div>
               <div class="col ">
                <select id="year_passport" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل" >
                    <option value="2011">السنة</option>
                    @for($year=1900;$year<=date("Y")+20;$year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
               </div>
                <input type="hidden" id="passport_end_date" name="passport_end_date" value="{{ old('passport_end_date') }}" />

            </div>
            @error('passport_end_date')
            <div class="fv-plugins-message-container">
                <div  class="fv-help-block">{{ $message }}</div>
            </div>
            @enderror
        </div>
        <!--end::Form group Passport Number-->
    </div>
    <div class="col-md-12">
    <!--begin::Form group Passport ID Picture-->
    <div class="form-group">
        <label class="font-size-h6 font-weight-bolder text-dark">
            <span class="required">*</span>
            <span>صورة عن جواز السفر الشخصية</span>
        </label>
        <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="passport_image" title="الرجاء تعبئة هذا الحقل">
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">قم بإسقاط الصور هنا أو انقر للتحميل</h3>
                <span class="dropzone-msg-desc">قم برفع 1 صورة واحدة كحد اقصى</span>
            </div>
        </div>
    </div>
    <!--end::Form group Passport ID Picture-->
    </div>

    <div class="col-md-12">
        <!--begin::Form group Passport ID Picture-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>صورة عن بطاقة التأشيرة الصينية</span>
            </label>
            <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="visa_image" title="الرجاء تعبئة هذا الحقل">
                <div class="dropzone-msg dz-message needsclick">
                    <h3 class="dropzone-msg-title">قم بإسقاط الصور هنا أو انقر للتحميل</h3>
                    <span class="dropzone-msg-desc">قم برفع 1 صورة واحدة كحد اقصى</span>
                </div>
            </div>
        </div>
        <!--end::Form group Passport ID Picture-->
        </div>

</div>
