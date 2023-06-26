<?php

namespace App\Providers;

use App\Implementations\AnnouncementsImplementation;
use App\Implementations\BuyerImplementation;
use App\Implementations\CategoryImplementation;
use App\Implementations\CategoryStatusImplementation;
use App\Implementations\CompanyImplementation;
use App\Implementations\ExportImplementation;
use App\Implementations\FileGetDataImplementation;
use App\Implementations\FileUpdateDeleteImplementation;
use App\Implementations\ForgotPasswordImplementation;
use App\Implementations\BuyerListImplementation;
use App\Implementations\ManageCompaniesImplementation;
use App\Implementations\SellerListImplementation;
use App\Implementations\ModifyItemImplementation;
use App\Implementations\ProductImplementation;
use App\Implementations\RegisterImplementation;
use App\Implementations\SellerImplementation;
use App\Implementations\SuccessStoriesImplementation;
use App\Implementations\TokenImplementation;
use App\Implementations\UpdateProfileUserImplementation;
use App\Interfaces\AnnouncementsInterface;
use App\Interfaces\BuyerInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\CategoryStatusInterface;
use App\Interfaces\CompanyInterface;
use App\Interfaces\ExportInterface;
use App\Interfaces\FileGetDataInterface;
use App\Interfaces\FileUpdateDeleteInterface;
use App\Interfaces\BuyerListInterface;
use App\Interfaces\ManageCompaniesInterface;
use App\Interfaces\SellerListInterface;
use App\Interfaces\ModifyItemInterface;
use App\Interfaces\PasswordInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\RegisterInterface;
use App\Interfaces\SellerInterface;
use App\Interfaces\SuccessStoriesInterface;
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
        $this->app->bind(SellerListInterface::class, SellerListImplementation::class);
        $this->app->bind(BuyerListInterface::class, BuyerListImplementation::class);
        $this->app->bind(ModifyItemInterface::class, ModifyItemImplementation::class);
        $this->app->bind(RegisterInterface::class, RegisterImplementation::class);
        $this->app->bind(SellerInterface::class, SellerImplementation::class);
        $this->app->bind(TokenInterface::class, TokenImplementation::class);
        $this->app->bind(BuyerInterface::class, BuyerImplementation::class);
        $this->app->bind(FileUpdateDeleteInterface::class, FileUpdateDeleteImplementation::class);
        $this->app->bind(UpdateProfileUserInterface::class, UpdateProfileUserImplementation::class);
        $this->app->bind(FileGetDataInterface::class, FileGetDataImplementation::class);
        $this->app->bind(PasswordInterface::class, ForgotPasswordImplementation::class);
        $this->app->bind(SuccessStoriesInterface::class, SuccessStoriesImplementation::class);
        $this->app->bind(ManageCompaniesInterface::class, ManageCompaniesImplementation::class);
        $this->app->bind(AnnouncementsInterface::class, AnnouncementsImplementation::class);
        $this->app->bind(CategoryStatusInterface::class, CategoryStatusImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
