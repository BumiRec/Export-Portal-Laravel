<?php

namespace App\Providers;

use App\Implementations\BuyerImplementation;
use App\Implementations\CategoryImplementation;
use App\Implementations\CompanyImplementation;
use App\Implementations\ExportImplementation;
use App\Implementations\FileGetDataImplementation;
use App\Implementations\FileUpdateDeleteImplementation;
use App\Implementations\ForgotPasswordImplementation;
use App\Implementations\InterestedAtImplementation;
use App\Implementations\InterestedInImplementation;
use App\Implementations\ModifyItemImplementation;
use App\Implementations\ProductImplementation;
use App\Implementations\RegisterImplementation;
use App\Implementations\SellerImplementation;
use App\Implementations\TokenImplementation;
use App\Implementations\UpdateProfileUserImplementation;
use App\Interfaces\BuyerInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CompanyInterface;
use App\Interfaces\ExportInterface;
use App\Interfaces\FileGetDataInterface;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Interfaces\InterestedAtInterface;
use App\Interfaces\InterestedInterface;
use App\Interfaces\ModifyItemInterface;
use App\Interfaces\PasswordInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\RegisterInterface;
use App\Interfaces\SellerInterface;
use App\Interfaces\TokenInterface;
use App\Interfaces\UpdateProfileUserInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyInterface::class, CompanyImplementation::class);
        $this->app->bind(ProductInterface::class, ProductImplementation::class);
        $this->app->bind(CategoryInterface::class, CategoryImplementation::class);
        $this->app->bind(ExportInterface::class, ExportImplementation::class);
        $this->app->bind(InterestedInterface::class, InterestedInImplementation::class);
        $this->app->bind(InterestedAtInterface::class, InterestedAtImplementation::class);
        $this->app->bind(ModifyItemInterface::class, ModifyItemImplementation::class);
        $this->app->bind(RegisterInterface::class, RegisterImplementation::class);
        $this->app->bind(SellerInterface::class, SellerImplementation::class);
        $this->app->bind(TokenInterface::class, TokenImplementation::class);
        $this->app->bind(BuyerInterface::class, BuyerImplementation::class);
        $this->app->bind(FileUpdateDeleteInterface::class, FileUpdateDeleteImplementation::class);
        $this->app->bind(UpdateProfileUserInterface::class, UpdateProfileUserImplementation::class);
        $this->app->bind(FileGetDataInterface::class, FileGetDataImplementation::class);
        $this->app->bind(PasswordInterface::class, ForgotPasswordImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
