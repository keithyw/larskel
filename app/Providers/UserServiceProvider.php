<?php
/**
 * Created by PhpStorm.
 * User: keithwatanabe
 * Date: 3/10/15
 * Time: 11:50 AM
 */

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider{
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Repositories\UserRepositoryInterface', 'App\Repositories\UserRepository');
    }

    public function provides()
    {
        return ['App\Repositories\UserRepository'];
    }
}