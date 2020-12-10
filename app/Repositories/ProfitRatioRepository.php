<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\ProfitRatio;

class ProfitRatioRepository extends BaseRepository
{
     public function __construct(ProfitRatio $profitratio)
    {
        parent::__construct($profitratio);
    }
}





