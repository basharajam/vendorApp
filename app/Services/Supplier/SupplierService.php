<?php


namespace App\Services\Supplier;


use App\Repositories\SupplierRepository;
use App\Services\Contracts\BaseService;

use Illuminate\Http\Request;
use App\Models\Supplier;

/**
 * Class SupplierService
 * @package App\Services\Supplier
 */
class SupplierService extends BaseService implements ISupplierService
{
    /**
     * SupplierService constructor.
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
    {
        parent::__construct($repository);
    }

    public function store(Request $request)
    {
        $supplier =  $this->repository->create($request->all());

        if(isset($request->national_id_image))
            $supplier->addMedia(storage_path('tmp/uploads/' . $request->national_id_image))->toMediaCollection('national_id_images');
        if(isset($request->passport_image))
            $supplier->addMedia(storage_path('tmp/uploads/' . $request->passport_image))->toMediaCollection('passport_images');

        if(isset($request->visa_image))
            $supplier->addMedia(storage_path('tmp/uploads/' . $request->visa_image))->toMediaCollection('visa_images');

        return $supplier;
    }

}
