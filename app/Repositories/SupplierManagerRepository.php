<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\SupplierManager;

class SupplierManagerRepository extends BaseRepository
{
     public function __construct(SupplierManager $suppliermanager)
    {
        parent::__construct($suppliermanager);
    }
}





