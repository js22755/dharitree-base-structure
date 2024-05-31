<?php

namespace App\Models\SettlementInstitution;

use App\Traits\DbConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementInstitutionBasicModel extends Model
{
    use HasFactory;
    use DbConnection;
    protected $table = 'settlement_institution_basic';

    public static function dbSet($dist_code)
    {
        $instance = new self();
        $instance->setModelConnection($dist_code);
        return $instance;
    }
}
