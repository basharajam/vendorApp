<?php


namespace App\Services\ProfitRatio;


use App\Services\Contracts\IBaseService;

/**
 * Interface IProfitRatioService
 * @package App\Services\ProfitRatio
 */
interface IProfitRatioService extends IBaseService
{
     /** get profit ratios for a manager
     * @param $manager_id
     * @return mixed
     */
    public function getProfitRatios($manager_id);
}
