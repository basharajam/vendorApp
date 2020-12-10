<?php


namespace App\Services\ProfitRatio;


use App\Repositories\ProfitRatioRepository;
use App\Services\Contracts\BaseService;
use Illuminate\Http\Request;
use App\Models\ProfitRatio;

/**
 * Class ProfitRatioService
 * @package App\Services\ProfitRatio
 */
class ProfitRatioService extends BaseService implements IProfitRatioService
{
    /**
     * ProfitRatioService constructor.
     * @param ProfitRatioRepository $repository
     */
    public function __construct(ProfitRatioRepository $repository)
    {
        parent::__construct($repository);
    }
    /** get profit ratios for a manager
     * @param $manager_id
     * @return mixed
     */
    public function getProfitRatios($manager_id){
        return ProfitRatio::where('manager_id',$manager_id);
    }
    public function store(Request $request){
        $profit_item = ProfitRatio::where('term_taxonomy_id',$request->term_taxonomy_id)
                                    ->where('manager_id',$request->manager_id)->first();
        if($profit_item!=null){
            $profit_item->update([
                'ratio'=>$request->ratio
            ]);
        }
        else{
            $profit_item = ProfitRatio::create($request->all());
        }
        return $profit_item;
    }

}
