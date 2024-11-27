<?php

namespace App\Providers;

use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Dao\AdminProfileDaoInterface;
use App\Contracts\Dao\ChefAuthDaoInterface;
use App\Contracts\Dao\ChefProfileDaoInterface;
use App\Contracts\Services\AdminProfileServiceInterface;
use App\Contracts\Services\AdminServiceInterface;
use App\Contracts\Services\ChefAuthServiceInterface;
use App\Contracts\Services\ChefProfileServiceInterface;
use App\Dao\AdminDao;
use App\Dao\AdminProfileDao;
use App\Dao\ChefAuthDao;
use App\Dao\ChefProfileDao;
use App\Services\AdminProfileService;
use App\Services\AdminService;
use App\Services\ChefAuthService;
use App\Services\ChefProfileService;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Dao\MemberAuthDaoInterface;
use App\Dao\MemberAuthDao;
use App\Contracts\Services\MemberAuthServiceInterface;
use App\Services\MemberAuthService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MemberAuthDaoInterface::class, MemberAuthDao::class);
        $this->app->bind(MemberAuthServiceInterface::class, MemberAuthService::class);
        $this->app->singleton(ChefAuthDaoInterface::class, ChefAuthDao::class);
        $this->app->singleton(ChefAuthServiceInterface::class, ChefAuthService::class);
        $this->app->bind(ChefProfileDaoInterface::class, ChefProfileDao::class);
        $this->app->bind(ChefProfileServiceInterface::class, ChefProfileService::class);
        $this->app->bind(AdminDaoInterface::class, AdminDao::class);
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(AdminProfileDaoInterface::class, AdminProfileDao::class);
        $this->app->bind(AdminProfileServiceInterface::class, AdminProfileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
