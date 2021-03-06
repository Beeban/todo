<?php

namespace App\Providers;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\Response;
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
    public function boot(ResponseFactory $responseFactory, ViewFactory $viewFactory)
    {
        $this->extendResponseFactory($responseFactory);
        $this->extendViewFactory($viewFactory);
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

    private function extendResponseFactory(ResponseFactory $factory)
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

            if (method_exists($data, 'resolve')) {
                $data = $data->resolve(true);
            } elseif (method_exists($data, 'toArray')) {
                $data = $data->toArray(true);
            }

            $format = [
                'success' => true,
                'payload' => $data,
                'pagination' => $pagination,
            ];
            return $factory->make($format);
        });

        $factory->macro('error', function ($error, $code = null) use ($factory) {
            if (is_string($error)) {
                $error = ['message' => $error, 'code' => $code];
            }

            $format = [
                'success' => false,
                'error' => $error,
            ];
            return $factory->make($format, Response::HTTP_OK);
        });
    }

    private function extendViewFactory(ViewFactory $factory)
    {
        $factory->macro('error', function ($error) use ($factory) {
            return $factory->share('error', $error);
        });
    }
}
