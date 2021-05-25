<?php
namespace App\Providers;

use App\Http\InterfaceRepository\IQuoteRepository;
use App\Http\InterfaceRepository\IUserRepository;
use App\Http\Repositories\QuoteRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider; 

class RepositoryServiceProvider extends ServiceProvider 
{ 
   public function register() 
   { 
       $this->app->bind(IQuoteRepository::class, QuoteRepository::class);
       $this->app->bind(IUserRepository::class, UserRepository::class);
   }
}