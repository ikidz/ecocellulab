<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Http\Request;

use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuGroup;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;

use App\Nova\Banners;
use App\Nova\Teams;
use App\Nova\Benefits;
use App\Nova\WebSettings;
use App\Nova\User;
use App\Nova\Articles;
use App\Nova\Researches;
use App\Nova\Reviews;
use App\Nova\Subscribers;
use App\Nova\Contacts;
use App\Nova\AboutusContents;
use App\Nova\ProductCategories;
use App\Nova\Products;
use App\Nova\ProductReviews;
use App\Nova\CoreProductContents;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::style('icomoon-font', asset('assets/css/font.css'));

        Nova::withBreadcrumbs();

        Nova::mainMenu(function (Request $request, Menu $menu) {
            return [
                MenuSection::make('Website Settings', [
                    MenuItem::resource(Banners::class),
                    MenuItem::resource(Teams::class),
                    MenuItem::resource(Benefits::class),
                    MenuItem::resource(AboutusContents::class),
                    MenuItem::resource(CoreProductContents::class),
                    MenuItem::resource(WebSettings::class),
                    MenuItem::resource(User::class),
                ])->icon('cog'),
                MenuSection::make('Articles', [
                    MenuItem::resource(Articles::class),
                    MenuItem::resource(Researches::class)
                ])->icon('document-text'),
                MenuSection::make('Reviews', [
                    MenuItem::resource(Reviews::class)
                ])->icon('star'),
                MenuSection::make('Products', [
                    MenuItem::resource(ProductCategories::class),
                    MenuItem::resource(Products::class),
                    MenuItem::resource(ProductReviews::class)
                ])->icon('cube'),
                MenuSection::make('Contact', [
                    MenuItem::resource(Subscribers::class),
                    MenuItem::resource(Contacts::class)
                ])->icon('mail'),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
            // return in_array($user->email, [
            //     //
            // ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
