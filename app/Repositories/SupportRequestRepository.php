<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\SupportRequest;

class SupportRequestRepository extends BaseRepository
{
     public function __construct(SupportRequest $supportrequest)
    {
        parent::__construct($supportrequest);
    }
}





