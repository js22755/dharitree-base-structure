<?php

namespace App\Services\Tables;

use App\Models\SettlementInstitution\SettlementInstitutionBasicModel;
use App\Traits\DbConnection;

class SettlementInstituionBasicService
{
    /**
     * Create a new class instance.
     */
    use DbConnection;
    public function __construct()
    {
        $this->ins_basic_model = SettlementInstitutionBasicModel::dbSet('07');
    }

    public function getAll()
    {
        return $this->ins_basic_model->first();
        // return SettlementInstitutionBasicModel::first();
        // return SettlementInstitutionBasicModel::first();
    }
}
