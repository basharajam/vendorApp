<?php

namespace  App\Repositories;

use App\Repositories\Contracts\BaseRepository;
use App\Models\WP\OrderItem;

class OrderItemRepository extends BaseRepository
{
     public function __construct(OrderItem $orderitem)
    {
        parent::__construct($orderitem);
    }
}





