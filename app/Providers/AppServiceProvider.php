<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        paginator::useBootstrap();
        // to make only users with the logged in id to update there ads
        // $this->registerPolicies();
        Gate::define('edit-ad', function($user, $ad){
            return $user->id === $ad->user_id;
        });
        //
        //make menu view appeare in every route 
view::composer(['*'],function($view){
    $menus = Category::with('subcategories')->get();
    $view->with('menus',$menus);
});
    }
}
