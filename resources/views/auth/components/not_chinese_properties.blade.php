<div class="row" id="not_chinese_properties" style="display:none">
    <div class="col-md-6">
        <!--begin::Form group Passport Number-->
        <div class="form-group">
            <label class="font-size-h6 font-weight-bolder text-dark">
                <span class="required">*</span>
                <span>رقم جواز السفر</span>
            </label>
            <input id="passport_number_id" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="رقم جواز السفر" name="passport_number" value="{{ old('passport_number') }}" required autocomplete="national_number"
            oninvalid="this.setCustomValidity(' الرجاء ادخال رقم جواز السفر والذي يتكون من 16 محرف')"
            oninput="setCustomValidity('')"
            title="الرجاء تعبئة هذا الحقل"
            pattern="[a-zA-Z0-9]{16}"

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
                    <select id="day_passport" name="day" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل" required
                    oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                    oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل">
                        <option >اليوم</option>
                        <option value="01" @if(date('d',strtotime(old('passport_end_date')))==1) selected @endif>1</option>
                        <option value="02" @if(date('d',strtotime(old('passport_end_date')))==2) selected @endif>2</option>
                        <option value="03" @if(date('d',strtotime(old('passport_end_date')))==3) selected @endif>3</option>
                        <option value="04" @if(date('d',strtotime(old('passport_end_date')))==4) selected @endif>4</option>
                        <option value="05" @if(date('d',strtotime(old('passport_end_date')))==5) selected @endif>5</option>
                        <option value="06" @if(date('d',strtotime(old('passport_end_date')))==6) selected @endif>6</option>
                        <option value="07" @if(date('d',strtotime(old('passport_end_date')))==7) selected @endif>7</option>
                        <option value="08" @if(date('d',strtotime(old('passport_end_date')))==8) selected @endif>8</option>
                        <option value="09" @if(date('d',strtotime(old('passport_end_date')))==9) selected @endif>9</option>
                        <option value="10" @if(date('d',strtotime(old('passport_end_date')))==10) selected @endif>10</option>
                        <option value="11" @if(date('d',strtotime(old('passport_end_date')))==11) selected @endif>11</option>
                        <option value="12" @if(date('d',strtotime(old('passport_end_date')))==12) selected @endif>12</option>
                        <option value="13" @if(date('d',strtotime(old('passport_end_date')))==13) selected @endif>13</option>
                        <option value="14" @if(date('d',strtotime(old('passport_end_date')))==14) selected @endif>14</option>
                        <option value="15" @if(date('d',strtotime(old('passport_end_date')))==15) selected @endif>15</option>
                        <option value="16" @if(date('d',strtotime(old('passport_end_date')))==16) selected @endif>16</option>
                        <option value="17" @if(date('d',strtotime(old('passport_end_date')))==17) selected @endif>17</option>
                        <option value="18" @if(date('d',strtotime(old('passport_end_date')))==18) selected @endif>18</option>
                        <option value="19" @if(date('d',strtotime(old('passport_end_date')))==19) selected @endif>19</option>
                        <option value="20" @if(date('d',strtotime(old('passport_end_date')))==20) selected @endif>20</option>
                        <option value="21" @if(date('d',strtotime(old('passport_end_date')))==21) selected @endif>21</option>
                        <option value="22" @if(date('d',strtotime(old('passport_end_date')))==22) selected @endif>22</option>
                        <option value="23" @if(date('d',strtotime(old('passport_end_date')))==23) selected @endif>23</option>
                        <option value="24" @if(date('d',strtotime(old('passport_end_date')))==24) selected @endif>24</option>
                        <option value="25" @if(date('d',strtotime(old('passport_end_date')))==25) selected @endif>25</option>
                        <option value="26" @if(date('d',strtotime(old('passport_end_date')))==26) selected @endif>26</option>
                        <option value="27" @if(date('d',strtotime(old('passport_end_date')))==27) selected @endif>27</option>
                        <option value="28" @if(date('d',strtotime(old('passport_end_date')))==28) selected @endif>28</option>
                        <option value="29" @if(date('d',strtotime(old('passport_end_date')))==29) selected @endif>29</option>
                        <option value="30" @if(date('d',strtotime(old('passport_end_date')))==30) selected @endif>30</option>
                        <option value="31" @if(date('d',strtotime(old('passport_end_date')))==31) selected @endif>31</option>
                    </select>
                </div>

               <div class="col ">
                <select id="month_passport" name="month" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6 " title="الرجاء تعبئة هذا الحقل"
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل"
                required>
                    <option value="">الشهر</option>
                    <option value="01" @if(date('m',strtotime(old('passport_end_date')))==1) selected @endif>كانون الثاني</option>
                    <option value="02" @if(date('m',strtotime(old('passport_end_date')))==2) selected @endif>شباط</option>
                    <option value="03" @if(date('m',strtotime(old('passport_end_date')))==3) selected @endif>آذار</option>
                    <option value="04" @if(date('m',strtotime(old('passport_end_date')))==4) selected @endif>نيسان</option>
                    <option value="05" @if(date('m',strtotime(old('passport_end_date')))==5) selected @endif>آيار</option>
                    <option value="06" @if(date('m',strtotime(old('passport_end_date')))==6) selected @endif>حزيران</option>
                    <option value="07" @if(date('m',strtotime(old('passport_end_date')))==7) selected @endif>تموز</option>
                    <option value="08" @if(date('m',strtotime(old('passport_end_date')))==8) selected @endif>آب</option>
                    <option value="09" @if(date('m',strtotime(old('passport_end_date')))==9) selected @endif>ايلول</option>
                    <option value="10" @if(date('m',strtotime(old('passport_end_date')))==10) selected @endif>تشرين الأول</option>
                    <option value="11" @if(date('m',strtotime(old('passport_end_date')))==11) selected @endif>تشرين الثاني</option>
                    <option value="12" @if(date('m',strtotime(old('passport_end_date')))==12) selected @endif>كانون الأول</option>
                </select>
               </div>
               <div class="col ">
                <select id="year_passport" name="year" class="form-control  h-auto py-7 px-6 rounded-lg font-size-h6" title="الرجاء تعبئة هذا الحقل"  required
                oninvalid="this.setCustomValidity('الرجاء تعبئة هذا الحقل')"
                oninput="setCustomValidity('')"   title="الرجاء تعبئة هذا الحقل">
                    <option value="2011">السنة</option>
                    @for($year=1900;$year<=date("Y")+20;$year++)
                    <option value="{{ $year }}"  @if(date('Y',strtotime(old('passport_end_date')))==$year) selected @endif>{{ $year }}</option>
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
        <input id="passport_image_value" type="hidden" name="passport_image" value="{{ old('passport_image') }}">
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
        <input id="visa_image_value" type="hidden" name="visa_image" value="{{ old('visa_image') }}">

        </div>

</div>
