<?php

namespace App\Providers;

use App\Services\ChatService;
use App\Services\FileService;
use App\Services\Interfaces\IChatService;
use App\Services\Interfaces\IFileService;
use App\Services\Interfaces\IProtocolService;
use Illuminate\Support\ServiceProvider;
use App\Services\Interfaces\ITokenService;
use App\Services\ProtocolService;
use App\Services\TokenService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ITokenService::class, TokenService::class);
        $this->app->bind(IProtocolService::class, ProtocolService::class);
        $this->app->bind(IChatService::class, ChatService::class);
        $this->app->bind(IFileService::class, FileService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
