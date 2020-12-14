<div class="main-card mb-3 card w-100" id="EditCard">
    <div class="card-body">
        <div class="kt-section">
            <div class="kt-section__content">
                <form class="form" class="w-100" method="POST" action="{{ route('supplier.profile.update') }}" id="supplier_registeration_form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="role" value="{{ \App\Constants\UserRoles::SUPPLIER }}">
                    <input type="hidden" name="id" value="{{ $supplier->id }}">
                    @include('auth.components.supplier-registeration-form',['supplier'=>$supplier])
                </form>
            </div>

        </div>
    </div>
</div>
