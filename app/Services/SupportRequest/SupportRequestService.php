<?php


namespace App\Services\SupportRequest;


use App\Repositories\SupportRequestRepository;
use App\Services\Contracts\BaseService;

use App\Models\SupportRequest;

/**
 * Class SupportRequestService
 * @package App\Services\SupportRequest
 */
class SupportRequestService extends BaseService implements ISupportRequestService
{
    /**
     * SupportRequestService constructor.
     * @param SupportRequestRepository $repository
     */
    public function __construct(SupportRequestRepository $repository)
    {
        parent::__construct($repository);
    }

}
