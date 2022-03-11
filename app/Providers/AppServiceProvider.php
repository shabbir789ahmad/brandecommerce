<?php

namespace App\Providers;


use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Social;
use App\Models\Logo;
use App\Models\Submenue;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
   
     public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*', function($view)
        {
              $links=Social::latest()->take(1)->get();
              $submenues=Submenue::latest()->select('smenue','menue_id','menue_image','id')->get();
              $logo=Logo::latest()->take(1)->select('logo')->get();
              // dd($submenues);
            $view->with('links', $links)->with('logo', $logo)->with('submenues', $submenues);
        });

      
    }
}
