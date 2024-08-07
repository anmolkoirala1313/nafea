<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME            = '/administration/dashboard';
    public const CANDIDATE_HOME  = '/candidate/dashboard';
    protected $namespace         = 'App\Http\Controllers';


    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */

    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapCandidateRoutes();
    }


    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->name('frontend.')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes(){
        Route::prefix('administration')
            ->name('backend.')
            ->namespace($this->namespace)
            ->middleware(['web'])
            ->group(base_path('routes/backend.php'));
    }

    protected function mapCandidateRoutes(){
        Route::prefix('candidate')
            ->name('candidate.')
            ->namespace($this->namespace)
            ->middleware(['web'])
            ->group(base_path('routes/candidate.php'));
    }

}
