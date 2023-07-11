<?php

namespace App\Http;

use App\Http\Middleware\ActivityAreaMiddleware;
use App\Http\Middleware\AddFileMiddleware;
use App\Http\Middleware\AddProductMiddleware;
use App\Http\Middleware\BuyerConfirmationMiddleware;
use App\Http\Middleware\ChangePasswordMiddleware;
use App\Http\Middleware\CreateCompanyMiddleware;
use App\Http\Middleware\DeleteCompanyMiddleware;
use App\Http\Middleware\DeleteFileMiddleware;
use App\Http\Middleware\DeleteProductMiddleware;
use App\Http\Middleware\LogoutMiddleware;
use App\Http\Middleware\SearchCompanyMiddleware;
use App\Http\Middleware\SearchProductMiddleware;
use App\Http\Middleware\SearchUserMiddleware;
use App\Http\Middleware\SellerConfirmationMiddleware;
use App\Http\Middleware\SendEmailMiddleware;
use App\Http\Middleware\SendNewsletterMiddleware;
use App\Http\Middleware\SubscribeToNewsletterMiddleware;
use App\Http\Middleware\SuccessStoryMiddleware;
use App\Http\Middleware\UpdateAnnouncementsMiddleware;
use App\Http\Middleware\UpdateCategoryMiddleware;
use App\Http\Middleware\UpdateCompanyMiddleware;
use App\Http\Middleware\UpdateCompanyStatusMiddleware;
use App\Http\Middleware\UpdateUserMiddleware;
use App\Http\Middleware\UploadFileMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
            // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth'               => \App\Http\Middleware\Authenticate::class,
        'auth.basic'         => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session'       => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers'      => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can'                => \Illuminate\Auth\Middleware\Authorize::class,
        'guest'              => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm'   => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed'             => \App\Http\Middleware\ValidateSignature::class,
        'throttle'           => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified'           => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'role'               => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission'         => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

    ];

    protected $routeMiddleware = [
        'can:create-company' => CreateCompanyMiddleware::class,
        'can:logout' => LogoutMiddleware::class,
        'can:activity-area' => ActivityAreaMiddleware::class,
        'can:add-product' => AddProductMiddleware::class,
        'can:buy-confirmation' => BuyerConfirmationMiddleware::class,
        'can:sell-confirmation' => SellerConfirmationMiddleware::class,
        'can:subscribe-to-newsletter' => SubscribeToNewsletterMiddleware::class,
        'can:send-newsletter' => SendNewsletterMiddleware::class,
        'can:add-file' => AddFileMiddleware::class,
        'can:search-company' => SearchCompanyMiddleware::class,
        'can:search-product' => SearchProductMiddleware::class,
        'can:search-user' => SearchUserMiddleware::class,
        'can:send-support-e-mail' => SendEmailMiddleware::class,
        'can:add-success-story' => SuccessStoryMiddleware::class,
        'can:delete-company' => DeleteCompanyMiddleware::class,
        'can:delete-file' => DeleteFileMiddleware::class,
        'can:delete-product' => DeleteProductMiddleware::class,
        'can:update-company' => UpdateCompanyMiddleware::class,
        'can:update-user-profile' => UpdateUserMiddleware::class,
        'can:change-password' => ChangePasswordMiddleware::class,
        'can:update-announcements' => UpdateAnnouncementsMiddleware::class,
        'can:update-category-for-company' => UpdateCategoryMiddleware::class,
        'can:update-company-status' => UpdateCompanyStatusMiddleware::class,
        'can:upload-file' => UploadFileMiddleware::class,
    ];

}