<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Advert;
use App\Policies\BrandPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\AdvertPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
       Advert::class => AdvertPolicy::class,
        Brand::class => BrandPolicy::class,
        Category::class => CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
