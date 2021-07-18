<div class="kt-header__bottom">
    <div class="kt-container kt-container--fluid">
        <!-- begin: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
        <div class="kt-header-menu-wrapper d-flex justify-content-center" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right" style="direction:rlt;">
                <ul class="kt-menu__nav">
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName() == 'supplier.home') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.home') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("الرئيسية")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (request()->is('supplier/products/*') || request()->is('supplier/products'))  ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.products.index') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("المنتجات")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier.categories') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.categories') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("الأصناف")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier.attributes') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.attributes') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("السمات")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier.tags') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.tags') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("التاغات")}}</span><i class=""></i></a></li>                    
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier.properties') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.properties') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("الخصائص")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{(request()->is('supplier/orders/*') || request()->is('supplier/orders')) ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.orders') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("الطلبات")}}</span><i class=""></i></a></li>
                    <li class="kt-menu__item kt-menu__item--rel {{ (Route::currentRouteName()  == 'supplier.support_view') ? ' kt-menu__item--active' : '' }} kt-menu__item--open" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="{{ route('supplier.support_view') }}"  class="kt-menu__link "><span class="kt-menu__link-text">{{__("المساعدة")}}</span><i class=""></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
