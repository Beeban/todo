<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;
use Throwable;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($data = []) use ($factory) {
            $pagination = [];

            if (is_object($data)) {
                try {
                    $pagination = [
                        'page' => $data->currentPage(),
                        'perPage' => (int) $data->perPage(),
                        'totalAmount' => $data->total(),
                        'lastPage' => $data->lastPage(),
                    ];
                } catch (Throwable $e) {
                    //$data object has no pagination
                }
            }

            if (method_exists($data, 'toArray')) {
                $data = $data->toArray(true);
            }

            $format = [
                'success' => true,
                'payload' => $data,
                'pagination' => $pagination,
            ];
            return $factory->make($format);
        });

        $factory->macro('error', function ($error, $code = 200) use ($factory) {
            if (is_string($error)) {
                $error = ['message' => $error];
            }

            $format = [
                'success' => false,
                'error' => $error,
            ];
            return $factory->make($format, $code);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
