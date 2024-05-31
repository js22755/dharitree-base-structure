<?php

namespace App\Http\Controllers\SettlementInstituion;

use App\Services\Logic\LmService;
use Illuminate\Http\Request;

class LmController
{
    protected $lm_service;
    public function __construct(LmService $lm_service)
    {
        $this->lm_service = $lm_service;
    }

    public function fetchApi(Request $request)
    {
        // return $request->mid_test; //middleware test

        return response()->json(['status' => 'success', 'data' => $this->lm_service->fetchAlldata()], 200);
    }
}
