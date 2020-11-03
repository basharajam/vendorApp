<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false">
        <span class="kt-header__topbar-welcome">Welcome </span>
            <span class="kt-header__topbar-username" v-if="user">Lama Sonmez</span>
            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded ">
                LS
            </span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
        <!--begin: Head -->
        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x">
                    <div class="kt-user-card__avatar">
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success ">L</span>
                    </div>
                    <div class="kt-user-card__name" v-if="user">
                        Lama Sonmez
                    </div>

        </div>
        <div class="kt-notification">
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon"><i class="flaticon2-calendar-3 kt-font-success"></i></div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">My Profile</div>
                            <div class="kt-notification__item-time"></div>
                        </div>
                    </a>
            <div class="kt-notification__custom kt-space-between">
                <a href="#"   class="btn btn-label btn-label-brand btn-sm btn-bold">تسجيل خروج</a>
            </div>
            <!--end: Navigation -->
        </div>
    </div>
    <!--end: User bar -->
</div>
