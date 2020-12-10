<?php


namespace App\Services\ProfitRatio;


use App\Repositories\ProfitRatioRepository;
use App\Services\Contracts\BaseService;

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

}
