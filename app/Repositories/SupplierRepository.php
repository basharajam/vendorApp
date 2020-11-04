<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\Supplier;

class SupplierRepository extends BaseRepository
{
     public function __construct(Supplier $supplier)
    {
        parent::__construct($supplier);
    }
}





