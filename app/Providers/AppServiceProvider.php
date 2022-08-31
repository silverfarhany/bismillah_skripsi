<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Certificate;
use Exception;

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
        try {

            view()->composer(['peserta.*'], function ($view)
            {
                $cek = Certificate::where('member_id', \Session::get('id'))->get();
                
                $view->with('cek', $cek);
            });

        } catch (Exception $e) {
            
		    return redirect()->route('login');
        
        }
    }
}
