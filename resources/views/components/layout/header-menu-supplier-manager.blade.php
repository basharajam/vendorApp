<div class="kt-header__bottom">
    <div class="kt-container kt-container--fluid">
        <!-- begin: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper d-flex justify-content-center" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right" style="direction:rlt;">
                <ul class="kt-menu__nav">
                    {{-- <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName() == 'supplier_manager.home') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{route('supplier_manager.home') }}"  class="kt-menu__link "><span class="kt-menu__link-text">الرئيسية</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a></li> --}}
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName() == 'supplier_manager.suppliers.index')  ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{route('supplier_manager.suppliers.index') }}"  class="kt-menu__link "><span class="kt-menu__link-text">الموردين</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (request()->is('supplier_manager/orders/*') || request()->is('supplier_manager/orders')) ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{route('supplier_manager.orders') }}"  class="kt-menu__link "><span class="kt-menu__link-text">طلبات الموردين</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier_manager.support_view') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier_manager.support_view') }}"  class="kt-menu__link "><span class="kt-menu__link-text">المساعدة</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier_manager.profit_ratio.index') ? ' kt-menu__item--active' : '' }} kt-menu__item--open"  aria-haspopup="true"><a href="{{ route('supplier_manager.profit.index') }}"  class="kt-menu__link "><span class="kt-menu__link-text">نسبة الربح</span><i class=""></i></a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
