<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Api\ItemRepository;
use App\Repositories\Api\Interfaces\ItemRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
        $this->app->bind(
            ItemRepositoryInterface::class,
            ItemRepository::class
        );
    }
}
