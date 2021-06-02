<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Notif_berkas;
use DateTime;

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
    // function formatInterval($interval) {
    //     $result = "";
    //     if ($interval->y) { $result .= $interval->format("%y years "); }
    //     if ($interval->m) { $result .= $interval->format("%m months "); }
    //     if ($interval->d) { $result .= $interval->format("%d days "); }
    //     if ($interval->h) { $result .= $interval->format("%h hours "); }
    //     if ($interval->i) { $result .= $interval->format("%i minutes "); }
    //     if ($interval->s) { $result .= $interval->format("%s seconds "); }
    
    //     return $result;
    // }

    public function boot()
    {
        view()->composer('*', function ($view) {
            $userInfo = Auth::user();

            $view->with(['userInfo' => $userInfo]);
        });
    }
}
