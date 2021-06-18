<div class="kt-header__topbar-item kt-header__topbar-item--user">
    @auth
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false"
            style="flex-direction: row-reverse">
            <span class="kt-header__topbar-welcome"> </span>
            <span class="kt-header__topbar-username ml-5 font-size-h4" v-if="user">{{ \Auth::user()->name }}</span>
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded ">
                {{ \Auth::user()->name[0] }}
            </span>
        </div>
    @endauth
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
        <!--begin: Head -->
        <div class="kt-notification">
            @if (auth()
        ->user()
        ->hasRole(\App\Constants\UserRoles::SUPPLIER))
                <a href="{{ route('supplier.profile') }}" class="kt-notification__item"
                    style="direction: ltr;text-align:right">
                    <div class="kt-notification__item-details">
                        {{-- <div class="kt-notification__item-time"></div> --}}
                        <div class="kt-notification__item-title kt-font-bold mr-4">{{__("الصفحة الشخصية")}}</div>
                    </div>
                    <div class="kt-notification__item-icon"><i class="flaticon2-calendar-3 kt-font-success"></i></div>
                </a>
            @else
                <a href="{{ route('supplier_manager.profile') }}" class="kt-notification__item"
                    style="direction: ltr;text-align:right">
                    <div class="kt-notification__item-details">
                        {{-- <div class="kt-notification__item-time"></div> --}}
                        <div class="kt-notification__item-title kt-font-bold mr-4">{{__("الصفحة الشخصية")}}</div>
                    </div>
                    <div class="kt-notification__item-icon"><i class="flaticon2-calendar-3 kt-font-success"></i></div>
                </a>
            @endif

            <div class="kt-notification__custom kt-space-between">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"
                    class="btn btn-label btn-label-brand btn-sm btn-bold">{{__("تسجيل خروج")}}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <!--end: Navigation -->
        </div>
    </div>
    <!--end: User bar -->
</div>
