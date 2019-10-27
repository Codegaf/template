<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Response::macro('success', function ($data = [], $message = null) {
            if (is_null($message)) {
                $message = __('Operación realizada con éxito');
            }

            return response()->json(['title' => 'Correcto', 'status' => 'success', 'data' => $data, 'message' => $message], 200);
        });

        Response::macro('error', function ($data = [], $message = null) {
            if (is_null($message)) {
                $message = __('Ha habido un error realizando la operación');
            }

            return response()->json(['title' => 'Error', 'status' => 'error', 'data' => $data, 'message' => $message], 500);
        });

        Schema::defaultStringLength(191);
    }
}
