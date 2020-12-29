<?php


namespace App\Services\Supplier;

use App\Events\SupplierRegistered;
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
    /** get all manager's suppliers
     * @param $manager_id Supplier Manager
     * @return mixed
     */
    public function getSuppliersForManager($manager_id){
            return Supplier::where('manager_id',$manager_id)->get();
    }
    //storage_path('app/public/
    public function store(Request $request)
    {
        if(isset($request->company_countries)){
            $counties = $request->company_countries;
            $request['company_countries'] =implode(',',$counties);
        }
        if(isset($request->countries_which_company_doesnot_work_with)){
            $counties = $request->countries_which_company_doesnot_work_with;
            $request['countries_which_company_doesnot_work_with'] =implode(',',$counties);
        }
        $supplier =  $this->repository->create($request->all());

        if(isset($request->national_id_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->national_id_image))->toMediaCollection('national_id_images');
        if(isset($request->passport_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->passport_image))->toMediaCollection('passport_images');

        if(isset($request->visa_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->visa_image))->toMediaCollection('visa_images');
        if(isset($request->commercial_license_image)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->commercial_license_image))->toMediaCollection('commercial_license_images');
        }
        if(isset($request->company_logo)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->company_logo))->toMediaCollection('company_logo_images');
        }
        if(isset($request->license_images)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->license_images))->toMediaCollection('license_images');
        }


        event(new SupplierRegistered($supplier));
        return $supplier;
    }

    public function update(Request $request,$id){
        if(isset($request->company_countries)){
            $counties = $request->company_countries;
            $request['company_countries'] =implode(',',$counties);
        }
        if(isset($request->countries_which_company_doesnot_work_with)){
            $counties = $request->countries_which_company_doesnot_work_with;
            $request['countries_which_company_doesnot_work_with'] =implode(',',$counties);
        }
        $supplier =  $this->repository->find($id);
        $supplier->update($request->all());
        if(isset($request->national_id_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->national_id_image))->toMediaCollection('national_id_images');
        if(isset($request->passport_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->passport_image))->toMediaCollection('passport_images');

        if(isset($request->visa_image))
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->visa_image))->toMediaCollection('visa_images');
        if(isset($request->commercial_license_image)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->commercial_license_image))->toMediaCollection('commercial_license_images');
        }
        if(isset($request->company_logo)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->company_logo))->toMediaCollection('company_logo_images');
        }
        if(isset($request->license_images)){
            $supplier->addMedia(storage_path('app/public/tmp/uploads/' . $request->license_images))->toMediaCollection('license_images');
        }
        return $supplier;
    }

}
