<?php

namespace App\Providers;

use App\Services\Logic\LmService;
use App\Services\Middleware\UserAccessMiddlewareService;
use App\Services\Tables\SettlementInstituionBasicService;
use App\Traits\DbConnection;
use Illuminate\Support\ServiceProvider;

class SettlementInstitutionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    use DbConnection;
    public function register(): void
    {
        $this->app->singleton(SettlementInstituionBasicService::class, function ($app) {
            return new SettlementInstituionBasicService();
        });

        $this->app->singleton(LmService::class, function ($app) {
            $settlement_service = $app->make(SettlementInstituionBasicService::class);
            return new LmService($settlement_service);
        });

        $this->app->singleton(UserAccessMiddlewareService::class, function ($app) {
            return new UserAccessMiddlewareService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->dbConfig('07', true); //this will be the user dist code
    }
}
