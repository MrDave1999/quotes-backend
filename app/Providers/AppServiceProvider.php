<?php

namespace App\Providers;

use App\Http\InterfaceService\IQuoteService;
use App\Http\InterfaceService\IUserService;
use App\Http\Services\QuoteService;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IQuoteService::class, QuoteService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }

    public function boot()
    {
        Validator::extendImplicit('is_empty', function($attribute, $value, $parameters) {
            return strlen(trim($value)) !== 0;
        });

        Validator::replacer('is_empty', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', __('validation.attributes.'. $attribute), $message);
        });
    }
}
