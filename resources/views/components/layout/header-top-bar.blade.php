<div>
    <div class="kt-header__top ">
        <div class="kt-container kt-container--fluid ">
            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar" >

                <div class="langSelector">
                    <button id='LangSelectorBut' class="LangSelectorBut"  >
                        
                        @if (app()->getLocale() ==="ar")
                         <span class="flag-icon flag-icon-sa"></span><span></span>
                        @endif
                        @if (app()->getLocale() ==="en")
                         <span class="flag-icon flag-icon-us"></span><span></span>
                        @endif
                        @if (app()->getLocale() ==="ch")
                         <span class="flag-icon flag-icon-cn"></span><span></span>
                        @endif
                    </button>
                    <ul class="langSelList" >
                        <li>
                            <a href="{{ route('setLangEn') }}"><span class="flag-icon flag-icon-us"></span>English </a>
                        </li>
                        <li>
                            <a href="{{ route('setLangAr') }}"><span class="flag-icon flag-icon-sa"></span>العربية </a></li>
                        <li>
                            <a href="{{ route('setLangCh') }}"><span class="flag-icon flag-icon-cn"></span>  中文  </a>
                        </li>
                    </ul>
                </div>
                <x-layout.header-user-bar/>
     
            </div>
            <!-- end:: Header Topbar -->
            <!-- begin:: Brand -->
            <div class="kt-header__brand   kt-grid__item" id="kt_header_brand" style="margin: auto">
                <div class="kt-header__brand-nav">
                   <img src="/images/logo.png">

                </div>
            </div>
            <!-- end:: Brand -->

        </div>
    </div>
</div>
