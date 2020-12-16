@auth
<div id="kt_header" class="kt-header kt-grid__item kt-header--fixed " data-ktheader-minimize="on">
    <x-layout.header-top-bar/>
    @if(auth()->user()->hasRole(\App\Constants\UserRoles::SUPPLIER))
    <x-layout.header-menu-supplier/>
    @else
    <x-layout.header-menu-supplier-manager/>
    @endif
</div>
@endauth
