<?php

namespace App\Providers;

use App\Repository\Eloquent\PostRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Contract\IPost;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IPost::class, PostRepository::class);
    }
}
