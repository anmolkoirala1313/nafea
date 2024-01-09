<?php

namespace App\Providers;

use App\Models\Backend\Setting;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Blueprint::macro('additionalColumns', function (){
            $this->boolean('status')->default(0);
            $this->foreignId('created_by')->references('id')->on('users')->cascadeOnUpdate();
            $this->foreignId('updated_by')->nullable()->references('id')->on('users')->cascadeOnUpdate();
            $this->softDeletes();
            $this->timestamps();
        });

        $this->sensitiveComposer();
        $this->sensitiveBackendComposer();

        Builder::macro('withWhereHas', fn($relation, $constraint)=> $this->whereHas($relation, $constraint)->with([$relation=>$constraint]));
    }

    public function sensitiveComposer(){
        view()->composer(['frontend.partials.header', 'frontend.partials.footer'], 'App\Http\ViewComposer\SensitiveComposer');
    }

    public function sensitiveBackendComposer(){
        view()->composer(['backend.partials.header',
            'backend.partials.footer',
            'backend.partials.sidebar',
            'frontend.activity.includes.sidebar',
            'frontend.blog.includes.sidebar',
            'frontend.page.includes.map_and_description',
            'error.404',
            'auth.login'], function ($view) {
            $view->with([
                'setting_data' => Setting::first(),
            ]);
        });
    }

}
