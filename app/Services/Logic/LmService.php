<?php

namespace App\Services\Logic;

use App\Services\Tables\SettlementInstituionBasicService;

class LmService
{
    /**
     * Create a new class instance.
     */
    protected $instituion_basic_service;

    public function __construct(SettlementInstituionBasicService $instituion_basic_service)
    {
        $this->instituion_basic_service = $instituion_basic_service;
    }

    public function fetchAlldata()
    {
        return $this->instituion_basic_service->getAll();
    }
}
